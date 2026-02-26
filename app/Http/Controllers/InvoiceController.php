<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::where('business_id', Auth::user()->business_id)
            ->with('customer')
            ->latest()
            ->get();

        return view('invoices.index', compact('invoices'));
    }

    public function create()
    {
        $customers = Customer::where('business_id', Auth::user()->business_id)
            ->get();

        return view('invoices.create', compact('customers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'issue_date'  => 'required|date',
            'due_date'    => 'required|date|after_or_equal:issue_date',

            'items' => 'required|array|min:1',
            'items.*.description' => 'required|string',
            'items.*.quantity' => 'required|integer|min:1',
            'items.*.price' => 'required|numeric|min:0',
        ]);

        $businessId = Auth::user()->business_id;

        $customer = Customer::where('business_id', $businessId)
            ->findOrFail($request->customer_id);

        DB::transaction(function () use ($businessId, $customer, $request) {

            // 🔥 Ambil nomor terbesar dengan lock
            $lastInvoice = Invoice::where('business_id', $businessId)
                ->lockForUpdate()
                ->orderByRaw("CAST(SUBSTRING(invoice_number, 5) AS UNSIGNED) DESC")
                ->first();

            $nextNumber = 1;

            if ($lastInvoice) {
                $lastNumber = (int) str_replace('INV-', '', $lastInvoice->invoice_number);
                $nextNumber = $lastNumber + 1;
            }

            $invoiceNumber = 'INV-' . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);

            // Hitung total
            $total = 0;

            foreach ($request->items as $item) {
                $total += $item['quantity'] * $item['price'];
            }

            // Simpan invoice
            $invoice = Invoice::create([
                'business_id'   => $businessId,
                'customer_id'   => $customer->id,
                'invoice_number'=> $invoiceNumber,
                'issue_date'    => $request->issue_date,
                'due_date'      => $request->due_date,
                'total_amount'  => $total,
                'status'        => 'draft',
            ]);

            // Simpan item
            foreach ($request->items as $item) {
                $invoice->items()->create([
                    'description' => $item['description'],
                    'quantity'    => $item['quantity'],
                    'price'       => $item['price'],
                    'subtotal'    => $item['quantity'] * $item['price'],
                ]);
            }
        });

        return redirect()->route('invoices.index');
    }
}