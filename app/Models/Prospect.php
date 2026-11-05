<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prospect extends Model
{
    use HasFactory;

    protected $table = 'prospect';
    protected $primaryKey = 'idprospect';

    protected $fillable = [
        'iduser',
        'idcategory',
        'nama_prospek',
        'nomor_telepon',
        'alamat',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'iduser', 'iduser');
    }

    public function category()
    {
        return $this->belongsTo(PropertyCategory::class, 'idcategory', 'idcategory');
    }

    public function activities()
    {
        return $this->hasMany(ProspectActivity::class, 'idprospect', 'idprospect');
    }
}
