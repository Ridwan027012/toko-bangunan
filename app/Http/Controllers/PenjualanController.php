<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Penjualan;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function index()
    {
        $barangs = Barang::all();
        $penjualans = Penjualan::with('barang')->orderBy('created_at', 'desc')->get();
        return view('penjualan.index', compact('barangs', 'penjualans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'jumlah_terjual' => 'required|integer|min:1',
        ]);

        $barang = Barang::findOrFail($request->barang_id);

        if ($barang->stok < $request->jumlah_terjual) {
            return back()->with('error', 'Stok tidak mencukupi!');
        }

        // update stok & terjual
        $barang->stok -= $request->jumlah_terjual;
        $barang->terjual += $request->jumlah_terjual;
        $barang->save();

        // simpan ke tabel penjualan
        Penjualan::create([
            'barang_id' => $barang->id,
            'jumlah_terjual' => $request->jumlah_terjual,
            'harga_total' => $barang->harga * $request->jumlah_terjual,
            'tanggal' => now()->toDateString(),
        ]);

        return back()->with('success', 'Transaksi penjualan berhasil disimpan!');
    }
}
