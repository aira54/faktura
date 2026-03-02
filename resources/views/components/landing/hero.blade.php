<section x-data="{ show: false }" x-init="setTimeout(() => show = true, 200)" x-cloak
    class="relative overflow-hidden bg-gradient-to-br from-emerald-100 via-teal-200 to-blue-200">

    <style>
        [x-cloak] {
            display: none !important;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-12px);
            }
        }

        @keyframes glowMove {
            0% {
                transform: translateX(-10%);
            }

            50% {
                transform: translateX(10%);
            }

            100% {
                transform: translateX(-10%);
            }
        }

        .float-animation {
            animation: float 6s ease-in-out infinite;
        }

        .glow-move {
            animation: glowMove 18s ease-in-out infinite;
        }
    </style>

    <!-- Animated Background Glow -->
    <div class="absolute inset-0 -z-20 overflow-hidden glow-move">
        <div
            class="absolute top-0 left-[10%] w-[400px] h-full bg-gradient-to-b from-blue-400/20 to-transparent blur-[120px]">
        </div>
        <div
            class="absolute top-0 right-[15%] w-[400px] h-full bg-gradient-to-b from-emerald-400/20 to-transparent blur-[120px]">
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-6 py-24 grid md:grid-cols-2 gap-16 items-center relative z-10">

        <!-- LEFT CONTENT -->
        <div>

            <!-- Badge -->
            <div x-show="show" x-transition:enter="transition ease-out duration-700"
                x-transition:enter-start="opacity-0 -translate-y-4" x-transition:enter-end="opacity-100 translate-y-0"
                class="inline-flex items-center gap-2 px-4 py-2 mb-6 
                bg-white/70 backdrop-blur-md shadow-sm border border-white/50 
                rounded-full text-sm text-gray-600">
                🚀 Dipakai 1.200+ UMKM & Freelancer
            </div>

            <!-- Heading -->
            <h2 x-show="show" x-transition:enter="transition ease-out duration-700 delay-200"
                x-transition:enter-start="opacity-0 -translate-y-6" x-transition:enter-end="opacity-100 translate-y-0"
                class="text-4xl md:text-6xl font-extrabold leading-tight text-gray-900 mb-6">
                Otomatiskan
                <span class="bg-gradient-to-r from-blue-600 to-emerald-500 bg-clip-text text-transparent">
                    Invoice
                </span>
                Tanpa Ribet
            </h2>

            <!-- Paragraph -->
            <p x-show="show" x-transition:enter="transition ease-out duration-700 delay-400"
                x-transition:enter-start="opacity-0 -translate-y-4" x-transition:enter-end="opacity-100 translate-y-0"
                class="text-lg text-gray-600 mb-8 leading-relaxed max-w-xl">
                Faktura membantu kamu membuat, mengirim, dan melacak invoice otomatis.
                Hemat waktu, kurangi human error, dan tingkatkan cashflow bisnismu.
            </p>

            <!-- Buttons -->
            <div x-show="show" x-transition:enter="transition ease-out duration-700 delay-600"
                x-transition:enter-start="opacity-0 -translate-y-4" x-transition:enter-end="opacity-100 translate-y-0"
                class="flex flex-col sm:flex-row gap-4 mb-10">
                <a href="{{ route('register') }}"
                    class="bg-gradient-to-r from-blue-600 to-emerald-500 
                    text-white px-8 py-3 rounded-xl text-lg shadow-lg 
                    hover:scale-105 transition duration-300">
                    Mulai Gratis
                </a>

                <a href="#"
                    class="px-8 py-3 rounded-xl text-lg 
                    border border-gray-300 text-gray-700 
                    hover:bg-white/70 transition">
                    Lihat Demo
                </a>
            </div>

        </div>

        <!-- RIGHT MOCKUP -->
        <div x-show="show" x-transition:enter="transition ease-out duration-800 delay-500"
            x-transition:enter-start="opacity-0 translate-y-6 scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 scale-100" class="relative float-animation">
            <div class="bg-white/80 backdrop-blur-xl rounded-3xl shadow-2xl p-8 border border-white/60">

                <div class="flex justify-between items-center mb-6">
                    <h3 class="font-semibold text-gray-800">Invoice #INV-1042</h3>
                    <span class="text-sm px-3 py-1 bg-emerald-100 text-emerald-600 rounded-full">
                        Paid
                    </span>
                </div>

                <div class="space-y-4 text-sm text-gray-600">
                    <div class="flex justify-between">
                        <span>UI/UX Design</span>
                        <span>Rp 4.500.000</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Frontend Dev</span>
                        <span>Rp 3.000.000</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Hosting</span>
                        <span>Rp 500.000</span>
                    </div>
                </div>

                <div class="border-t my-6 border-gray-200"></div>

                <div class="flex justify-between font-semibold text-gray-900 text-lg">
                    <span>Total</span>
                    <span>Rp 8.000.000</span>
                </div>

            </div>
        </div>

    </div>

</section>
