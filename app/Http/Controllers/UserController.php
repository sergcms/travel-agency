<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function validUniqueEmail(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'email' => ['required', 'unique:users'],
        ]);
        
        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }

        return '';
    }
    
    public function list()
    {
        $users = User::all();

        return view('users', ['users' => $users]);
    }

    public function listAgentUsers()
    {
        $users = User::where('role', '!=', 'admin')
            ->get();

        return view('users', ['users' => $users]);
    }

    public function create(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role, 
            'travel_agency_id' => !(int)$request->travel_agency_id ? null : (int)$request->travel_agency_id,
        ]);

        return redirect(route('users'));
    }

    public function show($id = '')
    {
        $roles = [
            'admin', 
            'agent', 
            'client',
        ];
        
        if ($id) {
            $user = User::find($id);

            return view('form.user', ['user' => $user, 'id' => $id, 'roles' => $roles, 'isblock' => $user->block]);
        }

        return view('form.user', ['roles' => $roles, 'isblock' => 0]);
    }

    public function update(Request $request, $id)
    {
        User::where('id', $id)
            ->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role, 
            'travel_agency_id' => !(int)$request->travel_agency_id ? null : (int)$request->travel_agency_id,
            'block' => $request->block === '1' ? 1 : 0,
        ]);

        return redirect(route('users'));
    }
   
    public function delete($id)
    {
        User::find($id)->delete();
        
        return redirect(route('users'));
    }
}
