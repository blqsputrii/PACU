<?php

namespace App\Http\Controllers;

use App\Models\Prospect;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    public function index()
    {
        $prospects = Prospect::with(['kategori', 'verifikasi', 'aktivitas'])
            ->where('id_user', Auth::id())
            ->orderByDesc('tanggal_prospek')
            ->orderByDesc('id_prospek')
            ->paginate(10);

        return view('history.history', compact('prospects'));
    }
}
