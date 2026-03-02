<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Business;
use App\Models\Invoice;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();

        $totalBusinesses = Business::count();

        $totalInvoices = Invoice::count();

        $totalRevenue = Invoice::where('status', 'paid')->sum('total');

        $recentUsers = User::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalUsers',
            'totalBusinesses',
            'totalInvoices',
            'totalRevenue',
            'recentUsers'
        ));
    }
}
