@extends('layouts.app')

@section('title', config('app.name') . ' -- Kerangka PHP Ringan')

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
        --pj-head: #f0f6fd;
        --pj-on-deep: #ffffff;

        position: relative;
        overflow: hidden;
        padding: 2rem 1.25rem 2.5rem;
        border-radius: 1.5rem;
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
            --pj-head: #1a3049;
            --pj-on-deep: #0f1b2b;
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
        --pj-head: #1a3049;
        --pj-on-deep: #0f1b2b;
    }
    html[data-theme="dark"] .pj-wrap .pj-blob, html[data-bs-theme="dark"] .pj-wrap .pj-blob,
    html.dark .pj-wrap .pj-blob, body.dark .pj-wrap .pj-blob, [data-bs-theme="dark"] .pj-wrap .pj-blob { opacity: .45; }
    html[data-theme="dark"] .pj-wrap .pj-deco, html[data-bs-theme="dark"] .pj-wrap .pj-deco,
    html.dark .pj-wrap .pj-deco, body.dark .pj-wrap .pj-deco, [data-bs-theme="dark"] .pj-wrap .pj-deco { opacity: .4; }

    /* ---------- hiasan ---------- */
    .pj-deco { position: absolute; pointer-events: none; color: var(--pj-mid); opacity: .55; }
    .pj-deco svg { width: 100%; height: 100%; display: block; }
    .pj-deco.d1 { width: 92px; height: 92px; top: -18px; right: 6%; transform: rotate(18deg); }
    .pj-deco.d2 { width: 70px; height: 70px; top: 46%; left: 1.5%; transform: rotate(-20deg); }
    .pj-deco.d3 { width: 56px; height: 56px; bottom: 30px; right: 4%; transform: rotate(10deg); }
    .pj-blob { position: absolute; border-radius: 50%; background: var(--pj-soft); opacity: .7; pointer-events: none; }
    .pj-blob.b1 { width: 220px; height: 220px; top: -90px; left: -70px; }
    .pj-blob.b2 { width: 160px; height: 160px; bottom: -60px; right: 22%; }
    .pj-inner { position: relative; z-index: 1; }
    .pj-sec { margin-bottom: 2.6rem; }

    /* ---------- tombol ---------- */
    .pj-btn {
        display: inline-flex; align-items: center; gap: .5rem;
        padding: .7rem 1.6rem;
        border-radius: .8rem;
        border: 2px solid var(--pj-deep);
        background: var(--pj-deep);
        color: var(--pj-on-deep);
        font-family: inherit; font-weight: 700; font-size: 1rem;
        text-decoration: none;
    }
    .pj-btn:hover { filter: brightness(1.07); color: var(--pj-on-deep); }
    .pj-btn:focus-visible { outline: 3px solid var(--pj-deep); outline-offset: 3px; }

    /* ---------- hero: slip ---------- */
    .pj-slip {
        display: flex;
        background: var(--pj-paper);
        border-radius: 1.25rem;
        box-shadow: 0 10px 28px -12px var(--pj-shadow);
        overflow: hidden;
    }
    .pj-stub {
        flex: 0 0 auto;
        width: 120px;
        background: var(--pj-stub);
        color: #fff;
        display: flex; flex-direction: column; align-items: center; justify-content: center;
        gap: .7rem;
        padding: 1rem .5rem;
        border-right: 3px dashed rgba(255, 255, 255, .55);
    }
    .pj-stub .hole {
        width: 16px; height: 16px; border-radius: 50%;
        background: var(--pj-bg);
        box-shadow: inset 0 2px 3px rgba(31, 78, 133, .35);
    }
    .pj-stub svg { width: 48px; height: 48px; }
    .pj-hero-body { padding: 2.2rem 1.75rem; flex: 1; min-width: 0; }
    .pj-badge {
        display: inline-block;
        background: var(--pj-soft);
        color: var(--pj-ink);
        font-weight: 600; font-size: .85rem;
        padding: .3rem .9rem;
        border-radius: 999px;
        margin-bottom: .9rem;
    }
    .pj-hero-title {
        font-weight: 800;
        font-size: clamp(2rem, 6vw, 3.4rem);
        line-height: 1.05;
        letter-spacing: -.03em;
        margin: 0 0 1.4rem;
        color: var(--pj-ink);
    }
    .pj-hero-title span { color: var(--pj-deep); }

    /* ---------- ilustrasi hero ---------- */
    .pj-hero-art {
        flex: 0 0 auto;
        width: min(36%, 340px);
        display: grid;
        place-items: center;
        padding: 1rem 1.5rem 1rem 0;
    }
    .pj-hero-art svg { width: 100%; height: auto; max-height: 270px; animation: pj-float 5s ease-in-out infinite; }
    .pj-hero-art .st { stroke: var(--pj-ink); stroke-width: 3; }
    .pj-hero-art .f-soft { fill: var(--pj-soft); }
    .pj-hero-art .f-mid { fill: var(--pj-mid); }
    .pj-hero-art .f-deep { fill: var(--pj-deep); }
    .pj-hero-art .f-stub { fill: var(--pj-stub); }
    .pj-hero-art .f-paper { fill: var(--pj-paper); }
    .pj-hero-art .f-accent { fill: var(--pj-accent); }
    .pj-hero-art .f-ink { fill: var(--pj-ink); }
    @media (max-width: 575px) { .pj-hero-art { display: none; } }

    /* ---------- judul bagian ---------- */
    .pj-h2 { font-size: 1.3rem; font-weight: 800; margin: 0 0 1rem; color: var(--pj-ink); letter-spacing: -.01em; }
    .pj-sub { margin: 0 0 1.5rem; color: var(--pj-text-soft); line-height: 1.6; }

    /* ---------- panel kertas ---------- */
    .pj-panel {
        position: relative;
        height: 100%;
        background: var(--pj-paper);
        border-radius: .6rem 1.5rem 1.5rem 1.5rem;
        box-shadow: 0 8px 22px -12px var(--pj-shadow);
        padding: 1.6rem;
    }
    .pj-panel .pj-h2 { margin-bottom: .6rem; }

    /* ---------- nomor langkah ---------- */
    .pj-step {
        width: 40px; height: 40px; flex: 0 0 auto;
        display: grid; place-items: center;
        border-radius: 50%;
        background: var(--pj-deep);
        color: var(--pj-on-deep);
        font-weight: 800;
        box-shadow: 0 0 0 5px var(--pj-soft);
    }
    .pj-step.mx { margin-left: auto; margin-right: auto; }

    .pj-how { text-align: center; }
    .pj-how h3 { font-size: 1rem; font-weight: 700; margin: .9rem 0 .3rem; color: var(--pj-ink); }
    .pj-how p { margin: 0; font-size: .9rem; line-height: 1.5; color: var(--pj-text-soft); }
    .pj-how .pj-step { margin: 0 auto; }

    /* ---------- label kategori (digantung) ---------- */
    .pj-tags { padding-top: 1.4rem; }
    .pj-tag {
        position: relative;
        height: 100%;
        background: var(--pj-paper);
        border-radius: .5rem 1.5rem 1.5rem 1.5rem;
        padding: 2.3rem 1.4rem 1.5rem;
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
    .pj-tag .emo {
        width: 56px; height: 56px;
        display: grid; place-items: center;
        border-radius: 1rem;
        background: var(--pj-soft);
        font-size: 1.7rem;
        margin-bottom: 1rem;
    }
    .pj-tag h3 { font-size: 1.1rem; font-weight: 800; margin: 0 0 .35rem; color: var(--pj-ink); }
    .pj-tag p { margin: 0; font-size: .9rem; line-height: 1.55; color: var(--pj-text-soft); }

    /* ---------- aturan ---------- */
    .pj-rules { list-style: none; margin: 1rem 0 0; padding: 0; display: grid; gap: .75rem; }
    .pj-rules li {
        display: flex; gap: 1rem;
        padding: .9rem 1rem;
        border: 2px dashed var(--pj-line);
        border-radius: 1rem;
        background: var(--pj-head);
    }
    .pj-rules .t { font-weight: 700; color: var(--pj-ink); }
    .pj-rules .d { font-size: .88rem; line-height: 1.5; color: var(--pj-text-soft); }

    .pj-info-note {
        padding: 1rem 1.1rem;
        border: 2px dashed var(--pj-line);
        border-radius: 1rem;
        background: var(--pj-head);
    }
    .pj-info-note .t { font-weight: 700; color: var(--pj-ink); margin-bottom: .2rem; }
    .pj-info-note .d { font-size: .88rem; line-height: 1.5; color: var(--pj-text-soft); }
    .pj-info-p { margin: 0 0 1rem; line-height: 1.6; color: var(--pj-text-soft); }

    /* ---------- alur ---------- */
    .pj-flow { display: flex; flex-wrap: wrap; align-items: flex-start; justify-content: center; gap: 1rem .5rem; text-align: center; }
    .pj-flow-item { flex: 1 1 110px; min-width: 100px; }
    .pj-flow-item .pj-step { margin: 0 auto .6rem; }
    .pj-flow-item .t { font-weight: 700; color: var(--pj-ink); }
    .pj-flow-item .d { font-size: .85rem; color: var(--pj-text-soft); }
    .pj-arrow { align-self: center; padding-bottom: 1.6rem; font-size: 1.4rem; font-weight: 700; color: var(--pj-mid); }
    @media (max-width: 767px) { .pj-arrow { display: none; } .pj-flow-item { flex-basis: 40%; } }

    /* ---------- tentang ---------- */
    .pj-about { text-align: center; padding: 2rem 1.5rem; }
    .pj-about .pj-h2 { font-size: 1.5rem; }
    .pj-about p { margin: 0 auto; max-width: 62ch; line-height: 1.65; color: var(--pj-text-soft); }

    /* ---------- animasi ---------- */
    @keyframes pj-float { 0%, 100% { translate: 0 0; } 50% { translate: 0 -12px; } }
    @keyframes pj-drift { from { translate: 0 0; } to { translate: 26px 18px; } }
    @keyframes pj-bob { 0%, 100% { transform: translateY(0) rotate(0); } 50% { transform: translateY(-6px) rotate(-5deg); } }
    @keyframes pj-pop { 0% { transform: scale(.2); opacity: 0; } 100% { transform: scale(1); opacity: 1; } }
    @keyframes pj-pulse {
        0% { box-shadow: 0 0 0 0 color-mix(in srgb, var(--pj-deep) 55%, transparent); }
        70%, 100% { box-shadow: 0 0 0 14px transparent; }
    }
    @keyframes pj-nudge { 0%, 100% { translate: 0 0; } 50% { translate: 6px 0; } }

    .pj-deco.d1 { animation: pj-float 6s ease-in-out infinite; }
    .pj-deco.d2 { animation: pj-float 7s ease-in-out -2s infinite; }
    .pj-deco.d3 { animation: pj-float 5.5s ease-in-out -4s infinite; }
    .pj-blob.b1 { animation: pj-drift 14s ease-in-out infinite alternate; }
    .pj-blob.b2 { animation: pj-drift 11s ease-in-out -5s infinite alternate-reverse; }
    .pj-stub svg { animation: pj-bob 3.2s ease-in-out infinite; }
    .pj-pulse { animation: pj-pulse 2.2s ease-out infinite; }
    .pj-arrow { animation: pj-nudge 1.6s ease-in-out infinite; }

    /* muncul saat di-scroll (hanya aktif kalau JavaScript jalan) */
    .pj-js .pj-reveal {
        opacity: 0;
        transform: translateY(26px);
        transition: opacity .6s ease, transform .65s cubic-bezier(.2, .7, .2, 1);
        transition-delay: var(--pj-d, 0ms);
    }
    .pj-js .pj-reveal.is-in { opacity: 1; transform: none; }
    .pj-js .pj-reveal.is-in .pj-step {
        animation: pj-pop .6s cubic-bezier(.3, 1.6, .5, 1) both;
        animation-delay: calc(var(--pj-d, 0ms) + 180ms);
    }

    @media (prefers-reduced-motion: reduce) {
        .pj-deco, .pj-blob, .pj-stub svg, .pj-pulse, .pj-arrow, .pj-hero-art svg { animation: none !important; }
        .pj-js .pj-reveal { opacity: 1; transform: none; transition: none; }
        .pj-js .pj-reveal.is-in .pj-step { animation: none; }
    }

    @media (max-width: 479px) {
        .pj-stub { width: 64px; }
        .pj-stub svg { width: 30px; height: 30px; }
        .pj-hero-body { padding: 1.4rem 1.1rem; }
        .pj-panel { padding: 1.2rem; }
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

        {{-- Hero --}}
        <section class="pj-sec">
            <div class="pj-slip">
                <div class="pj-stub" aria-hidden="true">
                    <span class="hole"></span>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M21 8l-9-5-9 5 9 5 9-5z"/><path d="M3 8v8l9 5 9-5V8"/><path d="M12 13v8"/></svg>
                </div>
                <div class="pj-hero-body">
                    <span class="pj-badge">Sakuci v1.0.0</span>

                    <h1 class="pj-hero-title">
                        Peminjaman Alat<br class="d-none d-md-inline">
                        <span>Mas Cuens</span>
                    </h1>

                    <a class="pj-btn pj-pulse" href="login">
                        <i class="bi bi-box-arrow-in-right"></i>
                        Login
                    </a>
                </div>

                {{-- ilustrasi: koper alat, kamera, dan obeng --}}
                <div class="pj-hero-art" aria-hidden="true">
                    <svg viewBox="0 0 320 260" xmlns="http://www.w3.org/2000/svg" stroke-linecap="round" stroke-linejoin="round" focusable="false">
                        <circle class="f-soft" cx="160" cy="135" r="112"/>
                        <ellipse cx="160" cy="226" rx="96" ry="9" fill="var(--pj-ink)" opacity=".14"/>

                        {{-- obeng (di belakang koper) --}}
                        <g transform="rotate(-16 112 112)">
                            <rect class="f-mid st" x="109" y="26" width="6" height="40" rx="3"/>
                            <rect class="f-accent st" x="102" y="62" width="20" height="56" rx="8"/>
                        </g>

                        {{-- kamera (di belakang koper) --}}
                        <rect class="f-paper st" x="188" y="72" width="80" height="54" rx="10"/>
                        <rect class="f-ink" x="198" y="63" width="22" height="12" rx="3"/>
                        <circle class="f-soft st" cx="228" cy="99" r="16"/>
                        <circle class="f-deep" cx="228" cy="99" r="7"/>
                        <circle class="f-accent" cx="256" cy="84" r="3.5"/>

                        {{-- koper alat --}}
                        <path d="M128 114 v-16 a10 10 0 0 1 10-10 h44 a10 10 0 0 1 10 10 v16" fill="none" stroke="var(--pj-ink)" stroke-width="8"/>
                        <rect class="f-deep st" x="80" y="128" width="160" height="90" rx="14"/>
                        <rect class="f-stub st" x="74" y="112" width="172" height="36" rx="12"/>
                        <rect class="f-accent" x="80" y="164" width="160" height="10"/>
                        <rect class="f-paper st" x="146" y="132" width="28" height="30" rx="6"/>
                        <circle class="f-ink" cx="160" cy="147" r="4"/>
                        <line x1="96" y1="198" x2="224" y2="198" stroke="var(--pj-paper)" stroke-width="3" stroke-dasharray="7 7" opacity=".75"/>

                        {{-- hiasan kecil --}}
                        <path d="M52 92 v14 M45 99 h14" fill="none" stroke="var(--pj-accent)" stroke-width="3.5"/>
                        <path d="M262 50 v10 M257 55 h10" fill="none" stroke="var(--pj-deep)" stroke-width="3"/>
                        <circle class="f-mid" cx="272" cy="178" r="5"/>
                        <circle class="f-accent" cx="58" cy="176" r="4"/>
                    </svg>
                </div>
            </div>
        </section>

        {{-- Cara Peminjaman --}}
        <section class="pj-sec">
            <div class="pj-panel">
                <h2 class="pj-h2">🔧 Cara Peminjaman Alat</h2>

                <p class="pj-sub">
                    Ikuti langkah berikut untuk melakukan peminjaman alat dengan mudah.
                </p>

                <div class="row g-4">

                    <div class="col-md-3">
                        <div class="pj-how">
                            <span class="pj-step">1</span>
                            <h3>Pilih Kategori</h3>
                            <p>Pilih kategori alat sesuai dengan kebutuhan kamu.</p>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="pj-how">
                            <span class="pj-step">2</span>
                            <h3>Pilih Alat</h3>
                            <p>Cari dan pilih alat yang ingin kamu pinjam.</p>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="pj-how">
                            <span class="pj-step">3</span>
                            <h3>Ajukan Peminjaman</h3>
                            <p>Isi data peminjaman lalu ajukan permintaan.</p>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="pj-how">
                            <span class="pj-step">4</span>
                            <h3>Kembalikan Alat</h3>
                            <p>Kembalikan alat sesuai dengan waktu yang ditentukan.</p>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        {{-- Kategori Alat --}}
        <section class="pj-sec">
            <h2 class="pj-h2">📦 Kategori Alat</h2>

            <div class="row row-cols-1 row-cols-md-3 g-4 pj-tags">

                <div class="col">
                    <div class="pj-tag">
                        <div class="emo">💻</div>
                        <h3>Elektronik</h3>
                        <p>
                            Berisi berbagai alat elektronik yang dapat digunakan
                            untuk kebutuhan pembelajaran dan kegiatan sekolah.
                        </p>
                    </div>
                </div>

                <div class="col">
                    <div class="pj-tag">
                        <div class="emo">🛠️</div>
                        <h3>Peralatan</h3>
                        <p>
                            Berisi berbagai peralatan yang dapat dipinjam
                            sesuai dengan kebutuhan pengguna.
                        </p>
                    </div>
                </div>

                <div class="col">
                    <div class="pj-tag">
                        <div class="emo">🎨</div>
                        <h3>Multimedia</h3>
                        <p>
                            Berisi alat yang digunakan untuk kebutuhan desain,
                            dokumentasi, dan multimedia.
                        </p>
                    </div>
                </div>

                <div class="col">
                    <div class="pj-tag">
                        <div class="emo">🏀</div>
                        <h3>Alat Olahraga</h3>
                        <p>
                            Berbagai perlengkapan dan fasilitas pendukung
                            kegiatan olahraga serta latihan fisik.
                        </p>
                    </div>
                </div>

                <div class="col">
                    <div class="pj-tag">
                        <div class="emo">🧹</div>
                        <h3>Alat Kebersihan</h3>
                        <p>
                            Perlengkapan untuk menjaga kebersihan lingkungan
                            serta fasilitas kegiatan bersama.
                        </p>
                    </div>
                </div>

            </div>
        </section>

        {{-- Aturan Peminjaman --}}
        <section class="pj-sec">
            <div class="row g-4">

                <div class="col-lg-7">
                    <div class="pj-panel">
                        <h2 class="pj-h2">📋 Aturan Peminjaman</h2>

                        <ul class="pj-rules">

                            <li>
                                <span class="pj-step">1</span>
                                <div>
                                    <div class="t">Gunakan alat dengan baik</div>
                                    <div class="d">Alat yang dipinjam harus digunakan sesuai dengan fungsinya.</div>
                                </div>
                            </li>

                            <li>
                                <span class="pj-step">2</span>
                                <div>
                                    <div class="t">Jaga kondisi alat</div>
                                    <div class="d">Peminjam bertanggung jawab menjaga alat selama masa peminjaman.</div>
                                </div>
                            </li>

                            <li>
                                <span class="pj-step">3</span>
                                <div>
                                    <div class="t">Kembalikan tepat waktu</div>
                                    <div class="d">Alat harus dikembalikan sesuai dengan batas waktu peminjaman.</div>
                                </div>
                            </li>

                            <li>
                                <span class="pj-step">4</span>
                                <div>
                                    <div class="t">Laporkan kerusakan</div>
                                    <div class="d">Segera laporkan kepada petugas jika alat mengalami kerusakan.</div>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="pj-panel">
                        <h2 class="pj-h2">💡 Informasi</h2>

                        <p class="pj-info-p">
                            Pastikan kamu sudah memilih alat yang sesuai sebelum
                            melakukan peminjaman.
                        </p>

                        <div class="pj-info-note">
                            <div class="t">Periksa Ketersediaan</div>
                            <div class="d">
                                Pastikan alat masih tersedia sebelum mengajukan
                                peminjaman.
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        {{-- Alur Peminjaman --}}
        <section class="pj-sec">
            <h2 class="pj-h2">🔄 Alur Peminjaman</h2>

            <div class="pj-panel">
                <div class="pj-flow">

                    <div class="pj-flow-item">
                        <span class="pj-step">1</span>
                        <div class="t">Login</div>
                        <div class="d">Masuk ke akun</div>
                    </div>

                    <div class="pj-arrow" aria-hidden="true">→</div>

                    <div class="pj-flow-item">
                        <span class="pj-step">2</span>
                        <div class="t">Kategori</div>
                        <div class="d">Pilih kategori</div>
                    </div>

                    <div class="pj-arrow" aria-hidden="true">→</div>

                    <div class="pj-flow-item">
                        <span class="pj-step">3</span>
                        <div class="t">Alat</div>
                        <div class="d">Pilih alat</div>
                    </div>

                    <div class="pj-arrow" aria-hidden="true">→</div>

                    <div class="pj-flow-item">
                        <span class="pj-step">4</span>
                        <div class="t">Pinjam</div>
                        <div class="d">Ajukan peminjaman</div>
                    </div>

                    <div class="pj-arrow" aria-hidden="true">→</div>

                    <div class="pj-flow-item">
                        <span class="pj-step">5</span>
                        <div class="t">Kembali</div>
                        <div class="d">Kembalikan alat</div>
                    </div>

                </div>
            </div>
        </section>

        {{-- Tentang --}}
        <section>
            <div class="pj-panel pj-about">
                <span class="pj-badge">Sakuci v1.0.0</span>

                <h2 class="pj-h2">Tentang Peminjaman Alat</h2>

                <p>
                    Website Peminjaman Alat digunakan untuk mempermudah proses
                    pencarian, peminjaman, dan pengembalian alat secara
                    lebih teratur dan mudah digunakan.
                </p>
            </div>
        </section>

    </div>
</div>

<script>
    (function () {
        var wrap = document.querySelector('.pj-wrap');
        if (!wrap) return;

        var reduce = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
        if (reduce || !('IntersectionObserver' in window)) return;

        var groups = [
            ['.pj-slip', false],
            ['.pj-sec > .pj-h2', false],
            ['.pj-panel', false],
            ['.pj-tag', true],
            ['.pj-how', true],
            ['.pj-rules li', true],
            ['.pj-flow-item', true]
        ];

        var items = [];
        wrap.classList.add('pj-js');

        groups.forEach(function (g) {
            wrap.querySelectorAll(g[0]).forEach(function (el, i) {
                el.classList.add('pj-reveal');
                el.style.setProperty('--pj-d', (g[1] ? i * 110 : 0) + 'ms');
                items.push(el);
            });
        });

        var io = new IntersectionObserver(function (entries) {
            entries.forEach(function (e) {
                if (e.isIntersecting) {
                    e.target.classList.add('is-in');
                    io.unobserve(e.target);
                }
            });
        }, { threshold: 0.15, rootMargin: '0px 0px -40px 0px' });

        items.forEach(function (el) { io.observe(el); });
    })();
</script>

@endsection