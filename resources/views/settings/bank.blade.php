<x-app-layout>
    <div class="max-w-4xl mx-auto p-6">

        <h2 class="text-2xl font-bold mb-6">🏦 Pengaturan Rekening Bank</h2>

        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded-lg mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('app.settings.bank.update') }}">
            @csrf
            @method('PUT')

            <!-- Nama Bank -->
            <div class="mb-5">
                <label class="block text-sm font-medium mb-1">Nama Bank</label>
                <input type="text" name="bank_name" value="{{ old('bank_name', $bankSetting->bank_name ?? '') }}"
                    class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    required>
            </div>

            <!-- Nomor Rekening -->
            <div class="mb-5">
                <label class="block text-sm font-medium mb-1">Nomor Rekening</label>
                <input type="text" name="account_number"
                    value="{{ old('account_number', $bankSetting->account_number ?? '') }}"
                    class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    required>
            </div>

            <!-- Nama Pemegang -->
            <div class="mb-5">
                <label class="block text-sm font-medium mb-1">Nama Pemegang Rekening</label>
                <input type="text" name="account_holder"
                    value="{{ old('account_holder', $bankSetting->account_holder ?? '') }}"
                    class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    required>
            </div>

            <!-- Auto Send -->
            <div class="mb-6">
                <label class="flex items-center gap-2 text-sm">
                    <input type="checkbox" name="auto_send" value="1"
                        {{ old('auto_send', $bankSetting->auto_send ?? false) ? 'checked' : '' }}
                        class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                    Aktifkan kirim invoice otomatis
                </label>
            </div>

            <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg shadow-sm transition">
                Simpan Pengaturan
            </button>

        </form>

    </div>
</x-app-layout>
