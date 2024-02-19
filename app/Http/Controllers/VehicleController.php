<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.vehicles.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required',
            'capacity' => 'required|integer',
            'unit' => 'required',
            'registration_plate' => 'required',
        ]);

        Vehicle::create([
            'type' => $request->type,
            'capacity' => $request->capacity,
            'unit' => $request->unit,
            'registration_plate' => $request->registration_plate,
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Vehicle added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Vehicle $vehicle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $vehicle = Vehicle::find($id);
        return view('admin.vehicles.edit', compact('vehicle'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'type' => 'required',
            'capacity' => 'required|integer',
            'unit' => 'required',
            'registration_plate' => 'required',
        ]);

        $vehicle = Vehicle::find($id);
        $vehicle->update([
            'type' => $request->type,
            'capacity' => $request->capacity,
            'unit' => $request->unit,
            'registration_plate' => $request->registration_plate,
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Vehicle updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    // app/Http/Controllers/VehicleController.php

    public function delete($id)
    {
        $vehicle = Vehicle::find($id);
        $vehicle->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Vehicle deleted successfully.');
    }
}
