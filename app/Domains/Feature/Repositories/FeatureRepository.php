<?php

namespace App\Domains\Feature\Repositories;

use App\Domains\Feature\Models\Feature;
use App\Repository\Eloquent\BaseRepository;
use Illuminate\Support\Facades\Auth;

class FeatureRepository extends BaseRepository
{
    public function model()
    {
        return Feature::class;
    }
}
