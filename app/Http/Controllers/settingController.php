<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\settings;

class settingController extends Controller
{


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = settings::all();
        return view("setting.index")->with("settings", $settings);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("setting.addSetting");
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
            'user_name' => 'required',
            'blog_name' => 'required',
            'about' => 'required',
            'manegar' => 'required',
            'phone_number' => 'required',
            'facebook' => 'required'
        ]);


        $setting = new settings;
        $setting->user_name = $request->user_name;
        $setting->blog_name = $request->blog_name;
        $setting->about = $request->about;
        $setting->manegar = $request->manegar;
        $setting->phone_number = $request->phone_number;
        $setting->facebook = $request->facebook;



        if ($setting->save()) {
            session()->flash('addMassage', "Success to add Setting");
        }

        return redirect()->route('setting.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $setting = settings::find($id);

        return view("setting.editSetting")->with('setting', $setting);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $setting = settings::find($id);
        if (empty($setting)) {
            abort(404, 'Page not found');
        }

        $setting->user_name = $request->user_name;
        $setting->blog_name = $request->blog_name;
        $setting->about = $request->about;
        $setting->manegar = $request->manegar;
        $setting->phone_number = $request->phone_number;
        $setting->facebook = $request->facebook;


        if ($setting->save()) {
            session()->flash('editMassage', "Success to Update Setting");
        }

        return redirect()->route('setting.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $setting = settings::find($id);
        if (empty($setting)) {
            abort(404, 'Page not found');
        }

        if ($setting->delete()) {
            session()->flash('deleteMassage', "The Setting Is Deleted");
        }
        return redirect()->route('setting.index');
    }
}
