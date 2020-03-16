<?php

namespace App\Http\Controllers;

use App\Video;
use App\Category;
use App\Comment;
use App\Skill;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class VideoController extends Controller
{


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['permission:read_videos'])->only('index');
        $this->middleware(['permission:create_videos'])->only('create');
        $this->middleware(['permission:create_videos'])->only('edit');
        $this->middleware(['permission:update_videos'])->only('update');
        $this->middleware(['permission:delete_videos'])->only('destroy');
        $this->middleware('auth');
    }




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $video = Video::all();


        return view("video.index")->with("videos", $video);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $category = Category::all();

        $skill = Skill::all();
        $tag = Tag::all();

        if ($category->count() > 0 || $skill->count() > 0) {
            return view("video.addVideo")->with("categories", $category)->with("skills", $skill)->with("tags", $tag);;
        } else {
            return view("category.addCategory");
        }
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
            'category_id' => 'required',
            'description' => 'required',
            'meta_keywords' => 'required',
            'meta_description' => 'required',
            'youtube' => 'required'
        ]);





        // to add image For  Book
        if ($request->image) {

            $image = $request->image;
            $image_new_name = time() . $image->getClientOriginalName();
            $image->move("uploads/video_image/", $image_new_name);
        } else {
            // Becuse fond in file by Default
            $image_new_name = "default.png";
        }




        $video =  new Video;

        $video->name = $request->name;
        $video->user_id = Auth()->user()->id;
        $video->category_id = $request->category_id;
        $video->description = $request->description;
        $video->meta_keywords = $request->meta_keywords;
        $video->meta_description = $request->meta_description;
        $video->youtube = $request->youtube;
        $video->image = 'uploads/video_image/' . $image_new_name;




        if ($video->save()) {
            session()->flash('addMassage', "Success to Add video");
        }


        $video->skills()->sync($request->skills);
        $video->tags()->sync($request->tags);



        return redirect()->route('video.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $category = Category::all();
        $skill = Skill::all();
        $tag = Tag::all();


        if ($category->count() > 0) {


            $video = Video::find($id);

            $comment = Comment::where("video_id", $video->id)->orderBy("created_at", "desc")->take(10)->get();

            return view("video.editVideo")->with("video", $video)

                ->with("categories", $category)
                ->with("skills", $skill)
                ->with("comments", $comment)
                ->with("tags", $tag);
        } else {
            return view("category.addCategory");
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $video = Video::find($id);

        if (empty($video)) {
            abort(404, 'Page not found');
        }


        if ($request->image) {


            if ($video->image != 'default.png') {

                File::delete($video->image);
            }

            $image = $request->image;

            $image_new_name = time() . $image->getClientOriginalName();
            // To get new image and the date The Image has Add
            $image->move('uploads/video_image/', $image_new_name);
            // To save new image add
            $video->image = 'uploads/video_image/' .  $image_new_name;
        }



        $video->name = $request->name;
        $video->user_id =  Auth()->user()->id;
        $video->category_id = $request->category_id;
        $video->description = $request->description;
        $video->meta_keywords = $request->meta_keywords;
        $video->youtube = $request->youtube;
        $video->meta_description = $request->meta_description;

        if ($video->save()) {
            session()->flash('editMassage', "Success to update video");
        }


        $video->skills()->sync($request->skills);

        $video->tags()->sync($request->tags);



        // For add Comment




        return redirect()->route('video.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $video = Video::find($id);
        if (empty($video)) {
            abort(404, 'Page not found');
        }

        if ($video->delete()) {

            session()->flash('deleteMassage', "The video Is Trsahed to the Soft Delete");
        }
        return redirect()->route('video.index');
    }



    public function trashed()
    {
        $video = Video::onlyTrashed()->get();
        return view('video.softDeleted')->with('videos', $video);
    }

    // {{-- hdelete =>> hard Delete حدف كامل --}}

    public function hdelete($id)
    {
        $video = Video::withTrashed()->where('id', $id)->first();
        if (empty($video)) {
            abort(404, 'Page not found');
        }


        if ($video->image != 'default.png') {

            File::delete($video->image);
        }

        if ($video->forceDelete()) {
            session()->flash('deleteMassage', "The video Is Deleted");
        }
        return redirect()->route('video.trashed');
    }


    public function restore($id)
    {
        $video = Video::withTrashed()->where('id', $id)->first();

        if (empty($video)) {
            abort(404, 'Page not found');
        }

        if ($video->restore()) {

            session()->flash('restoreMassage', "The video Is restored");
        }

        return redirect()->route('video.index');
    }



    public function published($id)
    {

        $video = Video::find($id);
        $video->published = 1;



        if ($video->save()) {
            session()->flash('publisedVideo', "The Video Is published");
        }
        return redirect()->back();
    }



    public function notPublished($id)
    {
        $video = Video::find($id);
        $video->published = 0;

        if ($video->save()) {
            session()->flash('publisedVideo', "The Video Is Not published");
        }

        return redirect()->back();
    }
}
