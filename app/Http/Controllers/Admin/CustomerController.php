<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::latest()->get();
        return view('admin.customers.index', compact('customers'));
    }

    public function create()
    {
        return view('admin.customers.create');
    }

 public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email',
    ]);

    $exists = \App\Models\Customer::where('email', $request->email)->first();

    if ($exists) {
        return redirect()->back()
            ->withInput()
            ->with('warning', 'Email sudah terdaftar sebagai customer.');
    }

    \App\Models\Customer::create($request->all());

    return redirect()->route('admin.customers.index')
        ->with('success', 'Customer berhasil ditambahkan.');
}

    public function edit(Customer $customer)
    {
        return view('admin.customers.edit', compact('customer'));
    }

 public function update(Request $request, Customer $customer)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email',
    ]);

    $exists = \App\Models\Customer::where('email', $request->email)
                ->where('id', '!=', $customer->id)
                ->first();

    if ($exists) {
        return redirect()->back()
            ->withInput()
            ->with('warning', 'Email sudah digunakan customer lain.');
    }

    $customer->update($request->all());

    return redirect()->route('admin.customers.index')
        ->with('success', 'Customer berhasil diupdate.');
}
    public function destroy(Customer $customer)
    {
        $customer->delete();

        return back();
    }
}