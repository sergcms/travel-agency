<?php

namespace App\Http\Controllers\Agent;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\UsersTour;

class UsersTourController extends Controller
{
    public function showForm()
    {
        return view('forms.users-tours-create');
    }

    public function create(Request $request)
    {
        UsersTour::create([
            'user_id' => $request->user_id,
            'tour_id' => $request->tour_id,
        ]);
        
        return redirect(route('tour'));
    }

    public function editForm($id)
    {
        $assign = UsersTour::find($id);

        return view('forms.users-tours-edit', ['assign' => $assign, 'id' => $id]);
    }

    public function update(Request $request, $id)
    {
        UsersTour::where('id', $id)
            ->update([
                'user_id' => $request->user_id,
                'tour_id' => $request->tour_id,
            ]);
        
        return redirect(route('tour'));
    }
}
