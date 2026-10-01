@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Form Pengembalian Alat</h2>
    
    <div class="card shadow-sm p-4 mt-3">
        <form action="{{ route('peminjam.pengembalian.store', $peminjaman->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Nama Alat</label>
                <input type="text" class="form-control" value="{{ $peminjaman->alat->nama_alat }}" readonly>
            </div>

            <div class="mb-3">
                <label class="form-label">Jumlah yang Dipinjam</label>
                <input type="text" class="form-control" value="{{ $peminjaman->jumlah }}" readonly>
            </div>

            <div class="mb-3">
                <label for="tanggal_dikembalikan" class="form-label">Tanggal Pengembalian Aktual</label>
                <input type="date" name="tanggal_dikembalikan" id="tanggal_dikembalikan" class="form-control" value="{{ date('Y-m-d') }}" required>
            </div>

            <div class="mb-3">
                <label for="kondisi" class="form-label">Kondisi Alat saat Dikembalikan</label>
                <select name="kondisi" id="kondisi" class="form-control" required>
                    <option value="Baik">Baik</option>
                    <option value="Rusak Ringan">Rusak Ringan</option>
                    <option value="Rusak Berat">Rusak Berat</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success">Konfirmasi Pengembalian</button>
            <a href="{{ route('peminjam.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection