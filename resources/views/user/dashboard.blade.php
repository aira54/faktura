<x-app-layout>
<div class="min-h-screen bg-gray-50">

<!-- ================= SKELETON ================= -->
<div id="skeletonLoader" class="max-w-7xl mx-auto px-10 py-12 space-y-12 animate-pulse">

    <!-- Header -->
    <div class="space-y-3">
        <div class="h-4 w-40 bg-gray-200 rounded"></div>
        <div class="h-8 w-72 bg-gray-200 rounded"></div>
        <div class="h-4 w-96 bg-gray-200 rounded"></div>
    </div>

    <!-- Hero -->
    <div class="h-32 bg-gray-200 rounded-3xl"></div>

    <!-- KPI -->
    <div class="grid grid-cols-3 gap-6">
        <div class="h-24 bg-gray-200 rounded-3xl"></div>
        <div class="h-24 bg-gray-200 rounded-3xl"></div>
        <div class="h-24 bg-gray-200 rounded-3xl"></div>
    </div>

    <!-- Charts -->
    <div class="grid grid-cols-3 gap-6">
        <div class="h-72 bg-gray-200 rounded-3xl col-span-2"></div>
        <div class="h-72 bg-gray-200 rounded-3xl"></div>
    </div>

    <!-- Recent -->
    <div class="h-40 bg-gray-200 rounded-3xl"></div>

</div>


<!-- ================= REAL CONTENT ================= -->
<div id="realContent" class="opacity-0 transition-opacity duration-500">

<div class="max-w-7xl mx-auto px-10 py-12 space-y-12">

<!-- HEADER -->
<div class="flex justify-between items-start">
    <div>
        <p class="text-sm text-gray-400">
            {{ now()->format('l, d F Y') }}
        </p>

        <h2 class="text-3xl font-bold text-gray-900 mt-1">
            Good Morning, {{ auth()->user()->name }} 👋
        </h2>

        <p class="text-gray-500 mt-2 text-sm">
            Here’s what’s happening with your business today.
        </p>
    </div>
</div>

<!-- HERO -->
<div class="bg-gradient-to-r from-gray-900 to-gray-800 text-white p-10 rounded-3xl shadow-xl">
    <p class="text-gray-300 text-sm">Total Revenue</p>
    <h2 class="text-4xl font-bold mt-3 tracking-tight">
        Rp {{ number_format($totalRevenue,0,',','.') }}
    </h2>
</div>

<!-- KPI -->
<div class="grid grid-cols-1 sm:grid-cols-3 gap-6">

<div class="bg-white p-6 rounded-3xl border border-gray-100 shadow-sm">
    <p class="text-gray-500 text-sm">Total Invoice</p>
    <h3 class="text-2xl font-bold mt-4">{{ $totalInvoices }}</h3>
</div>

<div class="bg-white p-6 rounded-3xl border border-gray-100 shadow-sm">
    <p class="text-gray-500 text-sm">Paid</p>
    <h3 class="text-2xl font-bold mt-4 text-green-600">
        {{ $paidInvoices }}
    </h3>
</div>

<div class="bg-white p-6 rounded-3xl border border-gray-100 shadow-sm">
    <p class="text-gray-500 text-sm">Unpaid</p>
    <h3 class="text-2xl font-bold mt-4 text-red-500">
        {{ $unpaidInvoices }}
    </h3>
</div>

</div>

<!-- CHARTS -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

<div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100 lg:col-span-2">
    <h3 class="font-semibold mb-6 text-gray-800">Revenue Overview</h3>
    <div id="revenueChart"></div>
</div>

<div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100">
    <h3 class="font-semibold mb-6 text-gray-800">Invoice Status</h3>
    <div id="statusChart"></div>
</div>

</div>

<!-- RECENT -->
<div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100">
<h3 class="font-semibold mb-6 text-gray-800">Recent Invoices</h3>

@if($recentInvoices->count() > 0)
<div class="space-y-4">
@foreach($recentInvoices as $invoice)
<div class="flex justify-between items-center p-4 rounded-2xl hover:bg-gray-50 transition">

    <div>
        <p class="font-medium text-gray-900 text-sm">
            {{ $invoice->invoice_number }}
        </p>
        <p class="text-xs text-gray-500">
            {{ $invoice->customer->name ?? 'Customer' }}
        </p>
    </div>

    <div class="text-right">
        <span class="px-3 py-1 rounded-full text-xs font-medium
        @if($invoice->status=='paid') bg-green-100 text-green-600
        @elseif($invoice->status=='overdue') bg-red-100 text-red-600
        @else bg-yellow-100 text-yellow-600 @endif">
        {{ ucfirst($invoice->status) }}
        </span>

        <p class="text-sm font-semibold text-gray-900 mt-1">
            Rp {{ number_format($invoice->total_amount,0,',','.') }}
        </p>
    </div>

</div>
@endforeach
</div>
@else
<div class="text-center py-12">
    <p class="text-gray-400 text-sm">You're just getting started 🚀</p>
</div>
@endif

</div>

</div>
</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
document.addEventListener("DOMContentLoaded", function(){

    // Simulasi loading halus
    setTimeout(() => {
    document.getElementById("skeletonLoader").classList.add("hidden");

    const content = document.getElementById("realContent");
    content.classList.remove("opacity-0");
    content.classList.add("opacity-100");

    }, 500);

    new ApexCharts(document.querySelector("#revenueChart"), {
    chart:{ type:'area', height:300, toolbar:{show:false}},
    series:[{
    name:'Revenue',
    data: {!! json_encode(array_values($monthlyRevenue->toArray())) !!}
    }],
    xaxis:{
    categories:{!! json_encode(array_keys($monthlyRevenue->toArray())) !!}
    },
    stroke:{curve:'smooth'},
    colors:['#111827'],
    fill:{type:'gradient'}
    }).render();

    new ApexCharts(document.querySelector("#statusChart"), {
    chart:{ type:'donut', height:280},
    series:{!! json_encode(array_values($statusData->toArray())) !!},
    labels:{!! json_encode(array_keys($statusData->toArray())) !!},
    colors:['#16A34A','#EAB308','#DC2626','#3B82F6']
    }).render();

});
</script>

</x-app-layout>