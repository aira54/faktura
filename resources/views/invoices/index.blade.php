<x-app-layout>
    <div class="max-w-5xl mx-auto p-6">

        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold">Invoice List</h2>

            <a href="{{ route('app.invoices.create') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded-lg shadow">
                + New Invoice
            </a>
        </div>

        <div class="space-y-4">
            @forelse ($invoices as $invoice)

                <div class="border p-5 rounded-lg bg-white shadow-sm">

                    <div class="flex justify-between items-start">

                        <div>
                            <div class="font-bold text-lg">
                                {{ $invoice->invoice_number }}
                            </div>

                            <div class="text-sm text-gray-600 mt-1">
                                Customer: {{ $invoice->customer->name }}
                            </div>

                            <div class="text-sm mt-1">
                                Status:
                                @if($invoice->computed_status === 'paid')
                                    <span class="text-green-600 font-semibold">Paid</span>
                                @elseif($invoice->computed_status === 'overdue')
                                    <span class="text-red-600 font-semibold">Overdue</span>
                                @elseif($invoice->computed_status === 'draft')
                                    <span class="text-gray-500 font-semibold">Draft</span>
                                @else
                                    <span class="text-yellow-600 font-semibold">Unpaid</span>
                                @endif
                            </div>

                            <div class="text-sm text-gray-500 mt-1">
                                Due: {{ \Carbon\Carbon::parse($invoice->due_date)->format('d M Y') }}
                            </div>
                        </div>


                        <!-- ACTIONS -->
                        <div class="flex flex-col gap-2 items-end">

                            {{-- Draft → bisa kirim invoice --}}
                            @if($invoice->status === 'draft')
                                <form method="POST" action="{{ route('app.invoices.send', $invoice) }}">
                                    @csrf
                                    @method('PATCH')
                                    <button
                                        class="text-blue-600 hover:text-blue-800 text-sm font-semibold">
                                        Kirim Invoice
                                    </button>
                                </form>
                            @endif


                            {{-- Setelah terkirim & belum paid → bisa kirim WA --}}
                            @if($invoice->status !== 'draft' && $invoice->computed_status !== 'paid')
                                <a href="{{ route('app.invoices.whatsapp', $invoice) }}"
   class="text-green-600 hover:text-green-800 text-sm font-semibold">
    Kirim WhatsApp
</a>
                            @endif

                        </div>

                    </div>

                </div>

            @empty
                <div class="text-gray-500 text-center py-10">
                    Belum ada invoice.
                </div>
            @endforelse
        </div>

    </div>
</x-app-layout>