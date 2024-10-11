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
use App\Http\Controllers\User\ProjectGalleryController as GalleryController;
use App\Http\Controllers\User\SkillController;
use App\Http\Controllers\User\UserDashboardController;
use App\Http\Controllers\User\UserTechnologiesController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');

/**Technology route */
Route::delete('userTechnologies/forced-delete/{userTechnology}', [UserTechnologiesController::class, 'delete'])->name('userTechnologies.delete')->withTrashed(true);
Route::put('userTechnologies/{userTechnology}/restore', [UserTechnologiesController::class, 'restore'])->name('userTechnologies.restore')->withTrashed(true);
Route::get('userTechnologies/trash', [UserTechnologiesController::class, 'trash_index'])->name('userTechnologies.trash-index');
Route::put('userTechnologies/change-status', [UserTechnologiesController::class, 'change_status'])->name('userTechnologies.change-status');
Route::resource('userTechnologies', UserTechnologiesController::class);

/**Project route */
Route::delete('projects/forced-delete/{project}', [ProjectController::class, 'delete'])->name('projects.delete')->withTrashed(true);
Route::put('projects/{project}/restore', [ProjectController::class, 'restore'])->name('projects.restore')->withTrashed(true);
Route::get('projects/trash', [ProjectController::class, 'trash_index'])->name('projects.trash-index');
Route::put('projects/change-status', [ProjectController::class, 'change_status'])->name('projects.change-status');
Route::resource('projects', ProjectController::class);
Route::resource('projects.galleries', ProjectGalleryController::class);
Route::delete('projects/{project}/projectTechnologies/forced-delete/{projectTechnology}', [ProjectTechnologyController::class, 'delete'])->name('project-technologies.delete')->withTrashed(true);
Route::put('projects/{project}/projectTechnologies/{projectTechnology}/restore', [ProjectTechnologyController::class, 'restore'])->name('project-technologies.restore')->withTrashed(true);
Route::get('projects/{project}/projectTechnologies/trash', [ProjectTechnologyController::class, 'trash_index'])->name('project-technologies.trash-index');
Route::put('projects.projectTechnologies/change-status', [ProjectTechnologyController::class, 'change_status'])->name('project-technologies.change-status');;
Route::resource('projects.projectTechnologies', ProjectTechnologyController::class);
Route::resource('projects.features', ProjectFeatureController::class);
Route::resource('projects.links', ProjectLinkController::class);

/**Project Gallery route */
Route::delete('project-galleries/forced-delete/{project_gallery}', [GalleryController::class, 'delete'])->name('project-galleries.delete')->withTrashed(true);
Route::put('project-galleries/{project_gallery}/restore', [GalleryController::class, 'restore'])->name('project-galleries.restore')->withTrashed(true);
Route::get('project-galleries/trash', [GalleryController::class, 'trash_index'])->name('project-galleries.trash-index');
Route::put('project-galleries/change-status', [GalleryController::class, 'change_status'])->name('project-galleries.change-status');
Route::resource('project-galleries', GalleryController::class);

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
