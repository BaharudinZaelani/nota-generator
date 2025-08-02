@extends('layouts.app')

@section('title', 'Nota')

@section('content')
<style>
    @media print {
        body * {
            visibility: hidden;
        }

        .print-content,
        .print-content * {
            visibility: visible;
        }

        .print-content {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
        }

        .no-print {
            display: none !important;
        }

        body,
        html {
            height: auto !important;
            margin: 0 !important;
            padding: 0 !important;
        }

        body * {
            visibility: hidden;
        }

        .print-content,
        .print-content * {
            visibility: visible;
        }

        .print-content {
            height: max-content;
            page-break-after: always;
            break-after: page;
        }
    }
</style>
<div class="print-content mx-auto bg-white rounded-lg shadow-md p-6 print:shadow-none">
    <h3 class="text-2xl font-bold text-gray-800">Nota Transaksi</h3>
    <div class="flex justify-between items-center mb-6">
        <div>
            <div>
                <table class="w-full text-sm text-gray-600">
                    <tr>
                        <td class="text-gray-600 pe-4 text-start">Nama Pelanggan</td>
                        <td class="font-semibold text-gray-800">: {{ $transaksi->nama_pelanggan }}</td>
                    </tr>
                    <tr>
                        <td class="text-gray-600 pe-4 text-start">Tanggal</td>
                        <td class="font-semibold text-gray-800">: {{ $transaksi->tanggal }}</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="bg-gray-100 p-3 rounded-lg">
            <p class="text-sm text-gray-500">No. Transaksi</p>
            <p class="font-mono text-gray-700">#{{ $transaksi->id }}</p>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200 border">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Qty</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Harga
                    </th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Subtotal
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($transaksi->items as $item)
                <tr>
                    <td class="px-4 py-3 text-gray-700">{{ $item['nama'] }}</td>
                    <td class="px-4 py-3 text-gray-700">{{ $item['qty'] }}</td>
                    <td class="px-4 py-3 text-gray-700">Rp {{ number_format($item['harga']) }}</td>
                    <td class="px-4 py-3 text-gray-700">Rp {{ number_format($item['qty'] * $item['harga']) }}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr class="bg-gray-50">
                    <td colspan="3" class="px-4 py-3 text-right font-medium text-gray-700">Total</td>
                    <td class="px-4 py-3 font-bold text-gray-900">Rp {{ number_format($transaksi->total) }}</td>
                </tr>
            </tfoot>
        </table>
    </div>

    <div class="mt-8 flex justify-between items-center">
        <div class="text-sm text-gray-500">
            <p>Terima kasih atas transaksi Anda</p>
            <p class="mt-1">~ {{env("APP_NAME")}} ~</p>
        </div>
        <button onclick="window.print()"
            class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 print:hidden">
            Cetak Nota
        </button>
    </div>
</div>
@endsection
