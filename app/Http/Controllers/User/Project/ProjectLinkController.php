<?php

namespace App\Http\Controllers\User\Project;

use App\DataTables\User\Project\ProjectLinkDataTable;
use App\Domains\Link\Dto\CreateLinkDto;
use App\Domains\Link\Dto\UpdateLinkDto;
use App\Domains\Link\Models\Link;
use App\Domains\Project\Models\Project;
use App\Domains\Link\Services\LinkService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Link\CreateLinkRequest;
use App\Http\Requests\Link\UpdateLinkRequest;
use Illuminate\Http\Request;

class ProjectLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Project $project)
    {
        $dataTable = new ProjectLinkDataTable($project);
        return $dataTable->render('user.project.link.index', compact('project'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Project $project)
    {
        return view('user.project.link.create', compact('project'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateLinkRequest $request, LinkService $linkService, Project $project)
    {
        try {
            $createLinkDto = CreateLinkDto::fromAppRequest($request);
            $createdLink = $linkService->createLink($createLinkDto);

            if ($createdLink) {
                flash()->option('position', 'top-center')->success('Create link successfully.');
            }

            return redirect()->route('user.projects.links.index', $project);
        } catch (\Exception $e) {
            flash()->option('position', 'top-center')->error($e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project, Link $link)
    {
        return view('user.project.link.edit', compact('project', 'link'));
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
                flash()->option('position', 'top-center')->success('Update link successfully.');
            }

            return redirect()->route('user.projects.links.index', $project);
        } catch (\Exception $e) {
            flash()->option('position', 'top-center')->error($e->getMessage());
        }
    }
}
