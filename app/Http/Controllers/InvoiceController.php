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

            $total = 0;

            foreach ($request->items as $item) {
                $total += $item['quantity'] * $item['price'];
            }

            $invoice = Invoice::create([
                'business_id'   => $businessId,
                'customer_id'   => $customer->id,
                'invoice_number'=> $invoiceNumber,
                'issue_date'    => $request->issue_date,
                'due_date'      => $request->due_date,
                'total_amount'  => $total,
                'status'        => 'draft', // tetap draft saat dibuat
            ]);

            foreach ($request->items as $item) {
                $invoice->items()->create([
                    'description' => $item['description'],
                    'quantity'    => $item['quantity'],
                    'price'       => $item['price'],
                    'subtotal'    => $item['quantity'] * $item['price'],
                ]);
            }
        });

        return redirect()->route('app.invoices.index');
    }


    // 🔥 METHOD KIRIM INVOICE
    public function send(Invoice $invoice)
    {
        $user = Auth::user();

        // Pastikan invoice milik business yang login
        if ($invoice->business_id !== $user->business_id) {
            abort(403);
        }

        // Hanya draft yang bisa dikirim
        if ($invoice->status !== 'draft') {
            return redirect()->route('app.invoices.index');
        }

        $invoice->update([
            'status' => 'unpaid',
        ]);

        return redirect()->route('app.invoices.index');
    }

public function whatsapp(Invoice $invoice)
{
    $user = Auth::user();

    if ($invoice->business_id !== $user->business_id) {
        abort(403);
    }

    $customer = $invoice->customer;

    if (!$customer || !$customer->phone) {
        abort(500, 'Nomor customer belum diisi.');
    }

    $template = \App\Models\MessageTemplate::where(
        'business_id',
        $user->business_id
    )->first();

    if (!$template || empty($template->template)) {
        abort(500, 'Template pesan belum dibuat.');
    }

    $message = $template->template;

    $message = str_replace('{customer}', $customer->name, $message);
    $message = str_replace('{invoice_number}', $invoice->invoice_number, $message);
    $message = str_replace('{total}', number_format($invoice->total_amount, 0, ',', '.'), $message);
    $message = str_replace('{due_date}', \Carbon\Carbon::parse($invoice->due_date)->format('d M Y'), $message);

    $phone = preg_replace('/[^0-9]/', '', $customer->phone);

    if (substr($phone, 0, 1) === '0') {
        $phone = '62' . substr($phone, 1);
    }

    $waUrl = 'https://wa.me/' . $phone . '?text=' . rawurlencode($message);

    return redirect()->away($waUrl);
}
}
}
