@extends('layouts.app')

@section('title', 'Kembalikan Alat')

@section('content')

<style> /* ========================================================= PENGEMBALIAN PAGE - MOUNTAIN STYLE ========================================================= */
.pengembalian-page {
    padding: 35px 25px;
}

/* =========================================================
   HEADER
========================================================= */

.pengembalian-header {
    position: relative;
    overflow: hidden;

    border-radius: 25px;
    padding: 30px;
    margin-bottom: 25px;

    background:
        linear-gradient(
            135deg,
            color-mix(
                in srgb,
                var(--bs-success) 88%,
                var(--bs-dark)
            ),
            var(--bs-success)
        );

    color: var(--bs-light);

    box-shadow:
        0 12px 35px
        color-mix(
            in srgb,
            var(--bs-success) 18%,
            transparent
        );
}

.pengembalian-header::before {
    content: "";

    position: absolute;

    width: 260px;
    height: 260px;

    border-radius: 50%;

    background:
        color-mix(
            in srgb,
            var(--bs-light) 12%,
            transparent
        );

    filter: blur(60px);

    top: -120px;
    right: -80px;
}

.pengembalian-header::after {
    content: "";

    position: absolute;

    width: 180px;
    height: 180px;

    border-radius: 50%;

    background:
        color-mix(
            in srgb,
            var(--bs-light) 8%,
            transparent
        );

    filter: blur(50px);

    bottom: -100px;
    left: -70px;
}

.pengembalian-header-content {
    position: relative;
    z-index: 2;
}

.pengembalian-badge {
    display: inline-flex;

    align-items: center;
    gap: 8px;

    padding: 7px 14px;

    border-radius: 50px;

    background:
        color-mix(
            in srgb,
            var(--bs-light) 15%,
            transparent
        );

    border: 1px solid
        color-mix(
            in srgb,
            var(--bs-light) 25%,
            transparent
        );

    backdrop-filter: blur(10px);

    font-size: .75rem;
    font-weight: 700;

    letter-spacing: .05em;
    text-transform: uppercase;
}

.pengembalian-header h2 {
    font-size: clamp(1.8rem, 4vw, 2.5rem);
    letter-spacing: -.8px;
}

.pengembalian-header p {
    max-width: 650px;

    color:
        color-mix(
            in srgb,
            var(--bs-light) 82%,
            transparent
        );
}

/* =========================================================
   CARD
========================================================= */

.pengembalian-card {
    background: var(--bs-body-bg);

    border: 1px solid var(--bs-border-color);

    border-radius: 24px;

    overflow: hidden;

    box-shadow:
        0 10px 35px
        color-mix(
            in srgb,
            var(--bs-dark) 7%,
            transparent
        );

    transition: all .3s ease;
}

.pengembalian-card:hover {
    box-shadow:
        0 15px 40px
        color-mix(
            in srgb,
            var(--bs-dark) 10%,
            transparent
        );
}

/* =========================================================
   CARD HEADER
========================================================= */

.pengembalian-card-header {
    padding: 22px 25px;

    border-bottom: 1px solid var(--bs-border-color);

    background:
        color-mix(
            in srgb,
            var(--bs-success) 5%,
            var(--bs-body-bg)
        );
}

.pengembalian-card-header-icon {
    width: 42px;
    height: 42px;

    display: inline-flex;

    align-items: center;
    justify-content: center;

    border-radius: 12px;

    background:
        color-mix(
            in srgb,
            var(--bs-success) 10%,
            var(--bs-body-bg)
        );

    color: var(--bs-success);

    font-size: 1rem;
}

/* =========================================================
   CARD BODY
========================================================= */

.pengembalian-card-body {
    padding: 28px;
}

/* =========================================================
   FORM
========================================================= */

.pengembalian-form-group {
    margin-bottom: 22px;
}

.pengembalian-form-label {
    display: block;

    margin-bottom: 8px;

    color: var(--bs-body-color);

    font-size: .85rem;
    font-weight: 700;
}

.pengembalian-form-label .required {
    color: var(--bs-danger);
}

.pengembalian-form-control {
    width: 100%;

    min-height: 46px;

    padding: 10px 14px;

    border: 1px solid var(--bs-border-color);

    border-radius: 12px;

    background: var(--bs-body-bg);

    color: var(--bs-body-color);

    transition:
        border-color .2s ease,
        box-shadow .2s ease,
        background-color .2s ease;
}

.pengembalian-form-control:focus {
    outline: none;

    border-color: var(--bs-success);

    background: var(--bs-body-bg);

    color: var(--bs-body-color);

    box-shadow:
        0 0 0 .2rem
        color-mix(
            in srgb,
            var(--bs-success) 14%,
            transparent
        );
}

.pengembalian-form-control::placeholder {
    color: var(--bs-body-secondary);
    opacity: .75;
}

select.pengembalian-form-control {
    cursor: pointer;
}

textarea.pengembalian-form-control {
    min-height: 100px;
    resize: vertical;
}

/* =========================================================
   INFO STATE
========================================================= */

.pengembalian-info {
    display: flex;

    align-items: flex-start;

    gap: 14px;

    padding: 18px;

    border: 1px solid
        color-mix(
            in srgb,
            var(--bs-info) 20%,
            var(--bs-border-color)
        );

    border-radius: 14px;

    background:
        color-mix(
            in srgb,
            var(--bs-info) 7%,
            var(--bs-body-bg)
        );

    color: var(--bs-body-color);
}

.pengembalian-info-icon {
    width: 40px;
    height: 40px;

    display: inline-flex;

    align-items: center;
    justify-content: center;

    flex-shrink: 0;

    border-radius: 11px;

    background:
        color-mix(
            in srgb,
            var(--bs-info) 12%,
            var(--bs-body-bg)
        );

    color: var(--bs-info);

    font-size: 1.1rem;
}

.pengembalian-info-text {
    font-size: .88rem;
    line-height: 1.6;
}

/* =========================================================
   VALIDATION
========================================================= */

.pengembalian-form-control.is-invalid {
    border-color: var(--bs-danger);
}

.pengembalian-form-control.is-invalid:focus {
    border-color: var(--bs-danger);

    box-shadow:
        0 0 0 .2rem
        color-mix(
            in srgb,
            var(--bs-danger) 12%,
            transparent
        );
}

/* =========================================================
   BUTTON
========================================================= */

.btn-batal-pengembalian {
    border-radius: 12px;

    padding: 10px 18px;

    font-weight: 700;

    transition: all .25s ease;
}

.btn-batal-pengembalian:hover {
    transform: translateY(-2px);
}

.btn-kirim-pengembalian {
    background: var(--bs-success);

    border: 1px solid var(--bs-success);

    color: var(--bs-light);

    border-radius: 12px;

    padding: 10px 20px;

    font-weight: 700;

    box-shadow:
        0 8px 20px
        color-mix(
            in srgb,
            var(--bs-success) 20%,
            transparent
        );

    transition: all .25s ease;
}

.btn-kirim-pengembalian:hover {
    background: var(--bs-success);

    border-color: var(--bs-success);

    color: var(--bs-light);

    transform: translateY(-3px);

    box-shadow:
        0 12px 25px
        color-mix(
            in srgb,
            var(--bs-success) 28%,
            transparent
        );
}

/* =========================================================
   ACTION AREA
========================================================= */

.pengembalian-actions {
    padding-top: 8px;
    margin-top: 8px;

    border-top: 1px solid
        color-mix(
            in srgb,
            var(--bs-border-color) 70%,
            transparent
        );
}

/* =========================================================
   DARK MODE
========================================================= */

[data-bs-theme="dark"] .pengembalian-header {
    background:
        linear-gradient(
            135deg,
            color-mix(
                in srgb,
                var(--bs-success) 45%,
                var(--bs-body-bg)
            ),
            color-mix(
                in srgb,
                var(--bs-success) 25%,
                var(--bs-body-bg)
            )
        );
}

[data-bs-theme="dark"] .pengembalian-card {
    box-shadow:
        0 10px 35px rgba(0, 0, 0, .25);
}

/* =========================================================
   RESPONSIVE
========================================================= */

@media (max-width: 768px) {

    .pengembalian-page {
        padding: 20px 12px;
    }

    .pengembalian-header {
        padding: 25px 20px;
        border-radius: 20px;
    }

    .pengembalian-header h2 {
        font-size: 1.7rem;
    }

    .pengembalian-card {
        border-radius: 20px;
    }

    .pengembalian-card-body {
        padding: 20px;
    }

    .pengembalian-actions {
        flex-direction: column-reverse;

        align-items: stretch !important;

        gap: 10px;
    }

    .btn-batal-pengembalian,
    .btn-kirim-pengembalian {
        width: 100%;

        justify-content: center;
    }
}

</style> <div class="pengembalian-page">
{{-- =====================================================
     HEADER
====================================================== --}}

<div class="pengembalian-header">

    <div class="pengembalian-header-content">

        <div class="pengembalian-badge mb-3">

            <i class="bi bi-arrow-return-left"></i>

            <span>Inventaris Sistem</span>

        </div>

        <h2 class="fw-bold mb-2">

            Kembalikan Alat

        </h2>

        <p class="mb-0">

            Silakan isi formulir berikut untuk mengembalikan
            alat inventaris yang telah selesai digunakan.

        </p>

    </div>

</div>

{{-- =====================================================
     CARD
====================================================== --}}

<div class="row justify-content-center">

    <div class="col-12 col-xl-8">

        <div class="pengembalian-card">

            {{-- CARD HEADER --}}

            <div class="pengembalian-card-header">

                <div class="d-flex align-items-center gap-3">

                    <div class="pengembalian-card-header-icon">

                        <i class="bi bi-box-arrow-in-left"></i>

                    </div>

                    <div>

                        <h5 class="fw-bold mb-1">

                            Form Pengembalian

                        </h5>

                        <p class="text-body-secondary small mb-0">

                            Lengkapi data pengembalian alat di bawah ini.

                        </p>

                    </div>

                </div>

            </div>

            <div class="pengembalian-card-body">

                {{-- =================================================
                     JIKA TIDAK ADA PEMINJAMAN AKTIF
                ================================================== --}}

                @if(empty($peminjamanAktif) || count($peminjamanAktif) === 0)

                    <div class="pengembalian-info">

                        <div class="pengembalian-info-icon">

                            <i class="bi bi-info-circle-fill"></i>

                        </div>

                        <div class="pengembalian-info-text">

                            Kamu tidak memiliki alat yang berstatus
                            <strong>Sedang Dipinjam</strong> saat ini.
                            Pastikan peminjamanmu sudah disetujui
                            oleh admin/petugas.

                        </div>

                    </div>

                @else

                    {{-- =================================================
                         FORM PENGEMBALIAN
                    ================================================== --}}

                    <form
                        action="{{ route('peminjam.pengembalian.store') }}"
                        method="POST"
                    >

                        @csrf

                        {{-- PILIH ALAT --}}

                        <div class="pengembalian-form-group">

                            <label
                                for="id_peminjaman"
                                class="pengembalian-form-label"
                            >

                                Pilih Alat yang Ingin Dikembalikan

                                <span class="required">*</span>

                            </label>

                            <select
                                name="id_peminjaman"
                                id="id_peminjaman"
                                class="pengembalian-form-control @error('id_peminjaman') is-invalid @enderror"
                                required
                            >

                                <option value="">

                                    -- Pilih Alat dari Daftar Pinjaman --

                                </option>

                                @foreach($peminjamanAktif as $p)

                                    <option
                                        value="{{ $p->id_peminjaman ?? $p->id }}"
                                    >

                                        📦
                                        {{ $p->alat->nama_alat
                                            ?? ($p->alat->nama
                                            ?? ($p->nama_alat
                                            ?? 'Alat ID: ' . $p->id_alat)) }}

                                        (Status: {{ ucfirst($p->status) }})

                                    </option>

                                @endforeach

                            </select>

                            @error('id_peminjaman')

                                <div class="invalid-feedback">

                                    {{ $message }}

                                </div>

                            @enderror

                        </div>

                        {{-- TANGGAL PENGEMBALIAN --}}

                        <div class="pengembalian-form-group">

                            <label
                                for="tanggal_pengembalian"
                                class="pengembalian-form-label"
                            >

                                Tanggal Pengembalian

                                <span class="required">*</span>

                            </label>

                            <input
                                type="date"
                                name="tanggal_pengembalian"
                                id="tanggal_pengembalian"
                                class="pengembalian-form-control"
                                value="{{ date('Y-m-d') }}"
                                required
                            >

                        </div>

                        {{-- KONDISI BARANG --}}

                        <div class="pengembalian-form-group">

                            <label
                                for="kondisi_barang"
                                class="pengembalian-form-label"
                            >

                                Kondisi Barang Saat Dikembalikan

                            </label>

                            <select
                                name="kondisi_barang"
                                id="kondisi_barang"
                                class="pengembalian-form-control"
                            >

                                <option value="Baik">

                                    Baik (Normal)

                                </option>

                                <option value="Ringan Rusak">

                                    Ada Kerusakan Ringan

                                </option>

                                <option value="Rusak">

                                    Rusak / Tidak Berfungsi

                                </option>

                            </select>

                        </div>

                        {{-- CATATAN --}}

                        <div class="pengembalian-form-group">

                            <label
                                for="catatan"
                                class="pengembalian-form-label"
                            >

                                Catatan Tambahan

                                <span class="text-body-secondary fw-normal">

                                    (Opsional)

                                </span>

                            </label>

                            <textarea
                                name="catatan"
                                id="catatan"
                                rows="3"
                                class="pengembalian-form-control"
                                placeholder="Tuliskan keterangan tambahan jika diperlukan..."
                            ></textarea>

                        </div>

                        {{-- AKSI --}}

                        <div
                            class="pengembalian-actions
                                   d-flex
                                   justify-content-end
                                   align-items-center
                                   gap-2"
                        >

                            <a
                                href="{{ route('peminjam.dashboard') }}"
                                class="btn btn-outline-secondary
                                       btn-batal-pengembalian
                                       d-inline-flex
                                       align-items-center
                                       gap-1"
                            >

                                <i class="bi bi-arrow-left"></i>

                                Batal

                            </a>

                            <button
                                type="submit"
                                class="btn btn-kirim-pengembalian
                                       d-inline-flex
                                       align-items-center
                                       justify-content-center
                                       gap-2"
                            >

                                <i class="bi bi-arrow-return-left"></i>

                                Kirim Pengembalian

                            </button>

                        </div>

                    </form>

                @endif

            </div>

        </div>

    </div>

</div>

</div>
@endsection