<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyCategory extends Model
{
    use HasFactory;

    protected $table = 'property_categories';
    protected $primaryKey = 'idcategory';

    protected $fillable = ['nama_kategori', 'deskripsi'];

    public function prospects()
    {
        return $this->hasMany(Prospect::class, 'idcategory', 'idcategory');
    }
}
