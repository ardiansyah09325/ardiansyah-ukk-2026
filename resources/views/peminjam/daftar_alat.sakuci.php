@extends('layouts.app')

@section('title', config('app.name') . ' — Daftar Alat Tersedia')

@section('content')

<style> /* ========================================================= MOUNTAIN — DAFTAR ALAT ========================================================= */
.alat-page {
    padding: 24px 0 50px;
}

/* =========================================================
   HERO
========================================================= */

.alat-hero {
    position: relative;
    min-height: 390px;
    display: flex;
    align-items: center;
    overflow: hidden;

    border-radius: 0 0 35px 35px;

    background: linear-gradient(
        180deg,
        color-mix(
            in srgb,
            var(--bs-success) 65%,
            var(--bs-body-bg)
        ),
        color-mix(
            in srgb,
            var(--bs-success) 82%,
            var(--bs-body-bg)
        )
    );

    color: var(--bs-light);

    box-shadow: 0 15px 40px color-mix(
        in srgb,
        var(--bs-dark) 12%,
        transparent
    );
}

.alat-hero::before {
    content: "";
    position: absolute;

    width: 650px;
    height: 650px;

    border-radius: 50%;

    background: color-mix(
        in srgb,
        var(--bs-light) 10%,
        transparent
    );

    filter: blur(80px);

    top: -300px;
    left: -200px;

    pointer-events: none;
}

.alat-hero::after {
    content: "";
    position: absolute;

    width: 550px;
    height: 550px;

    border-radius: 50%;

    background: color-mix(
        in srgb,
        var(--bs-light) 9%,
        transparent
    );

    filter: blur(90px);

    bottom: -320px;
    right: -150px;

    pointer-events: none;
}

.alat-hero-content {
    position: relative;
    z-index: 5;
    padding: 55px 35px;
}

/* =========================================================
   BADGE
========================================================= */

.mountain-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;

    padding: 8px 16px;

    border-radius: 50px;

    background: color-mix(
        in srgb,
        var(--bs-light) 15%,
        transparent
    );

    border: 1px solid color-mix(
        in srgb,
        var(--bs-light) 30%,
        transparent
    );

    color: var(--bs-light);

    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);

    box-shadow: 0 8px 25px color-mix(
        in srgb,
        var(--bs-dark) 15%,
        transparent
    );

    font-size: .78rem;
    font-weight: 600;
    letter-spacing: .04em;
}

/* =========================================================
   TITLE
========================================================= */

.alat-hero-title {
    font-size: clamp(2.5rem, 5vw, 4.5rem);
    line-height: 1.05;
    letter-spacing: -2px;

    color: var(--bs-light);

    text-shadow: 0 8px 25px color-mix(
        in srgb,
        var(--bs-dark) 25%,
        transparent
    );
}

.alat-hero-description {
    max-width: 610px;

    color: color-mix(
        in srgb,
        var(--bs-light) 85%,
        transparent
    );

    font-size: 1.05rem;
    line-height: 1.8;
}

/* =========================================================
   SEARCH BOX
========================================================= */

.alat-search-box {
    position: relative;
    z-index: 6;

    background: color-mix(
        in srgb,
        var(--bs-light) 10%,
        transparent
    );

    border: 1px solid color-mix(
        in srgb,
        var(--bs-light) 25%,
        transparent
    );

    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);

    border-radius: 20px;

    padding: 20px;

    box-shadow: 0 15px 35px color-mix(
        in srgb,
        var(--bs-dark) 15%,
        transparent
    );
}

.alat-search-input {
    border: 0;
    box-shadow: none !important;
    border-radius: 12px 0 0 12px !important;
}

.alat-search-button {
    background: var(--bs-warning);
    border-color: var(--bs-warning);

    color: var(--bs-dark);

    font-weight: 700;

    border-radius: 0 12px 12px 0 !important;
}

.alat-search-button:hover {
    background: var(--bs-warning);
    border-color: var(--bs-warning);
    color: var(--bs-dark);
}

/* =========================================================
   MOUNTAIN
========================================================= */

.alat-mountain {
    position: absolute;

    bottom: -5px;
    z-index: 1;

    width: 0;
    height: 0;

    border-left: 230px solid transparent;
    border-right: 230px solid transparent;

    border-bottom: 330px solid color-mix(
        in srgb,
        var(--bs-dark) 45%,
        var(--bs-success)
    );

    filter: drop-shadow(
        0 -10px 15px
        color-mix(
            in srgb,
            var(--bs-dark) 10%,
            transparent
        )
    );
}

.alat-mountain.one {
    left: -60px;
}

.alat-mountain.two {
    right: -50px;
    transform: scale(1.25);
    opacity: .78;
}

.alat-mountain.three {
    left: 36%;
    transform: scale(.72);
    opacity: .52;
}

/* =========================================================
   SNOW
========================================================= */

.alat-snow {
    position: absolute;
    z-index: 2;

    width: 0;
    height: 0;

    border-left: 60px solid transparent;
    border-right: 60px solid transparent;

    border-bottom: 88px solid color-mix(
        in srgb,
        var(--bs-light) 75%,
        transparent
    );

    bottom: 250px;
    left: calc(50% - 60px);
}

/* =========================================================
   FOREST
========================================================= */

.alat-trees {
    position: absolute;

    bottom: 0;
    left: 0;
    right: 0;

    height: 105px;

    z-index: 2;

    background:
        linear-gradient(
            135deg,
            transparent 25%,
            color-mix(
                in srgb,
                var(--bs-dark) 60%,
                var(--bs-success)
            ) 25%,
            color-mix(
                in srgb,
                var(--bs-dark) 60%,
                var(--bs-success)
            ) 30%,
            transparent 30%
        ),

        linear-gradient(
            45deg,
            transparent 25%,
            color-mix(
                in srgb,
                var(--bs-dark) 45%,
                var(--bs-success)
            ) 25%,
            color-mix(
                in srgb,
                var(--bs-dark) 45%,
                var(--bs-success)
            ) 30%,
            transparent 30%
        );

    opacity: .9;
}

/* =========================================================
   FLOATING ICON
========================================================= */

.alat-floating {
    position: absolute;
    z-index: 4;

    font-size: 32px;
    opacity: .8;

    animation: alatFloating 4s ease-in-out infinite;
}

.alat-floating.one {
    top: 17%;
    left: 7%;
}

.alat-floating.two {
    top: 25%;
    right: 8%;
    animation-delay: 1s;
}

.alat-floating.three {
    bottom: 25%;
    left: 18%;
    animation-delay: 2s;
}

@keyframes alatFloating {
    0%, 100% {
        transform: translateY(0);
    }

    50% {
        transform: translateY(-12px);
    }
}

/* =========================================================
   TOOL ILLUSTRATION
========================================================= */

.alat-hero-icon {
    position: relative;
    z-index: 5;

    width: 125px;
    height: 125px;

    display: inline-flex;
    align-items: center;
    justify-content: center;

    border-radius: 30px;

    background: color-mix(
        in srgb,
        var(--bs-light) 14%,
        transparent
    );

    border: 1px solid color-mix(
        in srgb,
        var(--bs-light) 30%,
        transparent
    );

    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);

    color: var(--bs-light);

    font-size: 4rem;

    transform: rotate(5deg);

    box-shadow: 0 20px 45px color-mix(
        in srgb,
        var(--bs-dark) 20%,
        transparent
    );

    transition: all .3s ease;
}

.alat-hero-icon:hover {
    transform: rotate(0deg) scale(1.05);
}

/* =========================================================
   RESULT INFO
========================================================= */

.alat-result-info {
    padding: 25px 4px 15px;
}

/* =========================================================
   ALAT CARD
========================================================= */

.alat-card {
    position: relative;

    height: 100%;

    background: var(--bs-body-bg);
    color: var(--bs-body-color);

    border: 1px solid var(--bs-border-color) !important;

    border-radius: 20px;

    overflow: hidden;

    box-shadow: 0 10px 35px color-mix(
        in srgb,
        var(--bs-dark) 8%,
        transparent
    );

    transition: all .3s ease;
}

.alat-card:hover {
    transform: translateY(-7px);

    border-color: color-mix(
        in srgb,
        var(--bs-success) 45%,
        var(--bs-border-color)
    ) !important;

    box-shadow: 0 18px 40px color-mix(
        in srgb,
        var(--bs-dark) 14%,
        transparent
    );
}

/* =========================================================
   TOP ACCENT
========================================================= */

.card-top-accent {
    height: 4px;
    width: 100%;
    background: var(--bs-success);
}

/* =========================================================
   ALAT ICON
========================================================= */

.alat-icon-box {
    width: 52px;
    height: 52px;

    flex-shrink: 0;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 15px;

    background: color-mix(
        in srgb,
        var(--bs-success) 11%,
        var(--bs-body-bg)
    );

    color: var(--bs-success);

    font-size: 1.35rem;

    transition: all .3s ease;
}

.alat-card:hover .alat-icon-box {
    transform: rotate(-5deg) scale(1.05);

    background: color-mix(
        in srgb,
        var(--bs-success) 17%,
        var(--bs-body-bg)
    );
}

/* =========================================================
   BUTTON
========================================================= */

.btn-alat {
    background: var(--bs-warning);
    border-color: var(--bs-warning);

    color: var(--bs-dark);

    font-weight: 700;

    border-radius: 14px;

    transition: all .3s ease;
}

.btn-alat:hover {
    background: var(--bs-warning);
    border-color: var(--bs-warning);
    color: var(--bs-dark);

    transform: translateY(-3px);

    box-shadow: 0 10px 25px color-mix(
        in srgb,
        var(--bs-dark) 18%,
        transparent
    );
}

/* =========================================================
   EMPTY STATE
========================================================= */

.alat-empty {
    background: var(--bs-body-bg);

    border: 1px solid var(--bs-border-color);

    border-radius: 20px;

    padding: 60px 25px;

    box-shadow: 0 10px 35px color-mix(
        in srgb,
        var(--bs-dark) 8%,
        transparent
    );
}

/* =========================================================
   UTILITY
========================================================= */

.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.backdrop-blur {
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
}

.hover-lift {
    transition: transform .2s ease, box-shadow .2s ease;
}

.hover-lift:hover {
    transform: translateY(-2px);
}

.fs-7 {
    font-size: .875rem;
    line-height: 1.4;
}

.fs-8 {
    font-size: .75rem;
}

.tracking-wide {
    letter-spacing: .04em;
}

.tracking-wider {
    letter-spacing: .06em;
}

/* =========================================================
   DARK MODE
========================================================= */

[data-bs-theme="dark"] .alat-hero {
    background: linear-gradient(
        180deg,
        color-mix(
            in srgb,
            var(--bs-success) 38%,
            var(--bs-body-bg)
        ),
        color-mix(
            in srgb,
            var(--bs-success) 20%,
            var(--bs-body-bg)
        )
    );
}

[data-bs-theme="dark"] .alat-card,
[data-bs-theme="dark"] .alat-empty {
    box-shadow: 0 10px 35px rgba(0, 0, 0, .18);
}

/* =========================================================
   RESPONSIVE
========================================================= */

@media (max-width: 768px) {

    .alat-page {
        padding-top: 10px;
    }

    .alat-hero {
        min-height: 570px;
        border-radius: 0 0 25px 25px;
    }

    .alat-hero-content {
        padding: 45px 22px;
    }

    .alat-hero-title {
        font-size: 2.6rem;
        letter-spacing: -1px;
    }

    .alat-hero-description {
        font-size: .98rem;
    }

    .alat-mountain {
        transform: scale(.65);
        transform-origin: bottom center;
    }

    .alat-mountain.two {
        transform: scale(.8);
    }

    .alat-mountain.three {
        transform: scale(.55);
    }

    .alat-snow {
        bottom: 205px;
    }

    .alat-result-info {
        padding-top: 20px;
    }
}

</style> <div class="container-fluid px-0 alat-page">
{{-- =====================================================
     HERO HEADER
====================================================== --}}

<section class="alat-hero mb-4">

    {{-- Gunung --}}
    <div class="alat-mountain one"></div>
    <div class="alat-mountain two"></div>
    <div class="alat-mountain three"></div>

    {{-- Salju --}}
    <div class="alat-snow"></div>

    {{-- Hutan --}}
    <div class="alat-trees"></div>

    {{-- Dekorasi --}}
    <div class="alat-floating one">
        🏕️
    </div>

    <div class="alat-floating two">
        ⛰️
    </div>

    <div class="alat-floating three">
        🎒
    </div>

    <div class="alat-hero-content w-100">

        <div class="row align-items-center justify-content-between g-4">

            {{-- =================================================
                 INFORMASI
            ================================================== --}}

            <div class="col-lg-7">

                <span class="mountain-badge mb-3">

                    <i class="bi bi-box-seam-fill"></i>

                    Inventaris Peralatan Camping

                </span>

                <h1 class="alat-hero-title fw-bold mb-3">

                    Katalog Alat<br>

                    <span>
                        Siap Mendaki 🏕️
                    </span>

                </h1>

                <p class="alat-hero-description mb-4">

                    Jelajahi berbagai peralatan camping dan pendakian
                    yang tersedia. Pilih perlengkapan yang kamu butuhkan
                    dan ajukan peminjaman dengan mudah.

                </p>

                <div class="d-flex flex-wrap gap-2">

                    <span class="mountain-badge">

                        <i class="bi bi-check-circle-fill text-success"></i>

                        Siap Dipinjam

                    </span>

                    <span class="mountain-badge">

                        <i class="bi bi-shield-check"></i>

                        Terverifikasi

                    </span>

                </div>

            </div>

            {{-- =================================================
                 SEARCH
            ================================================== --}}

            <div class="col-lg-5">

                <form
                    action="{{ route('peminjam.alat') }}"
                    method="GET"
                    class="alat-search-box"
                >

                    <label class="form-label text-white fw-semibold fs-8 mb-2 tracking-wider text-uppercase">

                        <i class="bi bi-search me-1"></i>

                        Cari Peralatan

                    </label>

                    <div class="input-group">

                        <input
                            type="text"
                            name="q"
                            class="form-control form-control-lg alat-search-input"
                            placeholder="Nama atau kode alat..."
                            value="{{ request('q') }}"
                        >

                        <button
                            class="btn alat-search-button px-4"
                            type="submit"
                        >

                            <i class="bi bi-search me-1"></i>
                            Cari

                        </button>

                    </div>

                    @if(request('q'))

                        <div class="d-flex justify-content-between align-items-center mt-3 pt-3 border-top border-white border-opacity-10">

                            <span class="small text-white-50">

                                Hasil:
                                <strong>
                                    "{{ request('q') }}"
                                </strong>

                            </span>

                            <a
                                href="{{ route('peminjam.alat') }}"
                                class="small text-white text-decoration-underline"
                            >
                                Reset
                            </a>

                        </div>

                    @endif

                </form>

            </div>

        </div>

    </div>

</section>

@php

    // Ambil data alat mentah
    $rawAlats = $alats ?? $alat ?? [];
    $searchQuery = trim(request('q') ?? '');

    // Filter data menggunakan PHP murni
    $filteredAlats = [];

    foreach ($rawAlats as $item) {

        $namaAlat = $item->nama_alat
            ?? $item->nama
            ?? $item->name
            ?? '';

        $kodeAlat = $item->kode_alat
            ?? $item->kode
            ?? '';

        if (!empty($searchQuery)) {

            if (
                stripos($namaAlat, $searchQuery) !== false ||
                stripos($kodeAlat, $searchQuery) !== false
            ) {

                $filteredAlats[] = $item;

            }

        } else {

            $filteredAlats[] = $item;

        }

    }

@endphp

{{-- =====================================================
     HASIL PENCARIAN
====================================================== --}}

<div class="container-fluid px-3 px-md-4">

    <div class="alat-result-info d-flex justify-content-between align-items-center flex-wrap gap-2">

        <div>

            <span class="text-secondary small">

                <i class="bi bi-grid-3x3-gap-fill text-success me-1"></i>

                Menampilkan

                <strong class="text-body">
                    {{ count($filteredAlats) }}
                </strong>

                alat yang siap dipinjam

            </span>

        </div>

        @if(request('q'))

            <span class="badge bg-success-subtle text-success rounded-pill px-3 py-2">

                <i class="bi bi-funnel-fill me-1"></i>

                Filter aktif

            </span>

        @endif

    </div>

    {{-- =================================================
         GRID ALAT
    ================================================== --}}

    <div class="row g-4 mb-4">

        @forelse($filteredAlats as $item)

            @php

                $namaKategori =
                    $kategoriMap[$item->id_kategori] ?? 'Umum';

                $alatId =
                    $item->id_alat ?? $item->id;

                $namaAlat =
                    $item->nama_alat
                    ?? $item->nama
                    ?? $item->name
                    ?? 'Alat #' . $alatId;

                $kodeAlat =
                    $item->kode_alat
                    ?? $item->kode
                    ?? 'ALT';

                $stokAlat =
                    $item->stok
                    ?? $item->jumlah
                    ?? null;

            @endphp

            <div class="col-12 col-sm-6 col-lg-4 col-xl-3">

                <div class="alat-card">

                    {{-- Aksen --}}
                    <div class="card-top-accent"></div>

                    <div class="card-body d-flex flex-column justify-content-between p-4">

                        <div>

                            {{-- Badge --}}
                            <div class="d-flex justify-content-between align-items-center mb-4 gap-2">

                                <span class="badge bg-success-subtle text-success border border-success-subtle px-3 py-2 rounded-pill fw-semibold fs-8">

                                    <i class="bi bi-tag-fill me-1"></i>

                                    {{ $kodeAlat }}

                                </span>

                                <span class="badge bg-secondary-subtle text-secondary px-3 py-2 rounded-pill fs-8">

                                    {{ $namaKategori }}

                                </span>

                            </div>

                            {{-- Icon + Nama --}}
                            <div class="d-flex align-items-start gap-3 mb-3">

                                <div class="alat-icon-box shadow-sm">

                                    <i class="bi bi-tools"></i>

                                </div>

                                <div class="min-width-0">

                                    <h5 class="fw-bold fs-6 mb-1 text-body line-clamp-2">

                                        {{ $namaAlat }}

                                    </h5>

                                    @if(isset($stokAlat))

                                        <small class="text-secondary fs-8">

                                            <i class="bi bi-box-seam me-1"></i>

                                            Stok tersedia:

                                            <strong class="text-success">
                                                {{ $stokAlat }} unit
                                            </strong>

                                        </small>

                                    @else

                                        <small class="text-success fs-8">

                                            <i class="bi bi-check-circle-fill me-1"></i>

                                            Status: Ready

                                        </small>

                                    @endif

                                </div>

                            </div>

                        </div>

                        {{-- Tombol --}}
                        <div class="mt-3 pt-3 border-top">

                            <a
                                href="{{ route('peminjam.createPeminjam') . '?id_alat=' . $alatId }}"
                                class="btn btn-alat w-100 py-2 d-flex align-items-center justify-content-center gap-2 hover-lift shadow-sm"
                            >

                                <i class="bi bi-handbag-fill"></i>

                                <span>
                                    Ajukan Pinjam
                                </span>

                            </a>

                        </div>

                    </div>

                </div>

            </div>

        @empty

            {{-- =================================================
                 EMPTY STATE
            ================================================== --}}

            <div class="col-12">

                <div class="alat-empty text-center">

                    <div class="py-3">

                        <div class="display-4 text-success opacity-50 mb-3">

                            <i class="bi bi-search"></i>

                        </div>

                        <h5 class="fw-bold text-body mb-2">

                            Peralatan Tidak Ditemukan

                        </h5>

                        <p class="text-secondary small mb-4">

                            Maaf, alat yang kamu cari dengan kata kunci

                            <strong>
                                "{{ request('q') }}"
                            </strong>

                            tidak tersedia.

                        </p>

                        <a
                            href="{{ route('peminjam.alat') }}"
                            class="btn btn-outline-success rounded-pill px-4 fw-semibold"
                        >

                            <i class="bi bi-grid me-1"></i>

                            Lihat Semua Alat

                        </a>

                    </div>

                </div>

            </div>

        @endforelse

    </div>

</div>

</div>
@endsection