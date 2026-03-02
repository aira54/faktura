<x-app-layout>
<div class="min-h-screen bg-gray-50">
<div class="max-w-6xl mx-auto p-10 space-y-10">

<!-- HEADER -->
<div>
    <h2 class="text-3xl font-bold text-gray-900">
        Create Invoice
    </h2>
    <p class="text-gray-500 mt-1 text-sm">
        Generate a new invoice for your customer
    </p>
</div>

<form method="POST" action="{{ route('app.invoices.store') }}" class="space-y-8">
@csrf

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

    <!-- LEFT SIDE -->
    <div class="lg:col-span-2 space-y-8">

        <!-- CUSTOMER CARD -->
        <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-8 space-y-6">
            <h3 class="font-semibold text-gray-800 text-lg">Customer Information</h3>

            <div>
                <label class="text-sm text-gray-500">Customer</label>
                <select name="customer_id"
                    class="w-full mt-2 rounded-xl border-gray-200 focus:ring-2 focus:ring-gray-900 focus:outline-none"
                    required>
                    @foreach($customers as $customer)
                        <option value="{{ $customer->id }}">
                            {{ $customer->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="grid grid-cols-2 gap-6">
                <div>
                    <label class="text-sm text-gray-500">Issue Date</label>
                    <input type="date" name="issue_date"
                        class="w-full mt-2 rounded-xl border-gray-200 focus:ring-2 focus:ring-gray-900 focus:outline-none"
                        required>
                </div>

                <div>
                    <label class="text-sm text-gray-500">Due Date</label>
                    <input type="date" name="due_date"
                        class="w-full mt-2 rounded-xl border-gray-200 focus:ring-2 focus:ring-gray-900 focus:outline-none"
                        required>
                </div>
            </div>
        </div>

        <!-- ITEMS CARD -->
        <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-8 space-y-6">
            <div class="flex justify-between items-center">
                <h3 class="font-semibold text-gray-800 text-lg">Invoice Items</h3>

                <button type="button"
                        onclick="addItem()"
                        class="text-sm bg-gray-900 text-white px-4 py-2 rounded-xl hover:bg-gray-800 transition">
                    + Add Item
                </button>
            </div>

            <div id="items-container" class="space-y-4">

                <div class="item-row grid grid-cols-12 gap-4 items-center border border-gray-100 rounded-2xl p-4">

                    <input type="text"
                           name="items[0][description]"
                           placeholder="Item description"
                           class="col-span-5 rounded-xl border-gray-200 focus:ring-2 focus:ring-gray-900"
                           required>

                    <input type="number"
                           name="items[0][quantity]"
                           placeholder="Qty"
                           class="col-span-2 rounded-xl border-gray-200 focus:ring-2 focus:ring-gray-900 quantity"
                           required>

                    <input type="number"
                           step="0.01"
                           name="items[0][price]"
                           placeholder="Price"
                           class="col-span-3 rounded-xl border-gray-200 focus:ring-2 focus:ring-gray-900 price"
                           required>

                    <button type="button"
                            onclick="removeItem(this)"
                            class="col-span-2 bg-red-100 text-red-600 rounded-xl py-2 hover:bg-red-200 transition">
                        Remove
                    </button>

                </div>

            </div>
        </div>

    </div>

    <!-- RIGHT SIDE SUMMARY -->
    <div class="space-y-6">

        <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-8 space-y-6">

            <h3 class="font-semibold text-gray-800 text-lg">Summary</h3>

            <div class="flex justify-between text-gray-500">
                <span>Subtotal</span>
                <span id="subtotal">Rp 0</span>
            </div>

            <div class="border-t pt-4 flex justify-between text-lg font-semibold text-gray-900">
                <span>Total</span>
                <span id="total">Rp 0</span>
            </div>

            <button type="submit"
                class="w-full bg-gray-900 text-white py-3 rounded-2xl font-semibold hover:bg-gray-800 transition">
                Create Invoice
            </button>

        </div>

    </div>

</div>

</form>
</div>
</div>

<script>
let itemIndex = 1;

function addItem() {
    const container = document.getElementById('items-container');

    const row = document.createElement('div');
    row.className = "item-row grid grid-cols-12 gap-4 items-center border border-gray-100 rounded-2xl p-4";

    row.innerHTML = `
        <input type="text"
               name="items[${itemIndex}][description]"
               placeholder="Item description"
               class="col-span-5 rounded-xl border-gray-200 focus:ring-2 focus:ring-gray-900"
               required>

        <input type="number"
               name="items[${itemIndex}][quantity]"
               placeholder="Qty"
               class="col-span-2 rounded-xl border-gray-200 focus:ring-2 focus:ring-gray-900 quantity"
               required>

        <input type="number"
               step="0.01"
               name="items[${itemIndex}][price]"
               placeholder="Price"
               class="col-span-3 rounded-xl border-gray-200 focus:ring-2 focus:ring-gray-900 price"
               required>

        <button type="button"
                onclick="removeItem(this)"
                class="col-span-2 bg-red-100 text-red-600 rounded-xl py-2 hover:bg-red-200 transition">
            Remove
        </button>
    `;

    container.appendChild(row);
    itemIndex++;
}

function removeItem(button) {
    button.parentElement.remove();
    calculateTotal();
}

document.addEventListener('input', function(e) {
    if (e.target.classList.contains('quantity') || e.target.classList.contains('price')) {
        calculateTotal();
    }
});

function calculateTotal() {
    let subtotal = 0;

    document.querySelectorAll('.item-row').forEach(row => {
        const qty = parseFloat(row.querySelector('.quantity')?.value) || 0;
        const price = parseFloat(row.querySelector('.price')?.value) || 0;
        subtotal += qty * price;
    });

    document.getElementById('subtotal').innerText = "Rp " + subtotal.toLocaleString('id-ID');
    document.getElementById('total').innerText = "Rp " + subtotal.toLocaleString('id-ID');
}
</script>

</x-app-layout>