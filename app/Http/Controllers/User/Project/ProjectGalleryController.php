<?php

namespace App\Http\Controllers\User\Project;

use App\DataTables\User\Project\ProjectGalleryDataTable;
use App\Domains\Project\Models\Project;
use App\Domains\ProjectGallery\Dto\CreateProjectGalleryDto;
use App\Domains\ProjectGallery\Models\ProjectGallery;
use App\Domains\ProjectGallery\Services\ProjectGalleryService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Gallery\CreateProjectGalleryRequest;

class ProjectGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Project $project, ProjectGallery $projectGallery)
    {
        $datatable = new ProjectGalleryDataTable($project);
        return $datatable->render('user.project.gallery.index', compact('project', 'projectGallery'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectGalleryService $galleryService, CreateProjectGalleryRequest $request, Project $project)
    {
        try {
            $createGalleryDto = CreateProjectGalleryDto::fromAppRequest($request);
            $createdGallery = $galleryService->createProjectGallery($createGalleryDto);

            if ($createdGallery) {
                flash()->success('Create gallery successfully.');
            }

            return redirect()->route('user.projects.galleries.index', $project);
        } catch (\Exception $e) {
            flash()->error($e->getMessage());
        }
    }
}
