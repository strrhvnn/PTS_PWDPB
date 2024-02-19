<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::all();
        return view('user.booking.customer', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'users_id' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);

        Customer::create([
            'name' => $request->name,
            'users_id'=> $request->users_id,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        return redirect()->route('user.dashboard')->with('success', 'Vehicle added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $customer = Customer::find($id);
        return view('user.booking.edit-customer', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer, $id)
    {
        $request->validate([
            'name' => 'required',
            'users_id' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);

        $customer = Customer::find($id);
        $customer->update([
            'name' => $request->name,
            'users_id'=> $request->users_id,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        return redirect()->route('user.dashboard')->with('success', 'Customer updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $customer = Customer::find($id);
        $customer->delete();

        return redirect()->route('user.dashboard')->with('success', 'Customer deleted successfully.');
    }
}
