<?php

namespace App\Models\Traits;


trait UploadImage
{
    public function uploadImage($file, $folder, $size = null)
    {
        $uploadedFileUrl = cloudinary()->upload($file->getRealPath(), [
            'folder' => 'portfolio/' . $folder,
            'transformation' => [
                'width' => $size['width'] ? $size['width'] : 500,
                'height' =>  $size['height'] ? $size['height'] : 500,
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
