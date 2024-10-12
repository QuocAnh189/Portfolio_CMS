<?php

namespace App\Http\Controllers\Admin\Project;

use App\DataTables\Admin\Project\ProjectLinkDataTable;
use App\Domains\Link\Dto\CreateLinkDto;
use App\Domains\Link\Dto\UpdateLinkDto;
use App\Domains\Link\Models\Link;
use App\Domains\Link\Services\LinkService;
use App\Domains\Project\Models\Project;
use App\Exceptions\GeneralException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Link\CreateLinkRequest;
use App\Http\Requests\Link\UpdateLinkRequest;

class ProjectLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Project $project)
    {
        $dataTable = new ProjectLinkDataTable($project);
        return $dataTable->render('admin.project.link.index', compact('project'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Project $project)
    {
        return view('admin.project.link.create', compact('project'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LinkService $linkService, CreateLinkRequest $request, Project $project)
    {
        try {
            $createLinkDto = CreateLinkDto::fromAppRequest($request);
            $createdLink = $linkService->createLink($createLinkDto);

            if ($createdLink) {
                flash()->success('Create link successfully.');
            }

            return redirect()->route('admin.projects.links.index', $project);
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
    public function edit(Project $project, Link $link)
    {
        return view('admin.project.link.edit', compact('project', 'link'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LinkService $linkService, UpdateLinkRequest $request, Project $project, Link $link)
    {
        try {
            $updateLinkDto = UpdateLinkDto::fromAppRequest($request);
            $updateLink = $linkService->updateLink($link, $updateLinkDto);

            if ($updateLink) {
                flash()->success('Update link successfully.');
            }

            return redirect()->route('admin.projects.links.index', $project);
        } catch (GeneralException $e) {
            return $e->render();
        } catch (\Exception $e) {
            flash()->error('Some thing went wrong!');
            return redirect()->back();
        }
    }
}
