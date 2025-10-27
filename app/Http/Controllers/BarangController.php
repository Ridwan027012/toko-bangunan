<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::all();
        return view('barang.index', compact('barangs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required',
            'harga' => 'required|integer',
            'stok' => 'required|integer',
            'terjual' => 'nullable|integer',
        ]);

        Barang::create($request->except('_token'));

        return back()->with('success', 'Barang berhasil ditambahkan!');
    }
}
