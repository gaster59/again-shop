<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function __construct()
    {

    }

    public function index()
    {
        $auth = \Auth::guard('admin')->user();
        if (!is_null($auth)) {
            return redirect(route('admin.category.index'));    
        }
        return view('admin.login.index');
    }

    public function login(Request $request)
    {
        $checked = false;
        if (\Auth::guard('admin')->attempt([
            'email'    => $request->email,
            'password' => $request->password,
            'role'     => 1,
        ], true)) {
            $checked = true;
            \Auth::guard('admin');
        }
        return redirect(route('admin.category.index'));
    }

    public function logout(Request $request)
    {
        \Auth::guard('admin')->logout();
        return redirect(route('admin.login.index'));
    }

    public function temp()
    {
        User::create([
            'name'     => 'Tuan Anh',
            'email'    => 'trantuananh198610@gmail.com',
            'password' => bcrypt('gaster59'),
            'role'     => 1, // admin
             'token'    => '',
        ]);
    }
}
