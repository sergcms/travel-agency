<?php

namespace App\Http\Controllers\Client;

use App\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class TourController extends Controller
{
    public function list()
    {
        $tours = DB::table('users_tours')
            ->select('users_tours.id as user_tour_id', 'users.*', 'tours.id as tour_id', 'tours.*')
            ->rightjoin('users', 'users.id', '=', 'users_tours.user_id')
            ->rightjoin('tours', 'tours.id', '=', 'users_tours.tour_id')
            ->where('users.id', auth()->user()->id)
            ->get();

        return view('tour', ['tours' => $tours]);
    }
}
