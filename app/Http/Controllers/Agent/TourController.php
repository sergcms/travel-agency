<?php

namespace App\Http\Controllers\Agent;

use App\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class TourController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function list()
    {
        $tours = DB::table('users_tours')
            ->select('users_tours.id as user_tour_id', 'users.*', 'tours.id as tour_id', 'tours.*')
            ->rightjoin('users', 'users.id', '=', 'users_tours.user_id')
            ->rightjoin('tours', 'tours.id', '=', 'users_tours.tour_id')
            ->get();

        return view('tour', ['tours' => $tours]);
    }

    protected function validator(Request $request)
    {
        return $this->validate($request, [
            'country' => ['required', 'string', 'min:3', 'max:50'],
            'city' => ['required', 'string', 'min:3', 'max:50'],
            'hotel' => ['required', 'string', 'min:3', 'max:100'],
            'people' => ['required', 'numeric'],
            'price' => ['required', 'numeric'], 
        ]);
    }

    public function showForm()
    {
        return view('forms.tour-create');
    }

    public function create(Request $request)
    {
        $this->validator($request);
        
        Tour::create([
            'country' => $request->country, 
            'city' => $request->city, 
            'hotel' => $request->hotel, 
            'food' => $request->food, 
            'people' => (int)$request->people, 
            'price' => (float)$request->price, 
            'date_start' => $request->date_start, 
            'date_end' => $request->date_end, 
            'status' => $request->status, 
        ]);

        return redirect(route('tour'));
    }

    public function editForm($id)
    {
        $tour = Tour::findorFail($id);

        $collectionStatus = [
            'Waiting payment',
            'Paid',
            'Completed',
        ];

        return view('forms.tour-edit', ['tour' => $tour, 'id' => $id, 'collectionStatus' => $collectionStatus]);
    }

    public function update(Request $request, $id)
    {
        $this->validator($request);
        
        Tour::where('id', $id)
            ->update([
                'country' => $request->country, 
                'city' => $request->city, 
                'hotel' => $request->hotel, 
                'food' => $request->food, 
                'people' => (int)$request->people, 
                'price' => (float)$request->price, 
                'date_start' => $request->date_start, 
                'date_end' => $request->date_end, 
                'status' => $request->status, 
            ]);

        return redirect(route('tour'));
    }
}
