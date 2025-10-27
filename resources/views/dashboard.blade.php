@extends('layout')

@section('content')
<div class="text-center">
    <h2>Dashboard Toko Bangunan</h2>
    <p class="text-muted mb-4">Kelola stok, transaksi, dan laporan toko Anda.</p>

    <div class="d-flex justify-content-center gap-4 mt-3 flex-wrap">
        <a href="{{ route('barang.index') }}" class="btn btn-outline-primary btn-lg px-4 py-3">
            📦 Kelola Barang
        </a>
        <a href="{{ route('penjualan.index') }}" class="btn btn-outline-success btn-lg px-4 py-3">
            🛒 Penjualan
        </a>
        <a href="{{ route('utang.index') }}" class="btn btn-outline-success btn-lg px-4 py-3">
            💰 Utang
        </a>

    </div>
</div>


@endsection
