<?php

namespace App\Http\Controllers\User;

use App\DataTables\User\Gallery\GalleryDataTable;
use App\Domains\ProjectGallery\Dto\CreateProjectGalleryDto;
use App\Domains\ProjectGallery\Models\ProjectGallery;
use App\Domains\ProjectGallery\Services\ProjectGalleryService;
use App\Http\Controllers\Controller;
use App\Http\Requests\ChangeStatusRequest;
use App\Http\Requests\Gallery\CreateProjectGalleryRequest;

class ProjectGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(GalleryDataTable $dataTable)
    {
        return $dataTable->render('user.gallery.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectGalleryService $projectGalleryService, CreateProjectGalleryRequest $request)
    {
        try {
            $createGalleryDto = CreateProjectGalleryDto::fromAppRequest($request);
            $createdGallery = $projectGalleryService->createProjectGallery($createGalleryDto);

            if ($createdGallery) {
                flash()->success('Create gallery successfully.');
            }

            return redirect()->route('user.project-galleries.index');
        } catch (\Exception $e) {
            flash()->error($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProjectGalleryService $projectGalleryService, ProjectGallery $projectGallery)
    {
        try {
            $projectGalleryService->deleteProjectGallery($projectGallery);

            return response(['status' => 'success', 'Deleted Successfully!']);
        } catch (\Exception $e) {
            flash()->error($e->getMessage());
        }
    }

    public function change_status(ProjectGalleryService $projectGalleryService, ChangeStatusRequest $request)
    {
        try {
            $projectGalleryService->changeStatusProjectGallery($request->id, $request->status);

            return response(['message' => 'status has been updated!']);
        } catch (\Exception $e) {
            flash()->error($e->getMessage());
        }
    }
}
