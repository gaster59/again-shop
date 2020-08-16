<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class UploaderController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @method saveImage
     * @param Request $request
     * @return string
     */
    public function saveImage(Request $request)
    {
        $CKEditor = $request->query('CKEditor');
        $funcNum  = $request->CKEditorFuncNum ?? 1;
        $message  = $url = '';
        if ($request->hasFile('upload')) {
            $file = $request->file('upload');
            if ($file->isValid()) {
                $filename =rand(1000,9999).$file->getClientOriginalName();
                $file->move(public_path().'/editor/', $filename);
                $url = url('editor/' . $filename);
            } else {
                $message = 'An error occurred while uploading the file.';
            }
        } else {
            $message = 'No file uploaded.';
        }
        $msg = 'Image uploaded successfully'; 
        $response = "<script>window.parent.CKEDITOR.tools.callFunction('$funcNum', '$url', '$msg')</script>";
        return $response;
    }
}
