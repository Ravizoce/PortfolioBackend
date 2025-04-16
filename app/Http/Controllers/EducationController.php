<?php

namespace App\Http\Controllers;

use App\Http\Requests\EducationRequest;
use App\Models\Education;
use App\Http\Controllers\SuperController\SuperController;

class EducationController extends SuperController
{
    public function __construct(){

        parent::__construct(
            Education::class,
            EducationRequest::class,
            EducationRequest::class,
        );
    }
    
    public function index()
    {
        $educations = $this->getPaginatedData(5);
        // dd($educations);
        return view("admin.education.education", compact("educations"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function educationStore(EducationRequest $request)
    {
        $this->store();
        return redirect()->back()->with('success', 'New Education added successfully');

    }

    /**
     * Update the specified resource in storage.
     */
    public function educationUpdate(EducationRequest $request, education $education)
    {
        //
        $this->update($education->id);
        return redirect()->back()->with('success', 'Education edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function educationDelete(Education $education)
    {
        //
        $education->delete();

        return back()->with('success', 'Education deleted successfully');
    }
}
