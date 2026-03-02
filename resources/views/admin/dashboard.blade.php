<x-app-layout>
    <div class="max-w-7xl mx-auto p-6 space-y-8">

        <!-- Header -->
        <div>
            <h2 class="text-3xl font-bold text-gray-800">Admin Dashboard</h2>
            <p class="text-gray-500 mt-1">Overview sistem Faktura</p>
        </div>

        <!-- Statistik Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

            <div class="bg-white p-6 rounded-2xl shadow-sm hover:shadow-md transition">
                <p class="text-sm text-gray-500">Total Businesses</p>
                <h3 class="text-2xl font-bold text-blue-600 mt-2">
                    {{ $totalBusinesses }}
                </h3>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow-sm hover:shadow-md transition">
                <p class="text-sm text-gray-500">Total Users</p>
                <h3 class="text-2xl font-bold text-green-600 mt-2">
                    {{ $totalUsers }}
                </h3>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow-sm hover:shadow-md transition">
                <p class="text-sm text-gray-500">Total Invoices</p>
                <h3 class="text-2xl font-bold text-purple-600 mt-2">
                    {{ $totalInvoices }}
                </h3>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow-sm hover:shadow-md transition">
                <p class="text-sm text-gray-500">Total Customers</p>
                <h3 class="text-2xl font-bold text-red-500 mt-2">
                    {{ $totalCustomers }}
                </h3>
            </div>

        </div>

        <!-- Business List -->
        <div class="bg-white rounded-2xl shadow-sm p-6">

            <h3 class="text-xl font-semibold mb-6 text-gray-800">
                All Businesses
            </h3>

            <div class="space-y-4">

                @forelse($businesses as $business)
                    <div class="border border-gray-100 p-4 rounded-xl hover:bg-gray-50 transition">
                        <div class="flex justify-between items-center">
                            <div>
                                <h4 class="font-semibold text-gray-800">
                                    {{ $business->name }}
                                </h4>
                                <p class="text-sm text-gray-500 mt-1">
                                    Users: {{ $business->users_count }} |
                                    Customers: {{ $business->customers_count }} |
                                    Invoices: {{ $business->invoices_count }}
                                </p>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-500">Belum ada business terdaftar.</p>
                @endforelse

            </div>
        </div>

    </div>
</x-app-layout>
