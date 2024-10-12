<?php

namespace App\Http\Controllers\User;

use App\DataTables\Admin\Link\TrashLinkDataTable;
use App\DataTables\User\Link\LinkDataTable;
use App\Domains\Link\Dto\CreateLinkDto;
use App\Domains\Link\Dto\UpdateLinkDto;
use App\Domains\Link\Models\Link;
use App\Domains\Link\Services\LinkService;
use App\Exceptions\GeneralException;
use App\Http\Controllers\Controller;
use App\Http\Requests\ChangeStatusRequest;
use App\Http\Requests\Link\CreateLinkRequest;
use App\Http\Requests\Link\UpdateLinkRequest;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(LinkDataTable $dataTable)
    {
        return $dataTable->render('user.link.index');
    }

    public function trash_index(TrashLinkDataTable $dataTable)
    {
        return $dataTable->render('user.gallery.trash');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.link.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LinkService $linkService, CreateLinkRequest $request)
    {
        try {
            $createLinkDto = CreateLinkDto::fromAppRequest($request);
            $createdLink = $linkService->createLink($createLinkDto);

            if ($createdLink) {
                flash()->success('Create link successfully.');
            }

            return redirect()->route('user.links.index');
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
    public function edit(Link $link)
    {
        return view('user.link.edit', compact('link'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LinkService $linkService, UpdateLinkRequest $request, Link $link)
    {
        try {
            $updateLinkDto = UpdateLinkDto::fromAppRequest($request);
            $updatedLink = $linkService->updateLink($link, $updateLinkDto);

            if ($updatedLink) {
                flash()->success('Update link successfully.');
            }

            return redirect()->route('user.links.index');
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
    public function destroy(LinkService $linkService, Link $link)
    {
        try {
            $linkService->deleteLink($link);

            return response(['status' => 'success', 'Deleted Successfully!']);
        } catch (GeneralException $e) {
            return $e->render();
        } catch (\Exception $e) {
            flash()->error('Some thing went wrong!');
            return redirect()->back();
        }
    }

    public function restore(LinkService $linkService, Link $link)
    {
        try {
            $restoredLink = $linkService->restoreLink($link);

            if ($restoredLink) {
                flash()->success('Restore successfully.');
            }

            return redirect()->route('user.links.trash-index');
        } catch (GeneralException $e) {
            return $e->render();
        } catch (\Exception $e) {
            flash()->error('Some thing went wrong!');
            return redirect()->back();
        }
    }

    public function delete(LinkService $linkService, Link $link)
    {
        try {
            $linkService->removeLink($link);

            return response(['status' => 'success', 'Deleted Successfully!']);
        } catch (GeneralException $e) {
            return $e->render();
        } catch (\Exception $e) {
            flash()->error('Some thing went wrong!');
            return redirect()->back();
        }
    }

    /**
     * Change status the specified resource from storage.
     */
    public function change_status(LinkService $linkService, ChangeStatusRequest $request)
    {
        try {
            $linkService->changeStatusLink($request->id, $request->status);

            return response(['message' => 'status has been updated!']);
        } catch (GeneralException $e) {
            return $e->render();
        } catch (\Exception $e) {
            flash()->error('Some thing went wrong!');
            return redirect()->back();
        }
    }
}
