<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyCategory extends Model
{
    protected $table = 'property_categories';
    protected $primaryKey = 'id_kategori';

    protected $fillable = ['nama_kategori'];

    public function prospek()
    {
        return $this->hasMany(Prospect::class, 'id_kategori', 'id_kategori');
    }

    public function aturanPoin()
    {
        return $this->hasMany(PointRule::class, 'id_kategori', 'id_kategori');
    }
}
