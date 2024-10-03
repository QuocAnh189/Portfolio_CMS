<?php

namespace App\Domains\Technology\Services;

use App\Domains\Technology\Repositories\TechnologyRepository;

class TechnologyService
{
    private TechnologyRepository $technologyRepository;
    public function __construct(TechnologyRepository $technologyRepository)
    {
        $this->technologyRepository = $technologyRepository;
    }
}
