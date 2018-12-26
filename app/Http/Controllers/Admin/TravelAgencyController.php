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
    
    public function showForm()
    {
        return view('forms.agency-create');
    }
    
    public function list()
    {
        $agencies = TravelAgency::all();

        return view('agency', ['agencies' => $agencies]);
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

        return redirect(route('agency'));
    }

    public function editForm($id)
    {
        $agency = TravelAgency::find($id);
        
        return view('forms.agency-edit', ['agency' => $agency, 'id' => $id]);
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

        return redirect(route('agency'));
    }

    public function delete($id)
    {
        TravelAgency::findorFail($id)->delete();
        
        return redirect(route('agency'));
    }
}
