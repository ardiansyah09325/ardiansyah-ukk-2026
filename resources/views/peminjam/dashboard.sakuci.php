@extends('layouts.app')

@section('title', config('app.name') . ' — Dashboard Siswa')

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

    /* ---------- slip sapaan ---------- */
    .pj-slip {
        display: flex;
        background: var(--pj-paper);
        border-radius: 1.25rem;
        box-shadow: 0 10px 28px -12px var(--pj-shadow);
        margin-bottom: 2.4rem;
        overflow: hidden;
    }
    .pj-stub {
        flex: 0 0 auto;
        width: 110px;
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
    .pj-stub svg { width: 44px; height: 44px; }
    .pj-slip-body { padding: 1.6rem 1.5rem; flex: 1; min-width: 0; }
    .pj-badges { display: flex; flex-wrap: wrap; gap: .5rem; margin-bottom: .9rem; }
    .pj-badge {
        display: inline-flex; align-items: center; gap: .4rem;
        background: var(--pj-soft);
        color: var(--pj-ink);
        font-weight: 600; font-size: .85rem;
        padding: .3rem .9rem;
        border-radius: 999px;
    }
    .pj-badge .dot { width: 8px; height: 8px; border-radius: 50%; background: var(--pj-ok); }
    .pj-title {
        font-weight: 800;
        font-size: clamp(1.7rem, 4.5vw, 2.7rem);
        line-height: 1.08;
        letter-spacing: -.02em;
        margin: 0 0 .6rem;
        color: var(--pj-ink);
        word-break: break-word;
    }
    .pj-lead { margin: 0 0 1.25rem; color: var(--pj-text-soft); max-width: 58ch; line-height: 1.6; }
    .pj-note { margin: 1.1rem 0 0; font-size: .85rem; color: var(--pj-text-soft); }
    .pj-cta { display: flex; flex-wrap: wrap; gap: .75rem; }

    /* ---------- tombol ---------- */
    .pj-btn {
        display: inline-flex; align-items: center; gap: .5rem;
        padding: .65rem 1.25rem;
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
    .pj-btn.sm { padding: .3rem .85rem; font-size: .82rem; border-radius: .6rem; }
    .pj-btn.line { background: transparent; color: var(--pj-deep); }
    .pj-btn.line:hover { background: var(--pj-soft); color: var(--pj-ink); filter: none; }

    /* ---------- label statistik (digantung) ---------- */
    .pj-tags { padding-top: 1.4rem; margin-bottom: 1.25rem; }
    .pj-tag {
        position: relative;
        height: 100%;
        background: var(--pj-paper);
        border-radius: .5rem 1.5rem 1.5rem 1.5rem;
        padding: 2.3rem 1.2rem 1.2rem;
        box-shadow: 0 8px 22px -12px var(--pj-shadow);
        transform-origin: 50% 0;
    }
    .pj-tag::before {
        content: '';
        position: absolute;
        top: 14px; left: 50%;
        width: 16px; height: 16px; margin-left: -8px;
        border-radius: 50%;
        background: var(--pj-bg);
        box-shadow: inset 0 2px 3px rgba(31, 78, 133, .3);
        z-index: 2;
    }
    .pj-tag::after {
        content: '';
        position: absolute;
        top: -22px; left: 50%;
        width: 30px; height: 40px; margin-left: -15px;
        border: 3px solid var(--pj-accent);
        border-bottom: 0;
        border-radius: 30px 30px 0 0;
        z-index: 1;
    }
    .pj-tag:hover { animation: pj-swing .9s ease-out; }
    @keyframes pj-swing {
        20% { transform: rotate(3deg); }
        45% { transform: rotate(-2deg); }
        70% { transform: rotate(1deg); }
        100% { transform: rotate(0); }
    }
    @media (prefers-reduced-motion: reduce) { .pj-tag:hover { animation: none; } }

    .pj-tag-top { display: flex; align-items: center; justify-content: space-between; gap: .5rem; margin-bottom: .9rem; }
    .pj-ico {
        width: 44px; height: 44px; flex: 0 0 auto;
        border-radius: .9rem;
        background: var(--pj-soft); color: var(--pj-deep);
        display: grid; place-items: center;
        font-size: 1.2rem;
    }
    .pj-ico.warn { background: var(--pj-warn-bg); color: var(--pj-warn); }
    .pj-ico.ok { background: var(--pj-ok-bg); color: var(--pj-ok); }
    .pj-ico.bad { background: var(--pj-danger-bg); color: var(--pj-danger); }
    .pj-tag-label { font-size: .85rem; font-weight: 600; color: var(--pj-text-soft); margin-bottom: .2rem; }
    .pj-num { font-size: 2rem; font-weight: 800; line-height: 1.1; letter-spacing: -.02em; margin: 0 0 .25rem; }
    .pj-num.money { font-size: 1.45rem; }
    .pj-num.warn { color: var(--pj-warn); }
    .pj-num.deep { color: var(--pj-deep); }
    .pj-num.ok { color: var(--pj-ok); }
    .pj-num.bad { color: var(--pj-danger); }
    .pj-tag small { color: var(--pj-text-soft); font-size: .82rem; }

    /* ---------- panel ---------- */
    .pj-panel {
        position: relative;
        height: 100%;
        background: var(--pj-paper);
        border-radius: .6rem 1.5rem 1.5rem 1.5rem;
        box-shadow: 0 8px 22px -12px var(--pj-shadow);
        padding: 1.5rem;
    }
    .pj-panel h2 { font-size: 1.15rem; font-weight: 800; margin: 0 0 .25rem; display: flex; align-items: center; gap: .5rem; color: var(--pj-ink); }
    .pj-panel h2 i { color: var(--pj-deep); }
    .pj-panel .sub { margin: 0 0 1.25rem; font-size: .9rem; color: var(--pj-text-soft); }

    .pj-guide {
        display: flex; gap: .9rem;
        height: 100%;
        padding: 1rem;
        border: 2px dashed var(--pj-line);
        border-radius: 1rem;
        background: var(--pj-head);
    }
    .pj-guide h3 { font-size: 1rem; font-weight: 700; margin: 0 0 .25rem; color: var(--pj-ink); }
    .pj-guide p { margin: 0; font-size: .88rem; line-height: 1.5; color: var(--pj-text-soft); }

    /* kuota: tiga slot rak */
    .pj-quota-row { display: flex; justify-content: space-between; align-items: center; font-size: .88rem; font-weight: 600; margin-bottom: .6rem; }
    .pj-quota-row .count { color: var(--pj-deep); font-weight: 800; }
    .pj-quota-row .label { color: var(--pj-text-soft); }
    .pj-bar {
        position: relative;
        height: 14px;
        border-radius: 999px;
        background: var(--pj-soft);
        overflow: hidden;
        margin-bottom: 1rem;
    }
    .pj-bar-fill { height: 100%; border-radius: 999px; background: var(--pj-deep); }
    .pj-bar::after {
        content: '';
        position: absolute; inset: 0;
        background:
            linear-gradient(to right, transparent calc(33.33% - 1px), var(--pj-paper) calc(33.33% - 1px), var(--pj-paper) calc(33.33% + 1px), transparent calc(33.33% + 1px)),
            linear-gradient(to right, transparent calc(66.66% - 1px), var(--pj-paper) calc(66.66% - 1px), var(--pj-paper) calc(66.66% + 1px), transparent calc(66.66% + 1px));
    }
    .pj-verify { display: flex; align-items: center; gap: .5rem; font-size: .88rem; color: var(--pj-text-soft); }
    .pj-verify i { color: var(--pj-ok); }

    /* ---------- riwayat: buku catatan ---------- */
    .pj-book {
        position: relative;
        background: var(--pj-paper);
        border-radius: .6rem 1.5rem 1.5rem 1.5rem;
        box-shadow: 0 8px 22px -12px var(--pj-shadow);
        padding-top: 1.6rem;
        overflow: hidden;
        scroll-margin-top: 1rem;
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
    .pj-book-head { display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 1rem; padding: .6rem 1.5rem 1.1rem; }
    .pj-book-head h2 { font-size: 1.15rem; font-weight: 800; margin: 0 0 .15rem; color: var(--pj-ink); display: flex; align-items: center; gap: .5rem; }
    .pj-book-head h2 i { color: var(--pj-deep); }
    .pj-book-head p { margin: 0; font-size: .9rem; color: var(--pj-text-soft); }

    .pj-table {
        --bs-table-bg: transparent;
        --bs-table-color: var(--pj-ink);
        --bs-table-border-color: var(--pj-line);
        --bs-table-hover-bg: var(--pj-hover);
        --bs-table-hover-color: var(--pj-ink);
        --bs-table-striped-bg: transparent;
        min-width: 560px;
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
    .pj-strong { font-weight: 700; }

    .pj-id {
        display: inline-flex; align-items: center; gap: .45rem;
        padding: .3rem .75rem .3rem .55rem;
        border-radius: .3rem .8rem .8rem .3rem;
        background: var(--pj-head);
        border: 1px solid var(--pj-line);
        color: var(--pj-ink);
        font-weight: 700; font-size: .8rem;
        white-space: nowrap;
    }
    .pj-id::before {
        content: '';
        width: 8px; height: 8px; border-radius: 50%;
        background: var(--pj-bg);
        box-shadow: inset 0 1px 2px rgba(31, 78, 133, .35);
    }

    .pj-chip {
        display: inline-block;
        padding: .25rem .8rem;
        border-radius: 999px;
        font-weight: 600; font-size: .8rem;
        white-space: nowrap;
    }
    .pj-chip.pending { background: var(--pj-warn-bg); color: var(--pj-warn); }
    .pj-chip.borrowed { background: var(--pj-deep); color: var(--pj-on-deep); }
    .pj-chip.returned { background: var(--pj-ok-bg); color: var(--pj-ok); }
    .pj-chip.other { background: var(--pj-soft); color: var(--pj-ink); }

    .pj-empty { padding: 3.5rem 1rem; text-align: center; }
    .pj-empty .pj-ico { width: 64px; height: 64px; margin: 0 auto 1rem; border-radius: 1.2rem; font-size: 1.9rem; }
    .pj-empty .t { font-weight: 800; margin-bottom: .25rem; color: var(--pj-ink); }
    .pj-empty small { color: var(--pj-text-soft); font-size: .9rem; }

    @media (max-width: 479px) {
        .pj-stub { width: 64px; }
        .pj-stub svg { width: 30px; height: 30px; }
        .pj-slip-body { padding: 1.1rem; }
        .pj-book-head { padding: .6rem 1.1rem 1rem; }
    }
</style>

<div class="pj-wrap">
    <span class="pj-blob b1"></span>
    <span class="pj-blob b2"></span>

    {{-- hiasan: kunci inggris, kamera, tenda --}}
    <span class="pj-deco d1" aria-hidden="true">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M14.7 6.3a4 4 0 0 0 5 5L21 12.6a1 1 0 0 1 0 1.4l-7 7a1 1 0 0 1-1.4 0L3 11.4a1 1 0 0 1 0-1.4l7-7a1 1 0 0 1 1.4 0l3.3 3.3z"/></svg>
    </span>
    <span class="pj-deco d2" aria-hidden="true">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M4 8h3l2-3h6l2 3h3a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1z"/><circle cx="12" cy="13.5" r="3.5"/></svg>
    </span>
    <span class="pj-deco d3" aria-hidden="true">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M3 20L12 4l9 16H3z"/><path d="M12 4v16"/><path d="M9 20l3-6 3 6"/></svg>
    </span>

    <div class="pj-inner">

        {{-- slip sapaan --}}
        <div class="pj-slip">
            <div class="pj-stub" aria-hidden="true">
                <span class="hole"></span>
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M3 20L12 4l9 16H3z"/><path d="M12 4v16"/><path d="M9 20l3-6 3 6"/></svg>
            </div>
            <div class="pj-slip-body">

                <div class="pj-badges">
                    <span class="pj-badge">
                        <i class="bi bi-person-badge-fill"></i>
                        Role: {{ $user->role ?? 'Siswa' }}
                    </span>
                    <span class="pj-badge">
                        <span class="dot"></span>
                        Akun Aktif
                    </span>
                </div>

                <h1 class="pj-title">Halo, {{ $user->username ?? 'User' }}! 👋</h1>

                <p class="pj-lead">
                    Selamat datang di Peminjaman Alat Camping.
                    Pantau status peminjaman, tenggat waktu pengembalian,
                    serta tagihan denda Anda dengan mudah.
                </p>

                <div class="pj-cta">
                    <a href="{{ route('peminjam.createPeminjam') }}" class="pj-btn">
                        <i class="bi bi-plus-lg"></i>
                        Ajukan Peminjaman
                    </a>
                    <a href="#riwayat-section" class="pj-btn line">
                        <i class="bi bi-clock-history"></i>
                        Cek Aktivitas
                    </a>
                </div>

                <p class="pj-note">Lengkapi kebutuhan camping dan persiapkan pendakianmu dengan baik.</p>

            </div>
        </div>

        {{-- statistik --}}
        <div class="row g-3 pj-tags">

            <div class="col-6 col-xl-3">
                <div class="pj-tag">
                    <div class="pj-tag-top">
                        <span class="pj-ico warn"><i class="bi bi-hourglass-split"></i></span>
                        <span class="pj-chip pending">Pending</span>
                    </div>
                    <div class="pj-tag-label">Menunggu</div>
                    <div class="pj-num warn">{{ $pendingCount ?? 0 }}</div>
                    <small>Persetujuan admin</small>
                </div>
            </div>

            <div class="col-6 col-xl-3">
                <div class="pj-tag">
                    <div class="pj-tag-top">
                        <span class="pj-ico"><i class="bi bi-box-seam-fill"></i></span>
                        <span class="pj-chip other">Aktif</span>
                    </div>
                    <div class="pj-tag-label">Dipinjam</div>
                    <div class="pj-num deep">{{ $activeCount ?? 0 }}</div>
                    <small>Alat di tangan Anda</small>
                </div>
            </div>

            <div class="col-6 col-xl-3">
                <div class="pj-tag">
                    <div class="pj-tag-top">
                        <span class="pj-ico ok"><i class="bi bi-check-circle-fill"></i></span>
                        <span class="pj-chip returned">Selesai</span>
                    </div>
                    <div class="pj-tag-label">Selesai</div>
                    <div class="pj-num ok">{{ $completedCount ?? 0 }}</div>
                    <small>Riwayat peminjaman</small>
                </div>
            </div>

            <div class="col-6 col-xl-3">
                <div class="pj-tag">
                    <div class="pj-tag-top">
                        <span class="pj-ico bad"><i class="bi bi-exclamation-triangle-fill"></i></span>
                        <span class="pj-chip" style="background: var(--pj-danger-bg); color: var(--pj-danger);">Tagihan</span>
                    </div>
                    <div class="pj-tag-label">Total Denda</div>
                    <div class="pj-num money bad">Rp {{ number_format($totalDenda ?? 0, 0, ',', '.') }}</div>
                    <small>Keterlambatan</small>
                </div>
            </div>

        </div>

        {{-- panduan + kuota --}}
        <div class="row g-3 mb-4">

            <div class="col-lg-8">
                <div class="pj-panel">
                    <h2><i class="bi bi-compass"></i> Panduan &amp; Kebijakan Peminjaman</h2>
                    <p class="sub">Informasi penting sebelum melakukan peminjaman alat.</p>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="pj-guide">
                                <span class="pj-ico"><i class="bi bi-journal-check"></i></span>
                                <div>
                                    <h3>Prosedur Pengajuan</h3>
                                    <p>Isi formulir peminjaman dengan lengkap dan tunggu verifikasi dari petugas/admin.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="pj-guide">
                                <span class="pj-ico"><i class="bi bi-clock-history"></i></span>
                                <div>
                                    <h3>Batas Waktu &amp; Denda</h3>
                                    <p>Kembalikan alat tepat waktu untuk menghindari akumulasi denda.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="pj-panel d-flex flex-column justify-content-between">
                    <div>
                        <h2><i class="bi bi-speedometer2"></i> Status Kuota</h2>
                        <p class="sub">Batas maksimal alat yang aktif dipinjam secara bersamaan.</p>
                    </div>

                    <div>
                        @php
                            $active = $activeCount ?? 0;
                            $percentage = min(($active / 3) * 100, 100);
                        @endphp

                        <div class="pj-quota-row">
                            <span class="label">Kapasitas Digunakan</span>
                            <span class="count">{{ $active }} / 3 Alat</span>
                        </div>

                        <div class="pj-bar">
                            <div
                                class="pj-bar-fill"
                                role="progressbar"
                                style="width: {{ $percentage }}%;"
                                aria-valuenow="{{ $active }}"
                                aria-valuemin="0"
                                aria-valuemax="3"
                            ></div>
                        </div>

                        <div class="pj-verify">
                            <i class="bi bi-shield-fill-check"></i>
                            <span>Akun Anda terverifikasi dan aman.</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        {{-- riwayat --}}
        <div class="pj-book" id="riwayat-section">

            <div class="pj-book-head">
                <div>
                    <h2><i class="bi bi-mountains"></i> Aktivitas Peminjaman Terbaru</h2>
                    <p>Daftar transaksi peminjaman alat terakhir yang tercatat atas akun Anda.</p>
                </div>
                <a href="{{ route('peminjam.indexPeminjam') }}" class="pj-btn sm line">
                    <i class="bi bi-clock-history"></i>
                    Lihat Semua
                </a>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle pj-table">
                    <thead>
                        <tr>
                            <th>ID / Kode</th>
                            <th>Nama Alat</th>
                            <th>Tanggal Pinjam</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($riwayatTerbaru ?? [] as $item)
                            <tr>
                                <td>
                                    <span class="pj-id">{{ str_pad($item->id_peminjaman, 4, '0', STR_PAD_LEFT) }}</span>
                                </td>
                                <td>
                                    <div class="pj-strong">{{ $item->data_alat->nama_alat ?? 'Alat tidak ditemukan' }}</div>
                                    <small class="pj-soft">Jumlah: {{ $item->jumlah ?? 1 }} unit</small>
                                </td>
                                <td><span class="pj-soft">{{ $item->tanggal_pinjam ?? $item->created_at ?? '-' }}</span></td>
                                <td>
                                    @if($item->status === 'Pending')
                                        <span class="pj-chip pending">Menunggu</span>
                                    @elseif($item->status === 'Dipinjam' || $item->status === 'Disetujui')
                                        <span class="pj-chip borrowed">Dipinjam</span>
                                    @elseif($item->status === 'Dikembalikan')
                                        <span class="pj-chip returned">Selesai</span>
                                    @else
                                        <span class="pj-chip other">{{ $item->status }}</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">
                                    <div class="pj-empty">
                                        <span class="pj-ico" aria-hidden="true"><i class="bi bi-inbox"></i></span>
                                        <div class="t">Belum ada riwayat peminjaman</div>
                                        <small>Silakan ajukan peminjaman baru untuk memulai petualanganmu.</small>
                                    </div>
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