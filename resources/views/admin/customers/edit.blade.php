@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto sm:px-6 lg:px-8 py-6">

    <h2 class="text-xl font-semibold mb-6">Edit Customer</h2>

    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-200 text-red-800 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>- {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="bg-white shadow rounded p-6">
        <form action="{{ route('admin.customers.update', $customer->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block mb-1">Nama</label>
                <input type="text" name="name"
                       value="{{ old('name', $customer->name) }}"
                       class="w-full border rounded px-3 py-2">
            </div>

            <div class="mb-4">
                <label class="block mb-1">Email</label>
                <input type="email" name="email"
                       value="{{ old('email', $customer->email) }}"
                       class="w-full border rounded px-3 py-2">
            </div>

            <div class="mb-4">
                <label class="block mb-1">Phone</label>
                <input type="text" name="phone"
                       value="{{ old('phone', $customer->phone) }}"
                       class="w-full border rounded px-3 py-2">
            </div>

            <div class="mb-4">
                <label class="block mb-1">Address</label>
                <textarea name="address"
                          class="w-full border rounded px-3 py-2">{{ old('address', $customer->address) }}</textarea>
            </div>

            <div class="flex justify-end">
                <a href="{{ route('admin.customers.index') }}"
                   class="mr-3 px-4 py-2 bg-gray-400 text-white rounded">
                    Batal
                </a>

                <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white rounded">
                    Update
                </button>
            </div>
        </form>
    </div>
@if(session('warning'))
    <div class="mb-4 p-3 bg-yellow-200 text-yellow-800 rounded">
        {{ session('warning') }}
    </div>
@endif
</div>
@endsection