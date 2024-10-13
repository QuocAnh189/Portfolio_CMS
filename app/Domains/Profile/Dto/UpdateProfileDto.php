<?php

namespace App\Domains\Profile\Dto;

use App\Domains\Profile\Models\Profile;
use App\Http\Requests\Profile\ProfileRequest;

class UpdateProfileDto
{
    public function __construct(
        public readonly string $id,
        public readonly string $user_id,
        public readonly string $upload,
        public readonly ?string $avatar,
        public readonly ?string $fullname,
        public readonly ?string $contact_number,
        public readonly ?string $bio,
        public readonly ?string $role_software_id,
        public readonly ?string $facebook_link,
        public readonly ?string $linkedin_link,
        public readonly ?string $github_link,
        public readonly ?string $youtube_link,
        public readonly ?string $instagram_link,
        public readonly ?string $resume_link,
        public readonly ?string $name,
        public readonly ?string $email
    ) {
        //
    }

    public static function fromAppRequest(ProfileRequest $request, Profile $profile): array
    {
        $avatarPath = null;
        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar');
        }

        return [
            'id' => $request->validated('id'),
            'upload' => $avatarPath,
            'avatar' => $avatarPath === null ? $profile->avatar : $avatarPath,
            'fullname' => $request->validated('fullname'),
            'contact_number' => $request->validated('contact_number'),
            'bio' => $request->validated('bio'),
            'role_software_id' => $request->validated('role_software_id'),
            'facebook_link' => $request->validated('facebook_link'),
            'linkedin_link' => $request->validated('linkedin_link'),
            'github_link' => $request->validated('github_link'),
            'youtube_link' => $request->validated('youtube_link'),
            'instagram_link' => $request->validated('instagram_link'),
            'resume_link' => $request->validated('resume_link'),
            'user' => [
                'id' => $request->validated('user_id'),
                'name' => $request->validated('name') ?? $profile->user->name,
                'email' => $request->validated('email') ?? $profile->user->email,
            ]
        ];
    }

    public function fromApiRequest($request) {}
}
