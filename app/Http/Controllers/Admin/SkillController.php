<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\SkillDataTable;
use App\Domains\RoleSoftware\Services\RoleSoftwareService;
use App\Domains\Skill\Dto\CreateSkillDto;
use App\Domains\Skill\Dto\UpdateSkillDto;
use App\Domains\Skill\Models\Skill;
use App\Domains\Skill\Services\SkillService;
use App\Domains\User\Services\UserService;
use App\Http\Controllers\Controller;
use App\Http\Requests\ChangeStatusRequest;
use App\Http\Requests\Skill\CreateSkillRequest;
use App\Http\Requests\Skill\UpdateSkillRequest;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SkillDataTable $dataTable)
    {
        return $dataTable->render("admin.skill.index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(UserService $userService, RoleSoftwareService $roleSoftwareService)
    {
        $users = $userService->getAllUser();
        $role_softwares = $roleSoftwareService->getAllRoleSoftwares();
        return view('admin.skill.create', compact('users', 'role_softwares'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SkillService $skillService, CreateSkillRequest $request)
    {
        try {
            $createSkillDto = CreateSkillDto::fromAppRequest($request);
            $createdSkill = $skillService->createSkill($createSkillDto);

            if ($createdSkill) {
                flash()->success('Create skill successfully.');
            }

            return redirect()->route('admin.skills.index');
        } catch (\Exception $e) {
            flash()->error($e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserService $userService, RoleSoftwareService $roleSoftwareService, Skill $skill)
    {
        $users = $userService->getAllUser();
        $role_softwares = $roleSoftwareService->getAllRoleSoftwares();
        return view('admin.skill.edit', compact('skill', 'users', 'role_softwares'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SkillService $skillService, UpdateSkillRequest $request, Skill $skill)
    {
        try {
            $updateSkillDto = UpdateSkillDto::fromAppRequest($request);

            $updatedSkill = $skillService->updateSkill($skill, $updateSkillDto);

            if ($updatedSkill) {
                flash()->success('Update skill successfully.');
            }

            return redirect()->route('admin.skills.index');
        } catch (\Exception $e) {
            flash()->error($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SkillService $skillService, Skill $skill)
    {
        try {
            $skillService->deleteSkill($skill);

            return response(['status' => 'success', 'Deleted Successfully!']);
        } catch (\Exception $e) {
            flash()->error($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function change_status(SkillService $skillService, ChangeStatusRequest $request)
    {
        try {
            $skillService->changeStatusSkill($request->id, $request->status);

            return response(['message' => 'status has been updated!']);
        } catch (\Exception $e) {
            flash()->error($e->getMessage());
        }
    }
}
