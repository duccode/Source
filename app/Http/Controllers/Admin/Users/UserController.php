<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Http\Services\UserSevice;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $UserService;

    public function __construct(UserSevice $UserService)
    {
        $this->UserService = $UserService;
    }

    public function index()
    {
        return view('admin.member.list', [
            'title' => 'Danh Sách User Mới Nhất',
            'users' => $this->UserService->get()
        ]);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {

    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
