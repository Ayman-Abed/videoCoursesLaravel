<?php

namespace App\Http\Controllers;

use App\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['permission:read_skills'])->only('index');
        $this->middleware(['permission:create_skills'])->only('create');
        $this->middleware(['permission:create_skills'])->only('edit');
        $this->middleware(['permission:update_skills'])->only('update');
        $this->middleware(['permission:delete_skills'])->only('destroy');

        $this->middleware('auth');
    }





    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skill = Skill::all();

        return view("skill.index")->with("skills", $skill);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("skill.addSkill");
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

        $skill = new Skill();
        $skill->name = $request->name;



        if ($skill->save()) {
            session()->flash('addMassage', "Success to Add skill");
        }


        return redirect()->route('skill.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function show(Skill $skill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $skill = Skill::find($id);

        return view("skill.editSkill")->with("skill", $skill);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'name' => 'required',
        ]);


        $skill =  Skill::find($id);

        $skill->name = $request->name;


        if ($skill->save()) {
            session()->flash('editMassage', "Success to update skill");
        }

        return redirect()->route('skill.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $skill = Skill::find($id);
        if (empty($skill)) {
            abort(404, 'Page not found');
        }

        if ($skill->delete()) {
            session()->flash('deleteMassage', "The skill Is Trsahed to the Soft Delete");
        }
        return redirect()->route('skill.index');
    }



    public function trashed()
    {
        $skill = Skill::onlyTrashed()->get();
        return view('skill.softDeleted')->with('skills', $skill);
    }

    // {{-- hdelete =>> hard Delete حدف كامل --}}

    public function hdelete($id)
    {
        $skill = Skill::withTrashed()->where('id', $id)->first();
        if (empty($skill)) {
            abort(404, 'Page not found');
        }

        if ($skill->forceDelete()) {
            session()->flash('deleteMassage', "The skill Is Deleted");
        }
        return redirect()->route('skill.index');
    }


    public function restore($id)
    {
        $skill = Skill::withTrashed()->where('id', $id)->first();

        if (empty($skill)) {
            abort(404, 'Page not found');
        }

        if ($skill->restore()) {

            session()->flash('restoreMassage', "The skill Is restored");
        }

        return redirect()->route('skill.index');
    }
}
