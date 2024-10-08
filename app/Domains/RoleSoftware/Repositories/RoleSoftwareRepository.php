<?php

namespace App\Domains\RoleSoftware\Repositories;

use App\Domains\RoleSoftware\Models\RoleSoftware;
use App\Repository\Eloquent\BaseRepository;

class RoleSoftwareRepository extends BaseRepository
{
    public function model()
    {
        return RoleSoftware::class;
    }
}
