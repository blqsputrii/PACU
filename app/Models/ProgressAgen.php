<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Iluminate\Database\Eloquent\Illuminate\Database\Eloquent\Factories\HasFactory;

class ProgressAgen extends Model
{
    protected $table = 'progress_agens';

    protected $fillable = [
        'user_id',
        'tanggal',
        'kategori_agen',
        'domisili',
        'nama_agen',
        'no_telp_agen',
        'no_telp_kantor',
        'agen_merespon',
        'agen_survey',
        'agen_deal',
        'bukti_foto',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
