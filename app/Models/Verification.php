<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Verification extends Model
{
    protected $table = 'verifications';
    protected $primaryKey = 'id_verifikasi';

    protected $fillable = [
        'status',
        'catatan',
        'waktu_verifikasi',
        'id_prospek',
        'id_user',
    ];

    protected function casts(): array
    {
        return ['waktu_verifikasi' => 'datetime'];
    }

    public function prospek()
    {
        return $this->belongsTo(Prospect::class, 'id_prospek', 'id_prospek');
    }

    public function admin()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }
}
