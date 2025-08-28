<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\AcademicController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\ResearchController;
use App\Http\Controllers\SkillTypeController;
use App\Http\Controllers\TestScoreController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\AchievementController;


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('backend.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('experiences', ExperienceController::class);
    Route::resource('academics', AcademicController::class);
    Route::resource('skill-types', SkillTypeController::class);
    Route::resource('skills', SkillController::class);
    Route::resource('research', ResearchController::class);
    Route::resource('projects', ProjectController::class);
    Route::resource('achievements', AchievementController::class);
    Route::resource('test-scores', TestScoreController::class);
    Route::resource('activities', ActivityController::class);
    Route::resource('about', AboutController::class);
});

Auth::routes([
    'verify' => true, // Enable email verification
]);

require __DIR__ . '/auth.php';
