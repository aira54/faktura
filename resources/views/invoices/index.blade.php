<x-app-layout>
    <div class="max-w-5xl mx-auto p-6">

        <div class="flex justify-between mb-4">
            <h2 class="text-xl font-bold">Invoice List</h2>
           <a href="{{ route('invoices.create') }}"
   class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded shadow">
    + New Invoice
</a>
        </div>

        <div class="space-y-3">
            @foreach($invoices as $invoice)
                <div class="border p-4 rounded">
                    <strong>{{ $invoice->invoice_number }}</strong><br>
                    Customer: {{ $invoice->customer->name }}<br>
                    Status: {{ $invoice->status }}<br>
                    Due: {{ $invoice->due_date }}
                </div>
            @endforeach
        </div>

    </div>
</x-app-layout>