<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\ExperienceDataTable;
use App\Domains\Experience\Dto\CreateExperienceDto;
use App\Domains\Experience\Dto\UpdateExperienceDto;
use App\Domains\Experience\Models\Experience;
use App\Domains\Experience\Services\ExperienceService;
use App\Domains\RoleSoftware\Services\RoleSoftwareService;
use App\Domains\User\Services\UserService;
use App\Http\Controllers\Controller;
use App\Http\Requests\ChangeStatusRequest;
use App\Http\Requests\Experience\CreateExperienceRequest;
use App\Http\Requests\Experience\UpdateExperienceRequest;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ExperienceDataTable $dataTable)
    {
        return $dataTable->render("admin.experience.index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(UserService $userService, RoleSoftwareService $roleSoftwareService)
    {
        $users = $userService->getAllUser();
        $role_softwares = $roleSoftwareService->getAllRoleSoftwares();
        return view("admin.experience.create", compact("users", "role_softwares"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ExperienceService $experienceService, CreateExperienceRequest $request)
    {
        try {
            $createExperienceDto = CreateExperienceDto::fromAppRequest($request);

            $createdExperience = $experienceService->createExperiences($createExperienceDto);

            if ($createdExperience) {
                flash()->success('Create Experience successfully.');
            }

            return redirect()->route('admin.experiences.index');
        } catch (\Exception $e) {
            return redirect()->back()->with("error", $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserService $userService, RoleSoftwareService $roleSoftwareService, Experience $experience)
    {
        $users = $userService->getAllUser();
        $role_softwares = $roleSoftwareService->getAllRoleSoftwares();
        return view("admin.experience.edit", compact("experience", "users", "role_softwares"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ExperienceService $experienceService, UpdateExperienceRequest $request, Experience $experience)
    {
        try {
            $updateExperiencesDto = UpdateExperienceDto::fromAppRequest($request);

            $updatedExperiences = $experienceService->updateExperiences($experience, $updateExperiencesDto);

            if ($updatedExperiences) {
                flash()->success('Update Experiences successfully.');
            }

            return redirect()->route("admin.experiences.index");
        } catch (\Exception $e) {
            return redirect()->back()->with("error", $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ExperienceService $experienceService, Experience $experience)
    {
        try {
            $experienceService->deleteExperiences($experience);

            return response(['status' => 'success', 'Deleted Successfully!']);
        } catch (\Exception $e) {
            flash()->error($e->getMessage());
        }
    }

    public function change_status(ExperienceService $experienceService, ChangeStatusRequest $request)
    {
        try {
            $experienceService->changeStatusExperiences($request->id, $request->status);

            return response(['message' => 'status has been updated!']);
        } catch (\Exception $e) {
            flash()->error($e->getMessage());
        }
    }
}
