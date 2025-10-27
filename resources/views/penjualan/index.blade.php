@extends('layout')

@section('content')
<h3>🛒 Transaksi Penjualan</h3>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif
@if(session('error'))
<div class="alert alert-danger">{{ session('error') }}</div>
@endif

{{-- Form transaksi penjualan --}}
<form method="POST" action="{{ route('penjualan.store') }}" class="card p-3 mb-4">
    @csrf
    <h5>Input Transaksi Penjualan</h5>
    <select name="barang_id" class="form-select mb-2" required>
        <option value="">-- Pilih Barang --</option>
        @foreach($barangs as $b)
            <option value="{{ $b->id }}">{{ $b->nama_barang }} (stok: {{ $b->stok }})</option>
        @endforeach
    </select>
    <input name="jumlah_terjual" type="number" class="form-control mb-2" placeholder="Jumlah Terjual" required>
    <button class="btn btn-primary w-100">Simpan Transaksi</button>
</form>

{{-- Tabel Riwayat Penjualan --}}
<h5>🧾 Riwayat Penjualan</h5>
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Tanggal</th>
            <th>Nama Barang</th>
            <th>Jumlah Terjual</th>
            <th>Harga Total</th>
        </tr>
    </thead>
    <tbody>
        @foreach($penjualans as $p)
        <tr>
            <td>{{ $p->tanggal }}</td>
            <td>{{ $p->barang->nama_barang }}</td>
            <td>{{ $p->jumlah_terjual }}</td>
            <td>Rp {{ number_format($p->harga_total, 0, ',', '.') }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
