<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\EducationController;
use App\Http\Controllers\User\ExperienceController;
use App\Http\Controllers\User\FeatureController;
use App\Http\Controllers\User\LinkController;
use App\Http\Controllers\User\Project\ProjectController;
use App\Http\Controllers\User\Project\ProjectGalleryController;
use App\Http\Controllers\User\Project\ProjectLinkController;
use App\Http\Controllers\User\Project\ProjectFeatureController;
use App\Http\Controllers\User\Project\ProjectTechnologyController;
use App\Http\Controllers\User\SkillController;
use App\Http\Controllers\User\UserDashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');

/**Project route */
Route::put('projects/change-status', [ProjectController::class, 'change_status'])->name('projects.change-status');
Route::resource('projects', ProjectController::class);
Route::resource('projects.galleries', ProjectGalleryController::class);
Route::resource('projects.technologies', ProjectTechnologyController::class);
Route::resource('projects.features', ProjectFeatureController::class);
Route::resource('projects.links', ProjectLinkController::class);

/**Project Gallery route */
Route::resource('project-galleries', ProjectGalleryController::class);

/**Feature route */
Route::put('features/change-status', [FeatureController::class, 'change_status'])->name('features.change-status');
Route::resource('features', FeatureController::class);

/**Link route */
Route::resource('links', LinkController::class);

/**Experience route */
Route::put('experiences/change-status', [ExperienceController::class, 'change_status'])->name('experiences.change-status');
Route::resource('experiences', ExperienceController::class);

/**Skill route */
Route::put('skills/change-status', [SkillController::class, 'change_status'])->name('skills.change-status');
Route::resource('skills', SkillController::class);

/**Education route */
Route::put('education/change-status', [EducationController::class, 'change_status'])->name('education.change-status');
Route::resource('education', EducationController::class);

/**Profile route */
Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::put('profile/{profile}', [ProfileController::class, 'update'])->name('profile.update');
Route::put('profile/change-password/{user}', [ProfileController::class, 'change_password'])->name('profile.change-password');
