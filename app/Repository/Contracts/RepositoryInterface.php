<?php

namespace App\Repository\Contracts;

interface RepositoryInterface
{
    public function findAll();

    public function findById($id);

    public function create(array $attributes);

    public function update($id, array $attributes);

    public function delete($id);
}
