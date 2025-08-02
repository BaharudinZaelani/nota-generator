<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function create()
    {
        return view('transaksi.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pelanggan' => 'required',
            'tanggal' => 'required|date',
            'items.*.nama' => 'required',
            'items.*.qty' => 'required|numeric',
            'items.*.harga' => 'required|numeric',
        ]);

        $total = collect($request->items)->reduce(fn($acc, $item) =>
        $acc + ($item['qty'] * $item['harga']), 0);

        $transaksi = Transaksi::create([
            'nama_pelanggan' => $request->nama_pelanggan,
            'tanggal' => $request->tanggal,
            'items' => $request->items,
            'total' => $total,
        ]);

        return redirect()->route('transaksi.show', $transaksi);
    }

    public function show(Transaksi $transaksi)
    {
        return view('transaksi.nota', compact('transaksi'));
    }
}