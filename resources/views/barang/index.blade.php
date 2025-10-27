@extends('layout')

@section('content')
<h3>📦 Data Barang</h3>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

{{-- Form tambah barang --}}
<form method="POST" action="{{ route('barang.store') }}" class="card p-3 mb-4">
    @csrf
    <h5>Tambah Barang Baru</h5>
    <input name="nama_barang" class="form-control mb-2" placeholder="Nama Barang" required>
    <input name="harga" type="number" class="form-control mb-2" placeholder="Harga" required>
    <input name="stok" type="number" class="form-control mb-2" placeholder="Jumlah Tersedia" required>
    <button class="btn btn-success w-100">Simpan Barang</button>
</form>

{{-- Tabel daftar barang --}}
<h5>Daftar Barang</h5>
<table class="table table-bordered table-striped">
    <thead>
        <tr><th>Nama Barang</th><th>Harga</th><th>Stok</th><th>Terjual</th></tr>
    </thead>
    <tbody>
        @foreach($barangs as $b)
        <tr>
            <td>{{ $b->nama_barang }}</td>
            <td>Rp {{ number_format($b->harga, 0, ',', '.') }}</td>
            <td>{{ $b->stok }}</td>
            <td>{{ $b->terjual }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
