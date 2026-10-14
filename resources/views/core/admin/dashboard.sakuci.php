@extends('layouts.app')

@section('title', 'Admin')

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

            position: relative;
            overflow: hidden;
            padding: 2rem 1.25rem 2.5rem;
            border-radius: 1.5rem;
            font-family: 'Bricolage Grotesque', system-ui, sans-serif;
            color: var(--pj-ink);
            background-color: var(--pj-bg);
            /* papan alat (pegboard) */
            background-image: radial-gradient(var(--pj-soft) 2px, transparent 2.5px);
            background-size: 26px 26px;
        }
        @media (min-width: 768px) { .pj-wrap { padding: 2.75rem 2.5rem 3rem; } }

        /* mode gelap: ikuti pengaturan perangkat, kecuali situs dipaksa terang */
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
            }
        }
        /* mode gelap: dipilih lewat toggle di situs */
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
        }
        .pj-wrap .pj-blob { opacity: .7; }
        @media (prefers-color-scheme: dark) {
            html:not([data-theme="light"]):not([data-bs-theme="light"]):not(.light) .pj-wrap .pj-blob { opacity: .45; }
            html:not([data-theme="light"]):not([data-bs-theme="light"]):not(.light) .pj-wrap .pj-deco { opacity: .4; }
        }
        html[data-theme="dark"] .pj-wrap .pj-blob, html[data-bs-theme="dark"] .pj-wrap .pj-blob, html.dark .pj-wrap .pj-blob, body.dark .pj-wrap .pj-blob { opacity: .45; }
        html[data-theme="dark"] .pj-wrap .pj-deco, html[data-bs-theme="dark"] .pj-wrap .pj-deco, html.dark .pj-wrap .pj-deco, body.dark .pj-wrap .pj-deco { opacity: .4; }

        /* hiasan melayang */
        .pj-deco { position: absolute; pointer-events: none; color: var(--pj-mid); opacity: .55; }
        .pj-deco svg { width: 100%; height: 100%; display: block; }
        .pj-deco.d1 { width: 92px; height: 92px; top: -18px; right: 6%; transform: rotate(18deg); }
        .pj-deco.d2 { width: 70px; height: 70px; bottom: 14px; left: 3%; transform: rotate(-20deg); }
        .pj-deco.d3 { width: 56px; height: 56px; bottom: 36px; right: 5%; transform: rotate(10deg); opacity: .4; }
        .pj-blob { position: absolute; border-radius: 50%; background: var(--pj-soft); opacity: .7; pointer-events: none; }
        .pj-blob.b1 { width: 220px; height: 220px; top: -90px; left: -70px; }
        .pj-blob.b2 { width: 160px; height: 160px; bottom: -60px; right: 22%; }

        .pj-inner { position: relative; z-index: 1; }

        /* hero: slip peminjaman */
        .pj-slip {
            display: flex;
            background: var(--pj-paper);
            border-radius: 1.25rem;
            box-shadow: 0 10px 28px -12px var(--pj-shadow);
            margin-bottom: 2.25rem;
            overflow: hidden;
        }
        .pj-stub {
            flex: 0 0 auto;
            width: 96px;
            background: var(--pj-stub);
            color: #fff;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: .6rem;
            padding: 1rem .5rem;
            border-right: 3px dashed rgba(255, 255, 255, .55);
            position: relative;
        }
        .pj-stub .hole {
            width: 16px; height: 16px; border-radius: 50%;
            background: var(--pj-bg);
            box-shadow: inset 0 2px 3px rgba(31, 78, 133, .35);
        }
        .pj-stub svg { width: 38px; height: 38px; }
        .pj-slip-body { padding: 1.5rem 1.5rem 1.4rem; flex: 1; min-width: 0; }
        .pj-badge {
            display: inline-block;
            background: var(--pj-soft);
            color: var(--pj-ink);
            font-weight: 600;
            font-size: .85rem;
            padding: .3rem .9rem;
            border-radius: 999px;
            margin-bottom: .8rem;
        }
        .pj-title {
            font-weight: 800;
            font-size: clamp(1.6rem, 4vw, 2.3rem);
            line-height: 1.1;
            letter-spacing: -.02em;
            margin: 0 0 .5rem;
            word-break: break-word;
        }
        .pj-lead { margin: 0; color: var(--pj-text-soft); max-width: 52ch; line-height: 1.55; }
        .pj-lead code {
            background: var(--pj-bg);
            color: var(--pj-ink);
            padding: .1rem .45rem;
            border-radius: .4rem;
            font-size: .88em;
        }

        /* menu: label barang yang digantung */
        .pj-grid { display: grid; gap: 2.2rem 1.5rem; grid-template-columns: 1fr; padding-top: 1.1rem; }
        @media (min-width: 768px) { .pj-grid { grid-template-columns: repeat(3, 1fr); } }

        .pj-tag {
            position: relative;
            display: block;
            background: var(--pj-paper);
            color: var(--pj-ink);
            text-decoration: none;
            border-radius: .5rem 1.5rem 1.5rem 1.5rem;
            padding: 2.4rem 1.4rem 1.4rem;
            box-shadow: 0 8px 22px -12px var(--pj-shadow);
            transform-origin: 50% 0;
        }
        /* lubang label */
        .pj-tag::before {
            content: '';
            position: absolute;
            top: 14px; left: 50%;
            width: 16px; height: 16px;
            margin-left: -8px;
            border-radius: 50%;
            background: var(--pj-bg);
            box-shadow: inset 0 2px 3px rgba(31, 78, 133, .3);
            z-index: 2;
        }
        /* tali */
        .pj-tag::after {
            content: '';
            position: absolute;
            top: -22px; left: 50%;
            width: 30px; height: 40px;
            margin-left: -15px;
            border: 3px solid var(--pj-accent);
            border-bottom: 0;
            border-radius: 30px 30px 0 0;
            z-index: 1;
        }
        .pj-tag:hover, .pj-tag:focus-visible { color: var(--pj-ink); animation: pj-swing .9s ease-out; }
        .pj-tag:focus-visible { outline: 3px solid var(--pj-deep); outline-offset: 4px; }

        @keyframes pj-swing {
            20% { transform: rotate(3.5deg); }
            45% { transform: rotate(-2.5deg); }
            70% { transform: rotate(1.2deg); }
            100% { transform: rotate(0); }
        }
        @media (prefers-reduced-motion: reduce) { .pj-tag:hover, .pj-tag:focus-visible { animation: none; } }

        .pj-ico {
            width: 52px; height: 52px;
            border-radius: 1rem;
            background: var(--pj-soft);
            color: var(--pj-deep);
            display: grid; place-items: center;
            margin-bottom: 1rem;
        }
        .pj-ico svg { width: 28px; height: 28px; }
        .pj-tag h2 { font-size: 1.2rem; font-weight: 800; margin: 0 0 .35rem; letter-spacing: -.01em; }
        .pj-tag p { margin: 0; font-size: .92rem; line-height: 1.5; color: var(--pj-text-soft); }
        .pj-tag .go { display: inline-block; margin-top: 1rem; font-weight: 600; font-size: .9rem; color: var(--pj-deep); }

        @media (max-width: 479px) {
            .pj-stub { width: 64px; }
            .pj-stub svg { width: 30px; height: 30px; }
            .pj-slip-body { padding: 1.1rem; }
        }
    </style>

    <div class="pj-wrap">
        <span class="pj-blob b1"></span>
        <span class="pj-blob b2"></span>

        {{-- hiasan: kunci inggris, kamera, obeng --}}
        <span class="pj-deco d1" aria-hidden="true">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M14.7 6.3a4 4 0 0 0 5 5L21 12.6a1 1 0 0 1 0 1.4l-7 7a1 1 0 0 1-1.4 0L3 11.4a1 1 0 0 1 0-1.4l7-7a1 1 0 0 1 1.4 0l3.3 3.3z" transform="rotate(0 12 12)"/></svg>
        </span>
        <span class="pj-deco d2" aria-hidden="true">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M4 8h3l2-3h6l2 3h3a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1z"/><circle cx="12" cy="13.5" r="3.5"/></svg>
        </span>
        <span class="pj-deco d3" aria-hidden="true">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M14 4l6 6-3 3-6-6 3-3z"/><path d="M11 7l-8 8v4h4l8-8"/></svg>
        </span>

        <div class="pj-inner">

            {{-- slip peminjaman --}}
            <div class="pj-slip">
                <div class="pj-stub" aria-hidden="true">
                    <span class="hole"></span>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M21 8l-9-5-9 5 9 5 9-5z"/><path d="M3 8v8l9 5 9-5V8"/><path d="M12 13v8"/></svg>
                </div>
                <div class="pj-slip-body">
                    <span class="pj-badge">Area admin</span>
                    <h1 class="pj-title">Halo, {{ $user->username }}</h1>
                    <p class="pj-lead">
                        Kelola semua alat yang dipinjamkan dari satu tempat. Halaman ini hanya bisa dibuka oleh role
                        <code>admin</code> (middleware <code>admin</code>).
                    </p>
                </div>
            </div>

            {{-- menu --}}
            <div class="pj-grid">
                <a href="{{ route('admin.roles.index') }}" class="pj-tag">
                    <span class="pj-ico" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3l8 3v6c0 4.5-3.2 8-8 9-4.8-1-8-4.5-8-9V6l8-3z"/><path d="M9 12l2 2 4-4"/></svg>
                    </span>
                    <h2>Kelola role</h2>
                    <p>Tambah role baru untuk dipakai saat membuat user.</p>
                    <span class="go">Buka role</span>
                </a>

                <a href="{{ route('admin.users.index') }}" class="pj-tag">
                    <span class="pj-ico" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="8" r="3.5"/><path d="M2.5 20c.6-3.6 3.2-5.5 6.5-5.5s5.9 1.9 6.5 5.5"/><path d="M17 5.5a3 3 0 0 1 0 5.8"/><path d="M18.5 14.8c1.9.6 3 2.2 3.3 4.7"/></svg>
                    </span>
                    <h2>Kelola user</h2>
                    <p>Tambah user baru dan tentukan role-nya.</p>
                    <span class="go">Buka user</span>
                </a>

                <a href="{{ route('admin.database.export') }}" class="pj-tag">
                    <span class="pj-ico" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><ellipse cx="12" cy="5.5" rx="7" ry="2.8"/><path d="M5 5.5v6c0 1.5 3.1 2.8 7 2.8s7-1.3 7-2.8v-6"/><path d="M12 15v6"/><path d="M9.5 18.8L12 21.3l2.5-2.5"/></svg>
                    </span>
                    <h2>Unduh database</h2>
                    <p>Unduh seluruh isi database jadi satu file .sql, siap diimpor di server.</p>
                    <span class="go">Unduh file .sql</span>
                </a>
            </div>

        </div>
    </div>

@endsection