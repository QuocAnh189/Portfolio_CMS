<?php

namespace App\Domains\Major\Repositories;

use App\Domains\Major\Models\Major;
use App\Enum\Status;
use App\Repository\Eloquent\BaseRepository;

class MajorRepository extends BaseRepository
{
    public function model()
    {
        return Major::class;
    }
}
