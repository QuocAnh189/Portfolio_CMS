<?php

namespace App\Domains\Feature\Services;

use App\Domains\Feature\Models\Feature;
use App\Domains\Feature\Repositories\FeatureRepository;

class FeatureService
{
    private FeatureRepository $featureRepository;
    public function __construct(FeatureRepository $featureRepository)
    {
        $this->featureRepository = $featureRepository;
    }

    public function countFeatureOfUser()
    {
        return $this->featureRepository->countFeatureOfUser();
    }

    public function getAllFeature()
    {
        return $this->featureRepository->findAll();
    }

    public function createFeature($createFeatureDto)
    {
        return $this->featureRepository->createFeature($createFeatureDto);
    }

    public function updateFeature(Feature $feature, $updateFeatureDto)
    {
        return $this->featureRepository->updateFeature($feature, $updateFeatureDto);
    }

    public function deleteFeature(Feature $feature)
    {
        return $this->featureRepository->deleteFeature($feature);
    }

    public function changeStatusFeature($featureId, $status)
    {
        return $this->featureRepository->changeStatusFeature($featureId, $status);
    }
}
