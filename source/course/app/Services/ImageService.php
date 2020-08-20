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
    public function saveProductImageBase64($base64String, $folder, $productId, $type = "product")
    {
        $path = '';
        try {
            if (!$this->__isBase64String($base64String)) {
                return '';
            }
            list($extension, $content) = explode(';', $base64String);
            $tmpExtension              = 'jpg';
            preg_match('/.([0-9]+) /', microtime(), $m);
            $fileName = sprintf('img.%s', $tmpExtension);
            $content  = explode(',', $content)[1];
            $storage  = Storage::disk('avatar');
    
            $folder = $folder.'/'.$productId;
            $checkDirectory = $storage->exists($folder);
    
            if (!$checkDirectory) {
                $storage->makeDirectory($folder);
            }
    
            $storage->put($folder . '/' . $fileName, base64_decode($content));
            $urlImage = env('APP_URL') . $folder . '/' . $fileName;
            $pathImage = public_path($folder . '/' . $fileName);

            $arrayThumbnail = config('thumbnail.avatar');
            foreach ($arrayThumbnail as $thumbnail => $size) {
                $pathThumb = $folder . "/$thumbnail";
                $checkDirectory = $storage->exists($pathThumb);
                if (!$checkDirectory) {
                    $storage->makeDirectory($pathThumb);
                }
                \Image::make($pathImage)->resize($size[0],$size[1])->save(public_path($pathThumb . '/' . $fileName));
            }
    
            return [
                $urlImage,
                env('APP_URL') . $folder . '/'

            ];
        } catch(Exception $ex) {
            \Log::error($ex->getMessage());
        }
    }

    /**
     * @method convetImageToBase64
     * @param String $imageUrl
     * @return String
     */
    public function convetImageToBase64($imageUrl)
    {
        $data = $this->imageToBase64($imageUrl);
        dd($data);
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

    private function curl_get_contents($url)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_URL, $url);

        $data = curl_exec($ch);
        curl_close($ch);

        return $data;
    }

    private function imageToBase64($image){
        $imageData = base64_encode($this->curl_get_contents($image));
        $mime_types = array(
            'pdf' => 'application/pdf',
            'doc' => 'application/msword',
            'odt' => 'application/vnd.oasis.opendocument.text ',
            'docx'	=> 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            'gif' => 'image/gif',
            'jpg' => 'image/jpg',
            'jpeg' => 'image/jpeg',
            'png' => 'image/png',
            'bmp' => 'image/bmp'
        );
        $ext = pathinfo($image, PATHINFO_EXTENSION);
        
        if (array_key_exists($ext, $mime_types)) {
            $a = $mime_types[$ext];
        }
        return 'data: '.$a.';base64,'.$imageData;
    }
}
