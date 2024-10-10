<?php

namespace App\Http\Controllers\User;

use App\DataTables\User\FeatureDataTable;
use App\Domains\Feature\Dto\CreateFeatureDto;
use App\Domains\Feature\Dto\UpdateFeatureDto;
use App\Domains\Feature\Models\Feature;
use App\Domains\Feature\Services\FeatureService;
use App\Http\Controllers\Controller;
use App\Http\Requests\ChangeStatusRequest;
use App\Http\Requests\Feature\CreateFeatureRequest;
use App\Http\Requests\Feature\UpdateFeatureRequest;

class FeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(FeatureDataTable $dataTable)
    {
        return $dataTable->render('user.feature.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.feature.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FeatureService $featureService, CreateFeatureRequest $request)
    {
        try {
            $createFeatureDto = CreateFeatureDto::fromAppRequest($request);
            $createdFeature = $featureService->createFeature($createFeatureDto);

            if ($createdFeature) {
                flash()->success('Create feature successfully.');
            }

            return redirect()->route('user.features.index');
        } catch (\Exception $e) {
            flash()->error($e->getMessage());
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Feature $feature)
    {
        return view('user.feature.edit', compact('feature'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FeatureService $featureService, UpdateFeatureRequest $request, Feature $feature)
    {
        try {
            $updateFeatureDto = UpdateFeatureDto::fromAppRequest($request);
            $updatedFeature = $featureService->updateFeature($feature,  $updateFeatureDto);

            if ($updatedFeature) {
                flash()->success('Update feature successfully.');
            }

            return redirect()->route('user.features.index');
        } catch (\Exception $e) {
            flash()->error($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FeatureService $featureService, Feature $feature)
    {
        try {
            $featureService->deleteFeature($feature);

            return response(['status' => 'success', 'Deleted Successfully!']);
        } catch (\Exception $e) {
            flash()->error($e->getMessage());
        }
    }

    /**
     * Change status the specified resource from storage.
     */
    public function change_status(FeatureService $featureService, ChangeStatusRequest $request)
    {
        try {
            $featureService->changeStatusFeature($request->id, $request->status);

            return response(['message' => 'status has been updated!']);
        } catch (\Exception $e) {
            flash()->error($e->getMessage());
        }
    }
}
