<?php

namespace App\Http\Controllers;

use App\Http\Controllers\SuperController\SuperController;
use App\Http\Requests\SkillRequest;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends SuperController
{
    public function __construct()
    {
        parent::__construct(
            Skill::class,
            SkillRequest::class,
            SkillRequest::class
        );
    }

    /**
     * Summary of index
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $skills = $this->getPaginatedData(5);
        
        // dd();
        return view('admin.skill.skill', compact('skills'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function skillStore(SkillRequest $request)
    {
        $this->store();
        return redirect()->back()->with('success', 'New skill added successfully');

    }

    /**
     * Update the specified resource in storage.
     */
    public function skillUpdate(Request $request, Skill $skill)
    {
        //
        $this->update($skill->id);
        return redirect()->back()->with('success', 'Skill edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function SkillDelete(Skill $skill)
    {
        //
        $skill->delete();

        return redirect()->back()->with('success', 'Skill deleted successfully');
    }
}
