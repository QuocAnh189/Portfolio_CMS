<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\Gallery\GalleryDataTable;
use App\DataTables\Admin\Gallery\TrashGalleryDataTable;
use App\Domains\Project\Services\ProjectService;
use App\Domains\ProjectGallery\Dto\CreateProjectGalleryDto;
use App\Domains\ProjectGallery\Models\ProjectGallery;
use App\Domains\ProjectGallery\Services\ProjectGalleryService;
use App\Exceptions\GeneralException;
use App\Http\Controllers\Controller;
use App\Http\Requests\ChangeStatusRequest;
use App\Http\Requests\Gallery\CreateProjectGalleryRequest;

class ProjectGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(GalleryDataTable $dataTable, ProjectService $projectService)
    {
        $projects = $projectService->getAllProject();
        return $dataTable->render('admin.gallery.index', compact('projects'));
    }

    public function trash_index(TrashGalleryDataTable $dataTable)
    {
        return $dataTable->render('admin.gallery.trash');
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

            return redirect()->route('admin.project-galleries.index');
        } catch (GeneralException $e) {
            return $e->render();
        } catch (\Exception $e) {
            flash()->error('Some thing went wrong!');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProjectGalleryService $projectGalleryService, ProjectGallery $gallery)
    {
        try {
            $projectGalleryService->deleteProjectGallery($gallery);

            return response(['status' => 'success', 'Deleted Successfully!']);
        } catch (GeneralException $e) {
            return $e->render();
        } catch (\Exception $e) {
            flash()->error('Some thing went wrong!');
            return redirect()->back();
        }
    }

    public function restore(ProjectGalleryService $projectGalleryService, ProjectGallery $gallery)
    {
        try {
            $restoredProjectGallery = $projectGalleryService->restoreProjectGallery($gallery);

            if ($restoredProjectGallery) {
                flash()->success('Restore successfully.');
            }

            return redirect()->route('admin.galleries.trash-index');
        } catch (GeneralException $e) {
            return $e->render();
        } catch (\Exception $e) {
            flash()->error('Some thing went wrong!');
            return redirect()->back();
        }
    }

    public function delete(ProjectGalleryService $projectGalleryService, ProjectGallery $gallery)
    {
        try {
            $projectGalleryService->removeProjectGallery($gallery);

            return response(['status' => 'success', 'Deleted Successfully!']);
        } catch (GeneralException $e) {
            return $e->render();
        } catch (\Exception $e) {
            flash()->error('Some thing went wrong!');
            return redirect()->back();
        }
    }

    public function change_status(ProjectGalleryService $projectGalleryService, ChangeStatusRequest $request)
    {
        try {
            $projectGalleryService->changeStatusProjectGallery($request->id, $request->status);

            return response(['message' => 'status has been updated!']);
        } catch (GeneralException $e) {
            return $e->render();
        } catch (\Exception $e) {
            flash()->error('Some thing went wrong!');
            return redirect()->back();
        }
    }
}
