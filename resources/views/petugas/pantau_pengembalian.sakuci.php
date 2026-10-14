@extends('layouts.app')

@section('title', 'Pantau Pengembalian - PINVERA')

@section('content')

<style> /* ========================================================= PENGEMBALIAN PAGE - MOUNTAIN STYLE ========================================================= */
.pengembalian-page {
    padding: 35px 25px;
}

/* =========================================================
   HEADER
========================================================= */

.pengembalian-header {
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

.pengembalian-header::before {
    content: "";

    position: absolute;

    width: 270px;
    height: 270px;

    border-radius: 50%;

    background:
        color-mix(
            in srgb,
            var(--bs-light) 12%,
            transparent
        );

    filter: blur(60px);

    top: -125px;
    right: -80px;
}

.pengembalian-header::after {
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

    filter: blur(50px);

    bottom: -105px;
    left: -75px;
}

.pengembalian-header-content {
    position: relative;
    z-index: 2;
}

.pengembalian-badge {
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

.pengembalian-header h2 {
    font-size: clamp(1.8rem, 4vw, 2.5rem);

    letter-spacing: -.8px;
}

.pengembalian-header p {
    max-width: 650px;

    color:
        color-mix(
            in srgb,
            var(--bs-light) 82%,
            transparent
        );
}

/* =========================================================
   HEADER ACTION
========================================================= */

.pengembalian-actions {
    display: flex;

    align-items: center;

    gap: 10px;
}

.btn-cetak {
    background: var(--bs-warning);

    border: 1px solid var(--bs-warning);

    color: var(--bs-dark);

    border-radius: 14px;

    padding: 10px 17px;

    font-size: .8rem;

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

.btn-cetak:hover {
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

.petugas-access-badge {
    display: inline-flex;

    align-items: center;

    gap: 7px;

    padding: 9px 14px;

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

    color: var(--bs-light);

    font-size: .75rem;

    font-weight: 700;
}

/* =========================================================
   TABLE CARD
========================================================= */

.pengembalian-card {
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

.pengembalian-card:hover {
    box-shadow:
        0 15px 40px
        color-mix(
            in srgb,
            var(--bs-dark) 10%,
            transparent
        );
}

.pengembalian-card-body {
    padding: 0;
}

/* =========================================================
   TABLE
========================================================= */

.pengembalian-table {
    margin-bottom: 0;
}

.pengembalian-table thead {
    background:
        color-mix(
            in srgb,
            var(--bs-success) 6%,
            var(--bs-body-bg)
        );
}

.pengembalian-table thead th {
    border-bottom: 1px solid var(--bs-border-color);

    color: var(--bs-body-secondary);

    font-size: .72rem;

    font-weight: 800;

    text-transform: uppercase;

    letter-spacing: .06em;

    white-space: nowrap;

    padding-top: 15px;

    padding-bottom: 15px;
}

.pengembalian-table tbody tr {
    transition: all .2s ease;
}

.pengembalian-table tbody tr:hover {
    background:
        color-mix(
            in srgb,
            var(--bs-success) 4%,
            var(--bs-body-bg)
        );
}

.pengembalian-table td {
    border-color:
        color-mix(
            in srgb,
            var(--bs-border-color) 65%,
            transparent
        );

    padding-top: 17px;

    padding-bottom: 17px;

    font-size: .82rem;
}

/* =========================================================
   NUMBER
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

    font-size: .78rem;

    font-weight: 700;
}

/* =========================================================
   USER
========================================================= */

.peminjam-name {
    color: var(--bs-success);

    font-weight: 700;
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
    width: 38px;
    height: 38px;

    display: inline-flex;

    align-items: center;
    justify-content: center;

    flex-shrink: 0;

    border-radius: 11px;

    background:
        color-mix(
            in srgb,
            var(--bs-success) 10%,
            var(--bs-body-bg)
        );

    color: var(--bs-success);

    font-size: .9rem;
}

.alat-name {
    color: var(--bs-body-color);

    font-weight: 600;
}

/* =========================================================
   CONDITION BADGE
========================================================= */

.condition-badge {
    display: inline-flex;

    align-items: center;

    gap: 5px;

    padding: 7px 11px;

    border-radius: 10px;

    font-size: .73rem;

    font-weight: 700;
}

.condition-good {
    background:
        color-mix(
            in srgb,
            var(--bs-success) 10%,
            var(--bs-body-bg)
        );

    color: var(--bs-success);
}

.condition-light {
    background:
        color-mix(
            in srgb,
            var(--bs-warning) 12%,
            var(--bs-body-bg)
        );

    color: var(--bs-warning);
}

.condition-damaged {
    background:
        color-mix(
            in srgb,
            var(--bs-danger) 10%,
            var(--bs-body-bg)
        );

    color: var(--bs-danger);
}

/* =========================================================
   STATUS
========================================================= */

.status-complete {
    display: inline-flex;

    align-items: center;

    gap: 6px;

    padding: 8px 13px;

    border-radius: 50px;

    background:
        color-mix(
            in srgb,
            var(--bs-success) 10%,
            var(--bs-body-bg)
        );

    border: 1px solid
        color-mix(
            in srgb,
            var(--bs-success) 18%,
            var(--bs-border-color)
        );

    color: var(--bs-success);

    font-size: .73rem;

    font-weight: 700;
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

.pengembalian-pagination {
    padding: 18px 24px;

    border-top: 1px solid var(--bs-border-color);

    display: flex;

    justify-content: flex-end;
}

/* =========================================================
   DARK MODE
========================================================= */

[data-bs-theme="dark"] .pengembalian-header {
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

[data-bs-theme="dark"] .pengembalian-card {
    box-shadow:
        0 10px 35px rgba(0, 0, 0, .25);
}

/* =========================================================
   RESPONSIVE
========================================================= */

@media (max-width: 768px) {

    .pengembalian-page {
        padding: 20px 12px;
    }

    .pengembalian-header {
        padding: 25px 20px;

        border-radius: 20px;
    }

    .pengembalian-header h2 {
        font-size: 1.7rem;
    }

    .pengembalian-actions {
        width: 100%;

        flex-direction: column;

        align-items: stretch;
    }

    .btn-cetak,
    .petugas-access-badge {
        width: 100%;

        justify-content: center;
    }

    .pengembalian-table {
        min-width: 850px;
    }

    .pengembalian-card {
        border-radius: 20px;
    }
}

</style> <div class="pengembalian-page">
{{-- =====================================================
     HEADER
====================================================== --}}

<div class="pengembalian-header">

    <div class="pengembalian-header-content">

        <div class="d-flex flex-column flex-md-row
                    align-items-md-center
                    justify-content-between
                    gap-4">

            <div>

                <div class="pengembalian-badge mb-3">

                    <i class="bi bi-arrow-return-left"></i>

                    <span>Inventaris Sistem</span>

                </div>

                <h2 class="fw-bold mb-2">

                    Pantau Pengembalian

                </h2>

                <p class="mb-0">

                    Memantau riwayat alat yang telah
                    dikembalikan oleh customer dengan
                    lebih terstruktur dan mudah dipantau.

                </p>

            </div>

            <div class="pengembalian-actions">

                <a
                    href="{{ route('petugas.pengembalian.cetak') }}"
                    target="_blank"
                    class="btn btn-cetak
                           d-inline-flex
                           align-items-center
                           justify-content-center
                           gap-2"
                >

                    <i class="bi bi-printer"></i>

                    <span>Cetak Laporan</span>

                </a>

                <span class="petugas-access-badge">

                    <i class="bi bi-person-check"></i>

                    Akses Petugas

                </span>

            </div>

        </div>

    </div>

</div>

{{-- =====================================================
     TABLE
====================================================== --}}

<div class="pengembalian-card">

    <div class="pengembalian-card-body">

        <div class="table-responsive">

            <table
                class="table
                       pengembalian-table
                       table-hover
                       align-middle"
            >

                <thead>

                    <tr>

                        <th
                            class="px-4 text-center"
                            width="5%"
                        >
                            No
                        </th>

                        <th width="15%">

                            Tgl Kembali

                        </th>

                        <th width="20%">

                            Nama Peminjam

                        </th>

                        <th width="25%">

                            Nama Alat

                        </th>

                        <th width="15%">

                            Kondisi

                        </th>

                        <th
                            class="text-end px-4"
                            width="20%"
                        >
                            Status
                        </th>

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

                            <td class="px-4 text-center">

                                <span class="number-box">

                                    {{ $datap->firstItem() + $index }}

                                </span>

                            </td>

                            {{-- TANGGAL --}}

                            <td>

                                <span class="text-body-secondary">

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

                                <span class="peminjam-name">

                                    {{ $namaUser }}

                                </span>

                            </td>

                            {{-- ALAT --}}

                            <td>

                                <div class="alat-wrapper">

                                    <div class="alat-icon">

                                        <i class="bi bi-box-seam"></i>

                                    </div>

                                    <span class="alat-name">

                                        {{ $namaAlat }}

                                    </span>

                                </div>

                            </td>

                            {{-- KONDISI --}}

                            <td>

                                @if(
                                    strtolower(
                                        $item->kondisi_barang
                                    ) == 'baik'
                                )

                                    <span
                                        class="condition-badge
                                               condition-good"
                                    >

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

                                    <span
                                        class="condition-badge
                                               condition-light"
                                    >

                                        <i class="bi bi-exclamation-circle"></i>

                                        Rusak Ringan

                                    </span>

                                @else

                                    <span
                                        class="condition-badge
                                               condition-damaged"
                                    >

                                        <i class="bi bi-x-circle"></i>

                                        {{ $item->kondisi_barang ?? 'Rusak' }}

                                    </span>

                                @endif

                            </td>

                            {{-- STATUS --}}

                            <td class="text-end px-4">

                                <span class="status-complete">

                                    <i class="bi bi-check2-all"></i>

                                    Selesai

                                </span>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="6"
                                class="text-center"
                            >

                                <div class="empty-state">

                                    <div class="empty-icon">

                                        <i class="bi bi-inbox"></i>

                                    </div>

                                    <h5 class="fw-bold mb-2">

                                        Belum Ada Data Pengembalian

                                    </h5>

                                    <p
                                        class="text-body-secondary
                                               small
                                               mb-0"
                                    >

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

    </div>

    {{-- =================================================
         PAGINATION
    ================================================== --}}

    @if($datap->hasPages())

        <div class="pengembalian-pagination">

            {{ $datap->links() }}

        </div>

    @endif

</div>

</div>
@endsection