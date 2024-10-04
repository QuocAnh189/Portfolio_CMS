<?php

namespace App\Domains\RoleSoftware\Dto;

use App\Http\Requests\RoleSoftware\CreateRoleSoftwareRequest;

class CreateRoleSoftwareDto
{
    public function __construct(
        public readonly string $image,
        public readonly string $name,
        public readonly string $status,
    ) {
        //
    }

    public static function fromAppRequest(CreateRoleSoftwareRequest $request): array
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
