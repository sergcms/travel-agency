<?php

namespace App\Http\Controllers\Admin;

use App\TravelAgency;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class TravelAgencyController extends Controller
{
    public function index()
    {
        return view('welcome');
    }
    
    public function show($id = '')
    {
        if ($id) {
            $agency = TravelAgency::find($id);

            return view('form.agency', ['agency' => $agency, 'id' => $id]);
        }

        return view('form.agency');
    }
    
    public function list()
    {
        $agencies = TravelAgency::all();

        return view('agencies', ['agencies' => $agencies]);
    }

    protected function validator(Request $request)
    {
        return $this->validate($request, [
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => ['required', 'numeric', 'min:10'],
        ]);
    }

    public function create(Request $request)
    {
        $this->validator($request);      
                
        TravelAgency::create([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
        ]);

        return redirect(route('agencies'));
    }

    public function update(Request $request, $id)
    {
        $this->validator($request);
        
        TravelAgency::where('id', $id)
            ->update([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
        ]);

        return redirect(route('agencies'));
    }

    public function delete($id)
    {
        TravelAgency::findOrFail($id)->delete();
        
        return redirect(route('agencies'));
    }
}
