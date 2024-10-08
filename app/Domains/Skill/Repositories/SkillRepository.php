<?php

namespace App\Domains\Skill\Repositories;

use App\Domains\Skill\Models\Skill;
use App\Repository\Eloquent\BaseRepository;
use Illuminate\Support\Facades\Auth;

class SkillRepository extends BaseRepository
{
    public function model()
    {
        return Skill::class;
    }

    public function countSkillByUserId()
    {
        return Skill::where('user_id', Auth::id())->count();
    }
}
