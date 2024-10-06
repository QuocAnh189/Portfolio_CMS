<?php

namespace App\Domains\Skill\Dto;

use App\Http\Requests\Skill\UpdateSkillRequest;

class UpdateSkillDto
{
    public function __construct(
        public readonly string $user_id,
        public readonly string $role_software_id,
        public readonly string $description,
        public readonly string $status,
    ) {
        //
    }

    public static function fromAppRequest(UpdateSkillRequest $request)
    {
        return [
            "user_id" => $request->validated('user_id'),
            'role_software_id' => $request->validated('role_software_id'),
            'description' => $request->validated('description'),
            'status' => $request->validated('status'),
        ];
    }

    public function fromApiRequest($request)
    {
        return [];
    }
}
