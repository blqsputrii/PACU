<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MonthlyLeaderboard extends Model
{
    protected $table = 'monthly_leaderboard';
    protected $primaryKey = 'id_leaderboard';

    protected $fillable = [
        'bulan',
        'tahun',
        'total_poin',
        'peringkat',
        'id_user',
    ];

    public function pegawai()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }
}
