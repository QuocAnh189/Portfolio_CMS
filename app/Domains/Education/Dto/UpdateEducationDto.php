<?php

namespace App\Domains\Education\Dto;

use App\Domains\Education\Models\Education;
use App\Http\Requests\Education\CreateEducationRequest;
use App\Http\Requests\Education\UpdateEducationRequest;

class UpdateEducationDto
{
    public function __construct(
        public readonly string $user_id,
        public readonly string $major_id,
        public readonly string $university_name,
        public readonly string $gpa,
        public readonly string $start_date,
        public readonly string $end_date,
        public readonly string $degree,
        public readonly string $status,
    ) {
        //
    }

    public static function fromAppRequest(UpdateEducationRequest $request, Education $education)
    {
        $logoPath = null;
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo');
        }

        return [
            'user_id' => $request->validated('user_id'),
            'major_id' => $request->validated('major_id'),
            'logo' => $logoPath === null ? $education->logo : $request->validated('logo'),
            'university_name' => $request->validated('university_name'),
            'description' => $request->validated('description'),
            'gpa' => $request->validated('gpa'),
            'start_date' => $request->validated('start_date'),
            'end_date' => $request->validated('end_date'),
            'degree' => $request->validated('degree'),
            'status' => $request->validated('status'),
        ];
    }

    public static function fromApiRequest($request)
    {
        return [];
    }
}
