<?php

namespace App\Repository\Eloquent;

use Illuminate\Support\Facades\Auth;

abstract class BaseRepository extends RepositoryAbstract
{
    public function findByStatus($status)
    {
        return $this->model->where('status', $status)->get();
    }

    public function changeStatus($id, $status)
    {
        $model = $this->findById($id);
        $model->status = $status === 'true' ? 'active' : 'inactive';

        return $model->save();
    }

    public function countOfUser()
    {
        return $this->model->where('user_id', Auth::id())->count();
    }

    public function countOfUserProject()
    {
        $userId = Auth::id();
        return $this->model->whereHas('project', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->count();
    }
}
