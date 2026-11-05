<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PointsLedger extends Model
{
     use HasFactory;

    protected $table = 'points_ledger';
    protected $primaryKey = 'idledger';

    protected $fillable = [
        'iduser',
        'idrule',
        'poin',
        'keterangan',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'iduser', 'iduser');
    }

    public function rule()
    {
        return $this->belongsTo(PointRule::class, 'idrule', 'idrule');
    }
}
