@extends('layouts.app')

@section('title', config('app.name') . ' -- Tambah Alat')

@section('content')

<style>
/* =========================================================
   SIMPLE BLUE THEME - LIGHT & DARK MODE (TAMBAH ALAT)
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
    max-width: 750px;
    margin: 0 auto;
    background: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: 12px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
    transition: background-color 0.3s ease, border-color 0.3s ease;
}

.alat-card-header {
    padding: 20px 25px;
    border-bottom: 1px solid #e2e8f0;
    background: #f8fafc;
    border-top-left-radius: 12px;
    border-top-right-radius: 12px;
    transition: background-color 0.3s ease, border-color 0.3s ease;
}

.alat-card-icon {
    font-size: 24px;
}

.alat-form-body {
    padding: 25px;
}

.alat-label {
    font-weight: 600;
    font-size: 0.85rem;
    color: #334155;
    margin-bottom: 6px;
    display: flex;
    align-items: center;
    gap: 6px;
    transition: color 0.3s ease;
}

.alat-label i {
    color: #2563eb;
}

.alat-input,
.alat-select {
    width: 100%;
    padding: 10px 14px;
    border: 1px solid #cbd5e1;
    border-radius: 8px;
    font-size: 0.9rem;
    background-color: #ffffff;
    color: #0f172a;
    transition: all 0.2s;
}

.alat-input:focus,
.alat-select:focus {
    border-color: #2563eb;
    box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.15);
    outline: none;
}

.required-mark {
    color: #dc2626;
}

.btn-alat-save {
    background-color: #2563eb;
    border: 1px solid #2563eb;
    color: #ffffff;
    font-weight: 600;
    border-radius: 8px;
    padding: 8px 16px;
    transition: background-color 0.2s;
}

.btn-alat-save:hover {
    background-color: #1d4ed8;
    border-color: #1d4ed8;
    color: #ffffff;
}

.btn-alat-back {
    background-color: #f1f5f9;
    border: 1px solid #cbd5e1;
    color: #475569;
    font-weight: 600;
    border-radius: 8px;
    padding: 8px 16px;
    transition: background-color 0.2s;
}

.btn-alat-back:hover {
    background-color: #e2e8f0;
    color: #1e293b;
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

[data-bs-theme="dark"] .alat-card-header {
    background: #0f172a;
    border-bottom-color: #334155;
}

[data-bs-theme="dark"] .alat-label {
    color: #e2e8f0;
}

[data-bs-theme="dark"] .alat-label i {
    color: #60a5fa;
}

[data-bs-theme="dark"] .alat-input,
[data-bs-theme="dark"] .alat-select {
    background-color: #0f172a;
    border-color: #475569;
    color: #f8fafc;
}

[data-bs-theme="dark"] .alat-input:focus,
[data-bs-theme="dark"] .alat-select:focus {
    border-color: #3b82f6;
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.25);
}

[data-bs-theme="dark"] .alat-card-subtitle {
    color: #94a3b8 !important;
}

[data-bs-theme="dark"] .btn-alat-back {
    background-color: #334155;
    border-color: #475569;
    color: #cbd5e1;
}

[data-bs-theme="dark"] .btn-alat-back:hover {
    background-color: #475569;
    color: #ffffff;
}
</style>

<div class="alat-page">

    <!-- =====================================================
         HEADER
         ===================================================== -->

    <div class="alat-header">

        <div class="container-fluid px-4">

            <span class="alat-badge">
                <i class="bi bi-backpack-fill me-1"></i>
                Inventaris Camping
            </span>

            <h1 class="alat-title fw-bold mb-3">
                Tambah Alat
            </h1>

            <p class="alat-description mb-0">
                Tambahkan peralatan camping baru ke dalam inventaris
                untuk mendukung kebutuhan pendakian dan petualangan.
            </p>

        </div>

    </div>

    <!-- =====================================================
         FORM CARD
         ===================================================== -->

    <div class="container-fluid">

        <div class="alat-form-card">

            <!-- CARD HEADER -->

            <div class="alat-card-header">

                <div class="d-flex align-items-center gap-3">

                    <div class="alat-card-icon">
                        🔧
                    </div>

                    <div>

                        <h5 class="fw-bold mb-1">
                            Informasi Alat
                        </h5>

                        <div class="alat-card-subtitle text-body-secondary small">
                            Lengkapi data peralatan yang akan ditambahkan.
                        </div>

                    </div>

                </div>

            </div>

            <!-- FORM -->

            <div class="alat-form-body">

                <form
                    action="{{ route('alat.store') }}"
                    method="POST"
                >

                    @csrf

                    <!-- NAMA ALAT -->

                    <div class="mb-4">

                        <label
                            for="nama_alat"
                            class="alat-label"
                        >
                            <i class="bi bi-tag-fill"></i>
                            Nama Alat
                            <span class="required-mark">*</span>
                        </label>

                        <input
                            type="text"
                            name="nama_alat"
                            id="nama_alat"
                            class="form-control alat-input"
                            value="{{ old('nama_alat') }}"
                            placeholder="Contoh: Barbel"
                            required
                        >

                    </div>

                    <!-- KODE ALAT -->

                    <div class="mb-4">

                        <label
                            for="kode_alat"
                            class="alat-label"
                        >
                            <i class="bi bi-upc-scan"></i>
                            Kode Alat
                            <span class="required-mark">*</span>
                        </label>

                        <input
                            type="text"
                            name="kode_alat"
                            id="kode_alat"
                            class="form-control alat-input"
                            value="{{ old('kode_alat') }}"
                            placeholder="Contoh: AF-01"
                            required
                        >

                    </div>

                    <!-- KATEGORI -->

                    <div class="mb-4">

                        <label
                            for="id_kategori"
                            class="alat-label"
                        >
                            <i class="bi bi-tags-fill"></i>
                            Kategori
                            <span class="required-mark">*</span>
                        </label>

                        <select
                            name="id_kategori"
                            id="id_kategori"
                            class="form-select alat-select"
                            required
                        >

                            <option value="">
                                -- Pilih Kategori --
                            </option>

                            @foreach ($kategori as $k)

                                <option
                                    value="{{ $k->id_kategori }}"
                                    {{ old('id_kategori') == $k->id_kategori ? 'selected' : '' }}
                                >
                                    {{ $k->nama_kategori }}
                                </option>

                            @endforeach

                        </select>

                    </div>

                    <!-- ACTION -->

                    <div class="d-flex justify-content-between align-items-center gap-3 mt-4">

                        <a
                            href="{{ route('alat.index') }}"
                            class="btn btn-alat-back px-4 py-2"
                        >
                            <i class="bi bi-arrow-left me-1"></i>
                            Kembali
                        </a>

                        <button
                            type="submit"
                            class="btn btn-alat-save px-4 py-2"
                        >
                            <i class="bi bi-check2-circle me-1"></i>
                            Simpan Alat
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection