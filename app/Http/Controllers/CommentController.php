<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['permission:read_comments'])->only('index');
        $this->middleware(['permission:create_comments'])->only('create');
        $this->middleware(['permission:create_comments'])->only('edit');
        $this->middleware(['permission:update_comments'])->only('update');
        $this->middleware(['permission:delete_comments'])->only('destroy');


        $this->middleware('auth');
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comment = Comment::all();

        return view("comment.index")->with("comments", $comment);
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
        $comment =  new Comment;

        $comment->user_id = Auth()->user()->id;
        $comment->video_id = $request->video_id;
        $comment->comment = $request->comment;
        $comment->save();

        if ($request->comment) {
            session()->flash('addComment', "Success to add Comment");
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);
        if (empty($comment)) {
            abort(404, 'Page not found');
        }

        if ($comment->delete()) {
            session()->flash('deleteMassage', "The comment Is Trsahed to the Soft Delete");
        }
        return redirect()->route('comment.index');
    }



    public function trashed()
    {
        $comment = Comment::onlyTrashed()->get();
        return view('comment.softDeleted')->with('comments', $comment);
    }

    // {{-- hdelete =>> hard Delete حدف كامل --}}

    public function hdelete($id)
    {
        $comment = Comment::withTrashed()->where('id', $id)->first();
        if (empty($comment)) {
            abort(404, 'Page not found');
        }

        if ($comment->forceDelete()) {
            session()->flash('deleteMassage', "The comment Is Deleted");
        }
        return redirect()->route('comment.index');
    }


    public function restore($id)
    {
        $comment = Comment::withTrashed()->where('id', $id)->first();

        if (empty($comment)) {
            abort(404, 'Page not found');
        }

        if ($comment->restore()) {

            session()->flash('restoreMassage', "The comment Is restored");
        }

        return redirect()->route('comment.index');
    }
}
