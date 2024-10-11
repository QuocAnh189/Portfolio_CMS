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
Route::delete('categories/forced-delete/{category}', [CategoryController::class, 'delete'])->name('categories.delete')->withTrashed(true);
Route::put('categories/{category}/restore', [CategoryController::class, 'restore'])->name('categories.restore')->withTrashed(true);
Route::get('categories/trash', [CategoryController::class, 'trash_index'])->name('categories.trash-index');
Route::put('categories/change-status', [CategoryController::class, 'change_status'])->name('categories.change-status');
Route::resource('categories', CategoryController::class);

/**RoleSoftware route */
Route::delete('role-softwares/forced-delete/{role-software}', [RoleSoftwareController::class, 'delete'])->name('role-softwares.delete')->withTrashed(true);
Route::put('role-softwares/{role-software}/restore', [RoleSoftwareController::class, 'restore'])->name('role-softwares.restore')->withTrashed(true);
Route::get('role-softwares/trash', [RoleSoftwareController::class, 'trash_index'])->name('role-softwares.trash-index');
Route::put('role-softwares/change-status', [RoleSoftwareController::class, 'change_status'])->name('role-softwares.change-status');
Route::resource('role-softwares', RoleSoftwareController::class);

/**Major route */
Route::delete('majors/forced-delete/{major}', [MajorController::class, 'delete'])->name('majors.delete')->withTrashed(true);
Route::put('majors/{major}/restore', [MajorController::class, 'restore'])->name('majors.restore')->withTrashed(true);
Route::get('majors/trash', [MajorController::class, 'trash_index'])->name('majors.trash-index');
Route::put('majors/change-status', [MajorController::class, 'change_status'])->name('majors.change-status');
Route::resource('majors', MajorController::class);

/**Technology route */
Route::delete('technologies/forced-delete/{major}', [TechnologyController::class, 'delete'])->name('technologies.delete')->withTrashed(true);
Route::put('technologies/{major}/restore', [TechnologyController::class, 'restore'])->name('technologies.restore')->withTrashed(true);
Route::get('technologies/trash', [TechnologyController::class, 'trash_index'])->name('technologies.trash-index');
Route::put('technologies/change-status', [TechnologyController::class, 'change_status'])->name('technologies.change-status');
Route::resource('technologies', TechnologyController::class);

/**Project route */
Route::delete('projects/forced-delete/{project}', [ProjectController::class, 'delete'])->name('projects.delete')->withTrashed(true);
Route::put('projects/{project}/restore', [ProjectController::class, 'restore'])->name('projects.restore')->withTrashed(true);
Route::get('projects/trash', [ProjectController::class, 'trash_index'])->name('projects.trash-index');
Route::put('projects/change-status', [ProjectController::class, 'change_status'])->name('projects.change-status');
Route::resource('projects', ProjectController::class);
Route::resource('projects.galleries', ProjectGalleryController::class);
Route::put('projects.projectTechnologies/change-status', [ProjectTechnologyController::class, 'change_status'])->name('project-technologies.change-status');;
Route::resource('projects.projectTechnologies', ProjectTechnologyController::class);
Route::resource('projects.features', ProjectFeatureController::class);
Route::resource('projects.links', ProjectLinkController::class);

/**Project Gallery route */
Route::delete('galleries/forced-delete/{project_gallery}', [GalleryController::class, 'delete'])->name('galleries.delete')->withTrashed(true);
Route::put('galleries/{project_gallery}/restore', [GalleryController::class, 'restore'])->name('galleries.restore')->withTrashed(true);
Route::get('galleries/trash', [GalleryController::class, 'trash_index'])->name('galleries.trash-index');
Route::put('galleries/change-status', [GalleryController::class, 'change_status'])->name('galleries.change-status');
Route::resource('galleries', GalleryController::class);

/**Feature route */
Route::delete('features/forced-delete/{feature}', [FeatureController::class, 'delete'])->name('features.delete')->withTrashed(true);
Route::put('features/{feature}/restore', [FeatureController::class, 'restore'])->name('features.restore')->withTrashed(true);
Route::get('features/trash', [FeatureController::class, 'trash_index'])->name('features.trash-index');
Route::put('features/change-status', [FeatureController::class, 'change_status'])->name('features.change-status');
Route::resource('features', FeatureController::class);

/**Link route */
Route::delete('links/forced-delete/{link}', [LinkController::class, 'delete'])->name('links.delete')->withTrashed(true);
Route::put('links/{link}/restore', [LinkController::class, 'restore'])->name('links.restore')->withTrashed(true);
Route::get('links/trash', [LinkController::class, 'trash_index'])->name('links.trash-index');
Route::put('links/change-status', [LinkController::class, 'change_status'])->name('links.change-status');
Route::resource('links', LinkController::class);

/**User route */
Route::delete('users/forced-delete/{user}', [UserController::class, 'delete'])->name('users.delete')->withTrashed(true);
Route::put('users/{user}/restore', [UserController::class, 'restore'])->name('users.restore')->withTrashed(true);
Route::get('users/trash', [UserController::class, 'trash_index'])->name('users.trash-index');
Route::put('users/change-status', [UserController::class, 'change_status'])->name('users.change-status');
Route::resource('users', UserController::class);

/**Experience route */
Route::delete('experiences/forced-delete/{experience}', [ExperienceController::class, 'delete'])->name('experiences.delete')->withTrashed(true);
Route::put('experiences/{experience}/restore', [ExperienceController::class, 'restore'])->name('experiences.restore')->withTrashed(true);
Route::get('experiences/trash', [ExperienceController::class, 'trash_index'])->name('experiences.trash-index');
Route::put('experiences/change-status', [ExperienceController::class, 'change_status'])->name('experiences.change-status');
Route::resource('experiences', ExperienceController::class);

/**Skill route */
Route::delete('skills/forced-delete/{skill}', [SkillController::class, 'delete'])->name('skills.delete')->withTrashed(true);
Route::put('skills/{skill}/restore', [SkillController::class, 'restore'])->name('skills.restore')->withTrashed(true);
Route::get('skills/trash', [SkillController::class, 'trash_index'])->name('skills.trash-index');
Route::put('skills/change-status', [SkillController::class, 'change_status'])->name('skills.change-status');
Route::resource('skills', SkillController::class);

/**Education route */
Route::delete('education/forced-delete/{education}', [EducationController::class, 'delete'])->name('education.delete')->withTrashed(true);
Route::put('education/{education}/restore', [EducationController::class, 'restore'])->name('education.restore')->withTrashed(true);
Route::get('education/trash', [EducationController::class, 'trash_index'])->name('education.trash-index');
Route::put('education/change-status', [EducationController::class, 'change_status'])->name('education.change-status');
Route::resource('education', EducationController::class);

/**Profile route */
Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::put('profile/{profile}', [ProfileController::class, 'update'])->name('profile.update');
Route::put('profile/change-password/{user}', [ProfileController::class, 'change_password'])->name('profile.change-password');
