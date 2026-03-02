<x-app-layout>
<div class="min-h-screen bg-gray-50">
<div class="max-w-7xl mx-auto px-10 py-12 space-y-12">

<!-- HEADER -->
<div class="flex justify-between items-center">
    <div>
        <h2 class="text-3xl font-bold text-gray-900">
            Invoices
        </h2>
        <p class="text-gray-500 mt-2 text-sm">
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

    <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100">
        <p class="text-gray-500 text-sm">Total</p>
        <h3 class="text-2xl font-bold mt-3">{{ $invoices->count() }}</h3>
    </div>

    <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100">
        <p class="text-gray-500 text-sm">Paid</p>
        <h3 class="text-2xl font-bold mt-3 text-green-600">
            {{ $invoices->where('computed_status','paid')->count() }}
        </h3>
    </div>

    <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100">
        <p class="text-gray-500 text-sm">Overdue</p>
        <h3 class="text-2xl font-bold mt-3 text-red-600">
            {{ $invoices->where('computed_status','overdue')->count() }}
        </h3>
    </div>

    <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100">
        <p class="text-gray-500 text-sm">Revenue</p>
        <h3 class="text-2xl font-bold mt-3 text-blue-600">
            Rp {{ number_format($invoices->where('computed_status','paid')->sum('total_amount'),0,',','.') }}
        </h3>
    </div>

</div>


<!-- TABLE CARD -->
<div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">

    <div class="p-8 border-b border-gray-100 flex justify-between items-center">
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
                    <th class="px-8 py-5 text-left">Invoice</th>
                    <th class="px-8 py-5 text-left">Customer</th>
                    <th class="px-8 py-5 text-left">Due Date</th>
                    <th class="px-8 py-5 text-left">Amount</th>
                    <th class="px-8 py-5 text-left">Status</th>
                    <th class="px-8 py-5 text-right">Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($invoices as $invoice)
                <tr class="border-t border-gray-100 hover:bg-gray-50 transition">

                    <!-- Invoice -->
                    <td class="px-8 py-6 font-semibold text-gray-900">
                        {{ $invoice->invoice_number }}
                    </td>

                    <!-- Customer -->
                    <td class="px-8 py-6 text-gray-600">
                        {{ $invoice->customer->name }}
                    </td>

                    <!-- Due -->
                    <td class="px-8 py-6 text-gray-600">
                        {{ \Carbon\Carbon::parse($invoice->due_date)->format('d M Y') }}
                    </td>

                    <!-- Amount -->
                    <td class="px-8 py-6 font-semibold text-gray-900">
                        Rp {{ number_format($invoice->total_amount,0,',','.') }}
                    </td>

                    <!-- Status -->
                    <td class="px-8 py-6">
                        <span class="px-3 py-1 rounded-full text-xs font-medium
                        @if($invoice->computed_status=='paid') bg-green-100 text-green-600
                        @elseif($invoice->computed_status=='overdue') bg-red-100 text-red-600
                        @elseif($invoice->status=='draft') bg-gray-100 text-gray-600
                        @else bg-yellow-100 text-yellow-600 @endif">
                            {{ ucfirst($invoice->computed_status ?? $invoice->status) }}
                        </span>
                    </td>

                    <!-- Actions -->
                    <td class="px-8 py-6 text-right space-x-4">

                        {{-- Draft → Send --}}
                        @if($invoice->status === 'draft')
                        <form method="POST"
                            action="{{ route('app.invoices.send', $invoice) }}"
                            class="inline">
                            @csrf
                            @method('PATCH')
                            <button class="text-blue-600 hover:text-blue-800 text-sm font-semibold">
                                Send
                            </button>
                        </form>
                        @endif

                        {{-- Not paid → WA --}}
                        @if($invoice->status !== 'draft' && $invoice->computed_status !== 'paid')
                        <a href="{{ route('app.invoices.whatsapp', $invoice) }}"
                            class="text-green-600 hover:text-green-800 text-sm font-semibold">
                            WhatsApp
                        </a>
                        @endif

                        <a href="#"
                            class="text-gray-400 hover:text-gray-900 text-sm font-medium">
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
    <div class="p-24 text-center">
        <p class="text-gray-400 text-lg mb-6">
            You're just getting started 🚀
        </p>
        <a href="{{ route('app.invoices.create') }}"
            class="bg-gray-900 text-white px-6 py-3 rounded-2xl text-sm font-semibold hover:bg-gray-800 transition">
            Create Your First Invoice
        </a>
    </div>

    @endif

</div>

</div>
</div>
</x-app-layout>