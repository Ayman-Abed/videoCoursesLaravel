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

class DashboardController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['permission:read_dashboards'])->only('index');
        $this->middleware(['permission:create_dashboards'])->only('create');
        $this->middleware(['permission:create_dashboards'])->only('edit');
        $this->middleware(['permission:update_dashboards'])->only('update');
        $this->middleware(['permission:delete_dashboards'])->only('destroy');


        $this->middleware('auth');
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        $video = Video::all();
        $category = Category::all();
        $skill = Skill::all();
        $tag = Tag::all();
        $comment = Comment::all();
        $page = Page::all();
        return view("dashboard.index")
            ->with("videos", $video)
            ->with("skills", $skill)
            ->with("tags", $tag)
            ->with("pages", $page)
            ->with("comments", $comment)
            ->with("categories", $category)
            ->with('users', $user);
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
