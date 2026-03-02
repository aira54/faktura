<x-app-layout>
    <div class="max-w-4xl mx-auto p-6">

        <h2 class="text-xl font-bold mb-4">Create Invoice</h2>

       <form method="POST" action="{{ route('app.invoices.store') }}" class="space-y-6">
            @csrf

            <!-- Customer -->
            <div>
                <label class="block font-medium">Customer</label>
                <select name="customer_id" class="border p-2 w-full rounded" required>
                    @foreach($customers as $customer)
                        <option value="{{ $customer->id }}">
                            {{ $customer->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Dates -->
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block font-medium">Issue Date</label>
                    <input type="date" name="issue_date" class="border p-2 w-full rounded" required>
                </div>

                <div>
                    <label class="block font-medium">Due Date</label>
                    <input type="date" name="due_date" class="border p-2 w-full rounded" required>
                </div>
            </div>

            <!-- Items -->
            <div>
                <h3 class="font-semibold text-lg mb-2">Items</h3>

                <div id="items-container" class="space-y-3">

                    <div class="item-row grid grid-cols-4 gap-3">
                        <input type="text"
                               name="items[0][description]"
                               placeholder="Description"
                               class="border p-2 rounded"
                               required>

                        <input type="number"
                               name="items[0][quantity]"
                               placeholder="Qty"
                               class="border p-2 rounded"
                               required>

                        <input type="number"
                               step="0.01"
                               name="items[0][price]"
                               placeholder="Price"
                               class="border p-2 rounded"
                               required>

                        <button type="button"
                                onclick="removeItem(this)"
                                class="bg-red-500 text-white rounded px-3">
                            X
                        </button>
                    </div>

                </div>

                <button type="button"
                        onclick="addItem()"
                        class="mt-3 bg-blue-500 text-white px-4 py-2 rounded">
                    + Add Item
                </button>
            </div>

            <div>
                <button type="submit"
                        class="bg-green-600 text-white px-6 py-2 rounded shadow">
                    Create Invoice
                </button>
            </div>

        </form>

    </div>

    <!-- Simple JS -->
    <script>
        let itemIndex = 1;

        function addItem() {
            const container = document.getElementById('items-container');

            const row = document.createElement('div');
            row.classList.add('item-row', 'grid', 'grid-cols-4', 'gap-3');

            row.innerHTML = `
                <input type="text"
                       name="items[${itemIndex}][description]"
                       placeholder="Description"
                       class="border p-2 rounded"
                       required>

                <input type="number"
                       name="items[${itemIndex}][quantity]"
                       placeholder="Qty"
                       class="border p-2 rounded"
                       required>

                <input type="number"
                       step="0.01"
                       name="items[${itemIndex}][price]"
                       placeholder="Price"
                       class="border p-2 rounded"
                       required>

                <button type="button"
                        onclick="removeItem(this)"
                        class="bg-red-500 text-white rounded px-3">
                    X
                </button>
            `;

            container.appendChild(row);
            itemIndex++;
        }

        function removeItem(button) {
            button.parentElement.remove();
        }
    </script>

</x-app-layout>