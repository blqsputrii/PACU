<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProspectActivity extends Model
{
    use HasFactory;

    protected $table = 'prospect_activities';
    protected $primaryKey = 'idactivity';

    protected $fillable = [
        'idprospect',
        'iduser',
        'jenis_aktivitas',
        'catatan',
        'tanggal_aktivitas',
    ];

    public function prospect()
    {
        return $this->belongsTo(Prospect::class, 'idprospect', 'idprospect');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'iduser', 'iduser');
    }

    public function evidences()
    {
        return $this->hasMany(Evidence::class, 'idactivity', 'idactivity');
    }

    public function verifications()
    {
        return $this->hasMany(Verification::class, 'idactivity', 'idactivity');
    }
}
