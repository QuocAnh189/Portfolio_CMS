<?php

namespace App\Domains\Project\Repositories;

use App\Domains\Project\Models\Project;
use App\Repository\Eloquent\BaseRepository;
use Illuminate\Support\Facades\Auth;

class ProjectRepository extends BaseRepository
{
    public function model()
    {
        return Project::class;
    }
}
