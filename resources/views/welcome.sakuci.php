@extends('layouts.app')

@section('title', config('app.name') . ' -- Kerangka PHP Ringan')

@section('content')

<style>
    /* =================================================
       SAKUCI PREMIUM UI
       Tidak perlu mengubah HTML/Blade yang sudah ada
       ================================================= */

    :root {
        --sakuci-blue: #2563eb;
        --sakuci-blue-dark: #1e40af;
        --sakuci-cyan: #06b6d4;
        --sakuci-dark: #0f172a;
        --sakuci-text: #1e293b;
        --sakuci-muted: #64748b;
        --sakuci-bg: #f5f8ff;
        --sakuci-card: rgba(255, 255, 255, .88);
    }

    /* =========================
       BACKGROUND
       ========================= */

    body {
        background:
            radial-gradient(
                circle at 10% 10%,
                rgba(37, 99, 235, .08),
                transparent 30%
            ),
            radial-gradient(
                circle at 90% 20%,
                rgba(6, 182, 212, .07),
                transparent 28%
            ),
            #f8fafc;

        color: var(--sakuci-text);
    }

    /* =========================
       HERO
       ========================= */

    section:first-of-type {
        position: relative;
        padding-top: 85px !important;
        padding-bottom: 85px !important;
    }

    section:first-of-type::before {
        content: "";
        position: absolute;
        width: 220px;
        height: 220px;
        background: rgba(37, 99, 235, .08);
        border-radius: 50%;
        filter: blur(5px);
        top: 20px;
        left: 5%;
        z-index: -1;
    }

    section:first-of-type::after {
        content: "";
        position: absolute;
        width: 180px;
        height: 180px;
        background: rgba(6, 182, 212, .07);
        border-radius: 50%;
        filter: blur(5px);
        bottom: 20px;
        right: 7%;
        z-index: -1;
    }

    .badge-brand {
        background: rgba(37, 99, 235, .08) !important;
        color: var(--sakuci-blue) !important;
        border: 1px solid rgba(37, 99, 235, .15);
        font-weight: 700;
        letter-spacing: .3px;
        box-shadow: 0 5px 15px rgba(37, 99, 235, .08);
    }

    .display-5 {
        color: var(--sakuci-dark);
        letter-spacing: -1.5px;
    }

    .text-brand {
        background: linear-gradient(
            90deg,
            #2563eb,
            #06b6d4
        );

        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    /* =========================
       HERO TEXT
       ========================= */

    .lead {
        color: var(--sakuci-muted) !important;
        line-height: 1.8;
    }

    /* =========================
       BUTTON
       ========================= */

    .btn-brand {
        background: linear-gradient(
            135deg,
            #2563eb,
            #1d4ed8
        ) !important;

        border: none !important;
        color: white !important;

        border-radius: 13px;
        font-weight: 700;

        box-shadow:
            0 8px 20px rgba(37, 99, 235, .20);

        transition: all .25s ease;
    }

    .btn-brand:hover {
        transform: translateY(-3px);
        box-shadow:
            0 12px 28px rgba(37, 99, 235, .30);
    }

    .btn-outline-brand {
        background: rgba(255,255,255,.8) !important;
        color: var(--sakuci-blue) !important;

        border: 1px solid #dbeafe !important;
        border-radius: 13px;

        font-weight: 700;

        transition: all .25s ease;
    }

    .btn-outline-brand:hover {
        background: #eff6ff !important;
        border-color: #93c5fd !important;
        transform: translateY(-3px);
    }

    /* =========================
       CARD
       ========================= */

    .card {
        background: var(--sakuci-card) !important;

        border: 1px solid rgba(226, 232, 240, .8) !important;

        border-radius: 20px !important;

        box-shadow:
            0 10px 35px rgba(15, 23, 42, .055) !important;

        backdrop-filter: blur(10px);

        transition:
            transform .25s ease,
            box-shadow .25s ease,
            border-color .25s ease;

        overflow: hidden;
    }

    .card:hover {
        transform: translateY(-5px);

        border-color: rgba(37, 99, 235, .15) !important;

        box-shadow:
            0 18px 45px rgba(15, 23, 42, .09) !important;
    }

    .card-body {
        padding: 26px !important;
    }

    /* =========================
       CARD TITLE
       ========================= */

    .card h2 {
        color: var(--sakuci-dark);
        font-weight: 700;
    }

    .card h3 {
        color: var(--sakuci-text);
    }

    /* =========================
       CODE BLOCK
       ========================= */

    pre.code {
        background:
            linear-gradient(
                145deg,
                #0f172a,
                #111827
            ) !important;

        color: #e2e8f0 !important;

        border-radius: 15px;

        padding: 20px !important;

        font-size: 13px;
        line-height: 1.8;

        border: 1px solid rgba(255,255,255,.05);

        box-shadow:
            inset 0 1px 0 rgba(255,255,255,.04),
            0 8px 20px rgba(15,23,42,.12);

        overflow-x: auto;
    }

    .cmt {
        color: #64748b !important;
    }

    code.inline {
        background: #eff6ff;

        color: #2563eb;

        border: 1px solid #dbeafe;

        padding: 4px 8px;

        border-radius: 7px;

        font-weight: 600;

        font-size: .88em;
    }

    /* =========================
       STEP NUMBER
       ========================= */

    .step-number {
        min-width: 38px;
        height: 38px;

        display: flex;
        align-items: center;
        justify-content: center;

        background:
            linear-gradient(
                135deg,
                #2563eb,
                #06b6d4
            );

        color: white;

        border-radius: 11px;

        font-weight: 800;

        box-shadow:
            0 6px 15px rgba(37,99,235,.18);
    }

    /* =========================
       STEP LIST
       ========================= */

    .list-unstyled li {
        padding: 14px;

        border-radius: 14px;

        transition: all .2s ease;
    }

    .list-unstyled li:hover {
        background: rgba(239,246,255,.7);

        transform: translateX(4px);
    }

    /* =========================
       CARD HEADER
       ========================= */

    .card-header {
        background: transparent !important;

        border-bottom: 1px solid #f1f5f9 !important;

        padding: 20px 24px 12px !important;
    }

    .card-header .fw-semibold {
        color: var(--sakuci-dark);
    }

    /* =========================
       SECTION TITLE
       ========================= */

    section > h2 {
        color: var(--sakuci-dark);

        position: relative;

        display: inline-block;

        padding-bottom: 10px;

        font-weight: 800;
    }

    section > h2::after {
        content: "";

        position: absolute;

        left: 0;
        bottom: 0;

        width: 42px;
        height: 4px;

        border-radius: 20px;

        background:
            linear-gradient(
                90deg,
                #2563eb,
                #06b6d4
            );
    }

    /* =========================
       LINK
       ========================= */

    a {
        transition: all .2s ease;
    }

    /* =========================
       SMALL TEXT
       ========================= */

    .text-secondary {
        color: #64748b !important;
    }

    /* =========================
       MOBILE
       ========================= */

    @media (max-width: 576px) {

        section:first-of-type {
            padding-top: 50px !important;
            padding-bottom: 55px !important;
        }

        .display-5 {
            font-size: 2rem;
            letter-spacing: -1px;
        }

        .lead {
            font-size: .98rem;
            line-height: 1.7;
        }

        .card {
            border-radius: 16px !important;
        }

        .card-body {
            padding: 20px !important;
        }

        pre.code {
            font-size: 11px;
            padding: 15px !important;
        }

        .btn-brand,
        .btn-outline-brand {
            border-radius: 11px;
        }
    }
</style>


    {{-- Hero --}}
    <section class="text-center py-4 py-lg-5">
        <span class="badge rounded-pill badge-brand px-3 py-2 mb-3">Sakuci v1.0.0</span>

        <h1 class="display-5 fw-bold mb-3">
            Peminjaman Alat<br class="d-none d-md-inline">
            <span class="text-brand">Mas Cuens</span>
        </h1>

        <div class="d-flex flex-wrap gap-2 justify-content-center">
            <a class="btn btn-brand btn-lg px-4" href="login">Login</a>
        </div>

    </section>

    {{-- Cara Peminjaman --}}
<section class="row g-4 align-items-start mb-5">
    <div class="col-lg-12">
        <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
                <h2 class="h5 fw-semibold mb-3">🔧 Cara Peminjaman Alat</h2>

                <p class="text-secondary mb-4">
                    Ikuti langkah berikut untuk melakukan peminjaman alat dengan mudah.
                </p>

                <div class="row g-4">

                    <div class="col-md-3">
                        <div class="text-center">
                            <span class="step-number mx-auto mb-3">1</span>
                            <h3 class="h6 fw-semibold">Pilih Kategori</h3>
                            <p class="text-secondary small mb-0">
                                Pilih kategori alat sesuai dengan kebutuhan kamu.
                            </p>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="text-center">
                            <span class="step-number mx-auto mb-3">2</span>
                            <h3 class="h6 fw-semibold">Pilih Alat</h3>
                            <p class="text-secondary small mb-0">
                                Cari dan pilih alat yang ingin kamu pinjam.
                            </p>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="text-center">
                            <span class="step-number mx-auto mb-3">3</span>
                            <h3 class="h6 fw-semibold">Ajukan Peminjaman</h3>
                            <p class="text-secondary small mb-0">
                                Isi data peminjaman lalu ajukan permintaan.
                            </p>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="text-center">
                            <span class="step-number mx-auto mb-3">4</span>
                            <h3 class="h6 fw-semibold">Kembalikan Alat</h3>
                            <p class="text-secondary small mb-0">
                                Kembalikan alat sesuai dengan waktu yang ditentukan.
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>


{{-- Kategori Alat --}}
<section class="mb-5">
    <h2 class="h5 fw-semibold mb-3">📦 Kategori Alat</h2>

    <div class="row row-cols-1 row-cols-md-3 g-4">

        <div class="col">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="fs-2 mb-3">💻</div>
                    <h3 class="h6 fw-semibold">Elektronik</h3>
                    <p class="text-secondary small mb-0">
                        Berisi berbagai alat elektronik yang dapat digunakan
                        untuk kebutuhan pembelajaran dan kegiatan sekolah.
                    </p>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="fs-2 mb-3">🛠️</div>
                    <h3 class="h6 fw-semibold">Peralatan</h3>
                    <p class="text-secondary small mb-0">
                        Berisi berbagai peralatan yang dapat dipinjam
                        sesuai dengan kebutuhan pengguna.
                    </p>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="fs-2 mb-3">🎨</div>
                    <h3 class="h6 fw-semibold">Multimedia</h3>
                    <p class="text-secondary small mb-0">
                        Berisi alat yang digunakan untuk kebutuhan desain,
                        dokumentasi, dan multimedia.
                    </p>
                </div>
            </div>
        </div>

    </div>
</section>


{{-- Aturan Peminjaman --}}
<section class="row g-4 mb-5">

    <div class="col-lg-7">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body p-4">

                <h2 class="h5 fw-semibold mb-3">📋 Aturan Peminjaman</h2>

                <ul class="list-unstyled d-grid gap-2 mb-0">

                    <li class="d-flex gap-3">
                        <span class="step-number">1</span>
                        <div>
                            <div class="fw-medium">Gunakan alat dengan baik</div>
                            <div class="text-secondary small">
                                Alat yang dipinjam harus digunakan sesuai dengan fungsinya.
                            </div>
                        </div>
                    </li>

                    <li class="d-flex gap-3">
                        <span class="step-number">2</span>
                        <div>
                            <div class="fw-medium">Jaga kondisi alat</div>
                            <div class="text-secondary small">
                                Peminjam bertanggung jawab menjaga alat selama masa peminjaman.
                            </div>
                        </div>
                    </li>

                    <li class="d-flex gap-3">
                        <span class="step-number">3</span>
                        <div>
                            <div class="fw-medium">Kembalikan tepat waktu</div>
                            <div class="text-secondary small">
                                Alat harus dikembalikan sesuai dengan batas waktu peminjaman.
                            </div>
                        </div>
                    </li>

                    <li class="d-flex gap-3">
                        <span class="step-number">4</span>
                        <div>
                            <div class="fw-medium">Laporkan kerusakan</div>
                            <div class="text-secondary small">
                                Segera laporkan kepada petugas jika alat mengalami kerusakan.
                            </div>
                        </div>
                    </li>

                </ul>

            </div>
        </div>
    </div>


    <div class="col-lg-5">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body p-4">

                <h2 class="h5 fw-semibold mb-3">💡 Informasi</h2>

                <p class="text-secondary">
                    Pastikan kamu sudah memilih alat yang sesuai sebelum
                    melakukan peminjaman.
                </p>

                <div class="p-3 rounded-4"
                     style="background: #eff6ff; border: 1px solid #dbeafe;">

                    <div class="fw-semibold mb-1">
                        Periksa Ketersediaan
                    </div>

                    <div class="text-secondary small">
                        Pastikan alat masih tersedia sebelum mengajukan
                        peminjaman.
                    </div>

                </div>

            </div>
        </div>
    </div>

</section>


{{-- Alur Peminjaman --}}
<section class="mb-5">
    <h2 class="h5 fw-semibold mb-3">🔄 Alur Peminjaman</h2>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">

            <div class="row g-3 align-items-center text-center">

                <div class="col-md">
                    <span class="step-number mx-auto mb-2">1</span>
                    <div class="fw-semibold">Login</div>
                    <div class="text-secondary small">
                        Masuk ke akun
                    </div>
                </div>

                <div class="col-md-auto d-none d-md-block">
                    →
                </div>

                <div class="col-md">
                    <span class="step-number mx-auto mb-2">2</span>
                    <div class="fw-semibold">Kategori</div>
                    <div class="text-secondary small">
                        Pilih kategori
                    </div>
                </div>

                <div class="col-md-auto d-none d-md-block">
                    →
                </div>

                <div class="col-md">
                    <span class="step-number mx-auto mb-2">3</span>
                    <div class="fw-semibold">Alat</div>
                    <div class="text-secondary small">
                        Pilih alat
                    </div>
                </div>

                <div class="col-md-auto d-none d-md-block">
                    →
                </div>

                <div class="col-md">
                    <span class="step-number mx-auto mb-2">4</span>
                    <div class="fw-semibold">Pinjam</div>
                    <div class="text-secondary small">
                        Ajukan peminjaman
                    </div>
                </div>

                <div class="col-md-auto d-none d-md-block">
                    →
                </div>

                <div class="col-md">
                    <span class="step-number mx-auto mb-2">5</span>
                    <div class="fw-semibold">Kembali</div>
                    <div class="text-secondary small">
                        Kembalikan alat
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>


{{-- Tentang Sakuci --}}
<section class="mb-5">

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4 text-center">

            <span class="badge rounded-pill badge-brand px-3 py-2 mb-3">
                Sakuci v1.0.0
            </span>

            <h2 class="h4 fw-bold mb-3">
                Tentang Peminjaman Alat
            </h2>

            <p class="text-secondary mb-0">
                Website Peminjaman Alat digunakan untuk mempermudah proses
                pencarian, peminjaman, dan pengembalian alat secara
                lebih teratur dan mudah digunakan.
            </p>

        </div>
    </div>

</section>

@endsection