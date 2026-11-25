<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prospect extends Model
{
    protected $table = 'prospect';
    protected $primaryKey = 'id_prospek';

    protected $fillable = [
        'tanggal_prospek',
        'domisili',
        'nama_agen',
        'no_telp_agen',
        'no_telp_kantor',
        'id_user',
        'id_kategori',
    ];

    protected function casts(): array
    {
        return ['tanggal_prospek' => 'date'];
    }

    public function pegawai()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    public function kategori()
    {
        return $this->belongsTo(PropertyCategory::class, 'id_kategori', 'id_kategori');
    }

    public function aktivitas()
    {
        return $this->hasOne(ProspectActivity::class, 'id_prospek', 'id_prospek');
    }

    public function bukti()
    {
        return $this->hasOne(Evidence::class, 'id_prospek', 'id_prospek');
    }

    public function verifikasi()
    {
        return $this->hasOne(Verification::class, 'id_prospek', 'id_prospek');
    }

    public function poin()
    {
        return $this->hasOne(PointsLedger::class, 'id_prospek', 'id_prospek');
    }
}
