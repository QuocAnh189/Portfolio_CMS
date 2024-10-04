<?php

namespace App\Domains\Major\Dto;

use App\Http\Requests\Major\CreateMajorRequest;

class CreateMajorDto
{
    public function __construct(
        public readonly string $image,
        public readonly string $name,
        public readonly string $status,
        public readonly string $description,
    ) {
        //
    }

    public static function fromAppRequest(CreateMajorRequest $request): array
    {
        return [
            'image' => $request->validated('image'),
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
