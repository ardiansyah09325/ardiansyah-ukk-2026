@extends('layouts.app')

@section('title', config('app.name') . ' — Dashboard Petugas')

@section('content')

<style> /* ========================================================= PETUGAS DASHBOARD - MOUNTAIN STYLE ========================================================= */
.petugas-page {
    padding: 35px 25px;
}

/* =========================================================
   MAIN HEADER
========================================================= */

.petugas-header {
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

.petugas-header::before {
    content: "";

    position: absolute;

    width: 280px;
    height: 280px;

    border-radius: 50%;

    background:
        color-mix(
            in srgb,
            var(--bs-light) 12%,
            transparent
        );

    filter: blur(65px);

    top: -130px;
    right: -80px;
}

.petugas-header::after {
    content: "";

    position: absolute;

    width: 190px;
    height: 190px;

    border-radius: 50%;

    background:
        color-mix(
            in srgb,
            var(--bs-light) 8%,
            transparent
        );

    filter: blur(55px);

    bottom: -105px;
    left: -75px;
}

.petugas-header-content {
    position: relative;
    z-index: 2;
}

.petugas-badge {
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

.petugas-header h2 {
    font-size: clamp(1.8rem, 4vw, 2.5rem);

    letter-spacing: -.8px;
}

.petugas-header p {
    max-width: 650px;

    color:
        color-mix(
            in srgb,
            var(--bs-light) 82%,
            transparent
        );
}

/* =========================================================
   HEADER BUTTON
========================================================= */

.btn-cetak-laporan {
    background: var(--bs-warning);

    border: 1px solid var(--bs-warning);

    color: var(--bs-dark);

    border-radius: 14px;

    padding: 11px 18px;

    font-weight: 700;

    box-shadow:
        0 8px 20px
        color-mix(
            in srgb,
            var(--bs-dark) 18%,
            transparent
        );

    transition: all .25s ease;
}

.btn-cetak-laporan:hover {
    background: var(--bs-warning);

    border-color: var(--bs-warning);

    color: var(--bs-dark);

    transform: translateY(-3px);

    box-shadow:
        0 12px 25px
        color-mix(
            in srgb,
            var(--bs-dark) 25%,
            transparent
        );
}

/* =========================================================
   STATISTIC CARD
========================================================= */

.stat-card {
    background: var(--bs-body-bg);

    border: 1px solid var(--bs-border-color);

    border-radius: 20px;

    padding: 20px;

    height: 100%;

    box-shadow:
        0 8px 28px
        color-mix(
            in srgb,
            var(--bs-dark) 5%,
            transparent
        );

    transition: all .25s ease;
}

.stat-card:hover {
    transform: translateY(-3px);

    box-shadow:
        0 13px 32px
        color-mix(
            in srgb,
            var(--bs-dark) 9%,
            transparent
        );
}

.stat-icon {
    width: 52px;
    height: 52px;

    display: inline-flex;

    align-items: center;
    justify-content: center;

    flex-shrink: 0;

    border-radius: 15px;

    font-size: 1.3rem;
}

.stat-icon-warning {
    background:
        color-mix(
            in srgb,
            var(--bs-warning) 12%,
            var(--bs-body-bg)
        );

    color: var(--bs-warning);
}

.stat-icon-info {
    background:
        color-mix(
            in srgb,
            var(--bs-info) 12%,
            var(--bs-body-bg)
        );

    color: var(--bs-info);
}

.stat-icon-success {
    background:
        color-mix(
            in srgb,
            var(--bs-success) 12%,
            var(--bs-body-bg)
        );

    color: var(--bs-success);
}

.stat-label {
    display: block;

    margin-bottom: 3px;

    color: var(--bs-body-secondary);

    font-size: .7rem;

    font-weight: 800;

    letter-spacing: .05em;

    text-transform: uppercase;
}

.stat-number {
    color: var(--bs-body-color);

    font-size: 1.6rem;

    font-weight: 800;

    line-height: 1.2;
}

/* =========================================================
   SECTION TITLE
========================================================= */

.section-heading {
    display: flex;

    align-items: center;

    gap: 10px;

    margin-bottom: 15px;
}

.section-heading-icon {
    width: 34px;
    height: 34px;

    display: inline-flex;

    align-items: center;
    justify-content: center;

    border-radius: 10px;

    background:
        color-mix(
            in srgb,
            var(--bs-success) 10%,
            var(--bs-body-bg)
        );

    color: var(--bs-success);

    font-size: .9rem;
}

.section-heading h5 {
    margin: 0;

    color: var(--bs-body-color);

    font-weight: 800;
}

/* =========================================================
   QUICK MENU
========================================================= */

.custom-menu-card {
    display: block;

    background: var(--bs-body-bg);

    border: 1px solid var(--bs-border-color);

    border-radius: 20px;

    padding: 22px;

    height: 100%;

    text-decoration: none;

    box-shadow:
        0 8px 28px
        color-mix(
            in srgb,
            var(--bs-dark) 5%,
            transparent
        );

    transition: all .25s ease;
}

.custom-menu-card:hover {
    border-color:
        color-mix(
            in srgb,
            var(--bs-success) 45%,
            var(--bs-border-color)
        );

    transform: translateY(-4px);

    box-shadow:
        0 14px 35px
        color-mix(
            in srgb,
            var(--bs-success) 10%,
            transparent
        );
}

.menu-icon-wrapper {
    width: 50px;
    height: 50px;

    display: inline-flex;

    align-items: center;
    justify-content: center;

    border-radius: 14px;

    background:
        color-mix(
            in srgb,
            var(--bs-success) 10%,
            var(--bs-body-bg)
        );

    color: var(--bs-success);

    font-size: 1.2rem;

    transition: all .25s ease;
}

.custom-menu-card:hover .menu-icon-wrapper {
    background: var(--bs-success);

    color: var(--bs-light);

    transform: scale(1.04);
}

.menu-arrow {
    color: var(--bs-body-secondary);

    transition: all .25s ease;
}

.custom-menu-card:hover .menu-arrow {
    color: var(--bs-success);

    transform: translate(2px, -2px);
}

.menu-title {
    color: var(--bs-body-color);

    font-size: 1rem;

    font-weight: 800;
}

.menu-subtitle {
    display: block;

    margin-bottom: 7px;

    color: var(--bs-success);

    font-size: .75rem;

    font-weight: 700;
}

.menu-description {
    color: var(--bs-body-secondary);

    font-size: .78rem;

    line-height: 1.6;
}

/* =========================================================
   DARK MODE
========================================================= */

[data-bs-theme="dark"] .petugas-header {
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

[data-bs-theme="dark"] .stat-card,
[data-bs-theme="dark"] .custom-menu-card {
    box-shadow:
        0 10px 35px rgba(0, 0, 0, .22);
}

/* =========================================================
   RESPONSIVE
========================================================= */

@media (max-width: 768px) {

    .petugas-page {
        padding: 20px 12px;
    }

    .petugas-header {
        padding: 25px 20px;

        border-radius: 20px;
    }

    .petugas-header h2 {
        font-size: 1.7rem;
    }

    .btn-cetak-laporan {
        width: 100%;

        justify-content: center;
    }

    .stat-card {
        padding: 17px;
    }

    .stat-icon {
        width: 46px;
        height: 46px;

        border-radius: 13px;
    }

    .stat-number {
        font-size: 1.4rem;
    }

    .custom-menu-card {
        padding: 19px;

        border-radius: 18px;
    }
}

</style> <div class="petugas-page">
{{-- =====================================================
     HEADER / BANNER
====================================================== --}}

<div class="petugas-header">

    <div class="petugas-header-content">

        <div class="d-flex flex-column flex-md-row
                    align-items-md-center
                    justify-content-between
                    gap-4">

            <div>

                <div class="petugas-badge mb-3">

                    <i class="bi bi-shield-check"></i>

                    <span>Panel Petugas Operasional</span>

                </div>

                <h2 class="fw-bold mb-2">

                    Selamat Datang,
                    {{ $user->username ?? 'Petugas' }}! 👋

                </h2>

                <p class="mb-0">

                    Pusat kendali operasional peminjaman.
                    Pantau antrean verifikasi, status barang
                    yang sedang dipinjam, dan laporan inventaris.

                </p>

            </div>

            <div class="flex-shrink-0">

                <a
                    href="{{ route('petugas.pengembalian.cetak') }}"
                    target="_blank"
                    class="btn btn-cetak-laporan
                           d-inline-flex
                           align-items-center
                           justify-content-center
                           gap-2"
                >

                    <i class="bi bi-printer"></i>

                    <span>Cetak Laporan</span>

                </a>

            </div>

        </div>

    </div>

</div>

{{-- =====================================================
     STATISTIK
====================================================== --}}

<div class="row g-3 mb-4">

    {{-- MENUNGGU VERIFIKASI --}}

    <div class="col-6 col-md-4">

        <div class="stat-card">

            <div class="d-flex align-items-center gap-3">

                <div class="stat-icon stat-icon-warning">

                    <i class="bi bi-hourglass-split"></i>

                </div>

                <div>

                    <span class="stat-label">

                        Menunggu Verifikasi

                    </span>

                    <div class="stat-number">

                        {{ $totalPending ?? 0 }}

                    </div>

                </div>

            </div>

        </div>

    </div>

    {{-- BARANG DIPINJAM --}}

    <div class="col-6 col-md-4">

        <div class="stat-card">

            <div class="d-flex align-items-center gap-3">

                <div class="stat-icon stat-icon-info">

                    <i class="bi bi-box-seam-fill"></i>

                </div>

                <div>

                    <span class="stat-label">

                        Barang Dipinjam

                    </span>

                    <div class="stat-number">

                        {{ $totalDipinjam ?? 0 }}

                    </div>

                </div>

            </div>

        </div>

    </div>

    {{-- TOTAL SELESAI --}}

    <div class="col-12 col-md-4">

        <div class="stat-card">

            <div class="d-flex align-items-center gap-3">

                <div class="stat-icon stat-icon-success">

                    <i class="bi bi-database-check"></i>

                </div>

                <div>

                    <span class="stat-label">

                        Total Selesai

                    </span>

                    <div class="stat-number">

                        {{ $totalSelesai ?? 0 }}

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

{{-- =====================================================
     MENU AKSES CEPAT
====================================================== --}}

<div class="section-heading">

    <div class="section-heading-icon">

        <i class="bi bi-grid-fill"></i>

    </div>

    <h5>

        Menu Akses Cepat

    </h5>

</div>

<div class="row g-3 mb-4">

    {{-- =================================================
         PERSETUJUAN PEMINJAMAN
    ================================================== --}}

    <div class="col-md-6">

        <a
            href="{{ route('petugas.peminjaman.index') }}"
            class="custom-menu-card"
        >

            <div
                class="d-flex
                       align-items-start
                       justify-content-between
                       mb-3"
            >

                <div class="menu-icon-wrapper">

                    <i class="bi bi-check-circle"></i>

                </div>

                <i
                    class="bi bi-arrow-up-right
                           menu-arrow"
                ></i>

            </div>

            <div>

                <div class="menu-title mb-1">

                    Persetujuan Peminjaman

                </div>

                <span class="menu-subtitle">

                    Verifikasi pengajuan siswa

                </span>

                <div class="menu-description">

                    Proses persetujuan atau penolakan
                    pengajuan peminjaman alat olahraga
                    dari siswa.

                </div>

            </div>

        </a>

    </div>

    {{-- =================================================
         PANTAU PENGEMBALIAN
    ================================================== --}}

    <div class="col-md-6">

        <a
            href="{{ route('petugas.pengembalian.index') }}"
            class="custom-menu-card"
        >

            <div
                class="d-flex
                       align-items-start
                       justify-content-between
                       mb-3"
            >

                <div class="menu-icon-wrapper">

                    <i class="bi bi-arrow-return-left"></i>

                </div>

                <i
                    class="bi bi-arrow-up-right
                           menu-arrow"
                ></i>

            </div>

            <div>

                <div class="menu-title mb-1">

                    Pantau Pengembalian

                </div>

                <span class="menu-subtitle">

                    Pencatatan barang & denda

                </span>

                <div class="menu-description">

                    Konfirmasi pengembalian alat,
                    periksa tenggat waktu, dan kalkulasi
                    denda keterlambatan.

                </div>

            </div>

        </a>

    </div>

</div>

</div>
@endsection