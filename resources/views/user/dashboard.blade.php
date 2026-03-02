<x-app-layout>
    <div class="max-w-7xl mx-auto p-6 space-y-8">

        <!-- Header -->
        <div>
            <h2 class="text-3xl font-bold text-gray-800">Dashboard</h2>
            <p class="text-gray-500 mt-1">Ringkasan performa bisnis kamu</p>
        </div>

        <!-- Statistik -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

            <div class="bg-white p-6 rounded-2xl shadow-sm">
                <p class="text-gray-500 text-sm">Total Invoice</p>
                <h3 class="text-2xl font-bold mt-2">{{ $totalInvoices }}</h3>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow-sm">
                <p class="text-gray-500 text-sm">Invoice Paid</p>
                <h3 class="text-2xl font-bold text-green-600 mt-2">{{ $paidInvoices }}</h3>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow-sm">
                <p class="text-gray-500 text-sm">Invoice Unpaid</p>
                <h3 class="text-2xl font-bold text-red-500 mt-2">{{ $unpaidInvoices }}</h3>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow-sm">
                <p class="text-gray-500 text-sm">Total Revenue</p>
                <h3 class="text-2xl font-bold text-blue-600 mt-2">
                    Rp {{ number_format($totalRevenue, 0, ',', '.') }}
                </h3>
            </div>

        </div>

        <!-- Charts -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            <!-- Revenue Chart -->
            <div class="bg-white p-6 rounded-2xl shadow-sm lg:col-span-2">
                <h3 class="font-semibold mb-4">Revenue Per Bulan</h3>
                <div id="revenueChart"></div>
            </div>

            <!-- Status Chart -->
            <div class="bg-white p-6 rounded-2xl shadow-sm">
                <h3 class="font-semibold mb-4">Status Invoice</h3>
                <div id="statusChart"></div>
            </div>

        </div>

    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {

            // Revenue Chart
            var revenueOptions = {
                chart: {
                    type: 'area',
                    height: 300,
                    toolbar: {
                        show: false
                    }
                },
                series: [{
                    name: 'Revenue',
                    data: {!! json_encode(array_values($monthlyRevenue->toArray())) !!}
                }],
                xaxis: {
                    categories: {!! json_encode(array_keys($monthlyRevenue->toArray())) !!}
                },
                colors: ['#3B82F6'],
                stroke: {
                    curve: 'smooth'
                }
            };

            new ApexCharts(document.querySelector("#revenueChart"), revenueOptions).render();


            // Status Chart
            var statusOptions = {
                chart: {
                    type: 'donut',
                    height: 300
                },
                series: [{{ $paidInvoices }}, {{ $unpaidInvoices }}],
                labels: ['Paid', 'Unpaid'],
                colors: ['#22C55E', '#EF4444']
            };

            new ApexCharts(document.querySelector("#statusChart"), statusOptions).render();

        });
    </script>

</x-app-layout>
