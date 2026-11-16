<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProgressAgen;
use Iluminate\Support\Facades\Storage;

class ProgresController extends Controller
{
    public function create()
    {
        return view('input');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'tanggal' => 'required|date',
            'kategori_agen'=> 'required|string',
            'domisili' => 'required|string|max:255',
            'nama_agen'=> 'required|string|max:255',
            'no_telp_agen' => 'required|string|max:20',
            'no_telp_kantor' => 'required|string|max:20',
            'bukti_foto'=>'nullable|image|mimes:jpeg,png,jpg,pdf|max:2048',
        ]);

        $filePath = null;
        if ($request->hasFile('bukti_foto')) {
            $filePath = $request->file('bukti-foto')->store('butki-proggres', 'public');
        }

        ProgressAgen::create([
            'user_id' => auth()->id,
            'tanggal' => $request->tanggal,
            'kategori_agen' => $request->kategori_agen,
            'domisili' => $request->domisili,
            'nama_agen' => $request->nama_agen,
            'no_telp_agen' => $request->no_telp_agen,
            'no_telp_kantor' => $request->no_telp_kantor,
            'agen_merespon' => $request->has('agen_merespon') ? true : false,
            'agen_survey' => $request->has('agen_survey') ? true : false,
            'agen_deal' => $filePath,

        ]);

        return redirect()->route('input')->with('success', 'Progres berhasil di simpan!');
    }
}
