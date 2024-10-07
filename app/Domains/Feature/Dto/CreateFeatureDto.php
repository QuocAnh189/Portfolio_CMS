<?php

namespace App\Domains\Feature\Dto;

use App\Http\Requests\Feature\CreateFeatureRequest;

class CreateFeatureDto
{
    public function __construct(
        public readonly string $project_id,
        public readonly string $name,
        public readonly string $status,
    ) {
        //
    }

    public static function fromAppRequest(CreateFeatureRequest $request)
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
