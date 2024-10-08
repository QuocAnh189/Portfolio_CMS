<?php

namespace App\Domains\Education\Repositories;

use App\Domains\Education\Models\Education;
use App\Repository\Eloquent\BaseRepository;
use Illuminate\Support\Facades\Auth;

class EducationRepository extends BaseRepository
{
    public function model()
    {
        return Education::class;
    }
}
