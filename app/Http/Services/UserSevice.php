<?php

namespace App\Http\Services;

use App\Models\User;

class UserSevice
{
    public function get()
    {
        return User::orderBy('id','ASC')->paginate(15);
    }
}
