<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\EducationController;
use App\Http\Controllers\User\ExperienceController;
use App\Http\Controllers\User\FeatureController;
use App\Http\Controllers\User\LinkController;
use App\Http\Controllers\User\ProjectGalleryController;
use App\Http\Controllers\User\ProjectController;
use App\Http\Controllers\User\SkillController;
use App\Http\Controllers\User\UserDashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');


/**Project route */
Route::resource('projects', ProjectController::class);

/**Project Gallery route */
Route::resource('project-galleries', ProjectGalleryController::class);

/**Feature route */
Route::resource('features', FeatureController::class);

/**Link route */
Route::resource('links', LinkController::class);

/**Experience route */
Route::resource('experience', ExperienceController::class);

/**Skill route */
Route::resource('skills', SkillController::class);

/**Education route */
Route::put('education/change-status', [EducationController::class, 'change_status'])->name('education.change-status');
Route::resource('education', EducationController::class);

/**Profile route */
Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::put('profile/{profile}', [ProfileController::class, 'update'])->name('profile.update');
Route::put('profile/change-password/{user}', [ProfileController::class, 'change_password'])->name('profile.change-password');
