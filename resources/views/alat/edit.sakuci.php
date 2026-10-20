@extends('layouts.app')

@section('title', config('app.name') . ' -- Edit Alat')

@section('content')

<style>
/* =========================================================
   SIMPLE BLUE THEME - LIGHT & DARK MODE (EDIT ALAT)
========================================================= */
.edit-alat-page {
    min-height: calc(100vh - 80px);
    background-color: #f8fafc;
    padding: 30px 20px 40px;
    transition: background-color 0.3s ease;
}

.edit-alat-header {
    background: linear-gradient(135deg, #2563eb, #1d4ed8);
    color: #ffffff;
    padding: 35px 25px;
    border-radius: 16px;
    margin-bottom: 25px;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
}

.edit-alat-badge {
    display: inline-block;
    padding: 5px 12px;
    font-size: 0.75rem;
    font-weight: 600;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 20px;
    margin-bottom: 10px;
}

.edit-alat-title {
    font-size: 1.8rem;
    font-weight: 700;
}

.edit-alat-description {
    font-size: 0.95rem;
    opacity: 0.9;
}

.edit-header-icon {
    font-size: 2.5rem;
    opacity: 0.8;
}

.edit-form-card {
    background: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: 12px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
    transition: background-color 0.3s ease, border-color 0.3s ease;
}

.edit-form-header {
    padding: 20px 25px;
    border-bottom: 1px solid #e2e8f0;
    background: #f8fafc;
    border-top-left-radius: 12px;
    border-top-right-radius: 12px;
    transition: background-color 0.3s ease, border-color 0.3s ease;
}

.edit-form-icon {
    font-size: 20px;
}

.edit-form-body {
    padding: 25px;
}

.form-label-custom {
    font-weight: 600;
    font-size: 0.85rem;
    color: #334155;
    margin-bottom: 6px;
    display: block;
    transition: color 0.3s ease;
}

.form-label-custom i {
    color: #2563eb;
    margin-right: 5px;
}

.input-wrapper {
    position: relative;
}

.input-wrapper .field-icon {
    position: absolute;
    left: 14px;
    top: 50%;
    transform: translateY(-50%);
    color: #64748b;
}

.custom-input,
.custom-select {
    width: 100%;
    padding: 10px 14px;
    border: 1px solid #cbd5e1;
    border-radius: 8px;
    font-size: 0.9rem;
    background-color: #ffffff;
    color: #0f172a;
    transition: all 0.2s;
}

.input-wrapper .custom-input {
    padding-left: 40px;
}

.custom-input:focus,
.custom-select:focus {
    border-color: #2563eb;
    box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.15);
    outline: none;
}

.edit-info-box {
    display: flex;
    align-items: flex-start;
    gap: 10px;
    padding: 12px 15px;
    border-radius: 8px;
    background: #eff6ff;
    border: 1px solid #bfdbfe;
    font-size: 0.85rem;
    color: #1e40af;
}

.edit-info-box i {
    color: #2563eb;
    font-size: 1rem;
}

.edit-info-box p {
    margin: 0;
    line-height: 1.5;
}

.btn-edit-save {
    background-color: #2563eb;
    border: 1px solid #2563eb;
    color: #ffffff;
    font-weight: 600;
    border-radius: 8px;
    padding: 8px 16px;
    transition: background-color 0.2s;
}

.btn-edit-save:hover {
    background-color: #1d4ed8;
    border-color: #1d4ed8;
    color: #ffffff;
}

.btn-edit-back {
    background-color: #f1f5f9;
    border: 1px solid #cbd5e1;
    color: #475569;
    font-weight: 600;
    border-radius: 8px;
    padding: 8px 16px;
    transition: background-color 0.2s;
}

.btn-edit-back:hover {
    background-color: #e2e8f0;
    color: #1e293b;
}

/* =========================================================
   DARK MODE OVERRIDES
========================================================= */
[data-bs-theme="dark"] .edit-alat-page {
    background-color: #0f172a;
}

[data-bs-theme="dark"] .edit-alat-header {
    background: linear-gradient(135deg, #1e3a8a, #1e293b);
}

[data-bs-theme="dark"] .edit-form-card {
    background: #1e293b;
    border-color: #334155;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.3);
}

[data-bs-theme="dark"] .edit-form-header {
    background: #0f172a;
    border-bottom-color: #334155;
}

[data-bs-theme="dark"] .form-label-custom {
    color: #e2e8f0;
}

[data-bs-theme="dark"] .form-label-custom i {
    color: #60a5fa;
}

[data-bs-theme="dark"] .custom-input,
[data-bs-theme="dark"] .custom-select {
    background-color: #0f172a;
    border-color: #475569;
    color: #f8fafc;
}

[data-bs-theme="dark"] .custom-input:focus,
[data-bs-theme="dark"] .custom-select:focus {
    border-color: #3b82f6;
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.25);
}

[data-bs-theme="dark"] .input-wrapper .field-icon {
    color: #94a3b8;
}

[data-bs-theme="dark"] .edit-info-box {
    background: rgba(30, 58, 138, 0.3);
    border-color: #1e3a8a;
    color: #93c5fd;
}

[data-bs-theme="dark"] .edit-info-box i {
    color: #60a5fa;
}

[data-bs-theme="dark"] .edit-form-subtitle {
    color: #94a3b8 !important;
}

[data-bs-theme="dark"] .btn-edit-back {
    background-color: #334155;
    border-color: #475569;
    color: #cbd5e1;
}

[data-bs-theme="dark"] .btn-edit-back:hover {
    background-color: #475569;
    color: #ffffff;
}
</style>

<div class="edit-alat-page">

    {{-- =========================================================
         HEADER
    ========================================================= --}}
    <div class="edit-alat-header">

        <div class="container-fluid px-2">

            <div class="row align-items-center g-4">

                <div class="col-lg-8">

                    <span class="edit-alat-badge">
                        <i class="bi bi-pencil-square me-1"></i>
                        Kelola Inventaris
                    </span>

                    <h1 class="edit-alat-title mb-2">
                        Edit Alat
                    </h1>

                    <p class="edit-alat-description mb-0">
                        Perbarui informasi alat inventaris agar data
                        yang tersimpan di sistem tetap akurat dan mudah dikelola.
                    </p>

                </div>

                <div class="col-lg-4 text-lg-end d-none d-lg-block">
                    <i class="bi bi-box-seam-fill edit-header-icon"></i>
                </div>

            </div>

        </div>

    </div>

    {{-- =========================================================
         FORM CARD
    ========================================================= --}}
    <div class="row justify-content-center">

        <div class="col-12 col-xl-9 col-xxl-8">

            <div class="edit-form-card">

                {{-- Header Form --}}
                <div class="edit-form-header">

                    <div class="d-flex align-items-center gap-3">

                        <div class="edit-form-icon">
                            🎒
                        </div>

                        <div>

                            <h5 class="fw-bold mb-1">
                                Informasi Alat
                            </h5>

                            <p class="edit-form-subtitle text-body-secondary small mb-0">
                                Silakan perbarui data alat di bawah ini.
                            </p>

                        </div>

                    </div>

                </div>

                {{-- Body Form --}}
                <div class="edit-form-body">

                    <form
                        action="{{ route('alat.update', ['id_alat' => $datal->id_alat]) }}"
                        method="POST"
                    >

                        @csrf
                        @method('PUT')

                        {{-- NAMA ALAT --}}
                        <div class="mb-4">

                            <label
                                for="nama_alat"
                                class="form-label-custom"
                            >
                                Nama Alat
                            </label>

                            <div class="input-wrapper">

                                <i class="bi bi-box-seam field-icon"></i>

                                <input
                                    type="text"
                                    name="nama_alat"
                                    id="nama_alat"
                                    class="form-control custom-input"
                                    value="{{ $datal->nama_alat }}"
                                    placeholder="Contoh: Tenda Camping"
                                    required
                                >

                            </div>

                        </div>

                        {{-- KODE ALAT --}}
                        <div class="mb-4">

                            <label
                                for="kode_alat"
                                class="form-label-custom"
                            >
                                Kode Alat
                            </label>

                            <div class="input-wrapper">

                                <i class="bi bi-upc-scan field-icon"></i>

                                <input
                                    type="text"
                                    name="kode_alat"
                                    id="kode_alat"
                                    class="form-control custom-input"
                                    value="{{ $datal->kode_alat }}"
                                    placeholder="Contoh: ALT-001"
                                    required
                                >

                            </div>

                        </div>

                        {{-- KATEGORI --}}
                        <div class="mb-4">

                            <label
                                for="id_kategori"
                                class="form-label-custom"
                            >
                                Kategori
                            </label>

                            <select
                                name="id_kategori"
                                id="id_kategori"
                                class="form-select custom-select"
                                required
                            >

                                <option value="">
                                    -- Pilih Kategori --
                                </option>

                                @foreach ($kategori as $k)

                                    <option
                                        value="{{ $k->id_kategori }}"
                                        {{ $datal->id_kategori == $k->id_kategori ? 'selected' : '' }}
                                    >
                                        {{ $k->nama_kategori }}
                                    </option>

                                @endforeach

                            </select>

                        </div>

                        {{-- INFO BOX --}}
                        <div class="edit-info-box mb-4">

                            <i class="bi bi-info-circle-fill"></i>

                            <p>
                                Pastikan nama alat, kode alat, dan kategori
                                sudah benar sebelum menyimpan perubahan.
                                Data yang diperbarui akan langsung digunakan
                                pada sistem inventaris.
                            </p>

                        </div>

                        {{-- BUTTON --}}
                        <div class="d-flex justify-content-between align-items-center gap-3">

                            <a
                                href="{{ route('alat.index') }}"
                                class="btn btn-edit-back px-4 py-2"
                            >
                                <i class="bi bi-arrow-left me-1"></i>
                                Kembali
                            </a>

                            <button
                                type="submit"
                                class="btn btn-edit-save px-4 py-2"
                            >
                                <i class="bi bi-check2-circle me-1"></i>
                                Simpan Perubahan
                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection