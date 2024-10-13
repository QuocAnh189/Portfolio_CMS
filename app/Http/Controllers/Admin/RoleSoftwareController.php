<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\RoleSoftware\RoleSoftwareDataTable;
use App\DataTables\Admin\RoleSoftware\TrashRoleSoftwareDataTable;
use App\Domains\RoleSoftware\Dto\CreateRoleSoftwareDto;
use App\Domains\RoleSoftware\Dto\UpdateRoleSoftwareDto;
use App\Domains\RoleSoftware\Models\RoleSoftware;
use App\Domains\RoleSoftware\Services\RoleSoftwareService;
use App\Exceptions\GeneralException;
use App\Http\Controllers\Controller;
use App\Http\Requests\ChangeStatusRequest;
use App\Http\Requests\RoleSoftware\CreateRoleSoftwareRequest;
use App\Http\Requests\RoleSoftware\UpdateRoleSoftwareRequest;

class RoleSoftwareController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(RoleSoftwareDataTable $dataTable)
    {
        return $dataTable->render('admin.role-software.index');
    }

    public function trash_index(TrashRoleSoftwareDataTable $dataTable)
    {
        return $dataTable->render('admin.role-software.trash');
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
    public function store(RoleSoftwareService $roleSoftwareService, CreateRoleSoftwareRequest $request)
    {
        try {
            $createRoleSoftwareDto = CreateRoleSoftwareDto::fromAppRequest($request);

            $createdRoleSoftware = $roleSoftwareService->createRoleSoftware($createRoleSoftwareDto);

            if ($createdRoleSoftware) {
                flash()->success('Create roleSoftware successfully.');
            }

            return redirect()->route('admin.role-softwares.index');
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
    public function edit(RoleSoftware $roleSoftware)
    {
        return view('admin.role-software.edit', compact('roleSoftware'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleSoftwareService $roleSoftwareService, UpdateRoleSoftwareRequest $request, RoleSoftware $roleSoftware)
    {
        try {
            $updateRoleSoftwareDto = UpdateRoleSoftwareDto::fromAppRequest($request, $roleSoftware);

            $updatedRoleSoftware = $roleSoftwareService->updateRoleSoftware($updateRoleSoftwareDto, $roleSoftware);

            if ($updatedRoleSoftware) {
                flash()->success('Update rolesoftware successfully.');
            }

            return redirect()->route('admin.role-softwares.index');
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
    public function destroy(RoleSoftwareService $roleSoftwareService, RoleSoftware $roleSoftware)
    {
        try {
            $roleSoftwareService->deleteRoleSoftware($roleSoftware);

            return response(['status' => 'success', 'Deleted Successfully!']);
        } catch (GeneralException $e) {
            return $e->render();
        } catch (\Exception $e) {
            flash()->error('Some thing went wrong!');
            return redirect()->back();
        }
    }


    public function restore(RoleSoftwareService $roleSoftwareService, RoleSoftware $roleSoftware)
    {
        try {
            $restoredRoleSoftware = $roleSoftwareService->restoreRoleSoftware($roleSoftware);

            if ($restoredRoleSoftware) {
                flash()->success('Restore successfully.');
            }

            return redirect()->route('admin.role-softwares.trash-index');
        } catch (GeneralException $e) {
            return $e->render();
        } catch (\Exception $e) {
            flash()->error('Some thing went wrong!');
            return redirect()->back();
        }
    }

    public function delete(RoleSoftwareService $roleSoftwareService, RoleSoftware $roleSoftware)
    {
        try {
            $roleSoftwareService->removeRoleSoftware($roleSoftware);

            return response(['status' => 'success', 'Deleted Successfully!']);
        } catch (GeneralException $e) {
            return $e->render();
        } catch (\Exception $e) {
            flash()->error('Some thing went wrong!');
            return redirect()->back();
        }
    }

    /**
     * Change status
     */
    public function change_status(RoleSoftwareService $roleSoftwareService, ChangeStatusRequest $request)
    {
        try {
            $roleSoftwareService->changeStatusRoleSoftware($request->id, $request->status);

            return response(['message' => 'status has been updated!']);
        } catch (GeneralException $e) {
            return $e->render();
        } catch (\Exception $e) {
            flash()->error('Some thing went wrong!');
            return redirect()->back();
        }
    }
}
