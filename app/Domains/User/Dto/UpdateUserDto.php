<?php

namespace App\Domains\User\Dto;

use App\Domains\User\Models\User;
use App\Http\Requests\User\UpdateUserRequest;

class UpdateUserDto
{
    public function __construct()
    {
        //
    }

    public static function fromAppRequest(UpdateUserRequest $request, User $user)
    {
        $avatarPath = null;
        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar');
        }

        return [
            'user' => [
                'id' =>  $request->validated('user_id'),
                'name' => $request->validated('name'),
                'email' => $request->validated('email'),
                'password' => $request->has('password') ? $request->validated('password') : $user->password,
            ],
            'profile' => [
                'id' =>  $request->validated('profile_id'),
                'avatar' => $avatarPath === null ? $user->profile->avatar : $request->validated('avatar'),
                'fullname' => $request->validated('fullname'),
                'contact_number' => $request->validated('contact_number'),
                'bio' => $request->validated('bio'),
                'facebook_link' => $request->validated('facebook_link'),
                'github_link' => $request->validated('github_link'),
                'youtube_link' => $request->validated('youtube_link'),
                'instagram_link' => $request->validated('instagram_link'),
                'resume_link' => $request->validated('resume_link'),
                'role_software_id' => $request->validated('role_software_id'),
            ],
        ];
    }

    public static function fromApiRequest($request)
    {
        return [];
    }
}
