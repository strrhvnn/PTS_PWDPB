<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Customer;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $userId = Auth::id();

        // Mendapatkan data pelanggan yang terkait dengan pengguna yang login
        $userCustomer = Customer::where('users_id', $userId)->get();
        $vehicle = Vehicle::find($id);
        return view('user.booking.add', compact(['userCustomer', 'vehicle']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function confirm($id)
    {
        $booking = Booking::find($id);

        if ($booking) {
            // Update status pembayaran menjadi 'Berhasil'
            $booking->status_booking = 'success';
            $booking->save();
        }

        // Redirect atau tampilkan pesan berhasil konfirmasi
        return redirect()->route('admin.laporan')->with('success', 'Pembayaran berhasil dikonfirmasi.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required',
            'users_id' => 'required',
            'vehicle_id' => 'required',
            'pickup_date' => 'required',
            'return_date' => 'required',
            'pickup_location' => 'required',
            'return_location' => 'required',
            'status_booking' => 'required',
        ]);

        Booking::create([
            'customer_id' =>  $request->customer_id,
            'users_id' => $request->users_id,
            'vehicle_id' => $request->vehicle_id,
            'pickup_date' => $request->pickup_date,
            'return_date' => $request->return_date,
            'pickup_location' => $request->pickup_location,
            'return_location' => $request->return_location,
            'status_booking' => $request->status_booking,
        ]);

        return redirect()->route('user.dashboard')->with('success', 'Vehicle added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        $bookings = Booking::all();
        return view('user.booking.list', compact('bookings'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        //
    }
}
