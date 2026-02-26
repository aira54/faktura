<x-app-layout>
    <div class="max-w-4xl mx-auto p-6">

        <h2 class="text-xl font-bold mb-4">Customer List</h2>

        <form method="POST" action="{{ route('customers.store') }}" class="space-y-2 mb-6">
            @csrf

            <input type="text" name="name" placeholder="Name" required class="border p-2 w-full">
            <input type="email" name="email" placeholder="Email" class="border p-2 w-full">
            <input type="text" name="phone" placeholder="Phone" class="border p-2 w-full">
            <input type="text" name="address" placeholder="Address" class="border p-2 w-full">

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
                Add Customer
            </button>
        </form>

        <div class="space-y-2">
            @foreach($customers as $customer)
                <div class="p-3 border rounded">
                    <strong>{{ $customer->name }}</strong><br>
                    <small>{{ $customer->email }}</small>
                </div>
            @endforeach
        </div>

    </div>
</x-app-layout>