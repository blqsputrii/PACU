<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class LeaderboardController extends Controller
{
    public function index()
    {
        $bulan = now()->month;
        $tahun = now()->year;
        $ranking = DB::table('users')
            ->leftJoin('points_ledger', function ($join) use ($bulan, $tahun) {
                $join->on('users.id_user', '=', 'points_ledger.id_user')
                    ->whereMonth('points_ledger.waktu_diperoleh', $bulan)
                    ->whereYear('points_ledger.waktu_diperoleh', $tahun);
            })
            ->where('users.id_role', User::ROLE_PEGAWAI)
            ->where('users.status_aktif', true)
            ->groupBy('users.id_user', 'users.nama')
            ->select('users.id_user', 'users.nama', DB::raw('COALESCE(SUM(points_ledger.poin_diperoleh), 0) as total_poin'))
            ->orderByDesc('total_poin')
            ->orderBy('users.nama')
            ->get();

        return view('dashboard', compact('ranking', 'bulan', 'tahun'));
    }
}
