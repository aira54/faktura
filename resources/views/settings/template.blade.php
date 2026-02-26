<x-app-layout>
    <div class="max-w-4xl mx-auto p-6">

        <h2 class="text-xl font-bold mb-4">Template Pesan Invoice</h2>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('settings.template.update') }}">
            @csrf

            <div class="mb-4">
                <label class="block font-medium mb-2">
                    Template Pesan
                </label>

                <textarea name="template"
                          rows="10"
                          class="w-full border p-3 rounded"
                          required>{{ old('template', $template->template ?? '') }}</textarea>
            </div>

            <button type="submit"
                    class="bg-purple-600 text-white px-4 py-2 rounded">
                Simpan Template
            </button>
        </form>

    </div>
</x-app-layout>