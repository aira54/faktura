<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard Saya
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            <!-- ================= WELCOME ================= -->
            <div class="bg-white p-6 rounded-xl shadow-sm">
                <h3 class="text-lg font-semibold">
                    Halo, {{ auth()->user()->name }} 👋
                </h3>
                <p class="text-sm text-gray-500 mt-1">
                    Kelola customer, invoice, dan pembayaran bisnismu dengan mudah.
                </p>
            </div>

            <!-- ================= QUICK ACTION ================= -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

                <a href="{{ route('customers.index') }}"
                    class="bg-white p-6 rounded-xl shadow-sm hover:shadow-md transition">
                    <h3 class="font-semibold text-lg">👥 Customer</h3>
                    <p class="text-sm text-gray-500 mt-2">
                        Kelola daftar pelanggan kamu
                    </p>
                </a>

                <a href="{{ route('invoices.index') }}"
                    class="bg-white p-6 rounded-xl shadow-sm hover:shadow-md transition">
                    <h3 class="font-semibold text-lg">🧾 Invoice</h3>
                    <p class="text-sm text-gray-500 mt-2">
                        Buat & kirim invoice ke customer
                    </p>
                </a>

                <a href="{{ route('bank-settings.index') }}"
                    class="bg-white p-6 rounded-xl shadow-sm hover:shadow-md transition">
                    <h3 class="font-semibold text-lg">🏦 Pengaturan Bank</h3>
                    <p class="text-sm text-gray-500 mt-2">
                        Atur rekening pembayaran
                    </p>
                </a>

                <a href="{{ route('message-templates.index') }}"
                    class="bg-white p-6 rounded-xl shadow-sm hover:shadow-md transition">
                    <h3 class="font-semibold text-lg">💬 Template Pesan</h3>
                    <p class="text-sm text-gray-500 mt-2">
                        Buat template WhatsApp otomatis
                    </p>
                </a>

            </div>

            <!-- ================= RINGKASAN INVOICE ================= -->
            <div class="grid md:grid-cols-3 gap-6">

                <div class="bg-white p-6 rounded-xl shadow-sm">
                    <p class="text-sm text-gray-500">Total Invoice</p>
                    <h3 class="text-3xl font-bold mt-2">
                        {{ $totalInvoices ?? 0 }}
                    </h3>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-sm">
                    <p class="text-sm text-gray-500">Invoice Paid</p>
                    <h3 class="text-3xl font-bold mt-2 text-green-600">
                        {{ $totalPaidInvoices ?? 0 }}
                    </h3>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-sm">
                    <p class="text-sm text-gray-500">Invoice Pending</p>
                    <h3 class="text-3xl font-bold mt-2 text-yellow-500">
                        {{ $totalPendingInvoices ?? 0 }}
                    </h3>
                </div>

            </div>

            <!-- ================= PAKET USER ================= -->
            <div class="bg-gradient-to-r from-blue-500 to-green-500 p-6 rounded-xl text-white shadow-sm">
                <h3 class="text-lg font-semibold">Paket Aktif</h3>
                <p class="mt-2 text-sm opacity-90">
                    Kamu menggunakan paket <strong>{{ $userPlan ?? 'Basic' }}</strong>
                </p>
                <p class="text-sm opacity-90 mt-1">
                    Upgrade untuk menikmati fitur lebih lengkap 🚀
                </p>
            </div>

        </div>
    </div>

</x-app-layout>
