@extends('layouts.app')

@section('title', 'Input Transaksi')

@section('content')
<div class="max-w-2xl mx-auto bg-white rounded-lg shadow-md p-6">
    <h3 class="text-2xl font-bold text-gray-800 mb-6">Form Transaksi</h3>
    <form method="POST" action="{{ route('transaksi.store') }}" class="space-y-4">
        @csrf

        <div class="space-y-2">
            <label class="block text-sm font-medium text-gray-700">Nama Pelanggan</label>
            <input type="text" name="nama_pelanggan" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
        </div>

        <div class="space-y-2">
            <label class="block text-sm font-medium text-gray-700">Tanggal</label>
            <input type="date" name="tanggal" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 border" id="items">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Qty</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Harga</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr>
                        <td class="px-4 py-2"><input name="items[0][nama]" class="w-full px-2 py-1 border border-gray-300 rounded focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required></td>
                        <td class="px-4 py-2"><input type="number" name="items[0][qty]" class="w-full px-2 py-1 border border-gray-300 rounded focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required></td>
                        <td class="px-4 py-2"><input type="number" name="items[0][harga]" class="w-full px-2 py-1 border border-gray-300 rounded focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="flex space-x-3">
            <button type="button" class="px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" onclick="addItem()">
                + Tambah Item
            </button>
            <button type="submit" class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Buat Nota
            </button>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
    let i = 1;

    function addItem() {
        const row = `<tr>
            <td class="px-4 py-2"><input name="items[${i}][nama]" class="w-full px-2 py-1 border border-gray-300 rounded focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required></td>
            <td class="px-4 py-2"><input type="number" name="items[${i}][qty]" class="w-full px-2 py-1 border border-gray-300 rounded focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required></td>
            <td class="px-4 py-2"><input type="number" name="items[${i}][harga]" class="w-full px-2 py-1 border border-gray-300 rounded focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required></td>
        </tr>`;
        document.querySelector('#items tbody').insertAdjacentHTML('beforeend', row);
        i++;
    }
</script>
@endpush
