@extends('layouts.app')

@section('title', config('app.name') . ' -- Tambah Kategori')

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
    max-width: 750px;
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

.kategori-form-label {
    font-weight: 600;
    font-size: 0.85rem;
    color: #334155;
    margin-bottom: 6px;
    display: block;
    transition: color 0.3s ease;
}

.input-wrapper {
    position: relative;
}

.input-icon {
    position: absolute;
    left: 14px;
    top: 50%;
    transform: translateY(-50%);
    color: #64748b;
}

.kategori-input {
    width: 100%;
    padding: 10px 14px 10px 40px;
    border: 1px solid #cbd5e1;
    border-radius: 8px;
    font-size: 0.9rem;
    background-color: #ffffff;
    color: #0f172a;
    transition: all 0.2s;
}

.kategori-input:focus {
    border-color: #2563eb;
    box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.15);
    outline: none;
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

.btn-back {
    background-color: #f1f5f9;
    border: 1px solid #cbd5e1;
    color: #475569;
    font-weight: 600;
    border-radius: 8px;
    padding: 8px 16px;
    transition: background-color 0.2s;
}

.btn-back:hover {
    background-color: #e2e8f0;
    color: #1e293b;
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

[data-bs-theme="dark"] .kategori-form-label {
    color: #e2e8f0;
}

[data-bs-theme="dark"] .kategori-input {
    background-color: #0f172a;
    border-color: #475569;
    color: #f8fafc;
}

[data-bs-theme="dark"] .kategori-input:focus {
    border-color: #3b82f6;
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.25);
}

[data-bs-theme="dark"] .input-icon {
    color: #94a3b8;
}

[data-bs-theme="dark"] .text-body-secondary {
    color: #94a3b8 !important;
}

[data-bs-theme="dark"] .btn-back {
    background-color: #334155;
    border-color: #475569;
    color: #cbd5e1;
}

[data-bs-theme="dark"] .btn-back:hover {
    background-color: #475569;
    color: #ffffff;
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
                Tambah Kategori
            </h1>

            <p class="kategori-description mb-0">
                Tambahkan kategori inventaris baru agar
                peralatan lebih mudah dikelola dan ditemukan.
            </p>

        </div>

    </div>

    <div class="kategori-mountain"></div>

</section>

{{-- =====================================================
     FORM CONTENT
====================================================== --}}

<div class="container-fluid">

    <section class="kategori-content">

        <div class="kategori-form-card">

            {{-- =================================================
                 FORM HEADER
            ================================================== --}}

            <div class="form-card-header">

                <div class="d-flex align-items-center gap-3">

                    <div class="form-heading-icon">
                        🔧
                    </div>

                    <div>

                        <h5 class="fw-bold mb-1">
                            Informasi Kategori
                        </h5>

                        <p class="text-body-secondary small mb-0">
                            Lengkapi informasi kategori inventaris di bawah ini.
                        </p>

                    </div>

                </div>

            </div>

            {{-- =================================================
                 FORM BODY
            ================================================== --}}

            <div class="form-card-body">

                <form
                    action="{{ route('kategori.store') }}"
                    method="POST"
                >

                    @csrf

                    {{-- NAMA KATEGORI --}}

                    <div class="mb-4">

                        <label
                            for="nama_kategori"
                            class="kategori-form-label"
                        >
                            Nama Kategori
                        </label>

                        <div class="input-wrapper">

                            <i class="bi bi-tags input-icon"></i>

                            <input
                                type="text"
                                name="nama_kategori"
                                id="nama_kategori"
                                class="form-control kategori-input"
                                value="{{ old('nama_kategori') }}"
                                placeholder="Contoh: Alat Olahraga"
                                required
                            >

                        </div>

                    </div>

                    {{-- KODE KATEGORI --}}

                    <div class="mb-4">

                        <label
                            for="kode_kategori"
                            class="kategori-form-label"
                        >
                            Kode Kategori
                        </label>

                        <div class="input-wrapper">

                            <i class="bi bi-upc-scan input-icon"></i>

                            <input
                                type="text"
                                name="kode_kategori"
                                id="kode_kategori"
                                class="form-control kategori-input"
                                value="{{ old('kode_kategori') }}"
                                placeholder="Contoh: AF-01"
                                required
                            >

                        </div>

                    </div>

                    {{-- KETERANGAN --}}

                    <div class="mb-4">

                        <label
                            for="keterangan"
                            class="kategori-form-label"
                        >
                            Keterangan
                        </label>

                        <div class="input-wrapper">

                            <i class="bi bi-card-text input-icon"></i>

                            <input
                                type="text"
                                name="keterangan"
                                id="keterangan"
                                class="form-control kategori-input"
                                value="{{ old('keterangan') }}"
                                placeholder="Masukkan keterangan tambahan"
                                required
                            >

                        </div>

                    </div>

                    {{-- ACTION --}}

                    <div class="kategori-actions d-flex justify-content-between align-items-center gap-3 mt-4">

                        <a
                            href="{{ route('kategori.index') }}"
                            class="btn btn-back px-4 py-2"
                        >

                            <i class="bi bi-arrow-left me-1"></i>

                            Kembali

                        </a>

                        <button
                            type="submit"
                            class="btn btn-mountain px-4 py-2"
                        >

                            <i class="bi bi-check2-circle me-1"></i>

                            Simpan Kategori

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </section>

</div>

</div>
@endsection