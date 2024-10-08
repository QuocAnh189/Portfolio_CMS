<?php

namespace App\Domains\Category\Repositories;

use App\Domains\Category\Models\Category;
use App\Repository\Eloquent\BaseRepository;

class CategoryRepository extends BaseRepository
{
    public function model()
    {
        return Category::class;
    }
}
