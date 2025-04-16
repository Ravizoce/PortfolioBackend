<?php

namespace App\Http\Controllers;

use App\Http\Controllers\SuperController\SuperController;
use App\Http\Requests\ExperienceRequest;
use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends SuperController
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(){
        parent::__construct(
            Experience::class,
            ExperienceRequest::class,
            ExperienceRequest::class,
        );
    }

    public function index()
    {  
        $experiences = $this->getPaginatedData(5);
        return view("admin.experience.experience" ,compact('experiences'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function experiencetore(ExperienceRequest $request)
    {
        $this->store();
        return redirect()->back()->with('success', 'New Experience added successfully');
    }


    /**
     * Update the specified resource in storage.
     */
    public function experienceupdate(ExperienceRequest $request, Experience $experience)
    {
        //
        $this->update($experience->id);
        return redirect()->back()->with('success', 'New Experience edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function experiencedelete(Experience $experience)
    {
        // 
        $this->delete($experience->id);
        return redirect()->back()->with('success', 'Experience deleted successfully');

    }
}
