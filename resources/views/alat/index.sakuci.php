@extends('layouts.app')

@section('title', config('app.name') . ' -- Data Alat')

@section('content')

<style>
/* =========================================================
   SIMPLE BLUE THEME - LIGHT & DARK MODE
========================================================= */
.alat-page {
    min-height: calc(100vh - 80px);
    background-color: #f8fafc;
    padding-bottom: 40px;
    transition: background-color 0.3s ease;
}

.alat-header {
    background: linear-gradient(135deg, #2563eb, #1d4ed8);
    color: #ffffff;
    padding: 35px 25px;
    border-radius: 0 0 20px 20px;
    margin-bottom: 30px;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
}

.alat-badge {
    display: inline-block;
    padding: 5px 12px;
    font-size: 0.75rem;
    font-weight: 600;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 20px;
    margin-bottom: 10px;
}

.alat-title {
    font-size: 1.8rem;
    font-weight: 700;
}

.alat-description {
    font-size: 0.95rem;
    opacity: 0.9;
}

.alat-form-card {
    max-width: 1000px;
    margin: 0 auto;
    background: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: 12px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
    transition: background-color 0.3s ease, border-color 0.3s ease;
}

.form-card-header {
    padding: 20px 25px;
    border-bottom: 1px solid #e2e8f0;
    background: #f8fafc;
    border-top-left-radius: 12px;
    border-top-right-radius: 12px;
    transition: background-color 0.3s ease, border-color 0.3s ease;
}

.form-heading-icon {
    font-size: 24px;
}

.form-card-body {
    padding: 25px;
}

.btn-mountain {
    background-color: #2563eb;
    border: 1px solid #2563eb;
    color: #ffffff;
    font-weight: 600;
    border-radius: 8px;
    padding: 8px 16px;
    transition: background-color 0.2s;
}

.btn-mountain:hover {
    background-color: #1d4ed8;
    border-color: #1d4ed8;
    color: #ffffff;
}

/* CUSTOM TABLE STYLING */
.table-custom {
    color: #0f172a;
    vertical-align: middle;
}

.table-custom th {
    background-color: #f8fafc;
    color: #334155;
    font-weight: 600;
    border-bottom: 2px solid #e2e8f0;
    padding: 12px 16px;
}

.table-custom td {
    padding: 12px 16px;
    border-bottom: 1px solid #e2e8f0;
}

/* =========================================================
   DARK MODE OVERRIDES
========================================================= */
[data-bs-theme="dark"] .alat-page {
    background-color: #0f172a;
}

[data-bs-theme="dark"] .alat-header {
    background: linear-gradient(135deg, #1e3a8a, #1e293b);
}

[data-bs-theme="dark"] .alat-form-card {
    background: #1e293b;
    border-color: #334155;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.3);
}

[data-bs-theme="dark"] .form-card-header {
    background: #0f172a;
    border-bottom-color: #334155;
}

[data-bs-theme="dark"] .text-body-secondary {
    color: #94a3b8 !important;
}

[data-bs-theme="dark"] .table-custom {
    color: #f8fafc;
}

[data-bs-theme="dark"] .table-custom th {
    background-color: #0f172a;
    color: #cbd5e1;
    border-bottom-color: #334155;
}

[data-bs-theme="dark"] .table-custom td {
    border-bottom-color: #334155;
}
</style>

<div class="alat-page">
    {{-- =====================================================
        HEADER
    ====================================================== --}}
    <section class="alat-header">
        <div class="container-fluid px-4">
            <div class="alat-header-content">
                <span class="alat-badge">
                    INVENTARIS ALAT
                </span>
                <h1 class="alat-title fw-bold mb-3">
                    Daftar Alat
                </h1>
                <p class="alat-description mb-0">
                    Kelola dan pantau seluruh data inventaris peralatan di sini.
                </p>
            </div>
        </div>
    </section>

    {{-- =====================================================
        CONTENT CONTAINER
    ====================================================== --}}
    <div class="container-fluid px-4">
        <section class="alat-content">
            <div class="alat-form-card">

                {{-- CARD HEADER & ACTION --}}
                <div class="form-card-header d-flex justify-content-between align-items-center flex-wrap gap-3">
                    <div class="d-flex align-items-center gap-3">
                        <div class="form-heading-icon">
                            🛠️
                        </div>
                        <div>
                            <h5 class="fw-bold mb-1">
                                Data Alat Inventaris
                            </h5>
                            <p class="text-body-secondary small mb-0">
                                Berikut adalah daftar seluruh peralatan yang terdaftar.
                            </p>
                        </div>
                    </div>

                    <a href="{{ route('alat.create') }}" class="btn btn-mountain btn-sm px-3 py-2">
                        <i class="bi bi-plus-lg me-1"></i> Tambah Alat
                    </a>
                </div>

                {{-- CARD BODY & TABLE --}}
                <div class="form-card-body">
                    <div class="table-responsive">
                        <table class="table table-custom align-middle mb-0">
                            <thead>
                                <tr>
                                    <th width="5%">No</th>
                                    <th width="25%">Nama Alat</th>
                                    <th width="20%">Kode Alat</th>
                                    <th width="25%">Kategori</th>
                                    <th width="25%" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @forelse ($datal as $alats)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td class="fw-semibold">{{ $alats->nama_alat }}</td>
                                    <td>
                                        <span class="badge bg-secondary bg-opacity-10 text-secondary border px-2 py-1">
                                            {{ $alats->kode_alat }}
                                        </span>
                                    </td>
                                    <td>
                                        @php
                                            $namaKategori = '-';
                                            foreach ($kategori as $k) {
                                                if ($k->id_kategori == $alats->id_kategori) {
                                                    $namaKategori = $k->nama_kategori;
                                                    break;
                                                }
                                            }
                                        @endphp
                                        <span class="text-body-secondary">{{ $namaKategori }}</span>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('alat.edit', ['alat' => $alats->id_alat]) }}" class="btn btn-warning btn-sm px-2 py-1">
                                            <i class="bi bi-pencil-square"></i> Edit
                                        </a>
                                        <form action="{{ route('alat.delete', ['id' => $alats->id_alat]) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus alat ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm px-2 py-1">
                                                <i class="bi bi-trash"></i> Hapus
                                            </button>
                                        </form> 
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center py-4 text-body-secondary">
                                        Belum ada data alat.
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{-- PAGINATION --}}
                    <div class="mt-4 d-flex justify-content-end">
                        {!! $datal->links() !!}
                    </div>
                </div>

            </div>
        </section>
    </div>
</div>
@endsection