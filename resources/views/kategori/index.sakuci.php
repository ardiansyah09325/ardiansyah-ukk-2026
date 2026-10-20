@extends('layouts.app')

@section('title', config('app.name') . ' -- Data Kategori')

@section('content')

<style>
/* =========================================================
   SIMPLE BLUE THEME - LIGHT & DARK MODE
========================================================= */
.kategori-page {
    min-height: calc(100vh - 80px);
    background-color: #f8fafc;
    padding-bottom: 40px;
    transition: background-color 0.3s ease;
}

.kategori-header {
    background: linear-gradient(135deg, #2563eb, #1d4ed8);
    color: #ffffff;
    padding: 35px 25px;
    border-radius: 0 0 20px 20px;
    margin-bottom: 30px;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
}

.kategori-badge {
    display: inline-block;
    padding: 5px 12px;
    font-size: 0.75rem;
    font-weight: 600;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 20px;
    margin-bottom: 10px;
}

.kategori-title {
    font-size: 1.8rem;
    font-weight: 700;
}

.kategori-description {
    font-size: 0.95rem;
    opacity: 0.9;
}

.kategori-form-card {
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
[data-bs-theme="dark"] .kategori-page {
    background-color: #0f172a;
}

[data-bs-theme="dark"] .kategori-header {
    background: linear-gradient(135deg, #1e3a8a, #1e293b);
}

[data-bs-theme="dark"] .kategori-form-card {
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

<div class="kategori-page">
    {{-- =====================================================
        HEADER
    ====================================================== --}}
    <section class="kategori-header">
        <div class="container-fluid px-4">
            <div class="kategori-header-content">
                <span class="kategori-badge">
                    INVENTARIS ALAT
                </span>
                <h1 class="kategori-title fw-bold mb-3">
                    Data Kategori
                </h1>
                <p class="kategori-description mb-0">
                    Kelola seluruh daftar kategori inventaris peralatan di sini.
                </p>
            </div>
        </div>
    </section>

    {{-- =====================================================
        CONTENT CONTAINER
    ====================================================== --}}
    <div class="container-fluid px-4">
        <section class="kategori-content">
            <div class="kategori-form-card">

                {{-- CARD HEADER & ACTION --}}
                <div class="form-card-header d-flex justify-content-between align-items-center flex-wrap gap-3">
                    <div class="d-flex align-items-center gap-3">
                        <div class="form-heading-icon">
                            📂
                        </div>
                        <div>
                            <h5 class="fw-bold mb-1">
                                Daftar Kategori Alat
                            </h5>
                            <p class="text-body-secondary small mb-0">
                                Berikut adalah total kategori yang sudah terdaftar.
                            </p>
                        </div>
                    </div>

                    <a href="{{ route('kategori.create') }}" class="btn btn-mountain btn-sm px-3 py-2">
                        <i class="bi bi-plus-lg me-1"></i> Tambah Kategori
                    </a>
                </div>

                {{-- CARD BODY & TABLE --}}
                <div class="form-card-body">
                    <div class="table-responsive">
                        <table class="table table-custom align-middle mb-0">
                            <thead>
                                <tr>
                                    <th width="5%">No</th>
                                    <th width="20%">Kode Kategori</th>
                                    <th width="25%">Nama Kategori</th>
                                    <th width="30%">Keterangan</th>
                                    <th width="20%" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @forelse ($data as $d)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td><span class="fw-semibold text-primary">{{ $d->kode_kategori }}</span></td>
                                        <td>{{ $d->nama_kategori }}</td>
                                        <td class="text-body-secondary">{{ $d->keterangan }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('kategori.edit', ['kategori' => $d->id_kategori]) }}" class="btn btn-warning btn-sm px-2 py-1">
                                                <i class="bi bi-pencil-square"></i> Edit
                                            </a>
                                            <form action="{{ route('kategori.destroy', ['id' => $d->id_kategori]) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah benar akan dihapus?');">
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
                                            Belum ada data kategori.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{-- PAGINATION --}}
                    <div class="mt-4 d-flex justify-content-end">
                        {!! $data->links() !!}
                    </div>
                </div>

            </div>
        </section>
    </div>
</div>
@endsection