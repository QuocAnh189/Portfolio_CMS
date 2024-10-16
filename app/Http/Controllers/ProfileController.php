<?php

namespace App\Http\Controllers;

use App\Domains\Profile\Dto\UpdatePasswordDto;
use App\Domains\Profile\Dto\UpdateProfileDto;
use App\Domains\Profile\Models\Profile;
use App\Domains\Profile\Services\ProfileService;
use App\Domains\RoleSoftware\Services\RoleSoftwareService;
use App\Domains\User\Models\User;
use App\Exceptions\GeneralException;
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
    public function edit(ProfileService $profileService, RoleSoftwareService $roleSoftwareService)
    {
        try {
            $profile = $profileService->getProfileByUserId(Auth::id());
            $role_softwares = $roleSoftwareService->getAllRoleSoftwares();

            return view(Auth::user()->role == 'admin' ? 'admin.profile.edit' : 'user.profile.edit', [
                'profile' => $profile,
                'role_softwares' => $role_softwares,
            ]);
        } catch (GeneralException $e) {
            return $e->render();
        } catch (\Exception $e) {
            flash()->error('Some thing went wrong!');
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

            return Auth::user()->role == 'admin' ? Redirect::route('admin.profile.edit') : Redirect::route('user.profile.edit');
        } catch (GeneralException $e) {
            return $e->render();
        } catch (\Exception $e) {
            flash()->error('Some thing went wrong!');
            return redirect()->back();
        }
    }


    public function change_password(ProfileService $profileService, PasswordRequest $request): RedirectResponse
    {
        try {
            $updatePasswordDto = UpdatePasswordDto::fromAppRequest($request);

            $updatedPassword = $profileService->updatePassword($updatePasswordDto);

            if ($updatedPassword) {
                flash()->success('Update password successfully.');
            }

            return Auth::user()->role == 'admin' ? Redirect::route('admin.profile.edit') : Redirect::route('user.profile.edit');
        } catch (GeneralException $e) {
            return $e->render();
        } catch (\Exception $e) {
            flash()->error('Some thing went wrong!');
            return redirect()->back();
        }
    }
}
