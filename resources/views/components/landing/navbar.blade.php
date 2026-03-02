<nav x-data="{ open: false }" class="fixed top-0 w-full z-50 backdrop-blur-md bg-white/60 border-b border-white/30">

    <div class="max-w-7xl mx-auto px-6">
        <div class="flex justify-between items-center h-16">

            {{-- Logo --}}
            <a href="/" class="flex items-center">
                <img src="{{ asset('images/nav.png') }}" alt="Faktura Logo" class="h-11 w-auto object-contain">
            </a>

            {{-- Menu Desktop --}}
            <div class="hidden md:flex items-center space-x-8 text-sm font-medium text-gray-700">

                <a href="{{ url('/#features') }}" class="hover:text-green-600 transition">
                    Fitur
                </a>

                <a href="{{ url('/#pricing') }}" class="hover:text-green-600 transition">
                    Harga
                </a>

                <a href="{{ url('/#faq') }}" class="hover:text-green-600 transition">
                    FAQ
                </a>

            </div>

            {{-- CTA Desktop --}}
            <div class="hidden md:flex items-center space-x-4">
                <a href="{{ route('login') }}" class="text-gray-700 hover:text-green-600 text-sm font-medium">
                    Masuk
                </a>

                <a href="{{ route('register') }}"
                    class="px-4 py-2 rounded-lg bg-gradient-to-r from-green-500 to-blue-500 
                          text-white text-sm font-semibold shadow hover:opacity-90 transition">
                    Daftar Gratis
                </a>
            </div>

            {{-- Mobile Button --}}
            <div class="md:hidden">
                <button @click="open = !open" class="text-gray-700 focus:outline-none">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor">
                        <path x-show="!open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path x-show="open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

        </div>
    </div>

    {{-- Mobile Menu --}}
    <div x-show="open" x-transition @click.away="open = false"
        class="md:hidden bg-white/90 backdrop-blur-md border-t border-gray-200">

        <div class="px-6 py-4 space-y-4 text-gray-700 font-medium">

            <a href="{{ url('/#features') }}" @click="open = false" class="block hover:text-green-600">
                Fitur
            </a>

            <a href="{{ url('/#pricing') }}" @click="open = false" class="block hover:text-green-600">
                Harga
            </a>

            <a href="{{ url('/#faq') }}" @click="open = false" class="block hover:text-green-600">
                FAQ
            </a>

            <div class="border-t pt-4 space-y-3">

                <a href="{{ route('login') }}" class="block text-gray-700 hover:text-green-600">
                    Masuk
                </a>

                <a href="{{ route('register') }}"
                    class="block text-center px-4 py-2 rounded-lg 
                          bg-gradient-to-r from-green-500 to-blue-500 
                          text-white font-semibold shadow hover:opacity-90 transition">
                    Daftar Gratis
                </a>

            </div>

        </div>
    </div>

</nav>

<div class="pt-20"></div>
