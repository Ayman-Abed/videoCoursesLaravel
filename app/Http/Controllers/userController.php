<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;


class userController extends Controller
{


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        // To make permission for user and block any user to access to any page dont have permissions For access to it
        $this->middleware(['permission:read_users'])->only('index');
        $this->middleware(['permission:create_users'])->only('create');
        $this->middleware(['permission:create_users'])->only('edit');
        $this->middleware(['permission:update_users'])->only('update');
        $this->middleware(['permission:delete_users'])->only('destroy');

        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view("users.index")->with("users", $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {



        $models = ['users', 'pages', 'videos', 'tags', 'skills', 'dashboards', 'comments', 'categories', 'messages'];
        $maps = ['create', 'read', 'update', 'delete'];

        return view("users.addUser")->with("models", $models)->with("maps", $maps);
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
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'permissions' => 'required|min:1'

        ]);



        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();


        if ($user->save()) {

            session()->flash('addMassage', "Success to add user");
        }

        $user->attachRole("admin");
        $user->attachPermissions($request->permissions);








        return redirect()->route('users.index');
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
        $user = User::find($id);
        if (empty($user)) {
            abort(404, 'Page not found');
        }

        $models = ['users', 'pages', 'videos', 'tags', 'skills', 'dashboards', 'comments', 'categories', 'messages'];
        $maps = ['create', 'read', 'update', 'delete'];


        return view("users.editUser")->with("user", $user)->with("models", $models)->with("maps", $maps);
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
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'permissions' => 'required|min:1',

        ]);



        $user = User::find($id);

        if (empty($user)) {
            abort(404, 'Page not found');
        }

        $user->name = $request->name;
        $user->email = $request->email;

        if (!empty($request->password)) {
            $user->password = bcrypt($request->password);
        }


        $user->syncPermissions($request->permissions);


        if ($user->save()) {
            session()->flash('editMassage', "Success to update user");
        }


        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if (empty($user)) {
            abort(404, 'Page not found');
        }

        if ($user->delete()) {
            session()->flash('deleteMassage', "The User Is Trsahed to the Soft Delete");
        }
        return redirect()->route('users.index');
    }



    public function trashed()
    {
        $user = User::onlyTrashed()->get();
        return view('users.softDeleted')->with('users', $user);
    }

    // {{-- hdelete =>> hard Delete حدف كامل --}}

    public function hdelete($id)
    {
        $user = User::withTrashed()->where('id', $id)->first();
        if (empty($user)) {
            abort(404, 'Page not found');
        }

        if ($user->forceDelete()) {
            session()->flash('deleteMassage', "The User Is Deleted");
        }
        return redirect()->route('users.index');
    }


    public function restore($id)
    {
        $user = User::withTrashed()->where('id', $id)->first();

        if (empty($user)) {
            abort(404, 'Page not found');
        }

        if ($user->restore()) {

            session()->flash('restoreMassage', "The User Is restored");
        }

        return redirect()->route('users.index');
    }
}
