<?php

namespace App\Http\Controllers\Admin\Project;

use App\DataTables\Admin\Project\ProjectGalleryDataTable;
use App\Domains\Project\Models\Project;
use App\Domains\ProjectGallery\Dto\CreateProjectGalleryDto;
use App\Domains\ProjectGallery\Models\ProjectGallery;
use App\Domains\ProjectGallery\Services\ProjectGalleryService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Gallery\CreateProjectGalleryRequest;
use Illuminate\Http\Request;

class ProjectGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Project $project, ProjectGallery $projectGallery)
    {
        $datatable = new ProjectGalleryDataTable($project);
        return $datatable->render('admin.project.gallery.index', compact('project', 'projectGallery'));
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
                flash()->option('position', 'top-center')->success('Create gallery successfully.');
            }

            return redirect()->route('admin.projects.galleries.index', $project);
        } catch (\Exception $e) {
            flash()->option('position', 'top-center')->error($e->getMessage());
        }
    }
}
