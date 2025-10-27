<?php

namespace App\Http\Controllers;

use App\Models\Utang;
use Illuminate\Http\Request;

class UtangController extends Controller
{
    public function index()
    {
        $utangSales = Utang::where('tipe', 'sales')->get();
        $utangPelanggan = Utang::where('tipe', 'pelanggan')->get();
        return view('utang.index', compact('utangSales', 'utangPelanggan'));
    }

    public function create()
    {
        return view('utang.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'tipe' => 'required|in:sales,pelanggan',
            'jumlah' => 'required|numeric',
            'tanggal' => 'required|date',
        ]);

        Utang::create($request->all());
        return redirect()->route('utang.index')->with('success', 'Data utang berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        Utang::findOrFail($id)->delete();
        return redirect()->route('utang.index')->with('success', 'Data utang berhasil dihapus.');
    }
}
