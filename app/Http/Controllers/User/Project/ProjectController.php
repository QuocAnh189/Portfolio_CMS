<?php

namespace App\Http\Controllers\User\Project;

use App\DataTables\User\Project\ProjectDataTable;
use App\Domains\Category\Services\CategoryService;
use App\Domains\Project\Dto\CreateProjectDto;
use App\Domains\Project\Dto\UpdateProjectDto;
use App\Domains\Project\Models\Project;
use App\Domains\Project\Services\ProjectService;
use App\Http\Controllers\Controller;
use App\Http\Requests\ChangeStatusRequest;
use App\Http\Requests\Project\CreateProjectRequest;
use App\Http\Requests\Project\UpdateProjectRequest;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    private CategoryService $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(ProjectDataTable $dataTable)
    {
        return $dataTable->render('user.project.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(CategoryService $categoryService)
    {
        $categories = $categoryService->getAllCategory();
        return view('user.project.create', compact('categories'));
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
                flash()->option('position', 'top-center')->success('Create project successfully.');
            }

            return redirect()->route('user.projects.index');
        } catch (\Exception $e) {
            flash()->option('position', 'top-center')->error($e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CategoryService $categoryService, Project $project)
    {
        $categories = $categoryService->getAllCategory();
        return view('user.project.edit', compact('project', 'categories'));
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
                flash()->option('position', 'top-center')->success('Update project successfully.');
            }

            return redirect()->route('user.projects.index');
        } catch (\Exception $e) {
            flash()->option('position', 'top-center')->error($e->getMessage());
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
        } catch (\Exception $e) {
            flash()->option('position', 'top-center')->error($e->getMessage());
        }
    }


    public function change_status(ProjectService $projectService, ChangeStatusRequest $request)
    {
        try {
            $projectService->changeStatusProject($request->id, $request->status);

            return response(['message' => 'status has been updated!']);
        } catch (\Exception $e) {
            flash()->option('position', 'top-center')->error($e->getMessage());
        }
    }
}
