<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PointRule extends Model
{
    protected $table = 'point_rules';
    protected $primaryKey = 'id_aturan';

    protected $fillable = [
        'kunci_aktivitas',
        'label_aktivitas',
        'nilai_poin',
        'id_kategori',
    ];

    public function kategori()
    {
        return $this->belongsTo(PropertyCategory::class, 'id_kategori', 'id_kategori');
    }
}
