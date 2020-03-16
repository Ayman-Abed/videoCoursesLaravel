<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware(['permission:read_pages'])->only('index');
        $this->middleware(['permission:create_pages'])->only('create');
        $this->middleware(['permission:create_pages'])->only('edit');
        $this->middleware(['permission:update_pages'])->only('update');
        $this->middleware(['permission:delete_pages'])->only('destroy');

        $this->middleware('auth');
    }




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = Page::all();

        return view("page.index")->with("pages", $page);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("page.addPage");
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
            'description' => 'required',
            'meta_keywords' => 'required',
            'meta_description' => 'required'
        ]);

        $page = new Page;
        $page->name = $request->name;
        // For make Under score
        $page->slug  = trim(str_replace(" ", "_", $request->name));
        $page->description = $request->description;
        $page->meta_keywords = $request->meta_keywords;
        $page->meta_description = $request->meta_description;


        if ($page->save()) {
            session()->flash('addMassage', "Success to Add Page");
        }


        return redirect()->route('page.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = Page::find($id);

        return view("page.editPage")->with("page", $page);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'meta_keywords' => 'required',
            'meta_description' => 'required'
        ]);


        $page =  Page::find($id);

        $page->name = $request->name;
        $page->description = $request->description;
        $page->meta_keywords = $request->meta_keywords;
        $page->meta_description = $request->meta_description;

        if ($page->save()) {
            session()->flash('editMassage', "Success to update page");
        }

        return redirect()->route('page.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = Page::find($id);
        if (empty($page)) {
            abort(404, 'Page not found');
        }

        if ($page->delete()) {
            session()->flash('deleteMassage', "The page Is Trsahed to the Soft Delete");
        }
        return redirect()->route('page.index');
    }



    public function trashed()
    {
        $page = Page::onlyTrashed()->get();
        return view('page.softDeleted')->with('pages', $page);
    }

    // {{-- hdelete =>> hard Delete حدف كامل --}}

    public function hdelete($id)
    {
        $page = Page::withTrashed()->where('id', $id)->first();
        if (empty($page)) {
            abort(404, 'Page not found');
        }

        if ($page->forceDelete()) {
            session()->flash('deleteMassage', "The page Is Deleted");
        }
        return redirect()->route('page.index');
    }


    public function restore($id)
    {
        $page = Page::withTrashed()->where('id', $id)->first();

        if (empty($page)) {
            abort(404, 'Page not found');
        }

        if ($page->restore()) {

            session()->flash('restoreMassage', "The page Is restored");
        }

        return redirect()->route('page.index');
    }
}
