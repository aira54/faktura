<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $business = auth()->user()->business;

        // KPI
        $totalInvoices = $business->invoices()->count();

        $paidInvoices = $business->invoices()
            ->where('status', 'paid')
            ->count();

        $unpaidInvoices = $business->invoices()
            ->whereIn('status', ['draft','sent','overdue'])
            ->count();

        $totalRevenue = $business->invoices()
            ->where('status','paid')
            ->sum('total_amount');

        // Revenue per bulan
        $monthlyRevenue = $business->invoices()
            ->where('status','paid')
            ->selectRaw('MONTH(issue_date) as month, SUM(total_amount) as total')
            ->groupBy('month')
            ->pluck('total','month');

        // Status Chart
        $statusData = $business->invoices()
            ->select('status', DB::raw('count(*) as total'))
            ->groupBy('status')
            ->pluck('total','status');

        // Recent
        $recentInvoices = $business->invoices()
            ->latest()
            ->take(5)
            ->get();

        return view('user.dashboard', compact(
            'totalInvoices',
            'paidInvoices',
            'unpaidInvoices',
            'totalRevenue',
            'monthlyRevenue',
            'statusData',
            'recentInvoices'
        ));
    }
}
