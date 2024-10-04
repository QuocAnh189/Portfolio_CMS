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
    private MajorService $majorService;

    public function __construct(MajorService $majorService)
    {
        $this->majorService = $majorService;
    }
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
    public function store(CreateMajorRequest $request)
    {
        try {
            $createMajorDto = CreateMajorDto::fromAppRequest($request);
            $createdMajor = $this->majorService->createMajor($createMajorDto);

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
    public function update(UpdateMajorRequest $request, Major $major)
    {
        try {
            $updateMajorDto = UpdateMajorDto::fromAppRequest($request, $major);

            $updatedMajor = $this->majorService->updateMajor($updateMajorDto, $major);

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
    public function destroy(Major $major)
    {
        $this->majorService->deleteMajor($major);

        return response(['status' => 'success', 'Deleted Successfully!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function change_status(ChangeStatusRequest $request)
    {
        $this->majorService->changeStatusMajor($request->id, $request->status);

        return response(['message' => 'status has been updated!']);
    }
}
