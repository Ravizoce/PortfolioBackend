<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::get();
        return view("admin.project.project" ,compact("projects"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function projectcreate()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function projectstore(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function projectshow(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function projectedit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function projectupdate(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function projectdelete(Project $project)
    {
        //
    }
}
