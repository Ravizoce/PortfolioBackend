<?php

namespace App\Http\Controllers;

use App\Http\Controllers\SuperController\SuperController;
use App\Http\Requests\ProfileRequest;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends SuperController
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        parent::__construct(
            Profile::class,
            ProfileRequest::class, 
            ProfileRequest::class);
    }

    public function index()
    {
        //
        $profile = $this->getAllData();
        session()->flash('success', 'From the profile ');
        return view("admin.profile", compact("profile"));

    }

    /**storeRequest
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        //


    }

    /**
     * Display the specified resource.
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function profileUpdate(Request $request, Profile $profile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
