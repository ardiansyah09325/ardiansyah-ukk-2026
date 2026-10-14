@extends('layouts.app')

@section('title', config('app.name') . ' -- Ajukan Peminjaman Alat')

@section('content')

<style>
    /* =========================================================
       PEMINJAMAN PAGE - MOUNTAIN STYLE
    ========================================================= */

    .peminjaman-page {
        padding: 35px 25px;
    }

    /* =========================================================
       HEADER
    ========================================================= */

    .peminjaman-header {
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

    .peminjaman-header::before {
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

    .peminjaman-header::after {
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

    .peminjaman-header-content {
        position: relative;
        z-index: 2;
    }

    .peminjaman-badge {
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

    .peminjaman-header h2 {
        font-size: clamp(1.8rem, 4vw, 2.5rem);

        letter-spacing: -.8px;
    }

    .peminjaman-header p {
        max-width: 650px;

        color:
            color-mix(
                in srgb,
                var(--bs-light) 82%,
                transparent
            );
    }

    /* =========================================================
       FORM CARD
    ========================================================= */

    .peminjaman-card {
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

    .peminjaman-card:hover {
        box-shadow:
            0 15px 40px
            color-mix(
                in srgb,
                var(--bs-dark) 10%,
                transparent
            );
    }

    /* =========================================================
       FORM HEADER
    ========================================================= */

    .peminjaman-card-header {
        padding: 22px 25px;

        border-bottom: 1px solid var(--bs-border-color);

        background:
            color-mix(
                in srgb,
                var(--bs-success) 5%,
                var(--bs-body-bg)
            );
    }

    .peminjaman-card-header-icon {
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
       FORM BODY
    ========================================================= */

    .peminjaman-card-body {
        padding: 28px;
    }

    .peminjaman-form-group {
        margin-bottom: 22px;
    }

    .peminjaman-form-label {
        display: block;

        margin-bottom: 8px;

        color: var(--bs-body-color);

        font-size: .85rem;

        font-weight: 700;
    }

    .peminjaman-form-label .required {
        color: var(--bs-danger);
    }

    .peminjaman-form-label .optional {
        color: var(--bs-body-secondary);

        font-weight: 400;
    }

    /* =========================================================
       FORM CONTROL
    ========================================================= */

    .peminjaman-form-control {
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

    .peminjaman-form-control:focus {
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

    .peminjaman-form-control::placeholder {
        color: var(--bs-body-secondary);

        opacity: .75;
    }

    select.peminjaman-form-control {
        cursor: pointer;
    }

    /* =========================================================
       SELECTED ALAT
    ========================================================= */

    .selected-alat {
        min-height: 46px;

        display: flex;

        align-items: center;

        gap: 10px;

        padding: 10px 14px;

        border: 1px solid
            color-mix(
                in srgb,
                var(--bs-success) 20%,
                var(--bs-border-color)
            );

        border-radius: 12px;

        background:
            color-mix(
                in srgb,
                var(--bs-success) 7%,
                var(--bs-body-bg)
            );

        color: var(--bs-body-color);

        font-weight: 600;
    }

    .selected-alat-icon {
        width: 30px;
        height: 30px;

        display: inline-flex;

        align-items: center;
        justify-content: center;

        flex-shrink: 0;

        border-radius: 9px;

        background:
            color-mix(
                in srgb,
                var(--bs-success) 12%,
                var(--bs-body-bg)
            );

        color: var(--bs-success);

        font-size: .8rem;
    }

    /* =========================================================
       FORM HINT
    ========================================================= */

    .form-hint {
        display: block;

        margin-top: 6px;

        color: var(--bs-body-secondary);

        font-size: .75rem;
    }

    /* =========================================================
       ACTION BUTTON
    ========================================================= */

    .btn-batal {
        border-radius: 12px;

        padding: 10px 18px;

        font-weight: 700;

        transition: all .25s ease;
    }

    .btn-batal:hover {
        transform: translateY(-2px);
    }

    .btn-ajukan {
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

    .btn-ajukan:hover {
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

    .peminjaman-actions {
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

    [data-bs-theme="dark"] .peminjaman-header {
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

    [data-bs-theme="dark"] .peminjaman-card {
        box-shadow:
            0 10px 35px rgba(0, 0, 0, .25);
    }

    /* =========================================================
       RESPONSIVE
    ========================================================= */

    @media (max-width: 768px) {

        .peminjaman-page {
            padding: 20px 12px;
        }

        .peminjaman-header {
            padding: 25px 20px;

            border-radius: 20px;
        }

        .peminjaman-header h2 {
            font-size: 1.7rem;
        }

        .peminjaman-card {
            border-radius: 20px;
        }

        .peminjaman-card-body {
            padding: 20px;
        }

        .peminjaman-actions {
            flex-direction: column-reverse;

            align-items: stretch !important;

            gap: 10px;
        }

        .btn-batal,
        .btn-ajukan {
            width: 100%;

            justify-content: center;
        }
    }
</style>


<div class="peminjaman-page">

    {{-- =====================================================
         HEADER
    ====================================================== --}}

    <div class="peminjaman-header">

        <div class="peminjaman-header-content">

            <div class="peminjaman-badge mb-3">

                <i class="bi bi-clipboard-check-fill"></i>

                <span>Inventaris Sistem</span>

            </div>

            <h2 class="fw-bold mb-2">

                Ajukan Peminjaman Alat

            </h2>

            <p class="mb-0">

                Isi formulir berikut untuk mengajukan peminjaman
                alat inventaris sesuai kebutuhan Anda.

            </p>

        </div>

    </div>


    {{-- =====================================================
         FORM CARD
    ====================================================== --}}

    <div class="row justify-content-center">

        <div class="col-12 col-xl-8">

            <div class="peminjaman-card">

                {{-- CARD HEADER --}}

                <div class="peminjaman-card-header">

                    <div class="d-flex align-items-center gap-3">

                        <div class="peminjaman-card-header-icon">

                            <i class="bi bi-pencil-square"></i>

                        </div>

                        <div>

                            <h5 class="fw-bold mb-1">

                                Form Pengajuan

                            </h5>

                            <p class="text-body-secondary small mb-0">

                                Lengkapi data peminjaman alat di bawah ini.

                            </p>

                        </div>

                    </div>

                </div>


                {{-- CARD BODY --}}

                <div class="peminjaman-card-body">

                    {{-- Tentukan rute action berdasarkan role yang sedang login --}}

                    @php

                        $currentUser = \App\Models\User::current();

                        $isPengguna =
                            $currentUser &&
                            ($currentUser->role == 'pengguna');

                        $storeRoute =
                            $isPengguna
                                ? route('peminjam.storePeminjam.pengguna')
                                : route('peminjam.storePeminjam');

                        $indexRoute =
                            $isPengguna
                                ? route('peminjam.indexPeminjam.pengguna')
                                : route('peminjam.indexPeminjam');

                        // Menangkap ID alat dari URL

                        $selectedAlatId =
                            $_GET['id_alat']
                            ?? request('id_alat')
                            ?? '';

                        // Pengaman data alat

                        $daftarAlat =
                            $alat
                            ?? $alats
                            ?? \App\Models\Alat::all();

                        // Cari nama alat yang sesuai dengan ID dari URL

                        $namaAlatTerpilih = '';

                        if (!empty($selectedAlatId)) {

                            foreach($daftarAlat as $item) {

                                $aId =
                                    $item->id_alat
                                    ?? $item->id;

                                if ($aId == $selectedAlatId) {

                                    $namaAlatTerpilih =
                                        $item->nama_alat
                                        ?? $item->nama
                                        ?? 'Alat #' . $aId;

                                    break;

                                }

                            }

                        }

                    @endphp


                    <form
                        action="{{ $storeRoute }}"
                        method="POST"
                    >

                        @csrf


                        {{-- =================================================
                             PILIH ALAT
                        ================================================== --}}

                        <div class="peminjaman-form-group">

                            <label
                                for="id_alat"
                                class="peminjaman-form-label"
                            >

                                Pilih Alat

                                <span class="required">*</span>

                            </label>


                            @if(!empty($selectedAlatId))

                                <div class="selected-alat">

                                    <div class="selected-alat-icon">

                                        <i class="bi bi-tools"></i>

                                    </div>

                                    <span>

                                        {{ $namaAlatTerpilih ?: 'Alat #' . $selectedAlatId }}

                                    </span>

                                </div>

                                <input
                                    type="hidden"
                                    name="id_alat"
                                    value="{{ $selectedAlatId }}"
                                >

                            @else

                                <select
                                    name="id_alat"
                                    id="id_alat"
                                    class="peminjaman-form-control"
                                    required
                                >

                                    <option value="">

                                        -- Pilih Alat Inventaris --

                                    </option>

                                    @foreach($daftarAlat as $item)

                                        @php

                                            $aId =
                                                $item->id_alat
                                                ?? $item->id;

                                            $aName =
                                                $item->nama_alat
                                                ?? $item->nama
                                                ?? 'Alat #' . $aId;

                                        @endphp

                                        <option value="{{ $aId }}">

                                            {{ $aName }}

                                            @if(isset($item->stok))

                                                (Stok: {{ $item->stok }})

                                            @endif

                                        </option>

                                    @endforeach

                                </select>

                            @endif

                        </div>


                        {{-- =================================================
                             JUMLAH
                        ================================================== --}}

                        <div class="peminjaman-form-group">

                            <label
                                for="jumlah"
                                class="peminjaman-form-label"
                            >

                                Jumlah Unit

                                <span class="required">*</span>

                            </label>

                            <input
                                type="number"
                                name="jumlah"
                                id="jumlah"
                                class="peminjaman-form-control"
                                min="1"
                                value="1"
                                required
                                placeholder="Masukkan jumlah unit yang dipinjam"
                            >

                            <small class="form-hint">

                                Masukkan jumlah unit alat yang ingin dipinjam.

                            </small>

                        </div>


                        {{-- =================================================
                             TANGGAL PINJAM
                        ================================================== --}}

                        <div class="peminjaman-form-group">

                            <label
                                for="tanggal_pinjam"
                                class="peminjaman-form-label"
                            >

                                Tanggal Pinjam

                                <span class="required">*</span>

                            </label>

                            <input
                                type="date"
                                name="tanggal_pinjam"
                                id="tanggal_pinjam"
                                class="peminjaman-form-control"
                                value="{{ date('Y-m-d') }}"
                                required
                            >

                        </div>


                        {{-- =================================================
                             TANGGAL KEMBALI
                        ================================================== --}}

                        <div class="peminjaman-form-group">

                            <label
                                for="tanggal_kembali"
                                class="peminjaman-form-label"
                            >

                                Rencana Tanggal Kembali

                                <span class="optional">
                                    (Opsional)
                                </span>

                            </label>

                            <input
                                type="date"
                                name="tanggal_kembali"
                                id="tanggal_kembali"
                                class="peminjaman-form-control"
                            >

                            <small class="form-hint">

                                Kosongkan jika belum menentukan tanggal pengembalian.

                            </small>

                        </div>


                        {{-- =================================================
                             AKSI
                        ================================================== --}}

                        <div
                            class="peminjaman-actions
                                   d-flex
                                   justify-content-between
                                   align-items-center"
                        >

                            <a
                                href="{{ $indexRoute }}"
                                class="btn btn-outline-secondary
                                       btn-batal
                                       d-inline-flex
                                       align-items-center
                                       gap-1"
                            >

                                <i class="bi bi-arrow-left"></i>

                                Batal

                            </a>


                            <button
                                type="submit"
                                class="btn btn-ajukan
                                       d-inline-flex
                                       align-items-center
                                       justify-content-center
                                       gap-2"
                            >

                                <i class="bi bi-send-fill"></i>

                                Kirim Pengajuan

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection