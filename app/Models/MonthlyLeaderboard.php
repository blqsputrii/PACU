<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonthlyLeaderboard extends Model
{
    use HasFactory;

    protected $table = 'monthly_leaderboard';
    protected $primaryKey = 'idleaderboard';

    protected $fillable = [
        'iduser',
        'bulan',
        'tahun',
        'total_poin',
        'peringkat',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'iduser', 'iduser');
    }
}
