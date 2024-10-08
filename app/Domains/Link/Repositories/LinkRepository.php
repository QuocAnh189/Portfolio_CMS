<?php

namespace App\Domains\Link\Repositories;

use App\Domains\Link\Models\Link;
use Illuminate\Support\Facades\Auth;

class LinkRepository
{
    public function countLinkOfUser()
    {
        $userId = Auth::id();
        return Link::whereHas('project', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->count();
    }

    public function findAll()
    {
        return Link::where('status', 'active')->get();
    }

    public function createLink($createLinkDto): Link
    {
        return Link::create($createLinkDto);
    }

    public function updateLink(Link $link, $updateLinkDto)
    {
        return $link->update($updateLinkDto);
    }

    public function deleteLink(Link $link)
    {
        return $link->delete();
    }

    public function changeStatusLink($linkId, $status)
    {
        $link = Link::findOrFail($linkId);
        $link->status = $status === 'true' ? 'active' : 'inactive';

        return $link->save();
    }
}
