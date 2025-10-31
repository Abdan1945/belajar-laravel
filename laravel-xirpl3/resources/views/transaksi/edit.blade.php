@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Transaksi</h2>
    <form action="{{ route('transaksi.update', $transaksi->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Kode Transaksi</label>
            <input type="text" name="kode_transaksi" value="{{ $transaksi->kode_transaksi }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal" value="{{ $transaksi->tanggal }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Pelanggan</label>
            <select name="pelanggan_id" class="form-control" required>
                @foreach ($pelanggans as $p)
                    <option value="{{ $p->id }}" {{ $transaksi->pelanggan_id == $p->id ? 'selected' : '' }}>
                        {{ $p->nama }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Total Harga</label>
            <input type="number" name="total_harga" value="{{ $transaksi->total_harga }}" class="form-control" step="0.01" required>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
