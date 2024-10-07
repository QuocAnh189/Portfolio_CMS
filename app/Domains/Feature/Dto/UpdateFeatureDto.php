<?php

namespace App\Domains\Feature\Dto;

use App\Http\Requests\Feature\UpdateFeatureRequest;

class UpdateFeatureDto
{
    public function __construct(
        public readonly string $project_id,
        public readonly string $name,
        public readonly string $status,
    ) {}

    public static function fromAppRequest(UpdateFeatureRequest $request)
    {
        return [
            'project_id' => $request->validated('project_id'),
            'name' => $request->validated('name'),
            'status' => $request->validated('status'),
        ];
    }

    public static function fromApiRequest($request)
    {
        return [];
    }
}
