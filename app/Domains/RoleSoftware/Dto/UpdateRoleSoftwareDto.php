<?php

namespace App\Domains\RoleSoftware\Dto;

use App\Domains\RoleSoftware\Models\RoleSoftware;
use App\Http\Requests\RoleSoftware\UpdateRoleSoftwareRequest;

class UpdateRoleSoftwareDto
{
    public function __construct(
        public readonly string $image,
        public readonly string $name,
        public readonly string $status,
    ) {
        //
    }

    public static function fromAppRequest(UpdateRoleSoftwareRequest $request, RoleSoftware $roleSoftware): array
    {
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image');
        }

        return [
            'image' => $imagePath === null ? $roleSoftware->image : $request->validated('image'),
            'name' => $request->validated('name'),
            'status' => $request->validated('status'),
        ];
    }

    public static function fromApiRequest($request)
    {
        return [];
    }
}
