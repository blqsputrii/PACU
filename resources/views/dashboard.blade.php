@extends('layouts.app')

@section('title', 'Monthly Leaderboard')

@push('styles')
<style>
    .star-decor { position: absolute; pointer-events: none; }
    .podium-box {
        width: 120px; color: #fff; font-weight: 700; font-size: 2rem;
        display: flex; justify-content: center; padding-top: 1.25rem;
    }
    @media (max-width: 576px) {
        .podium-box { width: 90px; font-size: 1.5rem; }
    }
</style>
@endpush

@section('content')
@php
    $podium = [
        ['rank' => 2, 'data' => $ranking[1] ?? null, 'tinggi' => 195, 'warna' => '#FFA800'],
        ['rank' => 1, 'data' => $ranking[0] ?? null, 'tinggi' => 265, 'warna' => '#FF8A00'],
        ['rank' => 3, 'data' => $ranking[2] ?? null, 'tinggi' => 135, 'warna' => '#FFC107'],
    ];
    $periode = \Carbon\Carbon::create($tahun, $bulan, 1)->locale('id')->translatedFormat('F Y');
@endphp

<i class="bi bi-star-fill star-decor" style="color:#FFD54F; font-size:1.4rem; top:3.5rem; left:3rem;"></i>
<i class="bi bi-star-fill star-decor" style="color:#FFB800; font-size:2.1rem; top:7rem; left:8rem;"></i>
<i class="bi bi-star-fill star-decor" style="color:#FFE066; font-size:1.2rem; top:13rem; left:3.5rem;"></i>
<i class="bi bi-star-fill star-decor" style="color:#FFC107; font-size:1.9rem; top:4rem; right:7rem;"></i>
<i class="bi bi-star-fill star-decor" style="color:#FFD54F; font-size:2.1rem; top:11rem; right:5rem;"></i>
<i class="bi bi-star-fill star-decor" style="color:#FFB800; font-size:1.2rem; top:16rem; right:11rem;"></i>

<div class="text-center mt-2 z-1">
    <h1 class="fw-bold text-pacu-orange mb-1">Monthly Leaderboard</h1>
    <p class="text-muted small mb-2">Congratulations On Your Outstanding Performance! &middot; {{ $periode }}</p>
    @auth
        <span class="badge rounded-pill bg-warning-subtle text-warning-emphasis border border-warning-subtle px-3 py-2">
            Halo, {{ Auth::user()->nama }} ({{ Auth::user()->id_role == 1 ? 'Admin' : 'Pegawai' }})
        </span>
    @endauth
</div>

@if ($ranking->isEmpty())
    <p class="text-center text-muted my-5">Belum Ada Data Peringkat</p>
@else
    <div class="d-flex align-items-end justify-content-center mt-5 z-1">
        @foreach ($podium as $p)
            @if ($p['data'])
                <div class="d-flex flex-column align-items-center">
                    <span class="fw-bold fs-5" style="color: {{ $p['warna'] }};">{{ $p['data']->nama }}</span>
                    <span class="small mb-2" style="color:#F59E0B;">{{ number_format($p['data']->total_poin, 0, ',', '.') }} points</span>
                    <div class="podium-box shadow-sm" style="height: {{ $p['tinggi'] }}px; background-color: {{ $p['warna'] }};">{{ $p['rank'] }}</div>
                </div>
            @endif
        @endforeach
    </div>

    @if ($ranking->count() > 3)
        <div class="table-responsive mt-4 mb-4 z-1">
            <table class="table align-middle mb-0">
                <thead>
                    <tr class="border-bottom"><th style="width:80px">Peringkat</th><th>Nama</th><th class="text-end">Total Poin</th></tr>
                </thead>
                <tbody>
                    @foreach ($ranking->slice(3) as $i => $r)
                        <tr class="{{ auth()->check() && auth()->id() == $r->id_user ? 'table-warning' : '' }}">
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $r->nama }}</td>
                            <td class="text-end">{{ number_format($r->total_poin, 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endif
@endsection
