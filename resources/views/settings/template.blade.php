<x-app-layout>
<div class="min-h-screen bg-gray-50">
<div class="max-w-5xl mx-auto p-10 space-y-10">

<!-- HEADER -->
<div>
    <h2 class="text-3xl font-bold text-gray-900">
        Invoice Message Template
    </h2>
    <p class="text-gray-500 mt-1 text-sm">
        Customize the message that will be sent to your customer together with the invoice.
    </p>
</div>

@if (session('success'))
    <div class="bg-green-50 border border-green-200 text-green-700 px-6 py-4 rounded-2xl text-sm">
        {{ session('success') }}
    </div>
@endif

<form method="POST" action="{{ route('app.settings.template.update') }}" class="space-y-8">
@csrf
@method('PUT')

<div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-8 space-y-8">

    <!-- TEMPLATE INPUT -->
    <div class="space-y-4">
        <label class="text-sm font-medium text-gray-700">
            Message Template
        </label>

        <textarea name="template"
            rows="10"
            class="w-full rounded-2xl border-gray-200 focus:ring-2 focus:ring-gray-900 focus:outline-none p-4 text-sm"
            placeholder="Write your invoice message here..."
            required>{{ old('template', $template->template ?? '') }}</textarea>

        <p class="text-xs text-gray-500">
            You can use dynamic variables listed below.
        </p>
    </div>

    <!-- PLACEHOLDER GUIDE -->
    <div class="border-t border-gray-100 pt-6 space-y-4">

        <h3 class="text-sm font-semibold text-gray-800">
            Available Variables
        </h3>

        <div class="grid sm:grid-cols-3 gap-4 text-xs">

            <div class="bg-gray-50 rounded-xl p-4 border border-gray-100">
                <span class="font-mono text-gray-900">{customer_name}</span>
                <p class="text-gray-500 mt-1">Customer full name</p>
            </div>

            <div class="bg-gray-50 rounded-xl p-4 border border-gray-100">
                <span class="font-mono text-gray-900">{invoice_number}</span>
                <p class="text-gray-500 mt-1">Invoice number</p>
            </div>

            <div class="bg-gray-50 rounded-xl p-4 border border-gray-100">
                <span class="font-mono text-gray-900">{total_amount}</span>
                <p class="text-gray-500 mt-1">Invoice total amount</p>
            </div>

        </div>

    </div>

    <!-- PREVIEW BOX -->
    <div class="border-t border-gray-100 pt-6 space-y-3">

        <h3 class="text-sm font-semibold text-gray-800">
            Preview (Example)
        </h3>

        <div class="bg-gray-50 rounded-2xl p-5 text-sm text-gray-700 border border-gray-100">
            Halo John Doe,<br><br>
            Berikut adalah invoice INV-001 dengan total Rp 1.000.000.<br><br>
            Terima kasih.
        </div>

    </div>

    <!-- SAVE BUTTON -->
    <div class="border-t border-gray-100 pt-6 flex justify-end">
        <button type="submit"
            class="bg-gray-900 text-white px-8 py-3 rounded-2xl font-semibold hover:bg-gray-800 transition">
            Save Template
        </button>
    </div>

</div>

</form>

</div>
</div>
</x-app-layout>