<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    public function index()
    {
        return view('admin.users.register', [
            'title' => 'Đăng ký tài khoản',
        ]);
    }

    public function create (Request $request) {
         $this->validate($request,[
             'name' => 'required',
             'email' => 'required|email:filter',
             'password' => 'required'
         ]);
        if($request->input('password') == $request->input('Retype-password')) {
                User::create([
                    'name' => (string)$request->input('name'),
                    'email' => (string)$request->input('email'),
                    'password' => (string)Hash::make($request->input('password')),
                ]);
                Session::flash('success', 'Dang ky Thanh Cong');
            } else {
                Session::flash('error', 'Dang ky that bai');
            }
        return redirect()->back();
        }

}
