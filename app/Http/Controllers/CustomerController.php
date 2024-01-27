<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Models\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::paginate(5);
        return view('customer_table', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customer_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerRequest $request)
    {
        $request->validated();
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photo_name = time() . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('images'), $photo_name);
        } else {
            $photo_name = 'default.png';
        }
        Customer::create([
            'photo' => $photo_name,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address
        ]);
        return redirect()->route('customer_table')->with('success', 'Customer created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        $customer = Customer::findOrFail($customer->id);
        return view('customer_read', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        $customer = Customer::findOrFail($customer->id);
        return view('customer_edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        $request->validated();
        $customer = Customer::findOrFail($customer->id);
        if ($request->hasFile('photo')) {

            // Delete old photo
            $old_photo = public_path('images') . '/' . $customer->photo;
            if (file_exists($old_photo)) {
                unlink($old_photo);
            }

            $photo = $request->file('photo');
            $photo_name = time() . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('images'), $photo_name);
        } else {
            $photo_name = $customer->photo;
        }
        $customer->update([
            'photo' => $photo_name,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address
        ]);
        return redirect()->route('customer_table')->with('success', 'Customer updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        $customer = Customer::findOrFail($customer->id);

        // Delete photo
        $old_photo = public_path('images') . '/' . $customer->photo;
        if (file_exists($old_photo)) {
            unlink($old_photo);
        }

        $customer->delete();
        return redirect()->route('customer_table')->with('success', 'Customer deleted successfully.');
    }
}
