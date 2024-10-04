<?php

namespace App\Http\Controllers;

use App\Domains\Profile\Dto\UpdatePasswordDto;
use App\Domains\Profile\Dto\UpdateProfileDto;
use App\Domains\Profile\Models\Profile;
use App\Domains\Profile\Services\ProfileService;
use App\Domains\RoleSoftware\Models\RoleSoftware;
use App\Domains\RoleSoftware\Services\RoleSoftwareService;
use App\Domains\User\Models\User;
use App\Http\Requests\Profile\PasswordRequest;
use App\Http\Requests\Profile\ProfileRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\View\View;

class ProfileController extends Controller
{
    private ProfileService $profileService;

    private RoleSoftwareService $roleSoftwareService;
    public function __construct(ProfileService $profileService, RoleSoftwareService $roleSoftwareService)
    {
        $this->profileService = $profileService;
        $this->roleSoftwareService = $roleSoftwareService;
    }

    /**
     * Display the user's profile form.
     */
    public function edit(): View
    {
        try {
            $profile = $this->profileService->getProfileByUserId(Auth::id());
            $role_softwares = $this->roleSoftwareService->getAllRoleSoftwares();

            return view(Auth::user()->is_admin ? 'admin.profile.edit' : 'user.profile.edit', [
                'profile' => $profile,
                'role_softwares' => $role_softwares,
            ]);
        } catch (\Exception $e) {
            flash()->option('position', 'top-center')->error($e->getMessage());

            return redirect()->back();
        }
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileRequest $request, Profile $profile): RedirectResponse
    {
        try {
            $updateProfileDto = UpdateProfileDto::fromAppRequest($request, $profile);

            $updatedProfile = $this->profileService->updateProfile($updateProfileDto);

            if ($updatedProfile) {
                flash()->option('position', 'top-center')->success('Update profile successfully.');
            }

            return Auth::user()->is_admin ? Redirect::route('admin.profile.edit') : Redirect::route('user.profile.edit');
        } catch (\Exception $e) {
            flash()->option('position', 'top-center')->error($e->getMessage());

            return redirect()->back();
        }
    }


    public function change_password(PasswordRequest $request)
    {
        try {
            $updatePasswordDto = UpdatePasswordDto::fromAppRequest($request);

            $updatedPassword = $this->profileService->updatePassword($updatePasswordDto);

            if ($updatedPassword) {
                flash()->option('position', 'top-center')->success('Update password successfully.');
            }

            return Auth::user()->is_admin ? Redirect::route('admin.profile.edit') : Redirect::route('user.profile.edit');
        } catch (\Exception $e) {
            flash()->option('position', 'top-center')->error($e->getMessage());

            return redirect()->back();
        }
    }
}
