<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::where('business_id', Auth::user()->business_id)
                              ->latest()
                              ->get();

        return view('customers.index', compact('customers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
        ]);

        Customer::create([
            'business_id' => Auth::user()->business_id,
            'name'        => $request->name,
            'email'       => $request->email,
            'phone'       => $request->phone,
            'address'     => $request->address,
        ]);

        return redirect()->back();
    }

    public function edit($id)
    {
        $customer = Customer::where('business_id', Auth::user()->business_id)
                            ->findOrFail($id);

        return view('customers.edit', compact('customer'));
    }

    public function update(Request $request, $id)
    {
        $customer = Customer::where('business_id', Auth::user()->business_id)
                            ->findOrFail($id);

        $customer->update($request->only(['name', 'email', 'phone', 'address']));

        return redirect()->route('customers.index');
    }

    public function destroy($id)
    {
        $customer = Customer::where('business_id', Auth::user()->business_id)
                            ->findOrFail($id);

        $customer->delete();

        return redirect()->back();
    }
}