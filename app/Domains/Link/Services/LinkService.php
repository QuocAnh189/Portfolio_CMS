<?php

namespace App\Domains\Link\Services;

use App\Domains\Link\Repositories\LinkRepository;

class LinkService
{
    private LinkRepository $linkRepository;
    public function __construct(LinkRepository $linkRepository)
    {
        $this->linkRepository = $linkRepository;
    }
}
