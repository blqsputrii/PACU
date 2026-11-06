<?php

namespace App\Http\Controllers;

use App\Models\Prospect;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index()
    {
        $prospects = Prospect::with(['user', 'category'])->get();
        return view('history.history', compact('prospects'));
    }
}
