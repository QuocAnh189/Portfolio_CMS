<?php

namespace App\Domains\ProjectGallery\Dto;

use App\Http\Requests\Gallery\CreateProjectGalleryRequest;

class CreateProjectGalleryDto
{
    public function __construct()
    {
        //
    }

    public static function fromAppRequest(CreateProjectGalleryRequest $request)
    {
        return [
            'project_id' => $request->validated('project_id'),
            'image' => $request->validated('image'),
            'status' => $request->validated('status'),
        ];
    }

    public function fromApiRequest($request)
    {
        return [];
    }
}
