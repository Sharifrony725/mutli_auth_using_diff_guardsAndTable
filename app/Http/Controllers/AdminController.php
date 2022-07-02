<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function login(){
        return view('admin.login');
    }
    public function setting()
    {
        return view('admin.settings');
    }
    public function admin_dashboard()
    {
        return view('admin.admin_dashboard');
    }
    public function admin_login_submit(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if (Auth::guard('admin')->attempt($credentials)) {
                return redirect()->route('admin_dashboard');
            }
         else {
            return redirect()->route('admin_login');
        }
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin_login');
    }
}
