@extends('layouts.app')

@section('content')
<div class="container">
    <div class="p-5 mb-4 bg-light rounded-3 shadow-sm">
        <div class="container-fluid py-3">
            <h1 class="display-5 fw-bold">Selamat Datang, {{ Auth::user()->username }}!</h1>
            <p class="col-md-8 fs-4">Sistem Peminjaman Alat. Silakan pilih menu di bawah untuk mulai meminjam atau melihat status peminjaman Anda.</p>
            <a href="{{ route('peminjam.daftar_alat') }}" class="btn btn-primary btn-lg">Lihat Daftar Alat</a>
        </div>
    </div>

    <div class="row text-center">
        <div class="col-md-6 mb-3">
            <div class="card shadow-sm p-4">
                <h3>{{ $peminjamanAktif ?? 0 }}</h3>
                <p class="text-muted">Alat Sedang Dipinjam</p>
                <a href="{{ route('peminjam.index') }}" class="btn btn-outline-primary btn-sm">Cek Riwayat</a>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="card shadow-sm p-4">
                <h3>{{ $totalRiwayat ?? 0 }}</h3>
                <p class="text-muted">Total Peminjaman</p>
                <a href="{{ route('peminjam.index') }}" class="btn btn-outline-primary btn-sm">Lihat Semua</a>
            </div>
        </div>
    </div>
</div>
@endsection