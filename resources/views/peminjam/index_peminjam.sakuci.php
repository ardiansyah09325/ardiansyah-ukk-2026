@extends('layouts.app')

@section('title', config('app.name') . ' -- Riwayat Pengajuan Peminjaman')

@section('content')

<style> /* ========================================================= RIWAYAT PEMINJAMAN PAGE - MOUNTAIN STYLE ========================================================= */
.riwayat-page {
    padding: 35px 25px;
}

/* =========================================================
   HEADER
========================================================= */

.riwayat-header {
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

.riwayat-header::before {
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

.riwayat-header::after {
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

.riwayat-header-content {
    position: relative;
    z-index: 2;
}

.riwayat-badge {
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

.riwayat-header h2 {
    font-size: clamp(1.8rem, 4vw, 2.5rem);

    letter-spacing: -.8px;
}

.riwayat-header p {
    max-width: 650px;

    color:
        color-mix(
            in srgb,
            var(--bs-light) 82%,
            transparent
        );
}

/* =========================================================
   BUTTON TAMBAH
========================================================= */

.btn-riwayat {
    background: var(--bs-warning);

    border: 1px solid var(--bs-warning);

    color: var(--bs-dark);

    font-weight: 700;

    border-radius: 14px;

    padding: 11px 18px;

    box-shadow:
        0 8px 20px
        color-mix(
            in srgb,
            var(--bs-dark) 18%,
            transparent
        );

    transition: all .25s ease;
}

.btn-riwayat:hover {
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
   TABLE CARD
========================================================= */

.riwayat-card {
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

.riwayat-card:hover {
    box-shadow:
        0 15px 40px
        color-mix(
            in srgb,
            var(--bs-dark) 10%,
            transparent
        );
}

/* =========================================================
   TABLE
========================================================= */

.riwayat-table {
    margin-bottom: 0;
}

.riwayat-table thead {
    background:
        color-mix(
            in srgb,
            var(--bs-success) 6%,
            var(--bs-body-bg)
        );
}

.riwayat-table thead th {
    border-bottom: 1px solid var(--bs-border-color);

    color: var(--bs-body-secondary);

    font-size: .72rem;

    font-weight: 800;

    text-transform: uppercase;

    letter-spacing: .06em;

    white-space: nowrap;
}

.riwayat-table tbody tr {
    transition: all .2s ease;
}

.riwayat-table tbody tr:hover {
    background:
        color-mix(
            in srgb,
            var(--bs-success) 4%,
            var(--bs-body-bg)
        );
}

.riwayat-table td {
    border-color:
        color-mix(
            in srgb,
            var(--bs-border-color) 65%,
            transparent
        );

    padding-top: 17px;

    padding-bottom: 17px;
}

/* =========================================================
   NOMOR
========================================================= */

.number-box {
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

    font-weight: 700;

    font-size: .8rem;
}

/* =========================================================
   ALAT
========================================================= */

.alat-wrapper {
    display: flex;

    align-items: center;

    gap: 10px;
}

.alat-icon {
    width: 42px;
    height: 42px;

    display: inline-flex;

    align-items: center;
    justify-content: center;

    flex-shrink: 0;

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

.alat-name {
    font-weight: 700;

    color: var(--bs-body-color);

    font-size: .85rem;
}

.alat-description {
    color: var(--bs-body-secondary);

    font-size: .72rem;
}

/* =========================================================
   JUMLAH
========================================================= */

.jumlah-badge {
    display: inline-flex;

    align-items: center;

    padding: 7px 11px;

    border-radius: 10px;

    background:
        color-mix(
            in srgb,
            var(--bs-success) 8%,
            var(--bs-body-bg)
        );

    border: 1px solid
        color-mix(
            in srgb,
            var(--bs-success) 18%,
            var(--bs-border-color)
        );

    color: var(--bs-success);

    font-family: monospace;

    font-size: .78rem;

    font-weight: 700;
}

/* =========================================================
   STATUS
========================================================= */

.status-badge {
    display: inline-flex;

    align-items: center;

    gap: 6px;

    padding: 7px 11px;

    border-radius: 10px;

    font-size: .75rem;

    font-weight: 700;

    white-space: nowrap;
}

.status-dot {
    width: 7px;
    height: 7px;

    border-radius: 50%;

    background: currentColor;
}

/* =========================================================
   TANGGAL
========================================================= */

.tanggal-wrapper {
    display: flex;

    align-items: center;

    gap: 7px;

    color: var(--bs-body-secondary);

    font-size: .8rem;

    white-space: nowrap;
}

.tanggal-wrapper i {
    color: var(--bs-success);
}

/* =========================================================
   DENDA
========================================================= */

.denda-text {
    color: var(--bs-danger);

    font-size: .82rem;

    font-weight: 700;

    white-space: nowrap;
}

.denda-normal {
    color: var(--bs-body-secondary);

    font-weight: 600;
}

/* =========================================================
   EMPTY STATE
========================================================= */

.empty-state {
    padding: 65px 20px;
}

.empty-icon {
    width: 70px;
    height: 70px;

    display: flex;

    align-items: center;
    justify-content: center;

    margin: 0 auto 15px;

    border-radius: 20px;

    background:
        color-mix(
            in srgb,
            var(--bs-success) 9%,
            var(--bs-body-bg)
        );

    color: var(--bs-success);

    font-size: 2rem;
}

/* =========================================================
   PAGINATION
========================================================= */

.riwayat-pagination {
    padding: 15px 20px;

    border-top: 1px solid var(--bs-border-color);

    display: flex;

    justify-content: flex-end;

    background: var(--bs-body-bg);
}

/* =========================================================
   DARK MODE
========================================================= */

[data-bs-theme="dark"] .riwayat-header {
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

[data-bs-theme="dark"] .riwayat-card {
    box-shadow:
        0 10px 35px rgba(0, 0, 0, .25);
}

/* =========================================================
   RESPONSIVE
========================================================= */

@media (max-width: 768px) {

    .riwayat-page {
        padding: 20px 12px;
    }

    .riwayat-header {
        padding: 25px 20px;

        border-radius: 20px;
    }

    .riwayat-header h2 {
        font-size: 1.7rem;
    }

    .btn-riwayat {
        width: 100%;

        justify-content: center;
    }

    .riwayat-card {
        border-radius: 20px;
    }

    .riwayat-table {
        min-width: 950px;
    }

    .riwayat-pagination {
        justify-content: center;
    }
}

</style> <div class="riwayat-page">
{{-- =====================================================
     HEADER
====================================================== --}}

<div class="riwayat-header">

    <div class="riwayat-header-content">

        <div class="d-flex flex-column flex-md-row
                    align-items-md-center
                    justify-content-between
                    gap-4">

            <div>

                <div class="riwayat-badge mb-3">

                    <i class="bi bi-clock-history"></i>

                    <span>Inventaris Sistem</span>

                </div>

                <h2 class="fw-bold mb-2">

                    Riwayat Peminjaman Alat

                </h2>

                <p class="mb-0">

                    Pantau daftar pengajuan peminjaman alat
                    inventaris yang telah Anda kirimkan.

                </p>

            </div>

            <div class="flex-shrink-0">

                <a
                    href="{{ route('peminjam.createPeminjam') }}"
                    class="btn btn-riwayat
                           d-inline-flex
                           align-items-center
                           justify-content-center
                           gap-2"
                >

                    <i class="bi bi-plus-lg fs-5"></i>

                    <span>Ajukan Peminjaman Baru</span>

                </a>

            </div>

        </div>

    </div>

</div>

{{-- =====================================================
     TABLE CARD
====================================================== --}}

<div class="riwayat-card">

    <div class="table-responsive">

        <table class="table riwayat-table
                      table-hover
                      align-middle">

            <thead>

                <tr>

                    <th
                        class="py-3 px-4 text-center"
                        style="width: 80px;"
                    >
                        No
                    </th>

                    <th class="py-3">

                        Nama Alat

                    </th>

                    <th class="py-3">

                        Jumlah

                    </th>

                    <th class="py-3">

                        Tgl Pinjam

                    </th>

                    <th class="py-3">

                        Tgl Kembali

                    </th>

                    <th class="py-3">

                        Status

                    </th>

                    <th class="py-3">

                        Denda

                    </th>

                </tr>

            </thead>

            <tbody>

                @php
                    $no = 1;
                @endphp

                @forelse ($datap as $peminjaman)

                    @php

                        // Ambil nama alat dengan aman

                        $alatObj =
                            $peminjaman->alat
                            ?? \App\Models\Alat::find(
                                $peminjaman->id_alat ?? null
                            );

                        $namaAlatFinal =
                            $alatObj->nama_alat
                            ?? $alatObj->nama
                            ?? $alatObj->name
                            ?? (
                                'Alat #' .
                                ($peminjaman->id_alat ?? '')
                            );

                    @endphp

                    <tr>

                        {{-- =================================================
                             NO
                        ================================================== --}}

                        <td class="px-4 text-center">

                            <span class="number-box">

                                {{ $no++ }}

                            </span>

                        </td>

                        {{-- =================================================
                             NAMA ALAT
                        ================================================== --}}

                        <td>

                            <div class="alat-wrapper">

                                <div class="alat-icon">

                                    <i class="bi bi-tools"></i>

                                </div>

                                <div>

                                    <div class="alat-name">

                                        {{ $namaAlatFinal }}

                                    </div>

                                    <div class="alat-description">

                                        Alat inventaris

                                    </div>

                                </div>

                            </div>

                        </td>

                        {{-- =================================================
                             JUMLAH
                        ================================================== --}}

                        <td>

                            <span class="jumlah-badge">

                                {{ $peminjaman->jumlah }} Unit

                            </span>

                        </td>

                        {{-- =================================================
                             TANGGAL PINJAM
                        ================================================== --}}

                        <td>

                            <div class="tanggal-wrapper">

                                <i class="bi bi-calendar-event"></i>

                                <span>

                                    {{ $peminjaman->tanggal_pinjam }}

                                </span>

                            </div>

                        </td>

                        {{-- =================================================
                             TANGGAL KEMBALI
                        ================================================== --}}

                        <td>

                            <div class="tanggal-wrapper">

                                <i class="bi bi-calendar-check"></i>

                                <span>

                                    {{ $peminjaman->tanggal_kembali ?? '-' }}

                                </span>

                            </div>

                        </td>

                        {{-- =================================================
                             STATUS
                        ================================================== --}}

                        <td>

                            @if($peminjaman->status == 'Pending')

                                <span
                                    class="status-badge
                                           bg-warning-subtle
                                           text-warning-emphasis"
                                >

                                    <span class="status-dot"></span>

                                    Pending

                                </span>

                            @elseif($peminjaman->status == 'Disetujui')

                                <span
                                    class="status-badge
                                           bg-info-subtle
                                           text-info-emphasis"
                                >

                                    <span class="status-dot"></span>

                                    Disetujui

                                </span>

                            @elseif($peminjaman->status == 'Ditolak')

                                <span
                                    class="status-badge
                                           bg-danger-subtle
                                           text-danger-emphasis"
                                >

                                    <span class="status-dot"></span>

                                    Ditolak

                                </span>

                            @elseif($peminjaman->status == 'Dipinjam')

                                <span
                                    class="status-badge
                                           bg-primary-subtle
                                           text-primary-emphasis"
                                >

                                    <span class="status-dot"></span>

                                    Sedang Dipinjam

                                </span>

                            @else

                                <span
                                    class="status-badge
                                           bg-success-subtle
                                           text-success-emphasis"
                                >

                                    <span class="status-dot"></span>

                                    Dikembalikan

                                </span>

                            @endif

                        </td>

                        {{-- =================================================
                             DENDA
                        ================================================== --}}

                        <td>

                            @if(($peminjaman->denda ?? 0) > 0)

                                <span class="denda-text">

                                    Rp
                                    {{ number_format(
                                        $peminjaman->denda ?? 0,
                                        0,
                                        ',',
                                        '.'
                                    ) }}

                                </span>

                            @else

                                <span class="denda-normal">

                                    Rp 0

                                </span>

                            @endif

                        </td>

                    </tr>

                @empty

                    {{-- =================================================
                         EMPTY STATE
                    ================================================== --}}

                    <tr>

                        <td
                            colspan="7"
                            class="text-center"
                        >

                            <div class="empty-state">

                                <div class="empty-icon">

                                    <i class="bi bi-inbox"></i>

                                </div>

                                <h5 class="fw-bold mb-2">

                                    Belum Ada Riwayat

                                </h5>

                                <p
                                    class="text-body-secondary
                                           small
                                           mb-3"
                                >

                                    Belum ada riwayat pengajuan
                                    peminjaman alat.

                                </p>

                                <a
                                    href="{{ route('peminjam.createPeminjam') }}"
                                    class="btn btn-success
                                           rounded-3
                                           px-3
                                           d-inline-flex
                                           align-items-center
                                           gap-1"
                                >

                                    <i class="bi bi-plus-lg"></i>

                                    Ajukan Peminjaman

                                </a>

                            </div>

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

    {{-- =====================================================
         PAGINATION
    ====================================================== --}}

    @if(method_exists($datap, 'hasPages') && $datap->hasPages())

        <div class="riwayat-pagination">

            {!! $datap->links() !!}

        </div>

    @endif

</div>

</div>
@endsection