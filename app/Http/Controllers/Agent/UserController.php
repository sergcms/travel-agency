<?php

namespace App\Http\Controllers\Agent;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
    public function list()
    {
        $users = User::leftJoin('roles', 'roles.id', '=', 'users.role_id')
            ->select('users.*','roles.name as role')
            ->where('users.role_id', '!=', 1)
            ->orderBy('id', 'asc')
            ->get();

        return view('user', ['users' => $users]);
    }
}
