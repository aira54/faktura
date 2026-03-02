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
                        Reset password dan kembali kelola invoice dengan cepat
                    </h2>
                    <p class="mt-4 text-sm opacity-80">
                        Masukkan email kamu dan kami akan kirimkan link reset password.
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
                        Lupa Password?
                    </h2>
                    <p class="text-sm text-gray-500 mt-1">
                        Jangan khawatir, kami bantu reset 🔐
                    </p>
                </div>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
                    @csrf

                    <!-- Email -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" required autofocus
                            class="mt-1 w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                        @error('email')
                            <p class="text-sm text-red-500 mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- BUTTON -->
                    <button type="submit"
                        class="w-full py-3 rounded-xl 
                           bg-blue-600 hover:bg-blue-700 
                           text-white font-semibold 
                           transition shadow-md">
                        Kirim Link Reset
                    </button>

                    <!-- BACK TO LOGIN -->
                    <p class="text-sm text-center text-gray-500 mt-6">
                        Sudah ingat password?
                        <a href="{{ route('login') }}" class="text-blue-600 hover:underline">
                            Kembali ke Login
                        </a>
                    </p>

                </form>

            </div>
        </div>
    </div>

</x-guest-layout>
