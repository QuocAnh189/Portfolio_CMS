<?php

namespace App\Http\Controllers\User\Project;

use App\DataTables\User\Project\ProjectTechnologyDataTable;
use App\DataTables\User\Project\TrashProjectTechnologyDataTable;
use App\Domains\Project\Models\Project;
use App\Domains\Relation\ProjectTechnologies\Dto\CreateProjectTechnologiesDto;
use App\Domains\Relation\ProjectTechnologies\Dto\UpdateProjectTechnologiesDto;
use App\Domains\Relation\ProjectTechnologies\Models\ProjectTechnologies;
use App\Domains\Relation\ProjectTechnologies\Services\ProjectTechnologiesService;
use App\Domains\Technology\Services\TechnologyService;
use App\Exceptions\GeneralException;
use App\Http\Controllers\Controller;
use App\Http\Requests\ChangeStatusRequest;
use App\Http\Requests\ProjectTechnologies\CreateProjectTechnologiesRequest;
use App\Http\Requests\ProjectTechnologies\UpdateProjectTechnologiesRequest;
use Illuminate\Http\Request;

class ProjectTechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Project $project)
    {
        $dataTable = new ProjectTechnologyDataTable($project);
        return $dataTable->render('user.project.technology.index', compact('project'));
    }


    public function trash_index(Project $project)
    {
        $dataTable = new TrashProjectTechnologyDataTable($project);
        return $dataTable->render('user.project.technology.trash', compact('project'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(TechnologyService $technologyService, Project $project)
    {
        $technologies = $technologyService->getAllTechnology();
        return view('user.project.technology.create', compact('project', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectTechnologiesService $projectTechnologiesService, CreateProjectTechnologiesRequest $request, Project $project)
    {
        try {
            $createProjectTechnologiesDto = CreateProjectTechnologiesDto::fromAppRequest($request);

            $checkExists = $projectTechnologiesService->checkExistsProjectTechnologies($createProjectTechnologiesDto['project_id'], $createProjectTechnologiesDto['technology_id']);
            if ($checkExists) {
                flash()->error('Your technology already exists.');
                return redirect()->route('user.project.projectTechnologies.index', $project);
            }

            $createdProjectTechnologies = $projectTechnologiesService->createProjectTechnologies($createProjectTechnologiesDto);

            if ($createdProjectTechnologies) {
                flash()->success('Create Project Technologies successfully.');
            }

            return redirect()->route('user.projects.projectTechnologies.index', $project);
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
    public function edit(TechnologyService $technologyService, Project $project, ProjectTechnologies $projectTechnology)
    {
        $technologies = $technologyService->getAllTechnology();
        return view('user.project.technology.edit', compact('project', 'projectTechnology', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectTechnologiesService $projectTechnologiesService, UpdateProjectTechnologiesRequest $request, Project $project, ProjectTechnologies $projectTechnology)
    {
        try {
            $updateProjectTechnologiesDto = UpdateProjectTechnologiesDto::fromAppRequest($request);

            $checkExists = $projectTechnologiesService->checkExistsProjectTechnologies($updateProjectTechnologiesDto['project_id'], $updateProjectTechnologiesDto['technology_id']);
            if ($checkExists) {
                flash()->error('Project technology already exists.');
                return redirect()->route('user.projects.projectTechnologies.index', $project);
            }

            $updateProjectTechnology = $projectTechnologiesService->updateProjectTechnologies($projectTechnology, $updateProjectTechnologiesDto);

            if ($updateProjectTechnology) {
                flash()->success('Update Project Technology successfully.');
            }

            return redirect()->route('user.projects.projectTechnologies.index', $project);
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
    public function destroy(ProjectTechnologiesService $projectTechnologiesService, Project $project, ProjectTechnologies $projectTechnology)
    {
        try {
            $projectTechnologiesService->deleteProjectTechnologies($projectTechnology);

            return response(['status' => 'success', 'Deleted Successfully!']);
        } catch (GeneralException $e) {
            return $e->render();
        } catch (\Exception $e) {
            flash()->error('Some thing went wrong!');
            return redirect()->back();
        }
    }

    public function restore(ProjectTechnologiesService $projectTechnologiesService, Project $project, ProjectTechnologies $projectTechnology)
    {
        try {
            $restoredProjectTechnologies = $projectTechnologiesService->restoreProjectTechnologies($projectTechnology);

            if ($restoredProjectTechnologies) {
                flash()->success('Restore successfully.');
            }

            return redirect()->route('user.project-technologies.trash-index', $project);
        } catch (GeneralException $e) {
            return $e->render();
        } catch (\Exception $e) {
            flash()->error('Some thing went wrong!');
            return redirect()->back();
        }
    }

    public function delete(ProjectTechnologiesService $projectTechnologiesService,  Project $project, ProjectTechnologies $projectTechnology)
    {
        try {
            $projectTechnologiesService->removeProjectTechnologies($projectTechnology);

            return response(['status' => 'success', 'Deleted Successfully!']);
        } catch (GeneralException $e) {
            return $e->render();
        } catch (\Exception $e) {
            flash()->error('Some thing went wrong!');
            return redirect()->back();
        }
    }

    public function change_status(ProjectTechnologiesService $projectTechnologiesService, ChangeStatusRequest $request)
    {
        try {
            $projectTechnologiesService->changeStatusProjectTechnologies($request->id, $request->status);

            return response(['message' => 'status has been updated!']);
        } catch (GeneralException $e) {
            return $e->render();
        } catch (\Exception $e) {
            flash()->error('Some thing went wrong!');
            return redirect()->back();
        }
    }
}
