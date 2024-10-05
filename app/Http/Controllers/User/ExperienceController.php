<?php

namespace App\Http\Controllers\User;

use App\DataTables\User\ExperienceDataTable;
use App\Domains\Experience\Dto\CreateExperienceDto;
use App\Domains\Experience\Dto\UpdateExperienceDto;
use App\Domains\Experience\Models\Experience;
use App\Domains\Experience\Services\ExperienceService;
use App\Domains\RoleSoftware\Services\RoleSoftwareService;
use App\Http\Controllers\Controller;
use App\Http\Requests\ChangeStatusRequest;
use App\Http\Requests\Experience\CreateExperienceRequest;
use App\Http\Requests\Experience\UpdateExperienceRequest;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{

    private ExperienceService $experienceService;
    private RoleSoftwareService $roleSoftwareService;

    public function __construct(ExperienceService $experienceService, RoleSoftwareService $roleSoftwareService)
    {
        $this->experienceService = $experienceService;
        $this->roleSoftwareService = $roleSoftwareService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(ExperienceDataTable $dataTable)
    {
        return $dataTable->render("user.experience.index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $role_softwares = $this->roleSoftwareService->getAllRoleSoftwares();
        return view("user.experience.create", compact("role_softwares"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateExperienceRequest $request)
    {
        try {
            $createExperienceDto = CreateExperienceDto::fromAppRequest($request);

            $createdExperience = $this->experienceService->createExperiences($createExperienceDto);

            if ($createdExperience) {
                flash()->option('position', 'top-center')->success('Create Experience successfully.');
            }

            return redirect()->route('user.experiences.index');
        } catch (\Exception $e) {
            return redirect()->back()->with("error", $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Experience $experience)
    {
        $role_softwares = $this->roleSoftwareService->getAllRoleSoftwares();
        return view("user.experience.edit", compact("experience", "role_softwares"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateExperienceRequest $request, Experience $experience)
    {
        try {
            $updateExperiencesDto = UpdateExperienceDto::fromAppRequest($request);

            $updatedExperiences = $this->experienceService->updateExperiences($experience, $updateExperiencesDto);

            if ($updatedExperiences) {
                flash()->option('position', 'top-center')->success('Update Experiences successfully.');
            }

            return redirect()->route("user.experiences.index");
        } catch (\Exception $e) {
            return redirect()->back()->with("error", $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Experience $experience)
    {
        try {
            $this->experienceService->deleteExperiences($experience);

            return response(['status' => 'success', 'Deleted Successfully!']);
        } catch (\Exception $e) {
            flash()->option('position', 'top-center')->error($e->getMessage());
        }
    }

    public function change_status(ChangeStatusRequest $request)
    {
        try {
            $this->experienceService->changeStatusExperiences($request->id, $request->status);

            return response(['message' => 'status has been updated!']);
        } catch (\Exception $e) {
            flash()->option('position', 'top-center')->error($e->getMessage());
        }
    }
}
