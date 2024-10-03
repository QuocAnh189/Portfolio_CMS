<?php

namespace App\Domains\Major\Services;

use App\Domains\Major\Repositories\MajorRepository;

class MajorService
{
    private MajorRepository $majorRepository;
    public function __construct(MajorRepository $majorRepository)
    {
        $this->majorRepository = $majorRepository;
    }
}
