@extends('layouts.app')

@section('title', config('app.name') . ' -- Daftar Peminjaman')

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
        --pj-close: none;

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
            --pj-close: invert(1) grayscale(100%) brightness(200%);
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
        --pj-close: invert(1) grayscale(100%) brightness(200%);
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
    .pj-title {
        font-weight: 800;
        font-size: clamp(1.5rem, 4vw, 2.1rem);
        line-height: 1.1;
        letter-spacing: -.02em;
        margin: 0 0 .5rem;
        color: var(--pj-ink);
    }
    .pj-lead { margin: 0 0 1.1rem; color: var(--pj-text-soft); max-width: 56ch; line-height: 1.55; }

    /* ---------- tombol ---------- */
    .pj-btn {
        display: inline-flex; align-items: center; gap: .5rem;
        padding: .55rem 1.1rem;
        border-radius: .8rem;
        border: 2px solid var(--pj-deep);
        background: var(--pj-deep);
        color: var(--pj-on-deep);
        font-family: inherit; font-weight: 600; font-size: .9rem;
        text-decoration: none;
        cursor: pointer;
    }
    .pj-btn:hover { filter: brightness(1.07); color: var(--pj-on-deep); }
    .pj-btn:focus-visible { outline: 3px solid var(--pj-deep); outline-offset: 3px; }
    .pj-btn.sm { padding: .3rem .75rem; font-size: .82rem; border-radius: .6rem; }
    .pj-btn.line { background: transparent; color: var(--pj-deep); }
    .pj-btn.line:hover { background: var(--pj-soft); color: var(--pj-ink); filter: none; }
    .pj-btn.danger { border-color: var(--pj-danger); color: var(--pj-danger); background: transparent; }
    .pj-btn.danger:hover { background: var(--pj-danger-bg); color: var(--pj-danger); filter: none; }

    /* ---------- notifikasi ---------- */
    .pj-alert {
        display: flex; align-items: center; gap: .75rem;
        background: var(--pj-ok-bg);
        color: var(--pj-ok);
        border: 2px dashed var(--pj-ok);
        border-radius: 1rem;
        padding: .8rem 1rem;
        margin-bottom: 1.5rem;
        font-weight: 600; font-size: .92rem;
    }
    .pj-alert i { font-size: 1.2rem; }
    .pj-alert .btn-close { margin-left: auto; filter: var(--pj-close); box-shadow: none; }

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
        min-width: 1040px;
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
    .pj-strong { font-weight: 700; }
    .pj-money { color: var(--pj-danger); font-weight: 700; white-space: nowrap; }

    /* label kecil berlubang untuk jumlah unit */
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

    /* chip status */
    .pj-chip {
        display: inline-block;
        padding: .25rem .8rem;
        border-radius: 999px;
        font-weight: 600; font-size: .8rem;
        white-space: nowrap;
    }
    .pj-chip.pending { background: var(--pj-warn-bg); color: var(--pj-warn); }
    .pj-chip.approved { background: var(--pj-soft); color: var(--pj-ink); }
    .pj-chip.rejected { background: var(--pj-danger-bg); color: var(--pj-danger); }
    .pj-chip.borrowed { background: var(--pj-deep); color: var(--pj-on-deep); }
    .pj-chip.returned { background: var(--pj-ok-bg); color: var(--pj-ok); }

    .pj-actions { display: inline-flex; gap: .5rem; }

    /* ---------- kosong ---------- */
    .pj-empty { padding: 3.5rem 1rem; text-align: center; }
    .pj-ico {
        width: 64px; height: 64px; margin: 0 auto 1rem;
        border-radius: 1.2rem;
        background: var(--pj-soft); color: var(--pj-deep);
        display: grid; place-items: center;
        font-size: 1.9rem;
    }
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

        {{-- slip judul + tombol tambah --}}
        <div class="pj-slip">
            <div class="pj-stub" aria-hidden="true">
                <span class="hole"></span>
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M21 8l-9-5-9 5 9 5 9-5z"/><path d="M3 8v8l9 5 9-5V8"/><path d="M12 13v8"/></svg>
            </div>
            <div class="pj-slip-body">
                <h1 class="pj-title">Daftar Peminjaman Alat</h1>
                <p class="pj-lead">Kelola data peminjaman dan pengembalian alat inventaris.</p>
                <a href="{{ route('peminjaman.create') }}" class="pj-btn">
                    <i class="bi bi-plus-lg"></i>
                    Tambah Peminjaman Baru
                </a>
            </div>
        </div>

        {{-- notifikasi sukses --}}
        @if(session('success'))
            <div class="pj-alert alert alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle-fill"></i>
                <div>{{ session('success') }}</div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        {{-- buku catatan --}}
        <div class="pj-book">

            <div class="table-responsive">
                <table class="table table-hover align-middle pj-table">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 5%;">No</th>
                            <th>Peminjam</th>
                            <th>Nama Alat</th>
                            <th>Jumlah</th>
                            <th>Tgl Pinjam</th>
                            <th>Tgl Kembali</th>
                            <th>Status</th>
                            <th>Denda</th>
                            <th class="text-center" style="width: 15%;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @forelse ($datap as $peminjaman)
                        <tr>
                            <td class="text-center"><span class="pj-no">{{ $no++ }}</span></td>
                            <td>
                                <span class="pj-strong">{{ $peminjaman->user->nama ?? 'User ID: ' . $peminjaman->id_user }}</span>
                            </td>
                            <td>
                                <span class="pj-strong">{{ $peminjaman->alat->nama_alat ?? 'Alat ID: ' . $peminjaman->id_alat }}</span>
                            </td>
                            <td><span class="pj-id">{{ $peminjaman->jumlah }} Unit</span></td>
                            <td><span class="pj-soft">{{ $peminjaman->tanggal_pinjam }}</span></td>
                            <td><span class="pj-soft">{{ $peminjaman->tanggal_kembali ?? '-' }}</span></td>
                            <td>
                                @if($peminjaman->status == 'Pending')
                                    <span class="pj-chip pending">Pending</span>
                                @elseif($peminjaman->status == 'Disetujui')
                                    <span class="pj-chip approved">Disetujui</span>
                                @elseif($peminjaman->status == 'Ditolak')
                                    <span class="pj-chip rejected">Ditolak</span>
                                @elseif($peminjaman->status == 'Dipinjam')
                                    <span class="pj-chip borrowed">Dipinjam</span>
                                @else
                                    <span class="pj-chip returned">Dikembalikan</span>
                                @endif
                            </td>
                            <td><span class="pj-money">Rp {{ number_format($peminjaman->denda ?? 0, 0, ',', '.') }}</span></td>
                            <td class="text-center">
                                <div class="pj-actions">
                                    <a href="{{ route('peminjaman.edit', ['id_peminjaman' => $peminjaman->id_peminjaman]) }}" class="pj-btn sm line">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>
                                    <form action="{{ route('peminjaman.delete', ['id_peminjaman' => $peminjaman->id_peminjaman]) }}" method="POST" class="d-inline m-0">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="pj-btn sm danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data peminjaman ini?')">
                                            <i class="bi bi-trash"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9">
                                <div class="pj-empty">
                                    <div class="pj-ico" aria-hidden="true"><i class="bi bi-inbox"></i></div>
                                    <p>Belum ada data peminjaman alat yang ditambahkan.</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if(method_exists($datap, 'hasPages') && $datap->hasPages())
                <div class="pj-pagination">
                    {!! $datap->links() !!}
                </div>
            @endif

        </div>

    </div>
</div>

@endsection