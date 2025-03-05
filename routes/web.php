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
    Route::group(["prefix" => "/profile", 'as' => "profile."], function () {
        Route::get("", [ProfileController::class, "index"])->name("index");
        Route::get("/Create", [ProfileController::class, "profileCreate"])->name("create");
        Route::post("/store", [ProfileController::class, "profileStore"])->name("store");
    });
});
