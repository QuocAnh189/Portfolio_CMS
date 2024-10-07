<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\UserDataTable;
use App\Domains\Profile\Services\ProfileService;
use App\Domains\RoleSoftware\Services\RoleSoftwareService;
use App\Domains\User\Services\UserService;
use App\Domains\User\Dto\CreateUserDto;
use App\Domains\User\Dto\UpdateUserDto;
use App\Domains\User\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\ChangeStatusRequest;
use App\Http\Requests\User\CreateUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(UserDataTable $datatable)
    {
        return $datatable->render("admin.user.index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(RoleSoftwareService $roleSoftwareService)
    {
        $role_softwares = $roleSoftwareService->getAllRoleSoftwares();

        return view("admin.user.create", compact("role_softwares"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserService $userService, CreateUserRequest $request)
    {
        try {
            $createUserDto = CreateUserDto::fromAppRequest($request);

            $createdUser = $userService->createUser($createUserDto);

            if ($createdUser) {
                flash()->option('position', 'top-center')->success('Create user successfully.');
            }

            return redirect()->route('admin.users.index');
        } catch (\Exception $e) {
            flash()->option('position', 'top-center')->error($e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProfileService $profileService, RoleSoftwareService $roleSoftwareService, User $user)
    {
        try {
            $profile = $profileService->getProfileByUserId($user->id);
            $role_softwares = $roleSoftwareService->getAllRoleSoftwares();

            return view('admin.user.edit', compact('profile', 'role_softwares'));
        } catch (\Exception $e) {
            flash()->option('position', 'top-center')->error($e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserService $userService, UpdateUserRequest $request, User $user)
    {
        try {
            $updateUserDto = UpdateUserDto::fromAppRequest($request, $user->load('profile'));

            $updatedUser = $userService->updateUser($updateUserDto);

            if ($updatedUser) {
                flash()->option('position', 'top-center')->success('Update user successfully.');
            }

            return redirect()->route('admin.users.index');
        } catch (\Exception $e) {
            flash()->option('position', 'top-center')->error($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($userService, ProfileService $profileService, User $user)
    {
        try {
            $userService->deleteUser($user);

            $profileService->deleteProfile($user->profile);

            return response(['status' => 'success', 'Deleted Successfully!']);
        } catch (\Exception $e) {
            flash()->option('position', 'top-center')->error($e->getMessage());
        }
    }

    public function change_status($userService, ProfileService $profileService, ChangeStatusRequest $request)
    {
        try {
            $userService->changeStatusUser($request->id, $request->status);
            $profileService->changeStatusProfileByUserId($request->id, $request->status);

            return response(['message' => 'status has been updated!']);
        } catch (\Exception $e) {
            flash()->option('position', 'top-center')->error($e->getMessage());
        }
    }
}
