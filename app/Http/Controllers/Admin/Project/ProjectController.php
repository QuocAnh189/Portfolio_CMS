<?php

namespace App\Http\Controllers\Admin\Project;

use App\DataTables\Admin\Project\ProjectDataTable;
use App\DataTables\Admin\Project\TrashProjectDataTable;
use App\Domains\Category\Services\CategoryService;
use App\Domains\Project\Dto\CreateProjectDto;
use App\Domains\Project\Dto\UpdateProjectDto;
use App\Domains\Project\Models\Project;
use App\Domains\Project\Services\ProjectService;
use App\Domains\User\Services\UserService;
use App\Exceptions\GeneralException;
use App\Http\Controllers\Controller;
use App\Http\Requests\ChangeStatusRequest;
use App\Http\Requests\Project\CreateProjectRequest;
use App\Http\Requests\Project\UpdateProjectRequest;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ProjectDataTable $dataTable)
    {
        return $dataTable->render('admin.project.index');
    }

    public function trash_index(TrashProjectDataTable $dataTable)
    {
        return $dataTable->render('admin.project.trash');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(UserService $userService, CategoryService $categoryService)
    {
        $users = $userService->getAllUser();
        $categories = $categoryService->getAllCategory();
        return view('admin.project.create', compact('users', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectService $projectService, CreateProjectRequest $request)
    {
        try {
            $createProjectDto = CreateProjectDto::fromAppRequest($request);
            $createdProject = $projectService->createProject($createProjectDto);

            if ($createdProject) {
                flash()->success('Create project successfully.');
            }

            return redirect()->route('admin.projects.index');
        } catch (GeneralException $e) {
            return $e->render();
        } catch (\Exception $e) {
            flash()->error('Some thing went wrong!');
            return redirect()->back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserService $userService, CategoryService $categoryService, Project $project)
    {
        $users = $userService->getAllUser();
        $categories = $categoryService->getAllCategory();
        return view('admin.project.edit', compact('project', 'users', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectService $projectService, UpdateProjectRequest $request, Project $project)
    {
        try {
            $updateProjectDto = UpdateProjectDto::fromAppRequest($request, $project);
            $updatedProject = $projectService->updateProject($updateProjectDto, $project);

            if ($updatedProject) {
                flash()->success('Update project successfully.');
            }

            return redirect()->route('admin.projects.index');
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
    public function destroy(ProjectService $projectService, Project $project)
    {
        try {
            $projectService->deleteProject($project);

            return response(['status' => 'success', 'Deleted Successfully!']);
        } catch (GeneralException $e) {
            return $e->render();
        } catch (\Exception $e) {
            flash()->error('Some thing went wrong!');
            return redirect()->back();
        }
    }


    public function change_status(ProjectService $projectService, ChangeStatusRequest $request)
    {
        try {
            $projectService->changeStatusProject($request->id, $request->status);

            return response(['message' => 'status has been updated!']);
        } catch (GeneralException $e) {
            return $e->render();
        } catch (\Exception $e) {
            flash()->error('Some thing went wrong!');
            return redirect()->back();
        }
    }
}
