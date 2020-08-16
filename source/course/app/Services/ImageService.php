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
        if (!$this->__isBase64String($base64String)) {
            return '';
        }
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

    /**
     * @method convetImageToBase64
     * @param String $imageUrl
     * @return String
     */
    public function convetImageToBase64($imageUrl)
    {
        $data = file_get_contents($imageUrl);
        $base64 = 'data:image/jpeg' . ';base64,' . base64_encode($data);
        return $base64;
    }

    /**
     * @method isBase64String
     * @param String $string
     * @return Boolean
     */
    private function __isBase64String($string)
    {
        // Check if there is no invalid character in string
        if (!preg_match('/^(?:[data]{4}:(text|image|application)\/[a-z]*)/', $string)) {
            return false;
        } else {
            return true;
        }
    }
}
