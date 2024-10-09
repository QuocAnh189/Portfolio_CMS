<?php

namespace App\Repository\Eloquent;

use App\Enum\Status;
use App\Repository\Contracts\RepositoryInterface;

abstract class RepositoryAbstract implements RepositoryInterface
{
    protected $model;

    public function __construct()
    {
        $this->setModel();
    }

    abstract public function model();

    public function setModel()
    {
        $this->model = app($this->model());
    }

    public function countAll()
    {
        return $this->model->count();
    }

    public function findAll()
    {
        $query = $this->model->newQuery();
        if (in_array('status', $this->model->getFillable())) {
            $query->where('status', Status::Active);
        }

        return $query->get();
    }

    public function findById($id)
    {
        return $this->model->findOrFail($id);
    }

    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }

    public function update($id, array $attributes)
    {
        $model = $this->findById($id);
        $model->update($attributes);

        return $model;
    }

    public function delete($id)
    {
        $model = $this->findById($id);
        return $model->delete();
    }
}
