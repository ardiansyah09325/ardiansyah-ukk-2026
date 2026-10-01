@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Daftar Alat</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        @foreach($alat as $item)
            <div class="col-md-4 mb-3">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->nama_alat }}</h5>
                        <p class="card-text text-muted mb-2">Kategori: {{ $item->kategori ?? '-' }}</p>
                        <p class="card-text">
                            <strong>Stok:</strong> 
                            <span class="badge {{ $item->stok > 0 ? 'bg-success' : 'bg-danger' }}">
                                {{ $item->stok }} Unit
                            </span>
                        </p>
                    </div>
                    <div class="card-footer bg-white border-top-0">
                        @if($item->stok > 0)
                            <a href="{{ route('peminjam.create', ['id_alat' => $item->id]) }}" class="btn btn-primary w-100">
                                Pinjam Alat
                            </a>
                        @else
                            <button class="btn btn-secondary w-100" disabled>Habis</button>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection