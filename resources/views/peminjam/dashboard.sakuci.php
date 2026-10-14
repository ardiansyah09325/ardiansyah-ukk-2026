@extends('layouts.app')

@section('title', config('app.name') . ' — Dashboard Siswa')

@section('content')

<style> /* ========================================================= MOUNTAIN DASHBOARD Mengikuti desain landing page utama ========================================================= */
.dashboard-wrapper {
    padding: 24px 0 50px;
}

/* =========================================================
   HERO / BANNER
========================================================= */

.mountain-dashboard {
    position: relative;
    min-height: 400px;
    display: flex;
    align-items: center;
    overflow: hidden;
    border-radius: 0 0 35px 35px;
    background:
        linear-gradient(
            180deg,
            color-mix(in srgb, var(--bs-success) 68%, var(--bs-body-bg)),
            color-mix(in srgb, var(--bs-success) 85%, var(--bs-body-bg))
        );
    color: var(--bs-light);
    box-shadow: 0 15px 40px color-mix(
        in srgb,
        var(--bs-dark) 12%,
        transparent
    );
}

.mountain-dashboard::before {
    content: "";
    position: absolute;
    width: 550px;
    height: 550px;
    border-radius: 50%;
    background: color-mix(
        in srgb,
        var(--bs-light) 10%,
        transparent
    );
    filter: blur(80px);
    top: -280px;
    left: -150px;
    pointer-events: none;
}

.mountain-dashboard::after {
    content: "";
    position: absolute;
    width: 500px;
    height: 500px;
    border-radius: 50%;
    background: color-mix(
        in srgb,
        var(--bs-light) 8%,
        transparent
    );
    filter: blur(90px);
    bottom: -300px;
    right: -100px;
    pointer-events: none;
}

/* =========================================================
   HERO CONTENT
========================================================= */

.dashboard-hero-content {
    position: relative;
    z-index: 5;
    padding: 55px 35px;
}

.dashboard-badge {
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

    letter-spacing: .04em;
    font-size: .78rem;
    font-weight: 600;
}

.dashboard-title {
    font-size: clamp(2.2rem, 5vw, 4rem);
    line-height: 1.08;
    letter-spacing: -1.5px;
    color: var(--bs-light);
    text-shadow: 0 8px 25px color-mix(
        in srgb,
        var(--bs-dark) 25%,
        transparent
    );
}

.dashboard-description {
    max-width: 650px;
    color: color-mix(
        in srgb,
        var(--bs-light) 85%,
        transparent
    );
    font-size: 1.05rem;
    line-height: 1.8;
}

/* =========================================================
   HERO BUTTON
========================================================= */

.btn-mountain {
    background: var(--bs-warning);
    color: var(--bs-dark);
    border: 1px solid var(--bs-warning);
    font-weight: 700;
    border-radius: 14px;
    transition: all .3s ease;

    box-shadow: 0 10px 25px color-mix(
        in srgb,
        var(--bs-dark) 20%,
        transparent
    );
}

.btn-mountain:hover {
    background: var(--bs-warning);
    border-color: var(--bs-warning);
    color: var(--bs-dark);
    transform: translateY(-3px);

    box-shadow: 0 15px 30px color-mix(
        in srgb,
        var(--bs-dark) 28%,
        transparent
    );
}

.btn-outline-mountain {
    color: var(--bs-light);

    border: 1px solid color-mix(
        in srgb,
        var(--bs-light) 55%,
        transparent
    );

    background: color-mix(
        in srgb,
        var(--bs-light) 8%,
        transparent
    );

    backdrop-filter: blur(8px);
    -webkit-backdrop-filter: blur(8px);

    font-weight: 600;
    border-radius: 14px;
    transition: all .3s ease;
}

.btn-outline-mountain:hover {
    background: var(--bs-light);
    color: var(--bs-success);
    transform: translateY(-3px);
}

/* =========================================================
   MOUNTAIN DECORATION
========================================================= */

.dashboard-mountain {
    position: absolute;
    bottom: -5px;
    z-index: 1;

    width: 0;
    height: 0;

    border-left: 220px solid transparent;
    border-right: 220px solid transparent;

    border-bottom: 300px solid color-mix(
        in srgb,
        var(--bs-dark) 45%,
        var(--bs-success)
    );

    filter: drop-shadow(
        0 -10px 15px
        color-mix(in srgb, var(--bs-dark) 10%, transparent)
    );
}

.dashboard-mountain.one {
    left: -50px;
}

.dashboard-mountain.two {
    right: -40px;
    transform: scale(1.2);
    opacity: .75;
}

.dashboard-mountain.three {
    left: 38%;
    transform: scale(.7);
    opacity: .5;
}

.dashboard-snow {
    position: absolute;
    z-index: 2;

    width: 0;
    height: 0;

    border-left: 55px solid transparent;
    border-right: 55px solid transparent;

    border-bottom: 80px solid color-mix(
        in srgb,
        var(--bs-light) 70%,
        transparent
    );

    bottom: 225px;
    left: calc(50% - 55px);
}

/* =========================================================
   FOREST
========================================================= */

.dashboard-trees {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;

    height: 95px;
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

.dashboard-floating-icon {
    position: absolute;
    z-index: 4;

    font-size: 30px;
    opacity: .75;

    animation: dashboardFloating 4s ease-in-out infinite;
}

.dashboard-icon-1 {
    top: 20%;
    left: 7%;
}

.dashboard-icon-2 {
    top: 25%;
    right: 9%;
    animation-delay: 1s;
}

.dashboard-icon-3 {
    bottom: 25%;
    left: 17%;
    animation-delay: 2s;
}

@keyframes dashboardFloating {
    0%, 100% {
        transform: translateY(0);
    }

    50% {
        transform: translateY(-12px);
    }
}

/* =========================================================
   USER ICON
========================================================= */

.dashboard-user-icon {
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

.dashboard-user-icon:hover {
    transform: rotate(0deg) scale(1.05);
}

.user-status-badge {
    position: absolute;
    bottom: -8px;
    right: -8px;

    width: 42px;
    height: 42px;

    display: flex;
    align-items: center;
    justify-content: center;

    background: var(--bs-body-bg);
    border-radius: 50%;

    color: var(--bs-success);

    box-shadow: 0 5px 15px color-mix(
        in srgb,
        var(--bs-dark) 20%,
        transparent
    );
}

/* =========================================================
   INFO AREA
========================================================= */

.dashboard-info {
    padding: 30px 0 0;
}

/* =========================================================
   GENERAL CARD
========================================================= */

.dashboard-card {
    background: var(--bs-body-bg);
    color: var(--bs-body-color);

    border: 1px solid var(--bs-border-color);

    border-radius: 20px;

    box-shadow: 0 10px 35px color-mix(
        in srgb,
        var(--bs-dark) 8%,
        transparent
    );

    transition: all .3s ease;
}

.dashboard-card:hover {
    transform: translateY(-5px);

    box-shadow: 0 18px 40px color-mix(
        in srgb,
        var(--bs-dark) 14%,
        transparent
    );
}

/* =========================================================
   STAT CARD
========================================================= */

.stat-card {
    position: relative;
    overflow: hidden;
    height: 100%;
    padding: 25px;
}

.stat-card::after {
    content: "";

    position: absolute;
    width: 100px;
    height: 100px;

    right: -40px;
    bottom: -45px;

    border-radius: 50%;

    background: color-mix(
        in srgb,
        var(--bs-success) 6%,
        transparent
    );
}

.stat-icon-box {
    width: 50px;
    height: 50px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 15px;

    font-size: 1.3rem;
}

.stat-number {
    font-size: 2rem;
    line-height: 1;
}

/* =========================================================
   GUIDE BOX
========================================================= */

.guide-box {
    background: color-mix(
        in srgb,
        var(--bs-success) 5%,
        var(--bs-body-bg)
    );

    border: 1px solid var(--bs-border-color);

    border-radius: 15px;

    transition: all .25s ease;
}

.guide-box:hover {
    transform: translateY(-3px);

    border-color: color-mix(
        in srgb,
        var(--bs-success) 35%,
        var(--bs-border-color)
    );
}

.guide-icon {
    width: 48px;
    height: 48px;

    flex-shrink: 0;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 14px;

    background: color-mix(
        in srgb,
        var(--bs-success) 12%,
        var(--bs-body-bg)
    );

    color: var(--bs-success);

    font-size: 1.25rem;
}

/* =========================================================
   QUOTA
========================================================= */

.quota-progress {
    height: 10px;
    border-radius: 50px;
    background: color-mix(
        in srgb,
        var(--bs-success) 8%,
        var(--bs-body-bg)
    );
}

.quota-progress .progress-bar {
    border-radius: 50px;
    background: var(--bs-success);
}

/* =========================================================
   TABLE
========================================================= */

.dashboard-table {
    color: var(--bs-body-color);
}

.dashboard-table thead th {
    background: color-mix(
        in srgb,
        var(--bs-success) 5%,
        var(--bs-body-bg)
    );

    color: var(--bs-secondary-color);

    border-bottom: 1px solid var(--bs-border-color);

    font-size: .72rem;
    letter-spacing: .06em;
    text-transform: uppercase;
}

.dashboard-table tbody td {
    border-color: var(--bs-border-color);
}

.dashboard-table tbody tr {
    transition: background .2s ease;
}

.dashboard-table tbody tr:hover {
    background: color-mix(
        in srgb,
        var(--bs-success) 4%,
        var(--bs-body-bg)
    );
}

/* =========================================================
   BADGE
========================================================= */

.status-badge {
    border-radius: 50px;
    padding: 7px 11px;
    font-size: .72rem;
    font-weight: 600;
}

/* =========================================================
   DARK MODE
========================================================= */

[data-bs-theme="dark"] .mountain-dashboard {
    background:
        linear-gradient(
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

[data-bs-theme="dark"] .dashboard-card {
    box-shadow: 0 10px 35px rgba(0, 0, 0, .18);
}

[data-bs-theme="dark"] .guide-box {
    background: color-mix(
        in srgb,
        var(--bs-success) 6%,
        var(--bs-body-bg)
    );
}

/* =========================================================
   RESPONSIVE
========================================================= */

@media (max-width: 768px) {

    .dashboard-wrapper {
        padding-top: 10px;
    }

    .mountain-dashboard {
        min-height: 520px;
        border-radius: 0 0 25px 25px;
    }

    .dashboard-hero-content {
        padding: 45px 22px;
    }

    .dashboard-title {
        font-size: 2.5rem;
        letter-spacing: -1px;
    }

    .dashboard-description {
        font-size: .98rem;
        line-height: 1.7;
    }

    .dashboard-mountain {
        transform: scale(.65);
        transform-origin: bottom center;
    }

    .dashboard-mountain.two {
        transform: scale(.8);
    }

    .dashboard-mountain.three {
        transform: scale(.55);
    }

    .dashboard-snow {
        bottom: 195px;
    }

    .dashboard-info {
        padding-top: 20px;
    }

    .stat-card {
        padding: 20px;
    }

    .stat-number {
        font-size: 1.7rem;
    }
}

</style> <div class="container-fluid px-0 dashboard-wrapper">
{{-- =====================================================
     HERO DASHBOARD
====================================================== --}}

<section class="mountain-dashboard mb-4">

    {{-- Gunung --}}
    <div class="dashboard-mountain one"></div>
    <div class="dashboard-mountain two"></div>
    <div class="dashboard-mountain three"></div>

    {{-- Salju --}}
    <div class="dashboard-snow"></div>

    {{-- Hutan --}}
    <div class="dashboard-trees"></div>

    {{-- Dekorasi --}}
    <div class="dashboard-floating-icon dashboard-icon-1">
        🏕️
    </div>

    <div class="dashboard-floating-icon dashboard-icon-2">
        ⛰️
    </div>

    <div class="dashboard-floating-icon dashboard-icon-3">
        🌲
    </div>

    {{-- Content --}}
    <div class="dashboard-hero-content w-100">

        <div class="row align-items-center g-4">

            {{-- Kiri --}}
            <div class="col-lg-8">

                <div class="d-flex flex-wrap gap-2 mb-3">

                    <span class="dashboard-badge">
                        <i class="bi bi-person-badge-fill"></i>
                        Role: {{ $user->role ?? 'Siswa' }}
                    </span>

                    <span class="dashboard-badge">
                        <i class="bi bi-circle-fill text-success"></i>
                        Akun Aktif
                    </span>

                </div>

                <h1 class="dashboard-title fw-bold mb-3">

                    Halo, {{ $user->username ?? 'User' }}! 👋

                </h1>

                <p class="dashboard-description mb-4">

                    Selamat datang di Peminjaman Alat Camping.
                    Pantau status peminjaman, tenggat waktu pengembalian,
                    serta tagihan denda Anda dengan mudah.

                </p>

                <div class="d-flex flex-wrap gap-3">

                    <a
                        href="{{ route('peminjam.createPeminjam') }}"
                        class="btn btn-mountain btn-lg px-4 py-3"
                    >
                        <i class="bi bi-plus-lg me-2"></i>
                        Ajukan Peminjaman
                    </a>

                    <a
                        href="#riwayat-section"
                        class="btn btn-outline-mountain btn-lg px-4 py-3"
                    >
                        <i class="bi bi-clock-history me-2"></i>
                        Cek Aktivitas
                    </a>

                </div>

                <p class="small mt-4 mb-0 text-white-50">

                    🏕️ Lengkapi kebutuhan camping dan persiapkan
                    pendakianmu dengan baik.

                </p>

            </div>

            {{-- Kanan --}}
            <div class="col-lg-4 text-center d-none d-lg-block">

                <div class="dashboard-user-icon">

                    <i class="bi bi-person-badge-fill"></i>

                    <div class="user-status-badge">
                        <i class="bi bi-shield-fill-check"></i>
                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

{{-- =====================================================
     CONTENT
====================================================== --}}

<div class="container-fluid px-3 px-md-4">

    {{-- =================================================
         STATISTIK
    ================================================== --}}

    <div class="row g-3 mb-4">

        {{-- Pending --}}
        <div class="col-6 col-xl-3">

            <div class="dashboard-card stat-card">

                <div class="d-flex align-items-center justify-content-between mb-3">

                    <div class="stat-icon-box bg-warning-subtle text-warning-emphasis">
                        <i class="bi bi-hourglass-split"></i>
                    </div>

                    <span class="badge bg-warning-subtle text-warning-emphasis rounded-pill">
                        Pending
                    </span>

                </div>

                <span class="text-secondary text-uppercase fw-bold small d-block mb-2">
                    Menunggu
                </span>

                <h2 class="stat-number fw-bold text-warning mb-2">
                    {{ $pendingCount ?? 0 }}
                </h2>

                <small class="text-secondary">
                    Persetujuan admin
                </small>

            </div>

        </div>

        {{-- Dipinjam --}}
        <div class="col-6 col-xl-3">

            <div class="dashboard-card stat-card">

                <div class="d-flex align-items-center justify-content-between mb-3">

                    <div class="stat-icon-box bg-warning-subtle text-warning-emphasis">
                        <i class="bi bi-box-seam-fill"></i>
                    </div>

                    <span class="badge bg-warning-subtle text-warning-emphasis rounded-pill">
                        Aktif
                    </span>

                </div>

                <span class="text-secondary text-uppercase fw-bold small d-block mb-2">
                    Dipinjam
                </span>

                <h2 class="stat-number fw-bold text-warning-emphasis mb-2">
                    {{ $activeCount ?? 0 }}
                </h2>

                <small class="text-secondary">
                    Alat di tangan Anda
                </small>

            </div>

        </div>

        {{-- Selesai --}}
        <div class="col-6 col-xl-3">

            <div class="dashboard-card stat-card">

                <div class="d-flex align-items-center justify-content-between mb-3">

                    <div class="stat-icon-box bg-success-subtle text-success">
                        <i class="bi bi-check-circle-fill"></i>
                    </div>

                    <span class="badge bg-success-subtle text-success rounded-pill">
                        Selesai
                    </span>

                </div>

                <span class="text-secondary text-uppercase fw-bold small d-block mb-2">
                    Selesai
                </span>

                <h2 class="stat-number fw-bold text-success mb-2">
                    {{ $completedCount ?? 0 }}
                </h2>

                <small class="text-secondary">
                    Riwayat peminjaman
                </small>

            </div>

        </div>

        {{-- Denda --}}
        <div class="col-6 col-xl-3">

            <div class="dashboard-card stat-card">

                <div class="d-flex align-items-center justify-content-between mb-3">

                    <div class="stat-icon-box bg-danger-subtle text-danger">
                        <i class="bi bi-exclamation-triangle-fill"></i>
                    </div>

                    <span class="badge bg-danger-subtle text-danger rounded-pill">
                        Tagihan
                    </span>

                </div>

                <span class="text-secondary text-uppercase fw-bold small d-block mb-2">
                    Total Denda
                </span>

                <h2 class="fw-bold text-danger mb-2">
                    Rp {{ number_format($totalDenda ?? 0, 0, ',', '.') }}
                </h2>

                <small class="text-secondary">
                    Keterlambatan
                </small>

            </div>

        </div>

    </div>

    {{-- =================================================
         PANDUAN + KUOTA
    ================================================== --}}

    <div class="row g-3 mb-4">

        {{-- Panduan --}}
        <div class="col-lg-8">

            <div class="dashboard-card p-4 h-100">

                <h5 class="fw-bold mb-1 d-flex align-items-center gap-2">

                    <i class="bi bi-compass text-success"></i>

                    Panduan & Kebijakan Peminjaman

                </h5>

                <p class="text-secondary small mb-4">
                    Informasi penting sebelum melakukan peminjaman alat.
                </p>

                <div class="row g-3">

                    <div class="col-md-6">

                        <div class="guide-box p-3 h-100 d-flex gap-3">

                            <div class="guide-icon">
                                <i class="bi bi-journal-check"></i>
                            </div>

                            <div>

                                <h6 class="fw-bold mb-1">
                                    Prosedur Pengajuan
                                </h6>

                                <p class="text-secondary small mb-0">
                                    Isi formulir peminjaman dengan lengkap
                                    dan tunggu verifikasi dari petugas/admin.
                                </p>

                            </div>

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="guide-box p-3 h-100 d-flex gap-3">

                            <div class="guide-icon">
                                <i class="bi bi-clock-history"></i>
                            </div>

                            <div>

                                <h6 class="fw-bold mb-1">
                                    Batas Waktu & Denda
                                </h6>

                                <p class="text-secondary small mb-0">
                                    Kembalikan alat tepat waktu untuk
                                    menghindari akumulasi denda.
                                </p>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        {{-- Kuota --}}
        <div class="col-lg-4">

            <div class="dashboard-card p-4 h-100 d-flex flex-column justify-content-between">

                <div>

                    <h5 class="fw-bold mb-2 d-flex align-items-center gap-2">

                        <i class="bi bi-speedometer2 text-success"></i>

                        Status Kuota

                    </h5>

                    <p class="text-secondary small mb-4">

                        Batas maksimal alat yang aktif dipinjam
                        secara bersamaan.

                    </p>

                </div>

                <div>

                    @php
                        $active = $activeCount ?? 0;
                        $percentage = min(($active / 3) * 100, 100);
                    @endphp

                    <div class="d-flex justify-content-between align-items-center mb-2">

                        <span class="small fw-semibold text-secondary">
                            Kapasitas Digunakan
                        </span>

                        <span class="small fw-bold text-success">
                            {{ $active }} / 3 Alat
                        </span>

                    </div>

                    <div class="progress quota-progress mb-3">

                        <div
                            class="progress-bar"
                            role="progressbar"
                            style="width: {{ $percentage }}%;"
                            aria-valuenow="{{ $active }}"
                            aria-valuemin="0"
                            aria-valuemax="3"
                        ></div>

                    </div>

                    <div class="d-flex align-items-center gap-2 small text-secondary">

                        <i class="bi bi-shield-fill-check text-success"></i>

                        <span>
                            Akun Anda terverifikasi dan aman.
                        </span>

                    </div>

                </div>

            </div>

        </div>

    </div>

    {{-- =================================================
         RIWAYAT
    ================================================== --}}

    <div
        class="dashboard-card p-4"
        id="riwayat-section"
    >

        <div class="d-flex align-items-center justify-content-between mb-4 flex-wrap gap-3">

            <div>

                <h5 class="fw-bold mb-1">
                    <i class="bi bi-mountains text-success me-2"></i>
                    Aktivitas Peminjaman Terbaru
                </h5>

                <p class="text-secondary small mb-0">

                    Daftar transaksi peminjaman alat terakhir
                    yang tercatat atas akun Anda.

                </p>

            </div>

            <a
                href="{{ route('peminjam.indexPeminjam') }}"
                class="btn btn-outline-success rounded-pill px-3 fw-semibold btn-sm"
            >
                <i class="bi bi-clock-history me-1"></i>
                Lihat Semua
            </a>

        </div>

        <div class="table-responsive">

            <table class="table table-hover align-middle mb-0 dashboard-table">

                <thead>

                    <tr>

                        <th class="py-3">
                            ID / Kode
                        </th>

                        <th class="py-3">
                            Nama Alat
                        </th>

                        <th class="py-3">
                            Tanggal Pinjam
                        </th>

                        <th class="py-3">
                            Status
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($riwayatTerbaru ?? [] as $item)

                        <tr>

                            <td class="fw-bold text-success">

                                {{ str_pad($item->id_peminjaman, 4, '0', STR_PAD_LEFT) }}

                            </td>

                            <td>

                                <div class="fw-semibold">

                                    {{ $item->data_alat->nama_alat ?? 'Alat tidak ditemukan' }}

                                </div>

                                <small class="text-secondary">

                                    Jumlah:
                                    {{ $item->jumlah ?? 1 }}
                                    unit

                                </small>

                            </td>

                            <td class="text-secondary">

                                {{ $item->tanggal_pinjam ?? $item->created_at ?? '-' }}

                            </td>

                            <td>

                                @if($item->status === 'Pending')

                                    <span class="badge status-badge bg-warning-subtle text-warning-emphasis">
                                        Menunggu
                                    </span>

                                @elseif($item->status === 'Dipinjam' || $item->status === 'Disetujui')

                                    <span class="badge status-badge bg-warning-subtle text-warning-emphasis">
                                        Dipinjam
                                    </span>

                                @elseif($item->status === 'Dikembalikan')

                                    <span class="badge status-badge bg-success-subtle text-success">
                                        Selesai
                                    </span>

                                @else

                                    <span class="badge status-badge bg-secondary-subtle text-secondary">
                                        {{ $item->status }}
                                    </span>

                                @endif

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="4"
                                class="text-center py-5 text-secondary"
                            >

                                <div class="mb-2 fs-2">
                                    🏕️
                                </div>

                                <div class="fw-semibold mb-1">
                                    Belum ada riwayat peminjaman
                                </div>

                                <small>
                                    Silakan ajukan peminjaman baru
                                    untuk memulai petualanganmu.
                                </small>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

</div>
@endsection