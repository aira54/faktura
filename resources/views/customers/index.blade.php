<x-app-layout>
    <div class="min-h-screen bg-gray-50">
        <div class="max-w-6xl mx-auto p-8 space-y-8">

            <!-- Header -->
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-2xl font-bold text-gray-900">
                        Customers
                    </h2>
                    <p class="text-gray-500 text-sm mt-1">
                        Kelola pelanggan bisnis kamu
                    </p>
                </div>

                <button onclick="document.getElementById('formCard').classList.toggle('hidden')"
                    class="bg-gray-900 text-white px-5 py-2 rounded-xl text-sm font-semibold hover:bg-gray-800 transition">
                    + Tambah Customer
                </button>
            </div>

            <!-- Add Customer Form -->
            <div id="formCard" class="hidden bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                <h3 class="font-semibold text-gray-800 mb-4">Tambah Customer Baru</h3>

                <form method="POST" action="{{ route('app.customers.store') }}" class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @csrf

                    <div>
                        <label class="text-sm text-gray-500">Nama</label>
                        <input type="text" name="name" required
                            class="mt-1 w-full border border-gray-200 rounded-xl px-4 py-2 focus:ring-2 focus:ring-gray-900 focus:outline-none">
                    </div>

                    <div>
                        <label class="text-sm text-gray-500">Email</label>
                        <input type="email" name="email"
                            class="mt-1 w-full border border-gray-200 rounded-xl px-4 py-2 focus:ring-2 focus:ring-gray-900 focus:outline-none">
                    </div>

                    <div>
                        <label class="text-sm text-gray-500">Phone</label>
                        <input type="text" name="phone"
                            class="mt-1 w-full border border-gray-200 rounded-xl px-4 py-2 focus:ring-2 focus:ring-gray-900 focus:outline-none">
                    </div>

                    <div>
                        <label class="text-sm text-gray-500">Address</label>
                        <input type="text" name="address"
                            class="mt-1 w-full border border-gray-200 rounded-xl px-4 py-2 focus:ring-2 focus:ring-gray-900 focus:outline-none">
                    </div>

                    <div class="md:col-span-2">
                        <button type="submit"
                            class="bg-gray-900 text-white px-6 py-2 rounded-xl font-semibold hover:bg-gray-800 transition">
                            Simpan Customer
                        </button>
                    </div>
                </form>
            </div>

            <!-- Customer Table -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">

                <div class="p-6 border-b border-gray-100 flex justify-between items-center">
                    <h3 class="font-semibold text-gray-800">Daftar Customer</h3>
                    <input type="text" placeholder="Search..."
                        class="border border-gray-200 rounded-xl px-4 py-2 text-sm focus:ring-2 focus:ring-gray-900 focus:outline-none">
                </div>

                @if($customers->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm">
                            <thead class="bg-gray-50 text-gray-500 uppercase text-xs tracking-wider">
                                <tr>
                                    <th class="px-6 py-4 text-left">Nama</th>
                                    <th class="px-6 py-4 text-left">Email</th>
                                    <th class="px-6 py-4 text-left">Phone</th>
                                    <th class="px-6 py-4 text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customers as $customer)
                                    <tr class="border-t border-gray-100 hover:bg-gray-50 transition">
                                        <td class="px-6 py-4 font-medium text-gray-900">
                                            {{ $customer->name }}
                                        </td>
                                        <td class="px-6 py-4 text-gray-600">
                                            {{ $customer->email ?? '-' }}
                                        </td>
                                        <td class="px-6 py-4 text-gray-600">
                                            {{ $customer->phone ?? '-' }}
                                        </td>
                                        <td class="px-6 py-4 text-right">
                                            <a href="#" class="text-gray-500 hover:text-gray-900 text-sm font-medium">
                                                Edit
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <!-- Empty State -->
                    <div class="p-12 text-center">
                        <p class="text-gray-400 mb-4">Belum ada customer</p>
                        <button onclick="document.getElementById('formCard').classList.remove('hidden')"
                            class="bg-gray-900 text-white px-5 py-2 rounded-xl text-sm font-semibold hover:bg-gray-800 transition">
                            Tambah Customer Pertama
                        </button>
                    </div>
                @endif

            </div>

        </div>
    </div>
</x-app-layout>