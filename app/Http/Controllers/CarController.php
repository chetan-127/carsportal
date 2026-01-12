<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::get();

        return view('admin.car-manager', compact('cars'));
    }
    public function create()
    {
        return view('admin.add-cars');
    }

    public function store(Request $request)
    {
        $request->validate([
            'make'      => 'required|string|max:255',
            'model'     => 'required|string|max:255',
            'year'      => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'color'     => 'nullable|string|max:100',
            'price'     => 'required|numeric',
            'mileage'   => 'nullable|numeric',
            'fuel_type' => 'nullable|string|max:50',
            'car_type'  => 'required|string',
            'image'     => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // dd($request->all());

        $imagePath = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image');

            $filename = time() . '.' . $image->getClientOriginalExtension();

            $image->move(public_path('cars'), $filename);

            $imagePath = 'cars/' . $filename;
        }

        Car::create([
            'make'         => $request->make,
            'model'        => $request->model,
            'year'         => $request->year,
            'color'        => $request->color,
            'price'        => $request->price,
            'mileage'      => $request->mileage,
            'fuel_type'    => $request->fuel_type,
            'car_type'     => $request->car_type,
            'listing_type' => 'latest',
            'image'        => $imagePath,
        ]);


        return redirect()->back()->with('success', 'Car added successfully');
    }


    public function edit(Car $car)
    {
        return view('admin.edit-cars', compact('car'));
    }


    public function update(Request $request, Car $car)
    {
        $request->validate([
            'make'      => 'required|string|max:255',
            'model'     => 'required|string|max:255',
            'year'      => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'color'     => 'nullable|string|max:100',
            'price'     => 'required|numeric',
            'mileage'   => 'nullable|numeric',
            'fuel_type' => 'nullable|string|max:50',
            'car_type'  => 'nullable|string|max:50',
            'image'     => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($car->image && file_exists(public_path($car->image))) {
                file::delete(public_path($car->image));
            }
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('cars'), $filename);
            $car->image = 'cars/' . $filename;
        }

        $car->update([
            'make'      => $request->make,
            'model'     => $request->model,
            'year'      => $request->year,
            'color'     => $request->color,
            'price'     => $request->price,
            'mileage'   => $request->mileage,
            'fuel_type' => $request->fuel_type,
            'car_type'  => $request->car_type,
            'image'     => $car->image,
        ]);

        return redirect()->back()->with('success', 'Car updated successfully');
    }

    public function destroy(Car $car)
    {
        if ($car->image && Storage::disk('public')->exists($car->image)) {
            Storage::disk('public')->delete($car->image);
        }

        $car->delete();

        return redirect()->back()->with('success', 'Car deleted successfully');
    }
}
