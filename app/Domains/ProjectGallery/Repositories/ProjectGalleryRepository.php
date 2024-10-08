<?php

namespace App\Domains\ProjectGallery\Repositories;

use App\Domains\ProjectGallery\Models\ProjectGallery;
use App\Repository\Eloquent\BaseRepository;
use Illuminate\Support\Facades\Auth;

class ProjectGalleryRepository extends BaseRepository
{
    public function model()
    {
        return ProjectGallery::class;
    }
    public function countGalleryOfUser()
    {
        $userId = Auth::id();
        return ProjectGallery::whereHas('project', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->count();
    }
}
