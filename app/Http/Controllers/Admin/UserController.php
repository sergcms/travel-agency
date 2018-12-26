<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function list()
    {
        $users = User::leftJoin('roles', 'roles.id', '=', 'users.role_id')
            ->select('users.*','roles.name as role')
            ->orderBy('id', 'asc')
            ->get();

        return view('user', ['users' => $users]);
    }

    public function create(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => (int)$request->role, 
            'travel_agency_id' => !(int)$request->travel_agency_id ? null : (int)$request->travel_agency_id,
        ]);

        return redirect(route('user'));
    }

    public function showForm()
    {
        $roles = Role::all();

        return view('forms.user-create', ['roles' => $roles]);
    }

    public function editForm($id)
    {
        $user = User::find($id);
        $roles = Role::all();

        return view('forms.user-edit', ['user' => $user, 'id' => $id, 'roles' => $roles]);
    }

    public function update(Request $request, $id)
    {
        User::where('id', $id)
            ->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => (int)$request->role, 
            'travel_agency_id' => !(int)$request->travel_agency_id ? null : (int)$request->travel_agency_id,
            'block' => $request->block === '1' ? 1 : 0,
        ]);

        return redirect(route('user'));
    }
   
    public function delete($id)
    {
        User::find($id)->delete();
        
        return redirect(route('user'));
    }
}
