<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Invoice;

class DashboardController extends Controller
{
    public function index()
    {
        $businessId = auth()->user()->business_id;

        // Total semua invoice
        $totalInvoices = Invoice::where('business_id', $businessId)->count();

        // Invoice paid
        $paidInvoices = Invoice::where('business_id', $businessId)
            ->where('status', 'paid')
            ->count();

        // Invoice unpaid (sent + overdue)
        $unpaidInvoices = Invoice::where('business_id', $businessId)
            ->whereIn('status', ['sent', 'overdue'])
            ->count();

        // Total revenue (hanya yang paid)
        $totalRevenue = Invoice::where('business_id', $businessId)
            ->where('status', 'paid')
            ->sum('total_amount');

        // Monthly revenue (berdasarkan issue_date)
        $monthlyRevenue = Invoice::where('business_id', $businessId)
            ->where('status', 'paid')
            ->selectRaw('MONTH(issue_date) as month, SUM(total_amount) as total')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        return view('user.dashboard', compact(
            'totalInvoices',
            'paidInvoices',
            'unpaidInvoices',
            'totalRevenue',
            'monthlyRevenue'
        ));
    }
}
