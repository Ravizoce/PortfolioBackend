<?php

namespace App\Http\Controllers;

use App\Http\Controllers\SuperController\SuperController;
use App\Http\Requests\ProfileRequest;
use App\Models\Profile;
use Illuminate\Http\Request;
use App\Helpers\FilePathHelper;
use Illuminate\Support\Facades\Schema;

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
        $profiles = $this->getPaginatedData(5);
        return view("admin.profile.profile", compact("profiles"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function profileStore(ProfileRequest $request)
    {
        $this->store();
        return redirect()->back()->with('success' , 'New profile added successfully');

    }

    /**
     * Update the specified resource in storage.
     */
    public function profileUpdate(Request $request, Profile $profile)
    {
        //
        $this->update($profile->id);
        return redirect()->back()->with('success' , 'Profile edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function profileDelete(Profile $profile)
    {
        //
        $profile->delete();
        
        return redirect()->back()->with('success' , 'Profile deleted successfully');
    }
}
