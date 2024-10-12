<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\Feature\FeatureDataTable;
use App\DataTables\Admin\Feature\TrashFeatureDataTable;
use App\Domains\Feature\Dto\CreateFeatureDto;
use App\Domains\Feature\Dto\UpdateFeatureDto;
use App\Domains\Feature\Models\Feature;
use App\Domains\Feature\Services\FeatureService;
use App\Domains\Project\Services\ProjectService;
use App\Exceptions\GeneralException;
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
        return $dataTable->render('admin.feature.index');
    }

    public function trash_index(TrashFeatureDataTable $dataTable)
    {
        return $dataTable->render('admin.feature.trash');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(ProjectService $projectService)
    {
        $projects = $projectService->getAllProject();
        return view('admin.feature.create', compact('projects'));
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

            return redirect()->route('admin.features.index');
        } catch (GeneralException $e) {
            return $e->render();
        } catch (\Exception $e) {
            flash()->error('Some thing went wrong!');
            return redirect()->back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProjectService $projectService, Feature $feature)
    {
        $projects = $projectService->getAllProject();
        return view('admin.feature.edit', compact('projects', 'feature'));
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

            return redirect()->route('admin.features.index');
        } catch (GeneralException $e) {
            return $e->render();
        } catch (\Exception $e) {
            flash()->error('Some thing went wrong!');
            return redirect()->back();
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
        } catch (GeneralException $e) {
            return $e->render();
        } catch (\Exception $e) {
            flash()->error('Some thing went wrong!');
            return redirect()->back();
        }
    }

    public function restore(FeatureService $featureService, Feature $feature)
    {
        try {
            $restoredFeature = $featureService->restoreFeature($feature);

            if ($restoredFeature) {
                flash()->success('Restore successfully.');
            }

            return redirect()->route('admin.features.trash-index');
        } catch (GeneralException $e) {
            return $e->render();
        } catch (\Exception $e) {
            flash()->error('Some thing went wrong!');
            return redirect()->back();
        }
    }

    public function delete(FeatureService $featureService, Feature $feature)
    {
        try {
            $featureService->removeFeature($feature);

            return response(['status' => 'success', 'Deleted Successfully!']);
        } catch (GeneralException $e) {
            return $e->render();
        } catch (\Exception $e) {
            flash()->error('Some thing went wrong!');
            return redirect()->back();
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
        } catch (GeneralException $e) {
            return $e->render();
        } catch (\Exception $e) {
            flash()->error('Some thing went wrong!');
            return redirect()->back();
        }
    }
}
