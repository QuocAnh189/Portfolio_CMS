<?php

namespace App\Http\Controllers\User;

use App\Domains\Project\Services\ProjectService;
use App\Domains\ProjectGallery\Models\ProjectGallery;
use App\Domains\ProjectGallery\Services\ProjectGalleryService;
use App\Http\Controllers\Controller;
use App\Http\Requests\ChangeStatusRequest;
use Illuminate\Http\Request;

class ProjectGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
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
            flash()->option('position', 'top-center')->error($e->getMessage());
        }
    }

    public function change_status(ProjectGalleryService $projectGalleryService, ChangeStatusRequest $request)
    {
        try {
            $projectGalleryService->changeStatusProjectGallery($request->id, $request->status);

            return response(['message' => 'status has been updated!']);
        } catch (\Exception $e) {
            flash()->option('position', 'top-center')->error($e->getMessage());
        }
    }
}
