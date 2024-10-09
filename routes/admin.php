<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\EducationController;
use App\Http\Controllers\Admin\ExperienceController;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\LinkController;
use App\Http\Controllers\Admin\MajorController;
use App\Http\Controllers\Admin\Project\ProjectController;
use App\Http\Controllers\Admin\Project\ProjectFeatureController;
use App\Http\Controllers\Admin\Project\ProjectLinkController;
use App\Http\Controllers\Admin\Project\ProjectTechnologyController;
use App\Http\Controllers\Admin\Project\ProjectGalleryController;
use App\Http\Controllers\Admin\ProjectGalleryController as GalleryController;
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
Route::put('projects/change-status', [ProjectController::class, 'change_status'])->name('projects.change-status');
Route::resource('projects', ProjectController::class);
Route::resource('projects.galleries', ProjectGalleryController::class);
Route::put('projects.projectTechnologies/change-status', [ProjectTechnologyController::class, 'change_status'])->name('project-technologies.change-status');;
Route::resource('projects.projectTechnologies', ProjectTechnologyController::class);
Route::resource('projects.features', ProjectFeatureController::class);
Route::resource('projects.links', ProjectLinkController::class);

/**Project Gallery route */
Route::put('galleries/change-status', [GalleryController::class, 'change_status'])->name('galleries.change-status');
Route::resource('galleries', GalleryController::class);

/**Feature route */
Route::put('features/change-status', [FeatureController::class, 'change_status'])->name('features.change-status');
Route::resource('features', FeatureController::class);

/**Link route */
Route::put('links/change-status', [LinkController::class, 'change_status'])->name('links.change-status');
Route::resource('links', LinkController::class);

/**User route */
Route::put('users/change-status', [UserController::class, 'change_status'])->name('users.change-status');
Route::resource('users', UserController::class);

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
