<x-app-layout>
    <div class="max-w-4xl mx-auto p-6">

        <h2 class="text-xl font-bold mb-4">Pengaturan Rekening Bank</h2>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('settings.bank.update') }}">
            @csrf

            <div class="mb-4">
                <label class="block mb-1">Nama Bank</label>
                <input type="text"
                       name="bank_name"
                       value="{{ old('bank_name', $bankSetting->bank_name ?? '') }}"
                       class="w-full border p-2 rounded"
                       required>
            </div>

            <div class="mb-4">
                <label class="block mb-1">Nomor Rekening</label>
                <input type="text"
                       name="account_number"
                       value="{{ old('account_number', $bankSetting->account_number ?? '') }}"
                       class="w-full border p-2 rounded"
                       required>
            </div>

            <div class="mb-4">
                <label class="block mb-1">Nama Pemegang Rekening</label>
                <input type="text"
                       name="account_holder"
                       value="{{ old('account_holder', $bankSetting->account_holder ?? '') }}"
                       class="w-full border p-2 rounded"
                       required>
            </div>

            <div class="mb-4">
                <label class="flex items-center gap-2">
                    <input type="checkbox"
                           name="auto_send"
                           {{ isset($bankSetting) && $bankSetting->auto_send ? 'checked' : '' }}>
                    Aktifkan kirim invoice otomatis
                </label>
            </div>

            <button type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded">
                Simpan Pengaturan
            </button>

        </form>

    </div>
</x-app-layout>