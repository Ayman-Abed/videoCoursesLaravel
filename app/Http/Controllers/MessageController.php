<?php

namespace App\Http\Controllers;

use App\Mail\ReplayMessage;
use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware(['permission:read_messages'])->only('index');
        $this->middleware(['permission:create_messages'])->only('create');
        $this->middleware(['permission:create_messages'])->only('edit');
        $this->middleware(['permission:update_messages'])->only('update');
        $this->middleware(['permission:delete_messages'])->only('destroy');

        $this->middleware('auth');
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $message =  Message::all();
        return view("message.index")->with("messages", $message);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("message.addMessage");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'message' => 'required'
        ]);

        $message = new Message;
        $message->name = $request->name;
        $message->email = $request->email;
        $message->message = $request->message;


        if ($message->save()) {
            session()->flash('addMassage', "Success to Add message");
        }


        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $message = Message::find($id);

        return view("message.replayMessage")->with("message", $message);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function replay(Request $request, $id)
    {
        $this->validate($request, [
            'replay_message' => 'required',
        ]);



        $message = Message::findOrFail($id);


        $data = array(
            'name' => $message->name,
            'email' => $message->email,
            'replay_message' => $request->replay_message,
        );



        Mail::send("message.contcat", $data, function ($messages) use ($data) {

            $messages->from("Aymanabed8192@gmail.com");
            $messages->to($data['email']);
            $messages->subject($data['replay_message']);
        });



        if ($message->save()) {
            session()->flash('addMassage', "Success to Add message");
        }


        return redirect()->route("message.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $message = Message::find($id);
        if (empty($message)) {
            abort(404, 'Page not found');
        }

        if ($message->delete()) {

            session()->flash('deleteMassage', "The message Is Trsahed to the Soft Delete");
        }
        return redirect()->route('message.index');
    }
}
