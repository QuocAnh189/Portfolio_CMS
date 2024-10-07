<?php

namespace App\Http\Controllers\User\Project;

use App\DataTables\User\Project\ProjectFeatureDataTable;
use App\Domains\Feature\Dto\CreateFeatureDto;
use App\Domains\Feature\Dto\UpdateFeatureDto;
use App\Domains\Feature\Models\Feature;
use App\Domains\Feature\Services\FeatureService;
use App\Domains\Project\Models\Project;
use App\Http\Controllers\Controller;
use App\Http\Requests\ChangeStatusRequest;
use App\Http\Requests\Feature\CreateFeatureRequest;
use App\Http\Requests\Feature\UpdateFeatureRequest;

class ProjectFeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Project $project)
    {
        $dataTable = new ProjectFeatureDataTable($project);
        return $dataTable->render('user.project.feature.index', compact('project'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Project $project)
    {
        return view('user.project.feature.create', compact('project'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateFeatureRequest $request, FeatureService $featureService, Project $project)
    {
        try {
            $createFeatureDto = CreateFeatureDto::fromAppRequest($request);
            $createdFeature = $featureService->createFeature($createFeatureDto);

            if ($createdFeature) {
                flash()->option('position', 'top-center')->success('Create feature successfully.');
            }

            return redirect()->route('user.projects.features.index', $project);
        } catch (\Exception $e) {
            flash()->option('position', 'top-center')->error($e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project, Feature $feature)
    {
        return view('user.project.feature.edit', compact('project', 'feature'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FeatureService $featureService, UpdateFeatureRequest $request, Project $project, Feature $feature)
    {
        try {
            $updateFeatureDto = UpdateFeatureDto::fromAppRequest($request);

            $updateFeature = $featureService->updateFeature($feature,  $updateFeatureDto);

            if ($updateFeature) {
                flash()->option('position', 'top-center')->success('Update feature successfully.');
            }

            return redirect()->route('user.projects.features.index', $project);
        } catch (\Exception $e) {
            flash()->option('position', 'top-center')->error($e->getMessage());
        }
    }
}
