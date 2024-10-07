<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\MajorDataTable;
use App\Domains\Major\Dto\CreateMajorDto;
use App\Domains\Major\Dto\UpdateMajorDto;
use App\Domains\Major\Models\Major;
use App\Domains\Major\Services\MajorService;
use App\Http\Controllers\Controller;
use App\Http\Requests\ChangeStatusRequest;
use App\Http\Requests\Major\CreateMajorRequest;
use App\Http\Requests\Major\UpdateMajorRequest;
use Illuminate\Http\Request;

class MajorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(MajorDataTable $dataTable)
    {
        return $dataTable->render('admin.major.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.major.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MajorService $majorService, CreateMajorRequest $request)
    {
        try {
            $createMajorDto = CreateMajorDto::fromAppRequest($request);
            $createdMajor = $majorService->createMajor($createMajorDto);

            if ($createdMajor) {
                flash()->option('position', 'top-center')->success('Create major successfully.');
            }

            return redirect()->route('admin.majors.index');
        } catch (\Exception $e) {
            flash()->option('position', 'top-center')->error($e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Major $major)
    {
        return view('admin.major.edit', compact('major'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MajorService $majorService, UpdateMajorRequest $request, Major $major)
    {
        try {
            $updateMajorDto = UpdateMajorDto::fromAppRequest($request, $major);

            $updatedMajor = $majorService->updateMajor($updateMajorDto, $major);

            if ($updatedMajor) {
                flash()->option('position', 'top-center')->success('Update major successfully.');
            }

            return redirect()->route('admin.majors.index');
        } catch (\Exception $e) {
            flash()->option('position', 'top-center')->error($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MajorService $majorService, Major $major)
    {
        try {
            $majorService->deleteMajor($major);

            return response(['status' => 'success', 'Deleted Successfully!']);
        } catch (\Exception $e) {
            flash()->option('position', 'top-center')->error($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function change_status(MajorService $majorService, ChangeStatusRequest $request)
    {
        try {
            $majorService->changeStatusMajor($request->id, $request->status);

            return response(['message' => 'status has been updated!']);
        } catch (\Exception $e) {
            flash()->option('position', 'top-center')->error($e->getMessage());
        }
    }
}
