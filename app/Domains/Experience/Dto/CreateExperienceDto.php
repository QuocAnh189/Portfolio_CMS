<?php

namespace App\Domains\Experience\Dto;

use App\Http\Requests\Experience\CreateExperienceRequest;

class CreateExperienceDto
{
    public function __construct(
        public readonly string $user_id,
        public readonly string $role_software_id,
        public readonly string $company_name,
        public readonly string $job_title,
        public readonly string $job_description,
        public readonly string $level,
        public readonly string $is_current,
        public readonly string $start_date,
        public readonly string $end_date,
        public readonly string $status,
    ) {
        //
    }

    public static function fromAppRequest(CreateExperienceRequest $request)
    {
        return [
            'user_id' => $request->validated('user_id'),
            'role_software_id' => $request->validated('role_software_id'),
            'company_name' => $request->validated('company_name'),
            'job_title' => $request->validated('job_title'),
            'job_description' => $request->validated('job_description'),
            'level' => $request->validated('level'),
            'is_current' => $request->validated('is_current'),
            'start_date' => $request->validated('start_date'),
            'end_date' => $request->validated('end_date'),
            'status' => $request->validated('status'),
        ];
    }

    public static function fromApiRequest($request)
    {
        return [];
    }
}
