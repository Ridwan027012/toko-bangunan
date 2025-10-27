<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::whereDate('tanggal', today())->get();
        return view('transaksi.index', compact('transaksis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tipe' => 'required|in:pemasukan,pengeluaran',
            'jumlah' => 'required|integer',
            'tanggal' => 'required|date',
        ]);

        Transaksi::create($request->except('_token'));
        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil disimpan');
    }
}
