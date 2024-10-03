<?php

namespace App\Domains\Profile\Dto;

use App\Http\Requests\Profile\PasswordRequest;

class UpdatePasswordDto
{
    public function __construct(
        public readonly string $user_id,
        public readonly string $current_password,
        public readonly string $new_password,
        public readonly string $new_password_confirmation
    ) {
        //
    }

    public static function fromAppRequest(PasswordRequest $request): array
    {
        return [
            'user_id' => $request->validated('user_id'),
            'current_password' => $request->validated('current_password'),
            'new_password' => $request->validated('new_password'),
            'password_confirmation' => $request->validated('new_password_confirmation'),
        ];
    }

    public function fromApiRequest($request) {}
}
