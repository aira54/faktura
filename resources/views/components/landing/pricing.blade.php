<section id="pricing" class="relative overflow-hidden py-28 px-6 bg-slate-50 ">

    <!-- Soft Background Blend -->
    <div
        class="absolute inset-0 -z-10 
        bg-[radial-gradient(circle_at_20%_30%,rgba(59,130,246,0.08),transparent_45%),
            radial-gradient(circle_at_80%_70%,rgba(34,197,94,0.08),transparent_45%)]">
    </div>

    <div class="max-w-6xl mx-auto">

        <!-- Title -->
        <div class="text-center mb-20">
            <h2 class="text-3xl md:text-4xl font-bold mb-4 text-gray-900">
                Paket Harga
                <span class="bg-gradient-to-r from-blue-600 to-green-500 bg-clip-text text-transparent">
                    Faktura
                </span>
            </h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
                Pilih paket sesuai kebutuhan bisnismu. Mulai gratis dan upgrade kapan saja.
            </p>
        </div>

        <!-- Pricing Grid -->
        <div class="grid md:grid-cols-3 gap-8 items-stretch">

            <!-- BASIC -->
            <div
                class="bg-white/70 backdrop-blur-xl border border-white/40 shadow-lg rounded-3xl p-10 flex flex-col hover:-translate-y-2 hover:shadow-xl transition duration-300">

                <div>
                    <h3 class="text-xl font-semibold mb-2 text-gray-900">Basic</h3>
                    <p class="text-gray-500 mb-6">Cocok untuk freelancer</p>

                    <div class="text-4xl font-bold mb-6 text-gray-900">
                        Rp 0
                        <span class="text-sm text-gray-500 font-normal">/bulan</span>
                    </div>

                    <ul class="space-y-3 text-gray-600 mb-8">
                        <li>✔ 10 Invoice / bulan</li>
                        <li>✔ Kirim via WhatsApp</li>
                        <li>✔ Dashboard sederhana</li>
                    </ul>
                </div>

                <a href="{{ route('register') }}"
                    class="mt-auto block bg-gray-100 hover:bg-gray-200 text-gray-800 py-3 rounded-xl transition font-semibold text-center">
                    Mulai Gratis
                </a>
            </div>


            <!-- PRO (Highlighted Soft) -->
            <div
                class="relative bg-white/80 backdrop-blur-xl border border-blue-200 shadow-2xl rounded-3xl p-10 flex flex-col hover:-translate-y-2 transition duration-300">

                <!-- Badge -->
                <div class="absolute -top-4 left-1/2 -translate-x-1/2">
                    <span
                        class="bg-gradient-to-r from-blue-600 to-green-500 text-white text-xs px-4 py-1 rounded-full shadow">
                        Paling Populer
                    </span>
                </div>

                <div>
                    <h3 class="text-xl font-semibold mb-2 text-gray-900">Pro</h3>
                    <p class="text-gray-500 mb-6">Untuk UMKM berkembang</p>

                    <div class="text-4xl font-bold mb-6 text-blue-600">
                        Rp 99k
                        <span class="text-sm text-gray-500 font-normal">/bulan</span>
                    </div>

                    <ul class="space-y-3 text-gray-600 mb-8">
                        <li>✔ Invoice Unlimited</li>
                        <li>✔ Auto Reminder</li>
                        <li>✔ Laporan Keuangan</li>
                        <li>✔ Support Prioritas</li>
                    </ul>
                </div>

                <a href="{{ route('register') }}"
                    class="mt-auto block bg-gradient-to-r from-blue-600 to-green-500 text-white py-3 rounded-xl shadow hover:opacity-90 transition font-semibold text-center">
                    Pilih Paket
                </a>
            </div>


            <!-- BUSINESS -->
            <div
                class="bg-white/70 backdrop-blur-xl border border-white/40 shadow-lg rounded-3xl p-10 flex flex-col hover:-translate-y-2 hover:shadow-xl transition duration-300">

                <div>
                    <h3 class="text-xl font-semibold mb-2 text-gray-900">Business</h3>
                    <p class="text-gray-500 mb-6">Untuk agency & perusahaan</p>

                    <div class="text-4xl font-bold mb-6 text-gray-900">
                        Rp 249k
                        <span class="text-sm text-gray-500 font-normal">/bulan</span>
                    </div>

                    <ul class="space-y-3 text-gray-600 mb-8">
                        <li>✔ Semua fitur Pro</li>
                        <li>✔ Multi User</li>
                        <li>✔ Export PDF & Excel</li>
                        <li>✔ Dedicated Support</li>
                    </ul>
                </div>

                <a href="https://www.instagram.com/airarinduka/"
                    class="mt-auto block bg-gray-100 hover:bg-gray-200 text-gray-800 py-3 rounded-xl transition font-semibold text-center">
                    Hubungi Kami
                </a>
            </div>

        </div>

    </div>

</section>
