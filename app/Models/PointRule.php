<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PointRule extends Model
{
    use HasFactory;

    protected $table = 'point_rules';
    protected $primaryKey = 'idrule';

    protected $fillable = [
        'nama_aturan',
        'jumlah_poin',
        'deskripsi',
    ];

    public function ledgers()
    {
        return $this->hasMany(PointsLedger::class, 'idrule', 'idrule');
    }
}
