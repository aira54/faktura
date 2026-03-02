<x-app-layout>
    <div class="max-w-4xl mx-auto p-6">

        <h2 class="text-2xl font-bold mb-6">💬 Template Pesan Invoice</h2>

        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded-lg mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('app.settings.template.update') }}">
            @csrf
            @method('PUT')

            <div class="mb-6">
                <label class="block text-sm font-medium mb-2">
                    Template Pesan
                </label>

                <textarea name="template" rows="10"
                    class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-purple-500 focus:border-purple-500 p-3" required>{{ old('template', $template->template ?? '') }}</textarea>

                <p class="text-xs text-gray-500 mt-2 leading-relaxed">
                    Gunakan placeholder seperti:
                    <span class="font-mono bg-gray-100 px-1 rounded">{customer_name}</span>,
                    <span class="font-mono bg-gray-100 px-1 rounded">{invoice_number}</span>,
                    <span class="font-mono bg-gray-100 px-1 rounded">{total_amount}</span>
                </p>
            </div>

            <button type="submit"
                class="bg-purple-600 hover:bg-purple-700 text-white px-6 py-2 rounded-lg shadow-sm transition">
                Simpan Template
            </button>

        </form>

    </div>
</x-app-layout>
