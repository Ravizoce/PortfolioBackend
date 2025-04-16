<?php

use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EducationController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    // dd(Profile::class);
    return view('dashboard.dashboard');
})->name('dashboard');

Route::group(["prefix" => "/portfolio/"], function () {
    Route::group(["prefix" => "/profile", 'as' => "profile."], function () {
        Route::get("", [ProfileController::class, "index"])->name("index");
        Route::post("/store", [ProfileController::class, "profileStore"])->name("store");
        Route::post("/update/{profile}", [ProfileController::class, "profileUpdate"])->name("update");
        Route::delete("/delete/{profile}", [ProfileController::class, "profileDelete"])->name("delete");
    });
    Route::group(["prefix" => "/education", 'as' => "education."], function () {
        Route::get("", [EducationController::class, "index"])->name("index");
        Route::post("/store", [EducationController::class, "educationStore"])->name("store");
        Route::post("/update/{education}", [EducationController::class, "educationUpdate"])->name("update");
        Route::delete("/delete/{education}", [EducationController::class, "educationDelete"])->name("delete");
    });
    Route::group(["prefix" => "/experience", 'as' => "experience."], function () {
        Route::get("", [ExperienceController::class, "index"])->name("index");
        Route::post("/store", [ExperienceController::class, "experienceStore"])->name("store");
        Route::post("/update/{experience}", [ExperienceController::class, "experienceUpdate"])->name("update");
        Route::delete("/delete/{experience}", [ExperienceController::class, "experienceDelete"])->name("delete");
    });
    Route::group(["prefix" => "/skill", 'as' => "skill."], function () {
        Route::get("", [SkillController::class, "index"])->name("index");
        Route::post("/store", [SkillController::class, "experienceStore"])->name("store");
        Route::post("/update/{experience}", [SkillController::class, "experienceUpdate"])->name("update");
        Route::delete("/delete/{experience}", [SkillController::class, "experienceDelete"])->name("delete");
    });
});

