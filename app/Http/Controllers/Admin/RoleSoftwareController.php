<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\RoleSoftwareDataTable;
use App\Domains\RoleSoftware\Dto\CreateRoleSoftwareDto;
use App\Domains\RoleSoftware\Dto\UpdateRoleSoftwareDto;
use App\Domains\RoleSoftware\Models\RoleSoftware;
use App\Domains\RoleSoftware\Services\RoleSoftwareService;
use App\Http\Controllers\Controller;
use App\Http\Requests\ChangeStatusRequest;
use App\Http\Requests\RoleSoftware\CreateRoleSoftwareRequest;
use App\Http\Requests\RoleSoftware\UpdateRoleSoftwareRequest;
use Illuminate\Http\Request;

class RoleSoftwareController extends Controller
{
    private RoleSoftwareService $roleSoftwareService;

    public function __construct(RoleSoftwareService $roleSoftwareService)
    {
        $this->roleSoftwareService = $roleSoftwareService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(RoleSoftwareDataTable $dataTable)
    {
        return $dataTable->render('admin.role-software.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.role-software.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRoleSoftwareRequest $request)
    {
        try {
            $createRoleSoftwareDto = CreateRoleSoftwareDto::fromAppRequest($request);

            $createdRoleSoftware = $this->roleSoftwareService->createRoleSoftware($createRoleSoftwareDto);

            if ($createdRoleSoftware) {
                flash()->option('position', 'top-center')->success('Create roleSoftware successfully.');
            }

            return redirect()->route('admin.role-softwares.index');
        } catch (\Exception $e) {
            flash()->option('position', 'top-center')->error($e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RoleSoftware $roleSoftware)
    {
        return view('admin.role-software.edit', compact('roleSoftware'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoleSoftwareRequest $request, RoleSoftware $roleSoftware)
    {
        try {
            $updateRoleSoftwareDto = UpdateRoleSoftwareDto::fromAppRequest($request, $roleSoftware);

            $updatedRoleSoftware = $this->roleSoftwareService->updateRoleSoftware($updateRoleSoftwareDto, $roleSoftware);

            if ($updatedRoleSoftware) {
                flash()->option('position', 'top-center')->success('Update rolesoftware successfully.');
            }

            return redirect()->route('admin.role-softwares.index');
        } catch (\Exception $e) {
            flash()->option('position', 'top-center')->error($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RoleSoftware $roleSoftware)
    {
        try {
            $this->roleSoftwareService->deleteRoleSoftware($roleSoftware);

            return response(['status' => 'success', 'Deleted Successfully!']);
        } catch (\Exception $e) {
            flash()->option('position', 'top-center')->error($e->getMessage());
        }
    }

    /**
     * Change status
     */
    public function change_status(ChangeStatusRequest $request)
    {
        try {
            $this->roleSoftwareService->changeStatusRoleSoftware($request->id, $request->status);

            return response(['message' => 'status has been updated!']);
        } catch (\Exception $e) {
            flash()->option('position', 'top-center')->error($e->getMessage());
        }
    }
}
