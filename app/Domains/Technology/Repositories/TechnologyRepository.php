<?php

namespace App\Domains\Technology\Repositories;

use App\Domains\Technology\Models\Technology;
use App\Repository\Eloquent\BaseRepository;

class TechnologyRepository extends BaseRepository
{
    public function model()
    {
        return Technology::class;
    }
}
