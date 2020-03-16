<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['permission:read_tags'])->only('index');
        $this->middleware(['permission:create_tags'])->only('create');
        $this->middleware(['permission:create_tags'])->only('edit');
        $this->middleware(['permission:update_tags'])->only('update');
        $this->middleware(['permission:delete_tags'])->only('destroy');
        $this->middleware('auth');
    }





    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tag = Tag::all();

        return view("tag.index")->with("tags", $tag);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("tag.addTag");
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
        ]);

        $tag = new Tag();
        $tag->name = $request->name;



        if ($tag->save()) {
            session()->flash('addMassage', "Success to Add tag");
        }


        return redirect()->route('tag.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = Tag::find($id);

        return view("tag.editTag")->with("tag", $tag);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);


        $tag =  Tag::find($id);

        $tag->name = $request->name;


        if ($tag->save()) {
            session()->flash('editMassage', "Success to update tag");
        }

        return redirect()->route('tag.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::find($id);
        if (empty($tag)) {
            abort(404, 'Page not found');
        }

        if ($tag->delete()) {
            session()->flash('deleteMassage', "The tag Is Trsahed to the Soft Delete");
        }
        return redirect()->route('tag.index');
    }



    public function trashed()
    {
        $tag = Tag::onlyTrashed()->get();
        return view('tag.softDeleted')->with('tags', $tag);
    }

    // {{-- hdelete =>> hard Delete حدف كامل --}}

    public function hdelete($id)
    {
        $tag = Tag::withTrashed()->where('id', $id)->first();
        if (empty($tag)) {
            abort(404, 'Page not found');
        }

        if ($tag->forceDelete()) {
            session()->flash('deleteMassage', "The tag Is Deleted");
        }
        return redirect()->route('tag.index');
    }


    public function restore($id)
    {
        $tag = Tag::withTrashed()->where('id', $id)->first();

        if (empty($tag)) {
            abort(404, 'Page not found');
        }

        if ($tag->restore()) {

            session()->flash('restoreMassage', "The tag Is restored");
        }

        return redirect()->route('tag.index');
    }
}
