<?php

namespace App\Domains\Link\Repositories;

use App\Domains\Link\Models\Link;
use App\Repository\Eloquent\BaseRepository;
use Illuminate\Support\Facades\Auth;

class LinkRepository extends BaseRepository
{
    public function model()
    {
        return Link::class;
    }
}
