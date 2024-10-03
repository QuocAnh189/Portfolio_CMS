<?php

namespace App\Models\Traits;


trait UploadImage
{
    public function uploadImage($file, $folder)
    {
        $uploadedFileUrl = cloudinary()->upload($file->getRealPath(), [
            'folder' => 'portfolio/' . $folder,
            'transformation' => [
                'width' => 500,
                'height' => 500,
                'crop' => 'fill'
            ]
        ])->getSecurePath();


        return $uploadedFileUrl;
    }

    public function removeImages($publicId)
    {
        $uploadedFileUrl = cloudinary()->removeAllContext([$publicId]);

        return $uploadedFileUrl;
    }
}
