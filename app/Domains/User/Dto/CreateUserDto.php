<?php

namespace App\Domains\User\Dto;

use App\Http\Requests\User\CreateUserRequest;

class CreateUserDto
{
    public function __construct()
    {
        //
    }

    public static function fromAppRequest(CreateUserRequest $request)
    {
        return [
            'user' => [
                'name' => $request->validated('name'),
                'email' => $request->validated('email'),
                'password' => $request->validated('password'),
            ],
            'profile' => [
                'avatar' => $request->validated('avatar'),
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
