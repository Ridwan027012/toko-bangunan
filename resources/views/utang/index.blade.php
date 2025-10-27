@extends('layout')

@section('content')
<div class="container">
    <h2 class="mb-4">💰 Data Utang</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('utang.create') }}" class="btn btn-dark mb-3">+ Tambah Utang</a>

    <ul class="nav nav-tabs mb-3" id="utangTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="sales-tab" data-bs-toggle="tab" data-bs-target="#sales" type="button" role="tab">Utang ke Sales</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pelanggan-tab" data-bs-toggle="tab" data-bs-target="#pelanggan" type="button" role="tab">Utang Pelanggan</button>
        </li>
    </ul>

    <div class="tab-content">
        <div class="tab-pane fade show active" id="sales" role="tabpanel">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Nama</th>
                        <th>Jumlah</th>
                        <th>Tanggal</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($utangSales as $utang)
                        <tr>
                            <td>{{ $utang->nama }}</td>
                            <td>Rp {{ number_format($utang->jumlah, 0, ',', '.') }}</td>
                            <td>{{ $utang->tanggal }}</td>
                            <td>{{ $utang->keterangan }}</td>
                            <td>
                                <form action="{{ route('utang.destroy', $utang->id) }}" method="POST" onsubmit="return confirm('Yakin hapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="tab-pane fade" id="pelanggan" role="tabpanel">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Nama</th>
                        <th>Jumlah</th>
                        <th>Tanggal</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($utangPelanggan as $utang)
                        <tr>
                            <td>{{ $utang->nama }}</td>
                            <td>Rp {{ number_format($utang->jumlah, 0, ',', '.') }}</td>
                            <td>{{ $utang->tanggal }}</td>
                            <td>{{ $utang->keterangan }}</td>
                            <td>
                                <form action="{{ route('utang.destroy', $utang->id) }}" method="POST" onsubmit="return confirm('Yakin hapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
