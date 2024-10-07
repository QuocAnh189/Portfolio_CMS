<?php

namespace App\Domains\Project\Dto;

use App\Http\Requests\Project\CreateProjectRequest;

class CreateProjectDto
{
    public function __construct(
        public readonly string $user_id,
        public readonly string $category_id,
        public readonly string $cover_image,
        public readonly string $name,
        public readonly string $description,
        public readonly string $start_date,
        public readonly string $end_date,
        public readonly string $status,
    ) {
        //
    }

    public static function fromAppRequest(CreateProjectRequest $request)
    {
        return [
            'user_id' => $request->validated('user_id'),
            'category_id' => $request->validated('category_id'),
            'cover_image' => $request->validated('cover_image'),
            'name' => $request->validated('name'),
            'description' => $request->validated(key: 'description'),
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
