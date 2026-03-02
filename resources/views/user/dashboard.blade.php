<x-app-layout>
<div class="min-h-screen bg-gray-50">
<div class="max-w-7xl mx-auto p-10 space-y-10">

<!-- HEADER -->
<div>
    <h2 class="text-3xl font-bold text-gray-900">
        Halo, {{ auth()->user()->name }} 👋
    </h2>
    <p class="text-gray-500 mt-1">
        Berikut ringkasan bisnis kamu hari ini
    </p>
</div>

<!-- HERO -->
<div class="bg-gradient-to-r from-gray-900 to-gray-800 text-white p-8 rounded-3xl shadow-xl">
    <p class="text-gray-300 text-sm">Total Revenue</p>
    <h2 class="text-4xl font-bold mt-2">
        Rp {{ number_format($totalRevenue,0,',','.') }}
    </h2>
</div>

<!-- KPI -->
<div class="grid grid-cols-1 sm:grid-cols-3 gap-6">

<div class="bg-white p-6 rounded-2xl shadow-sm border">
    <p class="text-gray-500 text-sm">Total Invoice</p>
    <h3 class="text-2xl font-bold mt-2">{{ $totalInvoices }}</h3>
</div>

<div class="bg-white p-6 rounded-2xl shadow-sm border">
    <p class="text-gray-500 text-sm">Paid</p>
    <h3 class="text-2xl font-bold mt-2 text-green-600">
        {{ $paidInvoices }}
    </h3>
</div>

<div class="bg-white p-6 rounded-2xl shadow-sm border">
    <p class="text-gray-500 text-sm">Unpaid</p>
    <h3 class="text-2xl font-bold mt-2 text-red-500">
        {{ $unpaidInvoices }}
    </h3>
</div>

</div>

<!-- CHART -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

<div class="bg-white p-6 rounded-2xl shadow-sm border lg:col-span-2">
    <h3 class="font-semibold mb-4">Revenue Per Bulan</h3>
    <div id="revenueChart"></div>
</div>

<div class="bg-white p-6 rounded-2xl shadow-sm border">
    <h3 class="font-semibold mb-4">Status Invoice</h3>
    <div id="statusChart"></div>
</div>

</div>

<!-- RECENT -->
<div class="bg-white p-6 rounded-2xl shadow-sm border">
<h3 class="font-semibold mb-4">Invoice Terbaru</h3>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

        <script>
            document.addEventListener("DOMContentLoaded", function () {

                // Revenue Chart
                const revenueOptions = {
                    chart: {
                        type: 'area',
                        height: 300,
                        toolbar: { show: false }
                    },
                    series: [{
                        name: 'Revenue',
                        data: @json(array_values($monthlyRevenue->toArray()))
                    }],
                    xaxis: {
                        categories: @json(array_keys($monthlyRevenue->toArray()))
                    },
                    colors: ['#3B82F6'],
                    stroke: { curve: 'smooth' }
                };

                new ApexCharts(
                    document.querySelector("#revenueChart"),
                    revenueOptions
                ).render();
<table class="w-full text-sm">
<thead class="text-gray-500 border-b">
<tr>
<th class="pb-3 text-left">Invoice</th>
<th>Status</th>
<th>Total</th>
</tr>
</thead>
<tbody>
@foreach($recentInvoices as $invoice)
<tr class="border-b hover:bg-gray-50">
<td class="py-3">{{ $invoice->invoice_number }}</td>
<td>
<span class="px-3 py-1 rounded-full text-xs
@if($invoice->status=='paid') bg-green-100 text-green-600
@elseif($invoice->status=='overdue') bg-red-100 text-red-600
@else bg-yellow-100 text-yellow-600 @endif">
{{ ucfirst($invoice->status) }}
</span>
</td>
<td>Rp {{ number_format($invoice->total_amount,0,',','.') }}</td>
</tr>
@endforeach
</tbody>
</table>
</div>

</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
document.addEventListener("DOMContentLoaded", function(){

// Revenue
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

                // Status Chart
                const statusOptions = {
                    chart: {
                        type: 'donut',
                        height: 300
                    },
                    series: [{{ $paidInvoices }}, {{ $unpaidInvoices }}],
                    labels: ['Paid', 'Unpaid'],
                    colors: ['#22C55E', '#EF4444']
                };

                new ApexCharts(
                    document.querySelector("#statusChart"),
                    statusOptions
                ).render();

            });
        </script>
    @endpush

// Status
new ApexCharts(document.querySelector("#statusChart"), {
chart:{ type:'donut', height:300},
series:{!! json_encode(array_values($statusData->toArray())) !!},
labels:{!! json_encode(array_keys($statusData->toArray())) !!},
colors:['#16A34A','#EAB308','#DC2626','#3B82F6']
}).render();

});
</script>

</x-app-layout>