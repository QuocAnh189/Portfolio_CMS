<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\TechnologyDataTable;
use App\Domains\Technology\Dto\CreateTechnologyDto;
use App\Domains\Technology\Dto\UpdateTechnologyDto;
use App\Domains\Technology\Models\Technology;
use App\Domains\Technology\Services\TechnologyService;
use App\Http\Controllers\Controller;
use App\Http\Requests\ChangeStatusRequest;
use App\Http\Requests\Technology\CreateTechnologyRequest;
use App\Http\Requests\Technology\UpdateTechnologyRequest;
use Illuminate\Http\Request;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(TechnologyDataTable $dataTable)
    {
        return $dataTable->render('admin.technology.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.technology.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TechnologyService $technologyService, CreateTechnologyRequest $request)
    {
        try {
            $createTechnologyDto = CreateTechnologyDto::fromAppRequest($request);

            $createdTechnology = $technologyService->createTechnology($createTechnologyDto);

            if ($createdTechnology) {
                flash()->option('position', 'top-center')->success('Create technology successfully.');
            }

            return redirect()->route('admin.technologies.index');
        } catch (\Exception $e) {
            flash()->option('position', 'top-center')->error($e->getMessage());
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Technology $technology)
    {
        return view('admin.technology.edit', compact('technology'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TechnologyService $technologyService, UpdateTechnologyRequest $request, Technology $technology)
    {
        try {
            $updateTechnologyDto = UpdateTechnologyDto::fromAppRequest($request, $technology);

            $updatedTechnology = $technologyService->updateTechnology($updateTechnologyDto, $technology);

            if ($updatedTechnology) {
                flash()->option('position', 'top-center')->success('Update technology successfully.');
            }

            return redirect()->route('admin.technologies.index');
        } catch (\Exception $e) {
            flash()->option('position', 'top-center')->error($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TechnologyService $technologyService, Technology $technology)
    {
        try {
            $technologyService->deleteTechnology($technology);

            return response(['status' => 'success', 'Deleted Successfully!']);
        } catch (\Exception $e) {
            return response(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    public function change_status(TechnologyService $technologyService, ChangeStatusRequest $request)
    {
        try {
            $technologyService->changeStatusTechnology($request->id, $request->status);

            return response(['message' => 'status has been updated!']);
        } catch (\Exception $e) {
            return response(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
