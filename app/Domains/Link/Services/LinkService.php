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

    public function getAllLink()
    {
        return $this->linkRepository->findAll();
    }

    public function createLink($createLinkDto)
    {
        return $this->linkRepository->createLink($createLinkDto);
    }

    public function updateLink(Link $link, $updateLinkDto)
    {
        return $this->linkRepository->updateLink($link, $updateLinkDto);
    }

    public function deleteLink(Link $link)
    {
        return $this->linkRepository->deleteLink($link);
    }

    public function changeStatusLink($linkId, $status)
    {
        return $this->linkRepository->changeStatusLink($linkId, $status);
    }
}
