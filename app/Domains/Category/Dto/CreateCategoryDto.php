<?php

namespace App\Domains\Category\Dto;

use App\Domains\Category\Models\Category;
use App\Http\Requests\Category\CategoryRequest;
use App\Http\Requests\Category\CreateCategoryRequest;

class CreateCategoryDto
{
    public function __construct(
        public readonly string $image,
        public readonly string $name,
        public readonly string $status,
    ) {
        //
    }

    public static function fromAppRequest(CreateCategoryRequest $request): array
    {
        return [
            'image' => $request->validated('image'),
            'name' => $request->validated('name'),
            'status' => $request->validated('status'),
        ];
    }

    public static function fromApiRequest($request)
    {
        return [];
    }
}
