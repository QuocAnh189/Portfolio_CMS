<?php

namespace App\Http\Controllers\User;

use App\DataTables\User\UserTechnologies\TrashUserTechnologyDataTable;
use App\DataTables\User\UserTechnologies\UserTechnologyDataTable;
use App\Domains\Relation\UserTechnologies\Models\UserTechnologies;
use App\Domains\Relation\UserTechnologies\Dto\CreateUserTechnologiesDto;
use App\Domains\Relation\UserTechnologies\Dto\UpdateUserTechnologiesDto;
use App\Domains\Technology\Services\TechnologyService;
use App\Domains\Relation\UserTechnologies\Services\UserTechnologiesService;
use App\Http\Controllers\Controller;
use App\Http\Requests\ChangeStatusRequest;
use App\Http\Requests\User\CreateUserTechnologiesRequest;
use App\Http\Requests\User\UpdateUserTechnologiesRequest;

class UserTechnologiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(UserTechnologyDataTable $dataTable)
    {
        return $dataTable->render('user.technology.index');
    }

    public function trash_index(TrashUserTechnologyDataTable $dataTable)
    {
        return $dataTable->render('user.technology.trash');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(TechnologyService $technologyService)
    {
        $technologies = $technologyService->getAllTechnology();
        return view('user.technology.create', compact('technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserTechnologiesService $userTechnologiesService, CreateUserTechnologiesRequest $request)
    {
        try {
            $createUserTechnologiesDto = CreateUserTechnologiesDto::fromAppRequest($request);

            $checkExists = $userTechnologiesService->checkExistsUserTechnologies($createUserTechnologiesDto['user_id'], $createUserTechnologiesDto['technology_id']);
            if ($checkExists) {
                flash()->error('Your technology already exists.');
                return redirect()->route('user.userTechnologies.index');
            }

            $createdUserTechnologies = $userTechnologiesService->createUserTechnologies($createUserTechnologiesDto);

            if ($createdUserTechnologies) {
                flash()->success('Create userTechnologies successfully.');
            }

            return redirect()->route('user.userTechnologies.index');
        } catch (\Exception $e) {
            flash()->error($e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TechnologyService $technologyService, UserTechnologies $userTechnology)
    {
        $technologies = $technologyService->getAllTechnology();
        return view('user.technology.edit', compact('technologies', 'userTechnology'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserTechnologiesService $userTechnologiesService, UpdateUserTechnologiesRequest $request, UserTechnologies $userTechnology)
    {
        try {
            $updateUserTechnologiesDto = UpdateUserTechnologiesDto::fromAppRequest($request);

            $checkExists = $userTechnologiesService->checkExistsUserTechnologies($updateUserTechnologiesDto['user_id'], $updateUserTechnologiesDto['technology_id']);
            if ($checkExists) {
                flash()->error('Your technology already exists.');
                return redirect()->route('user.userTechnologies.index');
            }

            $updatedUserTechnologies = $userTechnologiesService->updateUserTechnologies($userTechnology, $updateUserTechnologiesDto);

            if ($updatedUserTechnologies) {
                flash()->success('Update userTechnologies successfully.');
            }

            return redirect()->route('user.userTechnologies.index');
        } catch (\Exception $e) {
            flash()->error($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserTechnologiesService $userTechnologiesService, UserTechnologies $userTechnology)
    {
        try {
            $userTechnologiesService->deleteUserTechnologies($userTechnology);

            return response(['status' => 'success', 'Deleted Successfully!']);
        } catch (\Exception $e) {
            flash()->error($e->getMessage());
        }
    }

    public function restore(UserTechnologiesService $userTechnologiesService, UserTechnologies $userTechnology)
    {
        try {
            $restoredUserTechnology = $userTechnologiesService->restoreUserTechnologies($userTechnology);

            if ($restoredUserTechnology) {
                flash()->success('Restore successfully.');
            }

            return redirect()->route('user.userTechnologies.trash-index');
        } catch (\Exception $e) {
            flash()->error($e->getMessage());
        }
    }

    public function delete(UserTechnologiesService $userTechnologiesService, UserTechnologies $userTechnology)
    {
        try {
            $userTechnologiesService->removeUserTechnologies($userTechnology);

            return response(['status' => 'success', 'Deleted Successfully!']);
        } catch (\Exception $e) {
            flash()->error($e->getMessage());
        }
    }

    /**
     * Change status the specified resource from storage.
     */
    public function change_status(UserTechnologiesService $userTechnologiesService, ChangeStatusRequest $request)
    {
        try {
            $userTechnologiesService->changeStatusUserTechnologies($request->id, $request->status);

            return response(['message' => 'status has been updated!']);
        } catch (\Exception $e) {
            flash()->error($e->getMessage());
        }
    }
}
