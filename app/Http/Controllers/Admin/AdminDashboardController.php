<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Business;
use App\Models\User;
use App\Models\Invoice;
use App\Models\Customer;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalBusinesses = Business::count();
        $totalUsers      = User::count();
        $totalInvoices   = Invoice::count();
        $totalCustomers  = Customer::count();

        $businesses = Business::withCount([
            'users',
            'customers',
            'invoices'
        ])->latest()->get();

        return view('admin.dashboard', compact(
            'totalBusinesses',
            'totalUsers',
            'totalInvoices',
            'totalCustomers',
            'businesses'
        ));
    }

    
}