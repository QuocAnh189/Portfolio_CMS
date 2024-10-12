<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\Education\EducationDataTable;
use App\DataTables\Admin\Education\TrashEducationDataTable;
use App\Domains\Education\Dto\CreateEducationDto;
use App\Domains\Education\Dto\UpdateEducationDto;
use App\Domains\Education\Models\Education;
use App\Domains\Education\Services\EducationService;
use App\Domains\Major\Services\MajorService;
use App\Domains\User\Services\UserService;
use App\Exceptions\GeneralException;
use App\Http\Controllers\Controller;
use App\Http\Requests\ChangeStatusRequest;
use App\Http\Requests\Education\CreateEducationRequest;
use App\Http\Requests\Education\UpdateEducationRequest;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(EducationDataTable $educationDataTable)
    {
        return $educationDataTable->render('admin.education.index');
    }

    public function trash_index(TrashEducationDataTable $dataTable)
    {
        return $dataTable->render('admin.education.trash');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(UserService $userService, MajorService $majorService)
    {
        $users = $userService->getAllUser();
        $majors = $majorService->getAllMajor();
        return view('admin.education.create', compact('users', 'majors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EducationService $educationService, CreateEducationRequest $request)
    {
        try {
            $createEducationDto = CreateEducationDto::fromAppRequest($request);
            $createdEducation = $educationService->createEducation($createEducationDto);

            if ($createdEducation) {
                flash()->success('Create Education successfully.');
            }

            return redirect()->route("admin.education.index");
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
    public function edit(UserService $userService, MajorService $majorService, Education $education)
    {
        $users = $userService->getAllUser();
        $majors = $majorService->getAllMajor();
        return view('admin.education.edit', compact('users', 'majors', 'education'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EducationService $educationService, Education $education, UpdateEducationRequest $request)
    {
        try {
            $updateEducationDto = UpdateEducationDto::fromAppRequest($request, $education);

            $updatedEducation = $educationService->updateEducation($education, $updateEducationDto);

            if ($updatedEducation) {
                flash()->success('Update Education successfully.');
            }

            return redirect()->route("admin.education.index");
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
    public function destroy(EducationService $educationService, Education $education)
    {
        try {
            $educationService->deleteEducation($education);

            return response(['status' => 'success', 'Deleted Successfully!']);
        } catch (GeneralException $e) {
            return $e->render();
        } catch (\Exception $e) {
            flash()->error('Some thing went wrong!');
            return redirect()->back();
        }
    }

    public function restore(EducationService $educationService, Education $education)
    {
        try {
            $restoredEducation = $educationService->restoreEducation($education);

            if ($restoredEducation) {
                flash()->success('Restore successfully.');
            }

            return redirect()->route('admin.education.trash-index');
        } catch (GeneralException $e) {
            return $e->render();
        } catch (\Exception $e) {
            flash()->error('Some thing went wrong!');
            return redirect()->back();
        }
    }

    public function delete(EducationService $educationService, Education $education)
    {
        try {
            $educationService->removeEducation($education);

            return response(['status' => 'success', 'Deleted Successfully!']);
        } catch (GeneralException $e) {
            return $e->render();
        } catch (\Exception $e) {
            flash()->error('Some thing went wrong!');
            return redirect()->back();
        }
    }

    public function change_status(EducationService $educationService, ChangeStatusRequest $request)
    {
        try {
            $educationService->changeStatusEducation($request->id, $request->status);

            return response(['message' => 'status has been updated!']);
        } catch (GeneralException $e) {
            return $e->render();
        } catch (\Exception $e) {
            flash()->error('Some thing went wrong!');
            return redirect()->back();
        }
    }
}
