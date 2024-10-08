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

    public function countFeatureOfUserProject()
    {
        return $this->featureRepository->countOfUserProject();
    }

    public function getAllFeature()
    {
        return $this->featureRepository->findAll();
    }

    public function createFeature($createFeatureDto)
    {
        return $this->featureRepository->create($createFeatureDto);
    }

    public function updateFeature(Feature $feature, $updateFeatureDto)
    {
        return $this->featureRepository->update($feature->id, $updateFeatureDto);
    }

    public function deleteFeature(Feature $feature)
    {
        return $this->featureRepository->delete($feature->id);
    }

    public function changeStatusFeature($featureId, $status)
    {
        return $this->featureRepository->changeStatus($featureId, $status);
    }
}
