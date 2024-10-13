<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserInformationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'full_name' => $this->profile->fullname,
            'email' => $this->email,
            'avatar' => $this->profile->avatar,
            'bio' => $this->profile->bio,
            'phone_number' => $this->profile->contact_number,
            'github_link' => $this->profile->github_link,
            'youtube_link' => $this->profile->youtube_link,
            'linkedin_link' => $this->profile->linkedin_link,
            'resume_link' => $this->profile->resume_link,
            'facebook_link' => $this->profile->facebook_link,
            'instagram_link' => $this->profile->instagram_link,
        ];
    }
}
