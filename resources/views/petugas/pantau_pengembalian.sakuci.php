@extends('layouts.app')

@section('title', 'Pantau Pengembalian - PINVERA')

@section('content')

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,400;12..96,600;12..96,800&display=swap" rel="stylesheet">

<style>
    .pj-wrap {
        --pj-bg: #eaf3fc;
        --pj-soft: #cfe4f8;
        --pj-mid: #8dbceb;
        --pj-deep: #3f7fc4;
        --pj-ink: #1f4e85;
        --pj-paper: #ffffff;
        --pj-accent: #f6d88b;
        --pj-text-soft: #4d79a8;
        --pj-stub: #3f7fc4;
        --pj-shadow: rgba(31, 78, 133, .35);
        --pj-line: #d6e6f6;
        --pj-hover: #f3f8fe;
        --pj-head: #f0f6fd;
        --pj-on-deep: #ffffff;
        --pj-danger: #b83a54;
        --pj-danger-bg: #fde6ea;
        --pj-ok: #1d7650;
        --pj-ok-bg: #dcf4e8;
        --pj-warn: #86600f;
        --pj-warn-bg: #fdf0cc;

        position: relative;
        overflow: hidden;
        min-height: calc(100vh - 80px);
        padding: 2rem 1.25rem 2.5rem;
        font-family: 'Bricolage Grotesque', system-ui, sans-serif;
        color: var(--pj-ink);
        background-color: var(--pj-bg);
        background-image: radial-gradient(var(--pj-soft) 2px, transparent 2.5px);
        background-size: 26px 26px;
    }
    @media (min-width: 768px) { .pj-wrap { padding: 2.75rem 2.5rem 3rem; } }

    /* ---------- mode gelap: ikuti perangkat, kecuali situs dipaksa terang ---------- */
    @media (prefers-color-scheme: dark) {
        html:not([data-theme="light"]):not([data-bs-theme="light"]):not(.light) .pj-wrap {
            --pj-bg: #0f1b2b;
            --pj-soft: #1d3552;
            --pj-mid: #3d6a9e;
            --pj-deep: #7ab8f5;
            --pj-ink: #e3eefb;
            --pj-paper: #162a43;
            --pj-accent: #e8c870;
            --pj-text-soft: #9db9d8;
            --pj-stub: #2f5f98;
            --pj-shadow: rgba(0, 0, 0, .55);
            --pj-line: #24415f;
            --pj-hover: #1b3350;
            --pj-head: #1a3049;
            --pj-on-deep: #0f1b2b;
            --pj-danger: #ff9bad;
            --pj-danger-bg: #3a1f2b;
            --pj-ok: #7fe0b0;
            --pj-ok-bg: #16352b;
            --pj-warn: #f0cf7a;
            --pj-warn-bg: #3a3014;
        }
        html:not([data-theme="light"]):not([data-bs-theme="light"]):not(.light) .pj-wrap .pj-blob { opacity: .45; }
        html:not([data-theme="light"]):not([data-bs-theme="light"]):not(.light) .pj-wrap .pj-deco { opacity: .4; }
    }
    /* ---------- mode gelap: dipilih lewat toggle di situs ---------- */
    html[data-theme="dark"] .pj-wrap,
    html[data-bs-theme="dark"] .pj-wrap,
    html.dark .pj-wrap,
    body.dark .pj-wrap,
    [data-bs-theme="dark"] .pj-wrap {
        --pj-bg: #0f1b2b;
        --pj-soft: #1d3552;
        --pj-mid: #3d6a9e;
        --pj-deep: #7ab8f5;
        --pj-ink: #e3eefb;
        --pj-paper: #162a43;
        --pj-accent: #e8c870;
        --pj-text-soft: #9db9d8;
        --pj-stub: #2f5f98;
        --pj-shadow: rgba(0, 0, 0, .55);
        --pj-line: #24415f;
        --pj-hover: #1b3350;
        --pj-head: #1a3049;
        --pj-on-deep: #0f1b2b;
        --pj-danger: #ff9bad;
        --pj-danger-bg: #3a1f2b;
        --pj-ok: #7fe0b0;
        --pj-ok-bg: #16352b;
        --pj-warn: #f0cf7a;
        --pj-warn-bg: #3a3014;
    }
    html[data-theme="dark"] .pj-wrap .pj-blob, html[data-bs-theme="dark"] .pj-wrap .pj-blob,
    html.dark .pj-wrap .pj-blob, body.dark .pj-wrap .pj-blob, [data-bs-theme="dark"] .pj-wrap .pj-blob { opacity: .45; }
    html[data-theme="dark"] .pj-wrap .pj-deco, html[data-bs-theme="dark"] .pj-wrap .pj-deco,
    html.dark .pj-wrap .pj-deco, body.dark .pj-wrap .pj-deco, [data-bs-theme="dark"] .pj-wrap .pj-deco { opacity: .4; }

    /* ---------- hiasan ---------- */
    .pj-deco { position: absolute; pointer-events: none; color: var(--pj-mid); opacity: .55; }
    .pj-deco svg { width: 100%; height: 100%; display: block; }
    .pj-deco.d1 { width: 92px; height: 92px; top: -18px; right: 6%; transform: rotate(18deg); }
    .pj-deco.d2 { width: 70px; height: 70px; bottom: 14px; left: 3%; transform: rotate(-20deg); }
    .pj-deco.d3 { width: 56px; height: 56px; bottom: 36px; right: 5%; transform: rotate(10deg); }
    .pj-blob { position: absolute; border-radius: 50%; background: var(--pj-soft); opacity: .7; pointer-events: none; }
    .pj-blob.b1 { width: 220px; height: 220px; top: -90px; left: -70px; }
    .pj-blob.b2 { width: 160px; height: 160px; bottom: -60px; right: 22%; }
    .pj-inner { position: relative; z-index: 1; }

    @keyframes pj-float { 0%, 100% { translate: 0 0; } 50% { translate: 0 -12px; } }
    .pj-deco.d1 { animation: pj-float 6s ease-in-out infinite; }
    .pj-deco.d2 { animation: pj-float 7s ease-in-out -2s infinite; }
    .pj-deco.d3 { animation: pj-float 5.5s ease-in-out -4s infinite; }
    @media (prefers-reduced-motion: reduce) { .pj-deco { animation: none !important; } }

    /* ---------- slip judul ---------- */
    .pj-slip {
        display: flex;
        background: var(--pj-paper);
        border-radius: 1.25rem;
        box-shadow: 0 10px 28px -12px var(--pj-shadow);
        margin-bottom: 1.5rem;
        overflow: hidden;
    }
    .pj-stub {
        flex: 0 0 auto;
        width: 96px;
        background: var(--pj-stub);
        color: #fff;
        display: flex; flex-direction: column; align-items: center; justify-content: center;
        gap: .6rem;
        padding: 1rem .5rem;
        border-right: 3px dashed rgba(255, 255, 255, .55);
    }
    .pj-stub .hole {
        width: 16px; height: 16px; border-radius: 50%;
        background: var(--pj-bg);
        box-shadow: inset 0 2px 3px rgba(31, 78, 133, .35);
    }
    .pj-stub svg { width: 38px; height: 38px; }
    .pj-slip-body { padding: 1.5rem; flex: 1; min-width: 0; }
    .pj-badges { display: flex; flex-wrap: wrap; gap: .5rem; margin-bottom: .8rem; }
    .pj-badge {
        display: inline-flex; align-items: center; gap: .4rem;
        background: var(--pj-soft);
        color: var(--pj-ink);
        font-weight: 600; font-size: .85rem;
        padding: .3rem .9rem;
        border-radius: 999px;
    }
    .pj-title {
        font-weight: 800;
        font-size: clamp(1.5rem, 4vw, 2.1rem);
        line-height: 1.1;
        letter-spacing: -.02em;
        margin: 0 0 .5rem;
        color: var(--pj-ink);
    }
    .pj-lead { margin: 0 0 1.1rem; color: var(--pj-text-soft); max-width: 58ch; line-height: 1.55; }

    /* ---------- tombol ---------- */
    .pj-btn {
        display: inline-flex; align-items: center; justify-content: center; gap: .5rem;
        padding: .6rem 1.2rem;
        border-radius: .8rem;
        border: 2px solid var(--pj-deep);
        background: var(--pj-deep);
        color: var(--pj-on-deep);
        font-family: inherit; font-weight: 600; font-size: .92rem;
        text-decoration: none;
        cursor: pointer;
    }
    .pj-btn:hover { filter: brightness(1.07); color: var(--pj-on-deep); }
    .pj-btn:focus-visible { outline: 3px solid var(--pj-deep); outline-offset: 3px; }

    /* ---------- buku catatan ---------- */
    .pj-book {
        position: relative;
        background: var(--pj-paper);
        border-radius: .6rem 1.5rem 1.5rem 1.5rem;
        box-shadow: 0 8px 22px -12px var(--pj-shadow);
        padding-top: 1.6rem;
        overflow: hidden;
    }
    .pj-book::before {
        content: '';
        position: absolute;
        top: 9px; left: 0; right: 0;
        height: 14px;
        background-image: radial-gradient(circle at center, var(--pj-bg) 0 6px, transparent 6.5px);
        background-size: 44px 14px;
        background-position: 14px 0;
        background-repeat: repeat-x;
    }

    /* ---------- tabel ---------- */
    .pj-table {
        --bs-table-bg: transparent;
        --bs-table-color: var(--pj-ink);
        --bs-table-border-color: var(--pj-line);
        --bs-table-hover-bg: var(--pj-hover);
        --bs-table-hover-color: var(--pj-ink);
        --bs-table-striped-bg: transparent;
        min-width: 850px;
        margin: 0;
        color: var(--pj-ink);
    }
    .pj-table thead th {
        padding: .9rem 1rem;
        background: var(--pj-head);
        color: var(--pj-text-soft);
        font-size: .85rem; font-weight: 600;
        border-bottom: 2px dashed var(--pj-line);
        white-space: nowrap;
    }
    .pj-table tbody td {
        padding: 1rem;
        border-bottom: 1px dashed var(--pj-line);
        color: var(--pj-ink);
        font-size: .9rem;
    }
    .pj-table tbody tr:last-child td { border-bottom: 0; }
    .pj-soft { color: var(--pj-text-soft); }
    .pj-no { color: var(--pj-text-soft); font-weight: 700; font-size: .85rem; }
    .pj-user { font-weight: 700; color: var(--pj-deep); }

    .pj-alat { display: flex; align-items: center; gap: .75rem; }
    .pj-ico {
        width: 40px; height: 40px; flex: 0 0 auto;
        border-radius: .8rem;
        background: var(--pj-soft); color: var(--pj-deep);
        display: grid; place-items: center;
        font-size: 1rem;
    }
    .pj-alat-name { font-weight: 600; }

    .pj-chip {
        display: inline-flex; align-items: center; gap: .4rem;
        padding: .25rem .8rem;
        border-radius: 999px;
        font-weight: 600; font-size: .8rem;
        white-space: nowrap;
    }
    .pj-chip.good { background: var(--pj-ok-bg); color: var(--pj-ok); }
    .pj-chip.light { background: var(--pj-warn-bg); color: var(--pj-warn); }
    .pj-chip.bad { background: var(--pj-danger-bg); color: var(--pj-danger); }
    .pj-chip.done { background: var(--pj-soft); color: var(--pj-ink); }

    /* ---------- kosong ---------- */
    .pj-empty { padding: 3.5rem 1rem; text-align: center; }
    .pj-empty .pj-ico { width: 64px; height: 64px; margin: 0 auto 1rem; border-radius: 1.2rem; font-size: 1.9rem; }
    .pj-empty h2 { font-size: 1.15rem; font-weight: 800; margin: 0 0 .3rem; color: var(--pj-ink); }
    .pj-empty p { margin: 0; font-size: .92rem; color: var(--pj-text-soft); }

    /* ---------- pagination ---------- */
    .pj-pagination {
        display: flex; justify-content: flex-end;
        padding: 1rem 1.5rem;
        border-top: 2px dashed var(--pj-line);
        background: var(--pj-head);
    }
    .pj-pagination .pagination { margin: 0; gap: .25rem; flex-wrap: wrap; }
    .pj-pagination .page-link {
        border-radius: .6rem !important;
        border: 1px solid var(--pj-line);
        background: var(--pj-paper);
        color: var(--pj-deep);
        font-weight: 600;
    }
    .pj-pagination .page-link:hover { background: var(--pj-soft); color: var(--pj-ink); }
    .pj-pagination .page-link:focus-visible { outline: 3px solid var(--pj-deep); outline-offset: 2px; box-shadow: none; }
    .pj-pagination .page-item.active .page-link { background: var(--pj-deep); border-color: var(--pj-deep); color: var(--pj-on-deep); }
    .pj-pagination .page-item.disabled .page-link { background: transparent; color: var(--pj-text-soft); opacity: .6; }

    @media (max-width: 479px) {
        .pj-stub { width: 64px; }
        .pj-stub svg { width: 30px; height: 30px; }
        .pj-slip-body { padding: 1.1rem; }
        .pj-btn { width: 100%; }
        .pj-pagination { padding: .9rem 1rem; justify-content: center; }
    }
</style>

<div class="pj-wrap">
    <span class="pj-blob b1"></span>
    <span class="pj-blob b2"></span>

    {{-- hiasan: kunci inggris, kamera, obeng --}}
    <span class="pj-deco d1" aria-hidden="true">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M14.7 6.3a4 4 0 0 0 5 5L21 12.6a1 1 0 0 1 0 1.4l-7 7a1 1 0 0 1-1.4 0L3 11.4a1 1 0 0 1 0-1.4l7-7a1 1 0 0 1 1.4 0l3.3 3.3z"/></svg>
    </span>
    <span class="pj-deco d2" aria-hidden="true">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M4 8h3l2-3h6l2 3h3a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1z"/><circle cx="12" cy="13.5" r="3.5"/></svg>
    </span>
    <span class="pj-deco d3" aria-hidden="true">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M14 4l6 6-3 3-6-6 3-3z"/><path d="M11 7l-8 8v4h4l8-8"/></svg>
    </span>

    <div class="pj-inner">

        {{-- slip judul + tombol cetak --}}
        <div class="pj-slip">
            <div class="pj-stub" aria-hidden="true">
                <span class="hole"></span>
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M21 8l-9-5-9 5 9 5 9-5z"/><path d="M3 8v8l9 5 9-5V8"/><path d="M9 14l-3-3 3-3"/><path d="M6 11h7"/></svg>
            </div>
            <div class="pj-slip-body">

                <div class="pj-badges">
                    <span class="pj-badge">
                        <i class="bi bi-arrow-return-left"></i>
                        Inventaris Sistem
                    </span>
                    <span class="pj-badge">
                        <i class="bi bi-person-check"></i>
                        Akses Petugas
                    </span>
                </div>

                <h1 class="pj-title">Pantau Pengembalian</h1>

                <p class="pj-lead">
                    Memantau riwayat alat yang telah
                    dikembalikan oleh customer dengan
                    lebih terstruktur dan mudah dipantau.
                </p>

                <a
                    href="{{ route('petugas.pengembalian.cetak') }}"
                    target="_blank"
                    class="pj-btn"
                >
                    <i class="bi bi-printer"></i>
                    Cetak Laporan
                </a>

            </div>
        </div>

        {{-- buku catatan --}}
        <div class="pj-book">

            <div class="table-responsive">
                <table class="table table-hover align-middle pj-table">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 5%;">No</th>
                            <th style="width: 15%;">Tgl Kembali</th>
                            <th style="width: 20%;">Nama Peminjam</th>
                            <th style="width: 25%;">Nama Alat</th>
                            <th style="width: 15%;">Kondisi</th>
                            <th class="text-end" style="width: 20%;">Status</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($datap as $index => $item)

                            @php

                                $peminjaman =
                                    $peminjamanList[$item->id_peminjaman]
                                    ?? null;

                                $namaUser =
                                    $peminjaman
                                    ? ($userList[$peminjaman->id_user]
                                        ?? 'Tidak diketahui')
                                    : 'Tidak diketahui';

                                $namaAlat =
                                    $peminjaman
                                    ? ($alatList[$peminjaman->id_alat]
                                        ?? 'Alat dihapus')
                                    : 'Alat dihapus';

                            @endphp

                            <tr>

                                {{-- NOMOR --}}
                                <td class="text-center">
                                    <span class="pj-no">{{ $datap->firstItem() + $index }}</span>
                                </td>

                                {{-- TANGGAL --}}
                                <td>
                                    <span class="pj-soft">
                                        {{ date(
                                            'd M Y',
                                            strtotime(
                                                $item->tanggal_pengembalian
                                            )
                                        ) }}
                                    </span>
                                </td>

                                {{-- PEMINJAM --}}
                                <td>
                                    <span class="pj-user">{{ $namaUser }}</span>
                                </td>

                                {{-- ALAT --}}
                                <td>
                                    <div class="pj-alat">
                                        <span class="pj-ico" aria-hidden="true"><i class="bi bi-box-seam"></i></span>
                                        <span class="pj-alat-name">{{ $namaAlat }}</span>
                                    </div>
                                </td>

                                {{-- KONDISI --}}
                                <td>

                                    @if(
                                        strtolower(
                                            $item->kondisi_barang
                                        ) == 'baik'
                                    )

                                        <span class="pj-chip good">
                                            <i class="bi bi-check-circle"></i>
                                            Baik
                                        </span>

                                    @elseif(
                                        strtolower(
                                            $item->kondisi_barang
                                        ) == 'ringan rusak'
                                        ||
                                        strtolower(
                                            $item->kondisi_barang
                                        ) == 'rusak ringan'
                                    )

                                        <span class="pj-chip light">
                                            <i class="bi bi-exclamation-circle"></i>
                                            Rusak Ringan
                                        </span>

                                    @else

                                        <span class="pj-chip bad">
                                            <i class="bi bi-x-circle"></i>
                                            {{ $item->kondisi_barang ?? 'Rusak' }}
                                        </span>

                                    @endif

                                </td>

                                {{-- STATUS --}}
                                <td class="text-end">
                                    <span class="pj-chip done">
                                        <i class="bi bi-check2-all"></i>
                                        Selesai
                                    </span>
                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="6">
                                    <div class="pj-empty">
                                        <div class="pj-ico" aria-hidden="true"><i class="bi bi-inbox"></i></div>
                                        <h2>Belum Ada Data Pengembalian</h2>
                                        <p>
                                            Belum terdapat data alat
                                            yang telah dikembalikan.
                                        </p>
                                    </div>
                                </td>
                            </tr>

                        @endforelse

                    </tbody>
                </table>
            </div>

            @if($datap->hasPages())
                <div class="pj-pagination">
                    {{ $datap->links() }}
                </div>
            @endif

        </div>

    </div>
</div>

@endsection