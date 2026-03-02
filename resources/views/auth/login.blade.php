<x-guest-layout>

    <div
        class="min-h-screen flex items-center justify-center bg-gradient-to-br from-emerald-400 via-teal-400 to-blue-500 relative overflow-hidden">

        <!-- subtle glow -->
        <div class="absolute w-[500px] h-[500px] bg-white/10 blur-3xl rounded-full top-[-100px] left-[-100px]"></div>
        <div class="absolute w-[400px] h-[400px] bg-white/10 blur-3xl rounded-full bottom-[-80px] right-[-80px]"></div>

        <div
            class="w-full max-w-5xl grid md:grid-cols-2 bg-white/80 backdrop-blur-xl rounded-3xl shadow-2xl overflow-hidden">

            <!-- LEFT SIDE -->
            <div
                class="hidden md:flex flex-col justify-between p-10 bg-gradient-to-br from-emerald-500 to-blue-500 text-white">

                <div>
                    <h1 class="text-3xl font-bold tracking-tight">Faktura</h1>
                    <p class="text-sm opacity-80 mt-2">Invoice Automation SaaS</p>
                </div>

                <div>
                    <h2 class="text-2xl font-semibold leading-snug">
                        Kelola invoice lebih cepat, rapi, dan profesional
                    </h2>
                    <p class="mt-4 text-sm opacity-80">
                        Buat, kirim, dan tracking invoice secara otomatis dalam satu dashboard.
                    </p>
                </div>

                <div class="text-xs opacity-70">
                    © {{ date('Y') }} Faktura. All rights reserved.
                </div>
            </div>

            <!-- RIGHT SIDE FORM -->
            <div class="p-8 md:p-10">

                <div class="mb-8 text-center md:text-left">
                    <h2 class="text-2xl font-semibold text-gray-900">
                        Masuk ke akun kamu
                    </h2>
                    <p class="text-sm text-gray-500 mt-1">
                        Selamat datang kembali 👋
                    </p>
                </div>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}" class="space-y-5">
                    @csrf

                    <!-- Email -->
                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email"
                            class="block mt-1 w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                            type="email" name="email" :value="old('email')" required autofocus
                            autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div>
                        <x-input-label for="password" :value="__('Password')" />
                        <x-text-input id="password"
                            class="block mt-1 w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                            type="password" name="password" required autocomplete="current-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Remember -->
                    <div class="flex items-center justify-between text-sm">
                        <label class="flex items-center gap-2">
                            <input type="checkbox" name="remember"
                                class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500">
                            <span class="text-gray-600">Ingat saya</span>
                        </label>

                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-blue-600 hover:underline">
                                Lupa password?
                            </a>
                        @endif
                    </div>

                    <!-- BUTTON -->
                    <button type="submit"
                        class="w-full py-3 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-semibold transition shadow-md">
                        Masuk
                    </button>

                    <!-- REGISTER -->
                    <p class="text-sm text-center text-gray-500 mt-6">
                        Belum punya akun?
                        <a href="{{ route('register') }}" class="text-blue-600 hover:underline">
                            Daftar sekarang
                        </a>
                    </p>

                </form>
            </div>

        </div>
    </div>

</x-guest-layout>
