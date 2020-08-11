<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function __construct()
    {
        
    }

    public function index()
    {
        return view('admin.login.index');
    }

    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        $checked = false;
        if(\Auth::guard('admin')->attempt([
            'email' => $email,
            'password' => $password,
            'role' => 1
        ], true)) {
            $checked = true;
            \Auth::guard('admin');
            // dd(111, \Auth::guard('admin')->check(), \Auth::guard('admin')->user()->name);
        }
        return redirect(route('admin.category.index'));
    }

    public function temp()
    {
        User::create([
            'name' => 'Tuan Anh',
            'email' => 'trantuananh198610@gmail.com',
            'password' => bcrypt('gaster59'),
            'role' => 1, // admin
            'token' => ''
        ]);
    }
}
