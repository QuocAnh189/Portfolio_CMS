<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\EducationController;
use App\Http\Controllers\Admin\ExperienceController;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\LinkController;
use App\Http\Controllers\Admin\MajorController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ProjectGalleryController;
use App\Http\Controllers\Admin\RoleSoftwareController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\TechnologyController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

/**Category route */
Route::put('categories/change-status', [CategoryController::class, 'change_status'])->name('categories.change-status');
Route::resource('categories', CategoryController::class);

/**RoleSoftware route */
Route::put('role-softwares/change-status', [RoleSoftwareController::class, 'change_status'])->name('role-softwares.change-status');
Route::resource('role-softwares', RoleSoftwareController::class);

/**Major route */
Route::put('majors/change-status', [MajorController::class, 'change_status'])->name('majors.change-status');
Route::resource('majors', MajorController::class);

/**Technology route */
Route::put('technologies/change-status', [TechnologyController::class, 'change_status'])->name('technologies.change-status');
Route::resource('technologies', TechnologyController::class);

/**Project route */
Route::resource('projects', ProjectController::class);

/**Project Gallery route */
Route::resource('project-galleries', ProjectGalleryController::class);

/**Feature route */
Route::resource('features', FeatureController::class);

/**Link route */
Route::resource('links', LinkController::class);

/**User route */
Route::put('users/change-status', [UserController::class, 'change_status'])->name('users.change-status');
Route::resource('users', UserController::class);

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
