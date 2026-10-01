@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Riwayat Peminjaman Saya</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Alat</th>
                    <th>Jumlah</th>
                    <th>Tgl Pinjam</th>
                    <th>Tgl Kembali</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($peminjaman as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->alat->nama_alat ?? '-' }}</td>
                    <td>{{ $item->jumlah }}</td>
                    <td>{{ $item->tanggal_pinjam }}</td>
                    <td>{{ $item->tanggal_kembali }}</td>
                    <td>
                        <span class="badge 
                            @if($item->status == 'Pending') bg-warning 
                            @elseif($item->status == 'Dipinjam') bg-primary 
                            @else bg-success @endif">
                            {{ $item->status }}
                        </span>
                    </td>
                    <td>
                        @if($item->status == 'Dipinjam')
                            <a href="{{ route('peminjam.pengembalian', $item->id) }}" class="btn btn-sm btn-success">Kembalikan</a>
                        @else
                            <span class="text-muted">-</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection