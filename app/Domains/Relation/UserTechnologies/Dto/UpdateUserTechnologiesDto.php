<?php

namespace App\Domains\Relation\UserTechnologies\Dto;

use App\Http\Requests\User\CreateUserTechnologiesRequest;
use App\Http\Requests\User\UpdateUserTechnologiesRequest;

class UpdateUserTechnologiesDto
{
    public function __construct(
        public readonly string $user_id,
        public readonly string $technology_id,
        public readonly string $status,
    ) {
        //
    }

    public static function fromAppRequest(UpdateUserTechnologiesRequest $request)
    {
        return [
            'user_id' => $request->validated('user_id'),
            'technology_id' => $request->validated('technology_id'),
            'status' => $request->validated('status'),
        ];
    }

    public static function fromApiRequest($request)
    {
        return [];
    }
}
