<?php

namespace App\Domains\Relation\ProjectTechnologies\Dto;

use App\Http\Requests\ProjectTechnologies\UpdateProjectTechnologiesRequest;

class UpdateProjectTechnologiesDto
{
    public function __construct(
        public readonly string $project_id,
        public readonly string $technology_id,
        public readonly string $status,
    ) {
        //
    }

    public static function fromAppRequest(UpdateProjectTechnologiesRequest $request)
    {
        return [
            'project_id' => $request->validated('project_id'),
            'technology_id' => $request->validated('technology_id'),
            'status' => $request->validated('status'),
        ];
    }

    public static function fromApiRequest($request)
    {
        return [];
    }
}
