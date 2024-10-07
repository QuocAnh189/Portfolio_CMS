<?php

namespace App\Domains\Feature\Repositories;

use App\Domains\Feature\Models\Feature;

class FeatureRepository
{
    public function __construct()
    {
        //
    }

    public function findAll()
    {
        return Feature::where('status', 'active')->get();
    }

    public function createFeature($createFeatureDto): Feature
    {
        return Feature::create($createFeatureDto);
    }

    public function updateFeature(Feature $feature, $updateFeatureDto)
    {
        return $feature->update($updateFeatureDto);
    }

    public function deleteFeature(Feature $feature)
    {
        return $feature->delete();
    }

    public function changeStatusFeature($featureId, $status)
    {
        $feature = Feature::findOrFail($featureId);
        $feature->status = $status === 'true' ? 'active' : 'inactive';

        return $feature->save();
    }
}
