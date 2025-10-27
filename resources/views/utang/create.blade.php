@extends('layout')

@section('content')
<div class="container">
    <h2 class="mb-4">Tambah Utang</h2>

    <form action="{{ route('utang.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Tipe</label>
            <select name="tipe" class="form-select" required>
                <option value="sales">Utang ke Sales</option>
                <option value="pelanggan">Utang Pelanggan</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Jumlah</label>
            <input type="number" step="0.01" name="jumlah" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Tanggal</label>
            <input type="date" name="tanggal" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Keterangan</label>
            <textarea name="keterangan" class="form-control" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-dark">Simpan</button>
    </form>
</div>
@endsection
