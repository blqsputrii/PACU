<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Verification extends Model
{
    use HasFactory;

    protected $table = 'verifications';
    protected $primaryKey = 'idverification';

    protected $fillable = [
        'idactivity',
        'iduser',
        'status_verifikasi',
        'catatan_verifikasi',
    ];

    public function activity()
    {
        return $this->belongsTo(ProspectActivity::class, 'idactivity', 'idactivity');
    }

    public function validator()
    {
        return $this->belongsTo(User::class, 'iduser', 'iduser');
    }
}
