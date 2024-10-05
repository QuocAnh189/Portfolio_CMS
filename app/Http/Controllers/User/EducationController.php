<?php

namespace App\Http\Controllers\User;

use App\DataTables\User\EducationDataTable;
use App\Domains\Education\Dto\CreateEducationDto;
use App\Domains\Education\Dto\UpdateEducationDto;
use App\Domains\Education\Models\Education;
use App\Domains\Education\Services\EducationService;
use App\Domains\Major\Services\MajorService;
use App\Http\Controllers\Controller;
use App\Http\Requests\ChangeStatusRequest;
use App\Http\Requests\Education\CreateEducationRequest;
use App\Http\Requests\Education\UpdateEducationRequest;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    private EducationService $educationService;
    private MajorService $majorService;

    public function __construct(EducationService $educationService, MajorService $majorService)
    {
        $this->educationService = $educationService;
        $this->majorService = $majorService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(EducationDataTable $dataTable)
    {
        return $dataTable->render("user.education.index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $majors = $this->majorService->getAllMajor();
        return view("user.education.create", compact("majors"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateEducationRequest $request)
    {
        try {
            $createEducationDto = CreateEducationDto::fromAppRequest($request);
            $createdEducation = $this->educationService->createEducation($createEducationDto);

            if ($createdEducation) {
                flash()->option('position', 'top-center')->success('Create Education successfully.');
            }

            return redirect()->route("user.education.index");
        } catch (\Exception $e) {
            return redirect()->back()->with("error", $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Education $education)
    {
        $majors = $this->majorService->getAllMajor();
        return view("user.education.edit", compact("education", "majors"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Education $education, UpdateEducationRequest $request)
    {
        try {
            $updateEducationDto = UpdateEducationDto::fromAppRequest($request, $education);

            $updatedEducation = $this->educationService->updateEducation($education, $updateEducationDto);

            if ($updatedEducation) {
                flash()->option('position', 'top-center')->success('Update Education successfully.');
            }

            return redirect()->route("user.education.index");
        } catch (\Exception $e) {
            return redirect()->back()->with("error", $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Education $education)
    {
        try {
            $this->educationService->deleteEducation($education);

            return response(['status' => 'success', 'Deleted Successfully!']);
        } catch (\Exception $e) {
            flash()->option('position', 'top-center')->error($e->getMessage());
        }
    }

    public function change_status(ChangeStatusRequest $request)
    {
        try {
            $this->educationService->changeStatusEducation($request->id, $request->status);

            return response(['message' => 'status has been updated!']);
        } catch (\Exception $e) {
            flash()->option('position', 'top-center')->error($e->getMessage());
        }
    }
}
