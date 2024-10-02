<?php

namespace App\Domains\UserDto\Dto;

class UserDto
{
    public function __construct()
    {
        //
    }

    public function fromAppRequest($request)
    {
        return [];
    }

    public function fromApiRequest($request)
    {
        return [];
    }
}
