<x-app-layout>
<div class="min-h-screen bg-gray-50">
<div class="max-w-4xl mx-auto p-10 space-y-10">

<!-- HEADER -->
<div>
    <h2 class="text-3xl font-bold text-gray-900">
        Payment Account
    </h2>
    <p class="text-gray-500 mt-1 text-sm">
        This bank account will be displayed on your invoices for customer payments.
    </p>
</div>

@if (session('success'))
    <div class="bg-green-50 border border-green-200 text-green-700 px-6 py-4 rounded-2xl text-sm">
        {{ session('success') }}
    </div>
@endif

<form method="POST" action="{{ route('app.settings.bank.update') }}" class="space-y-8">
@csrf
@method('PUT')

<div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-8 space-y-8">

    <div class="space-y-6">

        <div>
            <label class="text-sm text-gray-500">Bank Name</label>
            <input type="text"
                name="bank_name"
                value="{{ old('bank_name', $bankSetting->bank_name ?? '') }}"
                placeholder="e.g. BCA, Mandiri, BRI"
                class="w-full mt-2 rounded-xl border-gray-200 focus:ring-2 focus:ring-gray-900 focus:outline-none"
                required>
        </div>

        <div>
            <label class="text-sm text-gray-500">Account Number</label>
            <input type="text"
                name="account_number"
                value="{{ old('account_number', $bankSetting->account_number ?? '') }}"
                placeholder="Enter account number"
                class="w-full mt-2 rounded-xl border-gray-200 focus:ring-2 focus:ring-gray-900 focus:outline-none"
                required>
        </div>

        <div>
            <label class="text-sm text-gray-500">Account Holder Name</label>
            <input type="text"
                name="account_holder"
                value="{{ old('account_holder', $bankSetting->account_holder ?? '') }}"
                placeholder="Name registered on bank account"
                class="w-full mt-2 rounded-xl border-gray-200 focus:ring-2 focus:ring-gray-900 focus:outline-none"
                required>
        </div>

    </div>

    <div class="border-t border-gray-100 pt-6 flex justify-between items-center">

        <p class="text-xs text-gray-400">
            Make sure this information is correct to avoid payment issues.
        </p>

        <button type="submit"
            class="bg-gray-900 text-white px-8 py-3 rounded-2xl font-semibold hover:bg-gray-800 transition">
            Save Account
        </button>

    </div>

</div>

</form>

</div>
</div>
</x-app-layout>