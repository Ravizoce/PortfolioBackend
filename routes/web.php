<?php

use App\Http\Controllers\ProfileController;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    // dd(Profile::class);
    return view('dashboard.dashboard');
});

Route::group(["prefix" => "/portfolio/"], function () {
    Route::get("/profile" ,[ProfileController::class ,"index"])->name("profile");
});
