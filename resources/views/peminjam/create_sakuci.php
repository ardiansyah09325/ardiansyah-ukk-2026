@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Form Peminjaman Alat</h2>
    
    <!-- Menampilkan pesan error validasi jika ada -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('peminjam.store') }}" method="POST">
        @csrf
        
        <!-- ID User diambil otomatis dari akun yang sedang login -->
        <input type="hidden" name="id_user" value="{{ Auth::id() }}">

        <div class="mb-3">
            <label for="id_alat" class="form-label">Pilih Alat</label>
            <select name="id_alat" id="id_alat" class="form-control" required>
                <option value="">-- Pilih Alat yang Tersedia --</option>
                @foreach($alat as $item)
                    <option value="{{ $item->id }}" {{ (request('id_alat') == $item->id) ? 'selected' : '' }}>
                        {{ $item->nama_alat }} (Stok: {{ $item->stok }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah</label>
            <input type="number" name="jumlah" id="jumlah" class="form-control" value="1" min="1" required>
        </div>

        <div class="mb-3">
            <label for="tanggal_pinjam" class="form-label">Tanggal Pinjam</label>
            <input type="date" name="tanggal_pinjam" id="tanggal_pinjam" class="form-control" value="{{ date('Y-m-d') }}" required>
        </div>

        <div class="mb-3">
            <label for="tanggal_kembali" class="form-label">Rencana Tanggal Kembali</label>
            <input type="date" name="tanggal_kembali" id="tanggal_kembali" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Ajukan Peminjaman</button>
        <a href="{{ route('peminjam.daftar_alat') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection