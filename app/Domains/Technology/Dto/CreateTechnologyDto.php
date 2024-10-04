<?php

namespace App\Domains\Technology\Dto;

use App\Http\Requests\Technology\CreateTechnologyRequest;

class CreateTechnologyDto
{
    public function __construct(
        public readonly string $image,
        public readonly string $name,
        public readonly string $status,
    ) {
        //
    }

    public static function fromAppRequest(CreateTechnologyRequest $request): array
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
