<x-app-layout>
    <div class="max-w-6xl mx-auto p-6">

        <h2 class="text-2xl font-bold mb-6">Admin Dashboard</h2>

        <div class="grid grid-cols-4 gap-4 mb-8">
            <div class="p-4 bg-gray-100 rounded">
                Businesses: {{ $totalBusinesses }}
            </div>
            <div class="p-4 bg-gray-100 rounded">
                Users: {{ $totalUsers }}
            </div>
            <div class="p-4 bg-gray-100 rounded">
                Invoices: {{ $totalInvoices }}
            </div>
            <div class="p-4 bg-gray-100 rounded">
                Customers: {{ $totalCustomers }}
            </div>
        </div>

        <h3 class="text-xl font-semibold mb-3">All Businesses</h3>

        <div class="space-y-3">
            @foreach($businesses as $business)
                <div class="border p-4 rounded">
                    <strong>{{ $business->name }}</strong><br>
                    Users: {{ $business->users_count }} |
                    Customers: {{ $business->customers_count }} |
                    Invoices: {{ $business->invoices_count }}
                </div>
            @endforeach
        </div>

    </div>
</x-app-layout>