<x-guest-layout>

    <div
        class="min-h-screen flex items-center justify-center 
            bg-gradient-to-br from-emerald-400 via-teal-400 to-blue-500 
            relative overflow-hidden px-4">

        <!-- Glow Effects -->
        <div class="absolute w-[500px] h-[500px] bg-white/10 blur-3xl rounded-full top-[-100px] left-[-100px]"></div>
        <div class="absolute w-[400px] h-[400px] bg-white/10 blur-3xl rounded-full bottom-[-80px] right-[-80px]"></div>

        <div
            class="w-full max-w-5xl grid md:grid-cols-2 
                bg-white/95 backdrop-blur-xl 
                rounded-3xl shadow-2xl overflow-hidden">

            <!-- LEFT SIDE -->
            <div
                class="hidden md:flex flex-col justify-between p-12 
                    bg-gradient-to-br from-emerald-500 to-blue-500 text-white">

                <div>
                    <h1 class="text-3xl font-bold tracking-tight">Faktura</h1>
                    <p class="text-sm opacity-80 mt-2">Invoice Automation SaaS</p>
                </div>

                <div>
                    <h2 class="text-2xl font-semibold leading-snug">
                        Mulai kelola invoice secara profesional hari ini
                    </h2>
                    <p class="mt-4 text-sm opacity-80">
                        Daftar gratis dan rasakan kemudahan otomatisasi invoice untuk bisnismu.
                    </p>
                </div>

                <div class="text-xs opacity-70">
                    © {{ date('Y') }} Faktura. All rights reserved.
                </div>
            </div>

            <!-- RIGHT SIDE FORM -->
            <div class="p-8 md:p-12">

                <div class="mb-8 text-center md:text-left">
                    <h2 class="text-2xl font-semibold text-gray-900">
                        Buat akun baru
                    </h2>
                    <p class="text-sm text-gray-500 mt-1">
                        Gratis dan hanya butuh 1 menit 🚀
                    </p>
                </div>

                <form method="POST" action="{{ route('register') }}" class="space-y-5">
                    @csrf

                    <!-- Name -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nama</label>
                        <input type="text" name="name" value="{{ old('name') }}" required autofocus
                            class="mt-1 w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                        @error('name')
                            <p class="text-sm text-red-500 mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" required
                            class="mt-1 w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                        @error('email')
                            <p class="text-sm text-red-500 mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Password</label>
                        <input type="password" name="password" required
                            class="mt-1 w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                        @error('password')
                            <p class="text-sm text-red-500 mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" required
                            class="mt-1 w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                    </div>

                    <!-- BUTTON -->
                    <button type="submit"
                        class="w-full py-3 rounded-xl 
                           bg-blue-600 hover:bg-blue-700 
                           text-white font-semibold 
                           transition shadow-md">
                        Daftar Sekarang
                    </button>

                    <!-- LOGIN LINK -->
                    <p class="text-sm text-center text-gray-500 mt-6">
                        Sudah punya akun?
                        <a href="{{ route('login') }}" class="text-blue-600 hover:underline">
                            Masuk di sini
                        </a>
                    </p>

                </form>

            </div>
        </div>
    </div>

</x-guest-layout>
