<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct()
    {

    }

    public function index(Request $request)
    {
        if (\Auth::guard('admin')->attempt([
            'email'    => $request->email,
            'password' => $request->password,
            'role'     => 1
        ], true)) {
            $auth = \Auth::guard('admin')->user();
            return response()->json([
                'success' => true,
                'token'   => $auth->token
            ]);
        }
        return response()->json([
            'success' => false,
            'token'   => ''
        ]);
    }

    public function test(Request $request)
    {
        // $header = $request->header('Authorization');
        // $expectedAuthString = base64_encode($this->webhookUser . ":" . $this->webhookPass);
        return response()->json([
            'success' => false,
            // 'token'   => $header,
            'token'   => 11,
            
        ]);
    }

    public function post(Request $request)
    {
        // $header = $request->header('Authorization');
        // $expectedAuthString = base64_encode($this->webhookUser . ":" . $this->webhookPass);
        return response()->json([
            'success' => false,
            // 'token'   => $header,
            'token'   => 11222888888,
            
        ]);
    }

}
