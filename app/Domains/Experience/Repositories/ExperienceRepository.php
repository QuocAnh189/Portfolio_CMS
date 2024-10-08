<?php

namespace App\Domains\Experience\Repositories;

use App\Domains\Experience\Models\Experience;
use App\Repository\Eloquent\BaseRepository;
use Illuminate\Support\Facades\Auth;

class ExperienceRepository extends BaseRepository
{
    public function model()
    {
        return Experience::class;
    }
}
