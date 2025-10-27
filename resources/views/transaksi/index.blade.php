@extends('layout')

@section('content')
<h3>📊 Pemasukan & Pengeluaran Hari Ini</h3>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<form method="POST" action="{{ route('transaksi.store') }}" class="card p-3 mb-4">
    @csrf
    <h5>Tambah Transaksi</h5>
    <select name="tipe" class="form-select mb-2" required>
        <option value="pemasukan">Pemasukan</option>
        <option value="pengeluaran">Pengeluaran</option>
    </select>
    <input name="jumlah" type="number" class="form-control mb-2" placeholder="Jumlah" required>
    <input name="tanggal" type="date" class="form-control mb-2" value="{{ date('Y-m-d') }}" required>
    <textarea name="keterangan" class="form-control mb-2" placeholder="Keterangan"></textarea>
    <button class="btn btn-primary w-100">Simpan</button>
</form>

<table class="table table-bordered table-striped">
    <thead>
        <tr><th>Tipe</th><th>Jumlah</th><th>Keterangan</th><th>Tanggal</th></tr>
    </thead>
    <tbody>
        @foreach($transaksis as $t)
        <tr>
            <td>{{ ucfirst($t->tipe) }}</td>
            <td>{{ $t->jumlah }}</td>
            <td>{{ $t->keterangan }}</td>
            <td>{{ $t->tanggal }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
