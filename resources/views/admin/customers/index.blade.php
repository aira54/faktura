@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-6">

    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-semibold">Daftar Customer</h2>
        <a href="{{ route('admin.customers.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded">
            + Tambah Customer
        </a>
    </div>

    @if(session('success'))
        <div class="mb-4 p-3 bg-green-200 text-green-800 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white shadow rounded">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-medium">Nama</th>
                    <th class="px-6 py-3 text-left text-sm font-medium">Email</th>
                    <th class="px-6 py-3 text-left text-sm font-medium">Phone</th>
                    <th class="px-6 py-3 text-left text-sm font-medium">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">

                @forelse($customers as $customer)
                    <tr>
                        <td class="px-6 py-4">{{ $customer->name }}</td>
                        <td class="px-6 py-4">{{ $customer->email }}</td>
                        <td class="px-6 py-4">{{ $customer->phone }}</td>
                        <td class="px-6 py-4 space-x-2">

                            <a href="{{ route('admin.customers.edit', $customer->id) }}"
                               class="text-blue-600">
                                Edit
                            </a>

                            <form action="{{ route('admin.customers.destroy', $customer->id) }}"
                                  method="POST"
                                  class="inline">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Yakin hapus?')"
                                        class="text-red-600">
                                    Hapus
                                </button>
                            </form>

                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                            Belum ada customer.
                        </td>
                    </tr>
                @endforelse

            </tbody>
        </table>
    </div>

</div>
@endsection