<section>
    <header>
        <h2 class="text-xl font-semibold text-gray-800">
            Pengaturan Tambahan
        </h2>

        <p class="mt-1 text-sm text-gray-500">
            Atur preferensi akun dan sistem.
        </p>
    </header>

    <form class="mt-6 space-y-6">

        {{-- Role (Readonly) --}}
        <div>
            <label class="block text-sm font-medium text-gray-700">
                Role
            </label>
            <input type="text"
                value="{{ auth()->user()->role ?? 'User' }}"
                disabled
                class="mt-1 block w-full rounded-lg border-gray-300 bg-gray-100">
        </div>

        {{-- Notifikasi --}}
        <div class="flex items-center justify-between">
            <span class="text-sm text-gray-700">
                Notifikasi Email
            </span>

            <label class="inline-flex items-center cursor-pointer">
                <input type="checkbox" class="sr-only peer">
                <div
                    class="w-11 h-6 bg-gray-200 rounded-full peer peer-checked:bg-green-500
                           after:content-[''] after:absolute after:top-0.5 after:left-[2px]
                           after:bg-white after:border after:rounded-full after:h-5 after:w-5
                           after:transition-all peer-checked:after:translate-x-full relative">
                </div>
            </label>
        </div>

        {{-- Save Button --}}
        <div class="flex justify-end">
            <button type="submit"
                class="px-6 py-2 rounded-lg bg-gradient-to-r from-green-500 to-blue-500
                       text-white font-semibold shadow hover:opacity-90 transition">
                Simpan Pengaturan
            </button>
        </div>

    </form>
</section>