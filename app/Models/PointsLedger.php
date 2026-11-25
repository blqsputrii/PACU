<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PointsLedger extends Model
{
    protected $table = 'points_ledger';
    protected $primaryKey = 'id_poin';

    protected $fillable = [
        'poin_diperoleh',
        'keterangan',
        'waktu_diperoleh',
        'id_user',
        'id_prospek',
    ];

    protected function casts(): array
    {
        return ['waktu_diperoleh' => 'datetime'];
    }

    public function pegawai()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    public function prospek()
    {
        return $this->belongsTo(Prospect::class, 'id_prospek', 'id_prospek');
    }
}
