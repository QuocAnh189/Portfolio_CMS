<?php

namespace App\Domains\Major\Dto;

use App\Domains\Major\Models\Major;
use App\Http\Requests\Major\UpdateMajorRequest;

class UpdateMajorDto
{
    public function __construct(
        public readonly string $image,
        public readonly string $name,
        public readonly string $status,
        public readonly string $description,
    ) {
        //
    }

    public static function fromAppRequest(UpdateMajorRequest $request, Major $major): array
    {
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image');
        }

        return [
            'image' => $imagePath === null ? $major->image : $request->validated('image'),
            'name' => $request->validated('name'),
            'description' => $request->validated('description'),
            'status' => $request->validated('status'),
        ];
    }

    public static function fromApiRequest($request)
    {
        return [];
    }
}
