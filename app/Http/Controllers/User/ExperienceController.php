<?php

namespace App\Http\Controllers\User;

use App\DataTables\User\Experience\ExperienceDataTable;
use App\DataTables\User\Experience\TrashExperienceDataTable;
use App\Domains\Experience\Dto\CreateExperienceDto;
use App\Domains\Experience\Dto\UpdateExperienceDto;
use App\Domains\Experience\Models\Experience;
use App\Domains\Experience\Services\ExperienceService;
use App\Domains\RoleSoftware\Services\RoleSoftwareService;
use App\Exceptions\GeneralException;
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
        return $dataTable->render("user.experience.index");
    }

    public function trash_index(TrashExperienceDataTable $dataTable)
    {
        return $dataTable->render('user.experience.trash');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(RoleSoftwareService $roleSoftwareService)
    {
        return view("user.experience.create");
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

            return redirect()->route('user.experiences.index');
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
    public function edit(Experience $experience)
    {
        return view("user.experience.edit", compact("experience"));
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

            return redirect()->route("user.experiences.index");
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
    public function destroy(ExperienceService $experienceService, Experience $experience)
    {
        try {
            $experienceService->deleteExperiences($experience);

            return response(['status' => 'success', 'Deleted Successfully!']);
        } catch (GeneralException $e) {
            return $e->render();
        } catch (\Exception $e) {
            flash()->error('Some thing went wrong!');
            return redirect()->back();
        }
    }

    public function restore(ExperienceService $experienceService, Experience $experience)
    {
        try {
            $restoredExperience = $experienceService->restoreExperience($experience);

            if ($restoredExperience) {
                flash()->success('Restore successfully.');
            }

            return redirect()->route('user.experiences.trash-index');
        } catch (GeneralException $e) {
            return $e->render();
        } catch (\Exception $e) {
            flash()->error('Some thing went wrong!');
            return redirect()->back();
        }
    }

    public function delete(ExperienceService $experienceService, Experience $experience)
    {
        try {
            $experienceService->removeExperience($experience);

            return response(['status' => 'success', 'Deleted Successfully!']);
        } catch (GeneralException $e) {
            return $e->render();
        } catch (\Exception $e) {
            flash()->error('Some thing went wrong!');
            return redirect()->back();
        }
    }

    public function change_status(ExperienceService $experienceService, ChangeStatusRequest $request)
    {
        try {
            $experienceService->changeStatusExperiences($request->id, $request->status);

            return response(['message' => 'status has been updated!']);
        } catch (GeneralException $e) {
            return $e->render();
        } catch (\Exception $e) {
            flash()->error('Some thing went wrong!');
            return redirect()->back();
        }
    }
}
