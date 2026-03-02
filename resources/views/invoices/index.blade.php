<x-app-layout>
<div class="min-h-screen bg-gray-50">
<div class="max-w-7xl mx-auto p-10 space-y-10">

<!-- HEADER -->
<div class="flex justify-between items-center">
    <div>
        <h2 class="text-3xl font-bold text-gray-900">
            Invoices
        </h2>
        <p class="text-gray-500 mt-1 text-sm">
            Manage and monitor all your invoices
        </p>
    </div>

    <a href="{{ route('app.invoices.create') }}"
        class="bg-gray-900 text-white px-6 py-3 rounded-2xl text-sm font-semibold shadow hover:bg-gray-800 transition">
        + New Invoice
    </a>
</div>

<!-- MINI STATS -->
<div class="grid grid-cols-1 sm:grid-cols-4 gap-6">

    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
        <p class="text-gray-500 text-sm">Total</p>
        <h3 class="text-2xl font-bold mt-2">{{ $invoices->count() }}</h3>
    </div>

    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
        <p class="text-gray-500 text-sm">Paid</p>
        <h3 class="text-2xl font-bold mt-2 text-green-600">
            {{ $invoices->where('status','paid')->count() }}
        </h3>
    </div>

    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
        <p class="text-gray-500 text-sm">Overdue</p>
        <h3 class="text-2xl font-bold mt-2 text-red-600">
            {{ $invoices->where('status','overdue')->count() }}
        </h3>
    </div>

    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
        <p class="text-gray-500 text-sm">Total Revenue</p>
        <h3 class="text-2xl font-bold mt-2 text-blue-600">
            Rp {{ number_format($invoices->where('status','paid')->sum('total_amount'),0,',','.') }}
        </h3>
    </div>

</div>

<!-- TABLE -->
<div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">

    <div class="p-6 border-b border-gray-100 flex justify-between items-center">
        <h3 class="font-semibold text-gray-800">Invoice List</h3>

        <input type="text"
            placeholder="Search invoice..."
            class="border border-gray-200 rounded-xl px-4 py-2 text-sm focus:ring-2 focus:ring-gray-900 focus:outline-none">
    </div>

    @if($invoices->count() > 0)
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 text-gray-500 uppercase text-xs tracking-wider">
                <tr>
                    <th class="px-8 py-4 text-left">Invoice</th>
                    <th class="px-8 py-4 text-left">Customer</th>
                    <th class="px-8 py-4 text-left">Due Date</th>
                    <th class="px-8 py-4 text-left">Amount</th>
                    <th class="px-8 py-4 text-left">Status</th>
                    <th class="px-8 py-4 text-right">Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($invoices as $invoice)
                <tr class="border-t border-gray-100 hover:bg-gray-50 transition">

                    <td class="px-8 py-5 font-medium text-gray-900">
                        {{ $invoice->invoice_number }}
                    </td>

                    <td class="px-8 py-5 text-gray-600">
                        {{ $invoice->customer->name }}
                    </td>

                    <td class="px-8 py-5 text-gray-600">
                        {{ $invoice->due_date }}
                    </td>

                    <td class="px-8 py-5 font-semibold text-gray-900">
                        Rp {{ number_format($invoice->total_amount,0,',','.') }}
                    </td>

                    <td class="px-8 py-5">
                        <span class="px-3 py-1 rounded-full text-xs font-medium
                        @if($invoice->status=='paid') bg-green-100 text-green-600
                        @elseif($invoice->status=='overdue') bg-red-100 text-red-600
                        @elseif($invoice->status=='sent') bg-blue-100 text-blue-600
                        @else bg-yellow-100 text-yellow-600 @endif">
                            {{ ucfirst($invoice->status) }}
                        </span>
                    </td>

                    <td class="px-8 py-5 text-right">
                        <a href="#" class="text-gray-400 hover:text-gray-900 font-medium text-sm">
                            View
                        </a>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else

    <!-- EMPTY STATE -->
    <div class="p-20 text-center">
        <p class="text-gray-400 mb-4 text-lg">
            No invoices yet
        </p>
        <a href="{{ route('app.invoices.create') }}"
            class="bg-gray-900 text-white px-6 py-3 rounded-xl text-sm font-semibold hover:bg-gray-800 transition">
            Create Your First Invoice
        </a>
    </div>

    @endif

</div>

</div>
</div>
</x-app-layout>