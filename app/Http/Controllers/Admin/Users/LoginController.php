<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.users.login', [
            'title' => 'Đăng Nhập Hệ Thống'
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email:filter',
            'password' => 'required'
        ]);

        if (Auth::attempt([
                'email' => $request->input('email'),
                'password' => $request->input('password'),
                'level' => 'admin',
            ], $request->input('remember'))) {

            return redirect()->route('admin');
        }
        if (Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'level' => 'user',
        ], $request->input('remember'))) {

            return redirect()->route('home');
        }

        Session::flash('error', 'Email hoặc Password không đúng');
        return redirect()->back();
    }
}
