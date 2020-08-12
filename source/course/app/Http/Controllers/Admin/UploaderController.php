<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class UploaderController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function saveImage(Request $request)
    {
        $name = $request->name;
        $src = $request->src;
        session([$name => $src]);
        return response()->json([
            'success' => true
        ]);
    }
}
