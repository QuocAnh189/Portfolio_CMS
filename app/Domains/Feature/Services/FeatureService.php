<?php

namespace App\Domains\Feature\Services;

use App\Domains\Feature\Repositories\FeatureRepository;

class FeatureService
{
    private FeatureRepository $featureRepository;
    public function __construct(FeatureRepository $featureRepository)
    {
        $this->featureRepository = $featureRepository;
    }
}
