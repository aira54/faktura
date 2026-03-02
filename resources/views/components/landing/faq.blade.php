<section id="faq"
    class="relative overflow-hidden py-28 px-6 
    bg-gradient-to-br from-slate-100 via-gray-50 to-zinc-100">

    <!-- Soft Ambient Glow -->
    <div class="absolute -top-32 -left-32 w-96 h-96 bg-slate-400/20 rounded-full blur-3xl"></div>
    <div class="absolute -bottom-32 -right-32 w-96 h-96 bg-gray-400/20 rounded-full blur-3xl"></div>

    <div class="relative max-w-7xl mx-auto grid md:grid-cols-2 gap-16 items-center">

        <!-- LEFT SIDE (Image Card) -->
        <div class="relative">

            <div
                class="relative bg-white/70 backdrop-blur-xl
                       border border-white/60
                       rounded-[40px] p-10
                       shadow-[0_20px_60px_rgba(0,0,0,0.06)]">

                <!-- Soft Gradient Accent -->
                <div
                    class="absolute inset-0 rounded-[40px]
                           bg-gradient-to-br from-blue-500/5 to-green-400/5">
                </div>

                <img src="{{ asset('images/tanya.png') }}" alt="Ilustrasi Tanya" class="relative w-full object-contain">
            </div>

        </div>

        <!-- RIGHT SIDE (FAQ Content) -->
        <div>

            <h2 class="text-3xl md:text-4xl font-bold mb-12 text-gray-900 leading-snug">
                Pertanyaan yang
                <span class="bg-gradient-to-r from-blue-600 to-green-500 bg-clip-text text-transparent">
                    Sering Ditanyakan
                </span>
            </h2>

            <div x-data="{ active: null }" class="space-y-5">

                <!-- ITEM TEMPLATE STYLE -->
                <!-- ITEM 1 -->
                <div class="bg-white/80 backdrop-blur-md border border-white/60
                            rounded-2xl overflow-hidden transition duration-300
                            shadow-sm"
                    :class="active === 1 ? 'ring-2 ring-blue-500/20 shadow-md' : ''">

                    <button @click="active === 1 ? active = null : active = 1"
                        class="w-full flex justify-between items-center px-6 py-5 text-left">

                        <span class="font-semibold text-gray-800 group-hover:text-blue-600 transition">
                            Apakah Faktura gratis?
                        </span>

                        <svg :class="active === 1 ? 'rotate-180 text-blue-600' : ''"
                            class="w-5 h-5 transform transition duration-300 text-gray-500" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>

                    </button>

                    <div x-show="active === 1" x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 -translate-y-2"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        x-transition:leave="transition ease-in duration-200"
                        x-transition:leave-start="opacity-100 translate-y-0"
                        x-transition:leave-end="opacity-0 -translate-y-2"
                        class="px-6 pb-5 text-gray-600 leading-relaxed">

                        Ya, kamu bisa mulai menggunakan Faktura secara gratis.
                        Kami juga menyediakan paket premium untuk fitur lebih lengkap.

                    </div>
                </div>

                <!-- ITEM 2 -->
                <div class="bg-white/80 backdrop-blur-md border border-white/60
                            rounded-2xl overflow-hidden transition duration-300
                            shadow-sm"
                    :class="active === 2 ? 'ring-2 ring-blue-500/20 shadow-md' : ''">

                    <button @click="active === 2 ? active = null : active = 2"
                        class="w-full flex justify-between items-center px-6 py-5 text-left">

                        <span class="font-semibold text-gray-800">
                            Apakah bisa kirim invoice via WhatsApp?
                        </span>

                        <svg :class="active === 2 ? 'rotate-180 text-blue-600' : ''"
                            class="w-5 h-5 transform transition duration-300 text-gray-500" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>

                    </button>

                    <div x-show="active === 2" x-transition class="px-6 pb-5 text-gray-600 leading-relaxed">

                        Ya, kamu bisa mengirim invoice langsung ke WhatsApp client
                        hanya dengan satu klik.

                    </div>
                </div>

                <!-- ITEM 3 -->
                <div class="bg-white/80 backdrop-blur-md border border-white/60
                            rounded-2xl overflow-hidden transition duration-300
                            shadow-sm"
                    :class="active === 3 ? 'ring-2 ring-blue-500/20 shadow-md' : ''">

                    <button @click="active === 3 ? active = null : active = 3"
                        class="w-full flex justify-between items-center px-6 py-5 text-left">

                        <span class="font-semibold text-gray-800">
                            Apakah data saya aman?
                        </span>

                        <svg :class="active === 3 ? 'rotate-180 text-blue-600' : ''"
                            class="w-5 h-5 transform transition duration-300 text-gray-500" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>

                    </button>

                    <div x-show="active === 3" x-transition class="px-6 pb-5 text-gray-600 leading-relaxed">

                        Tentu. Kami menggunakan sistem keamanan terenkripsi
                        untuk melindungi seluruh data pengguna.

                    </div>
                </div>

                <!-- ITEM 4 -->
                <div class="bg-white/80 backdrop-blur-md border border-white/60
                            rounded-2xl overflow-hidden transition duration-300
                            shadow-sm"
                    :class="active === 4 ? 'ring-2 ring-blue-500/20 shadow-md' : ''">

                    <button @click="active === 4 ? active = null : active = 4"
                        class="w-full flex justify-between items-center px-6 py-5 text-left">

                        <span class="font-semibold text-gray-800">
                            Apakah cocok untuk UMKM?
                        </span>

                        <svg :class="active === 4 ? 'rotate-180 text-blue-600' : ''"
                            class="w-5 h-5 transform transition duration-300 text-gray-500" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>

                    </button>

                    <div x-show="active === 4" x-transition class="px-6 pb-5 text-gray-600 leading-relaxed">

                        Sangat cocok. Faktura dirancang untuk freelancer, UMKM,
                        hingga agency yang ingin mengotomatisasi invoice.

                    </div>
                </div>

            </div>

        </div>

    </div>

</section>
