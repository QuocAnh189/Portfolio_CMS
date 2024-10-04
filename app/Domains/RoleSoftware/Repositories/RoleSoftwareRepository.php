<?php

namespace App\Domains\RoleSoftware\Repositories;

use App\Domains\RoleSoftware\Models\RoleSoftware;

class RoleSoftwareRepository
{
    public function __construct()
    {
        //
    }

    public function createRoleSoftware($createRoleSoftwareDto): RoleSoftware
    {
        return RoleSoftware::create($createRoleSoftwareDto);
    }

    public function updateRoleSoftware($createRoleSoftwareDto, RoleSoftware $roleSoftware)
    {
        return $roleSoftware->update($createRoleSoftwareDto);
    }

    public function deleteRoleSoftware(RoleSoftware $roleSoftware)
    {
        return $roleSoftware->delete();
    }

    public function changeStatusRoleSoftware($roleSoftwareId, $status)
    {
        $roleSoftware = RoleSoftware::findOrFail($roleSoftwareId);
        $roleSoftware->status = $status === 'true' ? 'active' : 'inactive';

        return $roleSoftware->save();
    }
}
