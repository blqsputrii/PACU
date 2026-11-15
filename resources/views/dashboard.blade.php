@extends('layouts.app')

@section('title', 'Monthly Leaderboard')

@push('styles')
<style>
    .star-decor {
        position: absolute;
        pointer-events: none;
    }
    .podium-box {
        width: 120px;
        color: #fff;
        font-weight: 700;
        font-size: 2rem;
        display: flex;
        justify-content: center;
        padding-top: 1.25rem;
    }
    @media (max-width: 576px) {
        .podium-box {
            width: 90px;
            font-size: 1.5rem;
        }
    }
</style>
@endpush

@section('content')
<i class="bi bi-star-fill star-decor" style="color: #FFD54F; font-size: 1.4rem; top: 3.5rem; left: 3rem;"></i>
<i class="bi bi-star-fill star-decor" style="color: #FFB800; font-size: 2.1rem; top: 7rem; left: 8rem;"></i>
<i class="bi bi-star-fill star-decor" style="color: #FFE066; font-size: 1.2rem; top: 13rem; left: 3.5rem;"></i>
<i class="bi bi-star-fill star-decor" style="color: #FFC107; font-size: 1.8rem; bottom: 4rem; left: 6rem;"></i>

<i class="bi bi-star-fill star-decor" style="color: #FFC107; font-size: 1.9rem; top: 4rem; right: 7rem;"></i>
<i class="bi bi-star-fill star-decor" style="color: #FFD54F; font-size: 2.1rem; top: 11rem; right: 5rem;"></i>
<i class="bi bi-star-fill star-decor" style="color: #FFB800; font-size: 1.2rem; top: 16rem; right: 11rem;"></i>
<i class="bi bi-star-fill star-decor" style="color: #FFD54F; font-size: 1.9rem; bottom: 4rem; right: 4rem;"></i>

<div class="text-center mt-2 z-1">
    <h1 class="fw-bold text-pacu-orange mb-1">Monthly Leaderboard</h1>
    <p class="text-muted small mb-2">Congratulations on your outstanding performance!</p>
    <span class="badge rounded-pill bg-warning-subtle text-warning-emphasis border border-warning-subtle px-3 py-2">
        Halo, {{ Auth::user()->nama }} ({{ Auth::user()->idrole == 1 ? 'Admin' : 'Pegawai' }})
    </span>
</div>

<div class="d-flex align-items-end justify-content-center mt-5 z-1">
    <div class="d-flex flex-column align-items-center">
        <span class="fw-bold fs-5" style="color: #FFA800;">Vivi</span>
        <span class="small mb-2" style="color: #F59E0B;">10.000 points</span>
        <div class="podium-box shadow-sm" style="height: 195px; background-color: #FFA800;">2</div>
    </div>

    <div class="d-flex flex-column align-items-center">
        <span class="fw-bold fs-5" style="color: #FF8A00;">Lavie</span>
        <span class="small mb-2" style="color: #F59E0B;">15.860 points</span>
        <div class="podium-box shadow" style="height: 265px; background-color: #FF8A00;">1</div>
    </div>

    <div class="d-flex flex-column align-items-center">
        <span class="fw-bold fs-5" style="color: #FFC107;">Tasya</span>
        <span class="small mb-2" style="color: #F59E0B;">67 points</span>
        <div class="podium-box shadow-sm" style="height: 135px; background-color: #FFC107;">3</div>
    </div>

</div>
@endsection
