<?php

namespace App\Domains\RoleSoftware\Services;

use App\Domains\RoleSoftware\Repositories\RoleSoftwareRepository;

class RoleSoftwareService
{
    private RoleSoftwareRepository $roleSoftwareRepository;
    public function __construct(RoleSoftwareRepository $roleSoftwareRepository)
    {
        $this->roleSoftwareRepository = $roleSoftwareRepository;
    }
}
