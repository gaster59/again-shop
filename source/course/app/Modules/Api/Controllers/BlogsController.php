<?php

namespace App\Modules\Api\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogsController extends Controller
{
    public function index(Request $request)
    {
        return response()->json([
            'status' => 'OK'
        ]);
    }
}
