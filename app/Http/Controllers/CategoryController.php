<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['permission:read_categories'])->only('index');
        $this->middleware(['permission:create_categories'])->only('create');
        $this->middleware(['permission:create_categories'])->only('edit');
        $this->middleware(['permission:update_categories'])->only('update');
        $this->middleware(['permission:delete_categories'])->only('destroy');


        $this->middleware('auth');
    }




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::all();

        return view("category.index")->with("categories", $category);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("category.addCategory");
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
            'meta_keywords' => 'required',
            'meta_description' => 'required'
        ]);

        $category = new Category;
        $category->name = $request->name;
        $category->meta_keywords = $request->meta_keywords;
        $category->meta_description = $request->meta_description;


        if ($category->save()) {
            session()->flash('addMassage', "Success to Add Category");
        }


        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);

        return view("category.editCategory")->with("category", $category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


        $this->validate($request, [
            'name' => 'required',
            'meta_keywords' => 'required',
            'meta_description' => 'required'
        ]);


        $category =  Category::find($id);

        $category->name = $request->name;
        $category->meta_keywords = $request->meta_keywords;
        $category->meta_description = $request->meta_description;

        if ($category->save()) {
            session()->flash('editMassage', "Success to update Category");
        }

        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        if (empty($category)) {
            abort(404, 'Page not found');
        }

        if ($category->delete()) {
            session()->flash('deleteMassage', "The category Is Trsahed to the Soft Delete");
        }
        return redirect()->route('category.index');
    }



    public function trashed()
    {
        $category = Category::onlyTrashed()->get();
        return view('category.softDeleted')->with('categories', $category);
    }

    // {{-- hdelete =>> hard Delete حدف كامل --}}

    public function hdelete($id)
    {
        $category = Category::withTrashed()->where('id', $id)->first();
        if (empty($category)) {
            abort(404, 'Page not found');
        }

        if ($category->forceDelete()) {
            session()->flash('deleteMassage', "The category Is Deleted");
        }
        return redirect()->route('category.index');
    }


    public function restore($id)
    {
        $category = Category::withTrashed()->where('id', $id)->first();

        if (empty($category)) {
            abort(404, 'Page not found');
        }

        if ($category->restore()) {

            session()->flash('restoreMassage', "The category Is restored");
        }

        return redirect()->route('category.index');
    }
}
