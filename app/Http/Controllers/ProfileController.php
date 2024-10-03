<?php

namespace App\Http\Controllers;

use App\Domains\Profile\Dto\UpdatePasswordDto;
use App\Domains\Profile\Dto\UpdateProfileDto;
use App\Domains\Profile\Models\Profile;
use App\Domains\Profile\Services\ProfileService;
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
    public function __construct(ProfileService $profileService)
    {
        $this->profileService = $profileService;
    }
    /**
     * Display the user's profile form.
     */
    public function edit(): View
    {
        $profile = $this->profileService->getProfile(Auth::id());

        return view(Auth::user()->is_admin ? 'admin.profile.edit' : 'user.profile.edit', [
            'profile' => $profile,
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileRequest $request, Profile $profile): RedirectResponse
    {
        $updateProfileDto = UpdateProfileDto::fromAppRequest($request, $profile);

        $updatedProfile = $this->profileService->updateProfile($updateProfileDto);

        if ($updatedProfile) {
            flash()->option('position', 'top-center')->success('Update profile successfully.');
        }

        return Auth::user()->is_admin ? Redirect::route('admin.profile.edit') : Redirect::route('user.profile.edit');
    }


    public function change_password(PasswordRequest $request)
    {
        $updatePasswordDto = UpdatePasswordDto::fromAppRequest($request);

        $updatedPassword = $this->profileService->updatePassword($updatePasswordDto);

        if ($updatedPassword) {
            flash()->option('position', 'top-center')->success('Update password successfully.');
        }

        return Auth::user()->is_admin ? Redirect::route('admin.profile.edit') : Redirect::route('user.profile.edit');
    }
}
