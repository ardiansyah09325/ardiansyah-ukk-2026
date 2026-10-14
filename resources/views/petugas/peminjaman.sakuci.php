@extends('layouts.app')

@section('title', 'Verifikasi Peminjaman - PINVERA')

@section('content')

<style> /* ========================================================= VERIFIKASI PEMINJAMAN - MOUNTAIN STYLE ========================================================= */
.verifikasi-page {
    padding: 35px 25px;
}

/* =========================================================
   HEADER
========================================================= */

.verifikasi-header {
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

.verifikasi-header::before {
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

    top: -135px;
    right: -85px;
}

.verifikasi-header::after {
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

.verifikasi-header-content {
    position: relative;
    z-index: 2;
}

.verifikasi-badge {
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

.verifikasi-header h2 {
    font-size: clamp(1.8rem, 4vw, 2.5rem);

    letter-spacing: -.8px;
}

.verifikasi-header p {
    max-width: 650px;

    color:
        color-mix(
            in srgb,
            var(--bs-light) 82%,
            transparent
        );
}

/* =========================================================
   ALERT
========================================================= */

.verifikasi-alert {
    border: 1px solid transparent;

    border-radius: 16px;

    padding: 14px 17px;

    margin-bottom: 18px;

    box-shadow:
        0 7px 22px
        color-mix(
            in srgb,
            var(--bs-dark) 5%,
            transparent
        );
}

.verifikasi-alert-success {
    background:
        color-mix(
            in srgb,
            var(--bs-success) 9%,
            var(--bs-body-bg)
        );

    border-color:
        color-mix(
            in srgb,
            var(--bs-success) 18%,
            var(--bs-border-color)
        );

    color: var(--bs-success);
}

.verifikasi-alert-danger {
    background:
        color-mix(
            in srgb,
            var(--bs-danger) 9%,
            var(--bs-body-bg)
        );

    border-color:
        color-mix(
            in srgb,
            var(--bs-danger) 18%,
            var(--bs-border-color)
        );

    color: var(--bs-danger);
}

/* =========================================================
   TABLE CARD
========================================================= */

.verifikasi-card {
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

.verifikasi-card:hover {
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

.verifikasi-table {
    margin-bottom: 0;
}

.verifikasi-table thead {
    background:
        color-mix(
            in srgb,
            var(--bs-success) 6%,
            var(--bs-body-bg)
        );
}

.verifikasi-table thead th {
    border-bottom: 1px solid var(--bs-border-color);

    color: var(--bs-body-secondary);

    font-size: .72rem;

    font-weight: 800;

    text-transform: uppercase;

    letter-spacing: .06em;

    white-space: nowrap;

    padding-top: 16px;

    padding-bottom: 16px;
}

.verifikasi-table tbody tr {
    transition: all .2s ease;
}

.verifikasi-table tbody tr:hover {
    background:
        color-mix(
            in srgb,
            var(--bs-success) 4%,
            var(--bs-body-bg)
        );
}

.verifikasi-table td {
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
   ID PEMINJAMAN
========================================================= */

.peminjaman-code {
    display: inline-flex;

    align-items: center;

    padding: 7px 10px;

    border-radius: 9px;

    background:
        color-mix(
            in srgb,
            var(--bs-success) 8%,
            var(--bs-body-bg)
        );

    border: 1px solid
        color-mix(
            in srgb,
            var(--bs-success) 17%,
            var(--bs-border-color)
        );

    color: var(--bs-success);

    font-family: monospace;

    font-size: .78rem;

    font-weight: 700;
}

/* =========================================================
   ALAT & PEMINJAM
========================================================= */

.alat-name {
    color: var(--bs-body-color);

    font-weight: 700;

    margin-bottom: 3px;
}

.peminjam-name {
    color: var(--bs-body-secondary);

    font-size: .75rem;
}

.alat-icon {
    width: 40px;
    height: 40px;

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
}

/* =========================================================
   STATUS BADGE
========================================================= */

.status-badge {
    display: inline-flex;

    align-items: center;

    gap: 6px;

    padding: 7px 12px;

    border-radius: 50px;

    font-size: .73rem;

    font-weight: 700;
}

.status-pending {
    background:
        color-mix(
            in srgb,
            var(--bs-warning) 12%,
            var(--bs-body-bg)
        );

    color: var(--bs-warning);
}

.status-approved {
    background:
        color-mix(
            in srgb,
            var(--bs-success) 10%,
            var(--bs-body-bg)
        );

    color: var(--bs-success);
}

.status-other {
    background:
        color-mix(
            in srgb,
            var(--bs-secondary) 10%,
            var(--bs-body-bg)
        );

    color: var(--bs-secondary);
}

/* =========================================================
   ACTION BUTTON
========================================================= */

.btn-setujui {
    border-radius: 11px;

    padding: 8px 14px;

    background: var(--bs-success);

    border: 1px solid var(--bs-success);

    color: var(--bs-light);

    font-size: .75rem;

    font-weight: 700;

    box-shadow:
        0 6px 15px
        color-mix(
            in srgb,
            var(--bs-success) 18%,
            transparent
        );

    transition: all .25s ease;
}

.btn-setujui:hover {
    background:
        color-mix(
            in srgb,
            var(--bs-success) 88%,
            var(--bs-dark)
        );

    border-color:
        color-mix(
            in srgb,
            var(--bs-success) 88%,
            var(--bs-dark)
        );

    color: var(--bs-light);

    transform: translateY(-2px);

    box-shadow:
        0 9px 20px
        color-mix(
            in srgb,
            var(--bs-success) 25%,
            transparent
        );
}

.approved-label {
    display: inline-flex;

    align-items: center;

    gap: 5px;

    color: var(--bs-success);

    font-size: .75rem;

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
   DARK MODE
========================================================= */

[data-bs-theme="dark"] .verifikasi-header {
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

[data-bs-theme="dark"] .verifikasi-card {
    box-shadow:
        0 10px 35px rgba(0, 0, 0, .25);
}

/* =========================================================
   RESPONSIVE
========================================================= */

@media (max-width: 768px) {

    .verifikasi-page {
        padding: 20px 12px;
    }

    .verifikasi-header {
        padding: 25px 20px;

        border-radius: 20px;
    }

    .verifikasi-header h2 {
        font-size: 1.7rem;
    }

    .verifikasi-card {
        border-radius: 20px;
    }

    .verifikasi-table {
        min-width: 850px;
    }

    .verifikasi-table td,
    .verifikasi-table th {
        white-space: nowrap;
    }
}

</style> <div class="verifikasi-page">
{{-- =====================================================
     HEADER
====================================================== --}}

<div class="verifikasi-header">

    <div class="verifikasi-header-content">

        <div class="verifikasi-badge mb-3">

            <i class="bi bi-person-badge"></i>

            <span>Panel Petugas</span>

        </div>

        <h2 class="fw-bold mb-2">

            Persetujuan Peminjaman Alat

        </h2>

        <p class="mb-0">

            Daftar pengajuan peminjaman dari peminjam
            yang menunggu proses verifikasi petugas.

        </p>

    </div>

</div>

{{-- =====================================================
     ALERT SUCCESS
====================================================== --}}

@if(session('success'))

    <div
        class="verifikasi-alert
               verifikasi-alert-success
               alert
               alert-dismissible
               fade
               show"
        role="alert"
    >

        <div class="d-flex align-items-center gap-2">

            <i class="bi bi-check-circle-fill fs-5"></i>

            <div class="flex-grow-1">

                {{ session('success') }}

            </div>

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert"
                aria-label="Close"
            ></button>

        </div>

    </div>

@endif

{{-- =====================================================
     ALERT ERROR
====================================================== --}}

@if(session('error'))

    <div
        class="verifikasi-alert
               verifikasi-alert-danger
               alert
               alert-dismissible
               fade
               show"
        role="alert"
    >

        <div class="d-flex align-items-center gap-2">

            <i class="bi bi-exclamation-triangle-fill fs-5"></i>

            <div class="flex-grow-1">

                {{ session('error') }}

            </div>

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert"
                aria-label="Close"
            ></button>

        </div>

    </div>

@endif

{{-- =====================================================
     TABLE CARD
====================================================== --}}

<div class="verifikasi-card">

    <div class="table-responsive">

        <table
            class="table
                   verifikasi-table
                   table-hover
                   align-middle"
        >

            <thead>

                <tr>

                    <th
                        class="px-4 text-center"
                        style="width: 70px;"
                    >
                        No
                    </th>

                    <th>

                        ID Peminjaman

                    </th>

                    <th>

                        Nama Alat & Peminjam

                    </th>

                    <th>

                        Status

                    </th>

                    <th
                        class="text-center px-4"
                        style="width: 190px;"
                    >
                        Aksi Petugas
                    </th>

                </tr>

            </thead>

            <tbody>

                @forelse($datap as $index => $item)

                    <tr>

                        {{-- NOMOR --}}

                        <td class="px-4 text-center">

                            <span class="number-box">

                                {{ $datap->firstItem() + $index }}

                            </span>

                        </td>

                        {{-- ID PEMINJAMAN --}}

                        <td>

                            <span class="peminjaman-code">

                                #{{ $item->id_peminjaman }}

                            </span>

                        </td>

                        {{-- ALAT & PEMINJAM --}}

                        <td>

                            <div class="d-flex align-items-center gap-3">

                                <div class="alat-icon">

                                    <i class="bi bi-box-seam"></i>

                                </div>

                                <div>

                                    <div class="alat-name">

                                        {{ $item->data_alat->nama_alat
                                            ?? (
                                                $item->data_alat->nama
                                                ?? 'Alat ID: ' . $item->id_alat
                                            )
                                        }}

                                    </div>

                                    <div class="peminjam-name">

                                        <i class="bi bi-person me-1"></i>

                                        {{ $item->data_user->username
                                            ?? (
                                                $item->data_user->name
                                                ?? 'User ID: ' . $item->id_user
                                            )
                                        }}

                                    </div>

                                </div>

                            </div>

                        </td>

                        {{-- STATUS --}}

                        <td>

                            @if(
                                strtolower($item->status) == 'pending'
                                ||
                                strtolower($item->status) == 'menunggu'
                            )

                                <span
                                    class="status-badge
                                           status-pending"
                                >

                                    <i class="bi bi-hourglass-split"></i>

                                    Pending

                                </span>

                            @elseif(
                                strtolower($item->status) == 'disetujui'
                            )

                                <span
                                    class="status-badge
                                           status-approved"
                                >

                                    <i class="bi bi-check-circle"></i>

                                    Disetujui

                                </span>

                            @else

                                <span
                                    class="status-badge
                                           status-other"
                                >

                                    <i class="bi bi-info-circle"></i>

                                    {{ $item->status }}

                                </span>

                            @endif

                        </td>

                        {{-- AKSI --}}

                        <td class="text-center px-4">

                            @if(
                                strtolower($item->status) == 'pending'
                                ||
                                strtolower($item->status) == 'menunggu'
                            )

                                <form
                                    action="/petugas/peminjaman/{{ $item->id_peminjaman }}/setujui"
                                    method="POST"
                                    class="d-inline"
                                >

                                    @csrf

                                    <button
                                        type="submit"
                                        class="btn
                                               btn-setujui
                                               d-inline-flex
                                               align-items-center
                                               gap-1"
                                    >

                                        <i class="bi bi-check2"></i>

                                        Setujui

                                    </button>

                                </form>

                            @else

                                <span class="approved-label">

                                    <i class="bi bi-check-all"></i>

                                    Telah Disetujui

                                </span>

                            @endif

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td
                            colspan="5"
                            class="text-center"
                        >

                            <div class="empty-state">

                                <div class="empty-icon">

                                    <i class="bi bi-inbox"></i>

                                </div>

                                <h5 class="fw-bold mb-2">

                                    Belum Ada Pengajuan

                                </h5>

                                <p
                                    class="text-body-secondary
                                           small
                                           mb-0"
                                >

                                    Belum ada data pengajuan
                                    peminjaman yang perlu diverifikasi.

                                </p>

                            </div>

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

</div>
@endsection