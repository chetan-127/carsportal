<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\LeadResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LeadController extends Controller
{

    public function showForm()
    {
        return view('welcome');
    }

    public function submitForm(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'address' => 'required|string',
            'car_type' => 'nullable|array',
        ]);

        $cars = json_encode($request->car_options);

        // dd($cars);

        // $cars = LeadResponse::findOrFail(14)->car_options;

        // foreach (json_decode($cars) as $car) {
        //     echo $car . "<br>";
        // }

        // dd($cars);

        LeadResponse::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'car_options' => $cars,
        ]);

        return redirect()->back()->with('success', 'Form submitted successfully!');
    }

    public function index()
    {
        $leads = DB::table('car_responses')
            ->orderBy('id', 'desc')
            ->get();

        return view('admin.lead-manager', compact('leads'));
    }
}
