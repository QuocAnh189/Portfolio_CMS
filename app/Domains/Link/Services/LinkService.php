<?php

namespace App\Domains\Link\Services;

use App\Domains\Link\Models\Link;
use App\Domains\Link\Repositories\LinkRepository;

class LinkService
{
    private LinkRepository $linkRepository;
    public function __construct(LinkRepository $linkRepository)
    {
        $this->linkRepository = $linkRepository;
    }

    public function countLinkUserProject()
    {
        return $this->linkRepository->countOfUserProject();
    }

    public function getAllLink()
    {
        return $this->linkRepository->findAll();
    }

    public function createLink($createLinkDto)
    {
        return $this->linkRepository->create($createLinkDto);
    }

    public function updateLink(Link $link, $updateLinkDto)
    {
        return $this->linkRepository->update($link->id, $updateLinkDto);
    }

    public function deleteLink(Link $link)
    {
        return $this->linkRepository->delete($link->id);
    }

    public function changeStatusLink($linkId, $status)
    {
        return $this->linkRepository->changeStatus($linkId, $status);
    }
}
