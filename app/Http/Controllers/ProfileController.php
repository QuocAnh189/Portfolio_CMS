<?php

namespace App\Http\Controllers;

use App\Domains\Profile\Dto\UpdatePasswordDto;
use App\Domains\Profile\Dto\UpdateProfileDto;
use App\Domains\Profile\Models\Profile;
use App\Domains\Profile\Services\ProfileService;
use App\Domains\RoleSoftware\Services\RoleSoftwareService;
use App\Http\Requests\Profile\PasswordRequest;
use App\Http\Requests\Profile\ProfileRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(ProfileService $profileService, RoleSoftwareService $roleSoftwareService): View
    {
        try {
            $profile = $profileService->getProfileByUserId(Auth::id());
            $role_softwares = $roleSoftwareService->getAllRoleSoftwares();

            return view(Auth::user()->is_admin ? 'admin.profile.edit' : 'user.profile.edit', [
                'profile' => $profile,
                'role_softwares' => $role_softwares,
            ]);
        } catch (\Exception $e) {
            flash()->error($e->getMessage());

            return redirect()->back();
        }
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileService $profileService, ProfileRequest $request, Profile $profile): RedirectResponse
    {
        try {
            $updateProfileDto = UpdateProfileDto::fromAppRequest($request, $profile);

            $updatedProfile = $profileService->updateProfile($updateProfileDto);

            if ($updatedProfile) {
                flash()->success('Update profile successfully.');
            }

            return Auth::user()->is_admin ? Redirect::route('admin.profile.edit') : Redirect::route('user.profile.edit');
        } catch (\Exception $e) {
            flash()->error($e->getMessage());

            return redirect()->back();
        }
    }


    public function change_password(ProfileService $profileService, PasswordRequest $request)
    {
        try {
            $updatePasswordDto = UpdatePasswordDto::fromAppRequest($request);

            $updatedPassword = $profileService->updatePassword($updatePasswordDto);

            if ($updatedPassword) {
                flash()->success('Update password successfully.');
            }

            return Auth::user()->is_admin ? Redirect::route('admin.profile.edit') : Redirect::route('user.profile.edit');
        } catch (\Exception $e) {
            flash()->error($e->getMessage());

            return redirect()->back();
        }
    }
}
