<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\Page;
use App\Skill;
use App\Video;
use App\Tag;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOMeta;

class UIController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->only('video');
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {



        SEOMeta::setTitle('Video Course');
        SEOMeta::setDescription("All Software You need In This Web Site, Programs, Packges, Game , Application,Free Antivirus , Downloads");
        SEOMeta::addKeyword(['Video', 'Course']);


        $video = Video::where("published", '1')->orderby("created_at", "desc")->paginate(10);
        $category = Category::orderby("created_at", "desc")->get();
        $skill = Skill::orderby("created_at", "desc")->get();
        $tag = Tag::orderby("created_at", "desc")->get();
        $comment = Comment::orderby("created_at", "desc")->get();
        $page = Page::orderby("created_at", "desc")->get();
        return view("UI.index")
            ->with("videos", $video)
            ->with("skills", $skill)
            ->with("tags", $tag)
            ->with("pages", $page)
            ->with("comments", $comment)
            ->with("categories", $category);
    }



    public function category($id)
    {
        $showVideoCategory = Category::findOrFail($id);
        // For navbar

        $name = $showVideoCategory->name;
        $meta_keywords =  $showVideoCategory->meta_keywords;
        $meta_description =  $showVideoCategory->meta_description;

        $meta_keywords =  explode(" ", $meta_keywords);


        SEOMeta::setTitle("Video Course - " . $name);
        SEOMeta::setDescription($meta_description);
        SEOMeta::addKeyword(implode(',', $meta_keywords));



        $category = Category::orderby("created_at", "desc")->get();
        $skill = Skill::orderby("created_at", "desc")->get();

        $video = Video::where("published", '1')->where("category_id", $showVideoCategory->id)->orderby("created_at", "desc")->get();

        $page = Page::all();

        return view("UI.category")
            ->with("videos", $video)
            ->with("pages", $page)
            ->with("skills", $skill)
            ->with("categories", $category)
            ->with("showVideoCategory", $showVideoCategory);
    }



    public function skill($id)
    {
        $showVideoSkill = Skill::findOrFail($id);



        $name = $showVideoSkill->name;


        $meta_keywords =  explode(" ", $name);


        SEOMeta::setTitle("Video Course - " . $name);
        SEOMeta::setDescription($name);
        SEOMeta::addKeyword(implode(',', $meta_keywords));



        // For navbar


        $category = Category::orderby("created_at", "desc")->get();
        $skill = Skill::orderby("created_at", "desc")->get();



        // To access to table tags dont have tag id in video table
        $video = Video::whereHas("skills", function ($query) use ($id) {

            $query->where("skill_id", $id);
        })->orderBy("created_at", "desc")->get();

        $page = Page::all();


        return view("UI.skill")
            ->with("videos", $video)
            ->with("pages", $page)
            ->with("skills", $skill)
            ->with("categories", $category)
            ->with("showVideoSkill", $showVideoSkill);
    }




    public function tag($id)
    {
        $showVideoTag = Tag::findOrFail($id);


        $name = $showVideoTag->name;

        $meta_keywords =  explode(" ", $name);

        SEOMeta::setTitle("Video Course - " . $name);
        SEOMeta::setDescription($name);
        SEOMeta::addKeyword(implode(',', $meta_keywords));


        // For navbar

        $category = Category::orderby("created_at", "desc")->get();
        $skill = Skill::orderby("created_at", "desc")->get();


        // To access to table tags dont have tag id in video table
        $video = Video::whereHas("tags", function ($query) use ($id) {

            $query->where("tag_id", $id);
        })->orderBy("created_at", "desc")->get();


        $page = Page::all();



        return view("UI.tag")
            ->with("videos", $video)
            ->with("skills", $skill)
            ->with("pages", $page)
            ->with("categories", $category)
            ->with("showVideoTag", $showVideoTag);
    }







    public function video($id)
    {
        $showVideo = Video::findOrFail($id);

        $name = $showVideo->name;
        $meta_keywords =  $showVideo->meta_keywords;
        $meta_description =  $showVideo->meta_description;

        $meta_keywords =  explode(" ", $meta_keywords);


        SEOMeta::setTitle("Video Course - " . $name);
        SEOMeta::setDescription($meta_description);
        SEOMeta::addKeyword(implode(',', $meta_keywords));

        // For Navbar

        $category = Category::orderby("created_at", "desc")->get();
        $skill = Skill::orderby("created_at", "desc")->get();
        $page = Page::all();



        return view("UI.video")
            ->with("skills", $skill)
            ->with("pages", $page)
            ->with("categories", $category)
            ->with("showVideo", $showVideo);
    }




    public function page($slug)
    {
        $showPage = Page::where('slug', $slug)->firstOrFail();


        $name = $showPage->name;
        $description = $showPage->description;
        $meta_keywords =  $showPage->meta_keywords;
        $meta_description =  $showPage->meta_description;

        $meta_keywords =  explode(" ", $meta_keywords);


        SEOMeta::setTitle("Video Course - " . $name);
        SEOMeta::setDescription($meta_description . " , " . $description);
        SEOMeta::addKeyword(implode(',', $meta_keywords));


        $page = Page::all();
        $category = Category::orderby("created_at", "desc")->get();
        $skill = Skill::orderby("created_at", "desc")->get();

        return view("UI.page")
            ->with("showPage", $showPage)
            ->with("pages", $page)
            ->with("skills", $skill)
            ->with("categories", $category);
    }



    public function search()
    {
        $video_search = Video::where("published", '1')->where("name", 'like', '%' . request("search") . '%')->paginate(10);

        $category = Category::orderby("created_at", "desc")->get();
        $skill = Skill::orderby("created_at", "desc")->get();
        $page = Page::all();

        return view("UI.search")

            ->with("video_searchs", $video_search)
            ->with("search_title", request("search"))
            ->with("pages", $page)
            ->with("skills", $skill)
            ->with("categories", $category);
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
