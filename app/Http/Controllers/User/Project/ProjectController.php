<?php

namespace App\Http\Controllers\User\Project;

use App\DataTables\User\Project\ProjectDataTable;
use App\DataTables\User\Project\TrashProjectDataTable;
use App\Domains\Category\Services\CategoryService;
use App\Domains\Feature\Services\FeatureService;
use App\Domains\Link\Services\LinkService;
use App\Domains\Project\Dto\CreateProjectDto;
use App\Domains\Project\Dto\UpdateProjectDto;
use App\Domains\Project\Models\Project;
use App\Domains\Project\Services\ProjectService;
use App\Domains\ProjectGallery\Services\ProjectGalleryService;
use App\Domains\Relation\ProjectTechnologies\Services\ProjectTechnologiesService;
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
        return $dataTable->render('user.project.index');
    }

    public function trash_index(TrashProjectDataTable $dataTable)
    {
        return $dataTable->render('user.project.trash');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.project.create');
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

            return redirect()->route('user.projects.index');
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
    public function edit(Project $project)
    {
        return view('user.project.edit', compact('project'));
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

            return redirect()->route('user.projects.index');
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
    public function destroy(
        ProjectService $projectService,
        FeatureService $featureService,
        LinkService $linkService,
        ProjectGalleryService $projectGalleryService,
        ProjectTechnologiesService $projectTechnologiesService,
        Project $project
    ) {
        try {
            $projectService->deleteProject($project);

            $project->features->map(function ($feature) use ($featureService) {
                $featureService->deleteFeature($feature);
            });

            $project->links->map(function ($link) use ($linkService) {
                $linkService->deleteLink($link);
            });

            $project->project_galleries->map(function ($gallery) use ($projectGalleryService) {
                $projectGalleryService->deleteProjectGallery($gallery);
            });

            $project->project_technologies->map(function ($project_technology) use ($projectTechnologiesService) {
                $projectTechnologiesService->deleteProjectTechnologies($project_technology);
            });

            return response(['status' => 'success', 'Deleted Successfully!']);
        } catch (GeneralException $e) {
            return $e->render();
        } catch (\Exception $e) {
            flash()->error('Some thing went wrong!');
            return redirect()->back();
        }
    }

    public function restore(
        ProjectService $projectService,
        FeatureService $featureService,
        LinkService $linkService,
        ProjectGalleryService $projectGalleryService,
        ProjectTechnologiesService $projectTechnologiesService,
        Project $project
    ) {
        try {
            $restoredProject = $projectService->restoreProject($project);

            $project->features->map(function ($feature) use ($featureService) {
                $featureService->restoreFeature($feature);
            });

            $project->links->map(function ($link) use ($linkService) {
                $linkService->restoreLink($link);
            });

            $project->project_galleries->map(function ($gallery) use ($projectGalleryService) {
                $projectGalleryService->restoreProjectGallery($gallery);
            });

            $project->project_technologies->map(function ($project_technology) use ($projectTechnologiesService) {
                $projectTechnologiesService->restoreProjectTechnologies($project_technology);
            });

            if ($restoredProject) {
                flash()->success('Restore successfully.');
            }

            return redirect()->route('user.projects.trash-index');
        } catch (GeneralException $e) {
            return $e->render();
        } catch (\Exception $e) {
            flash()->error('Some thing went wrong!');
            return redirect()->back();
        }
    }

    public function delete(
        ProjectService $projectService,
        FeatureService $featureService,
        LinkService $linkService,
        ProjectGalleryService $projectGalleryService,
        ProjectTechnologiesService $projectTechnologiesService,
        Project $project
    ) {
        try {
            $projectService->removeProject($project);

            $project->features->map(function ($feature) use ($featureService) {
                $featureService->removeFeature($feature);
            });

            $project->links->map(function ($link) use ($linkService) {
                $linkService->removeLink($link);
            });

            $project->project_galleries->map(function ($gallery) use ($projectGalleryService) {
                $projectGalleryService->removeProjectGallery($gallery);
            });

            $project->project_technologies->map(function ($project_technology) use ($projectTechnologiesService) {
                $projectTechnologiesService->removeProjectTechnologies($project_technology);
            });

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
