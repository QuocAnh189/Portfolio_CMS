<?php

namespace App\Domains\Feature\Repositories;

use App\Domains\Feature\Models\Feature;
use Illuminate\Support\Facades\Auth;

class FeatureRepository
{
    public function __construct()
    {
        //
    }

    public function countFeatureOfUser()
    {
        $userId = Auth::id();
        return Feature::whereHas('project', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->count();
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
