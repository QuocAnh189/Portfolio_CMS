<?php

namespace App\Domains\Project\Dto;

use App\Domains\Project\Models\Project;
use App\Http\Requests\Project\UpdateProjectRequest;

class UpdateProjectDto
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

    public static function fromAppRequest(UpdateProjectRequest $request, Project $project): array
    {
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image');
        }

        return [
            'user_id' => $request->validated('user_id'),
            'cover_image' => $imagePath === null ? $project->cover_image : $request->validated('cover_image'),
            'category_id' => $request->validated('category_id'),
            'name' => $request->validated('name'),
            'description' => $request->validated('description'),
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
