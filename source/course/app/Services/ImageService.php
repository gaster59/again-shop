<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class ImageService
{

    /**
     * @method saveProductImageBase64
     * @param string $base64String
     * @param string $folder
     * @param string $productId
     */
    public function saveProductImageBase64($base64String, $folder, $productId)
    {
        list($extension, $content) = explode(';', $base64String);
        $tmpExtension              = 'jpg';
        preg_match('/.([0-9]+) /', microtime(), $m);
        $fileName = sprintf('img%s.%s', $productId, $tmpExtension);
        $content  = explode(',', $content)[1];
        $storage  = Storage::disk('avatar');

        $checkDirectory = $storage->exists($folder);

        if (!$checkDirectory) {
            $storage->makeDirectory($folder);
        }

        $storage->put($folder . '/' . $fileName, base64_decode($content));
        $path = env('APP_URL') . $folder . '/' . $fileName;

        return $path;
    }
}
