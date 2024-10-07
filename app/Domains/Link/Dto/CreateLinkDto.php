<?php

namespace App\Domains\Link\Dto;

use App\Http\Requests\Link\CreateLinkRequest;

class CreateLinkDto
{
    public function __construct(
        public readonly int $project_id,
        public readonly string $title,
        public readonly string $url,
        public readonly string $status,
    ) {
        //
    }

    public static function fromAppRequest(CreateLinkRequest $request)
    {
        return [
            'project_id' => $request->validated('project_id'),
            'title' => $request->validated('title'),
            'url' => $request->validated('url'),
            'status' => $request->validated('status'),
        ];
    }

    public static function fromApiRequest($request)
    {
        return [];
    }
}
