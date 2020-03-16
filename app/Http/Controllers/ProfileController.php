<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Category;
use App\Comment;
use App\Page;
use App\Skill;
use App\Video;
use App\Tag;

class ProfileController extends Controller
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
    public function profile($email)
    {
        $userProfile = User::where("email", $email)->first();

        $category = Category::orderby("created_at", "desc")->get();
        $skill = Skill::orderby("created_at", "desc")->get();
        $tag = Tag::orderby("created_at", "desc")->get();
        $comment = Comment::orderby("created_at", "desc")->get();
        $page = Page::orderby("created_at", "desc")->get();

        return view("UI.profile")
            ->with("skills", $skill)
            ->with("tags", $tag)
            ->with("pages", $page)
            ->with("comments", $comment)
            ->with("categories", $category)
            ->with("userProfile", $userProfile);
    }




    public function updateProfile(Request $request, $email)
    {
        $userProfile = User::where("email", $email)->first();


        $userProfile->name = $request->name;
        $userProfile->email = $request->email;
        if (!empty($request->password)) {

            $userProfile->password = bcrypt($request->password);
        }

        $userProfile->save();


        return redirect()->back();
    }







    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
