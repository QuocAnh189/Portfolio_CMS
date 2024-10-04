<?php

namespace App\Domains\Technology\Dto;

use App\Domains\Technology\Models\Technology;
use App\Http\Requests\Technology\UpdateTechnologyRequest;

class UpdateTechnologyDto
{
    public function __construct(
        public readonly string $image,
        public readonly string $name,
        public readonly string $status,
    ) {
        //
    }

    public static function fromAppRequest(UpdateTechnologyRequest $request, Technology $technology): array
    {
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image');
        }

        return [
            'image' => $imagePath === null ? $technology->image : $request->validated('image'),
            'name' => $request->validated('name'),
            'status' => $request->validated('status'),
        ];
    }

    public static function fromApiRequest($request)
    {
        return [];
    }
}
