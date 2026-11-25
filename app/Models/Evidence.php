<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evidence extends Model
{
    protected $table = 'evidences';
    protected $primaryKey = 'id_bukti';

    protected $fillable = [
        'nama_file',
        'path_file',
        'id_prospek',
    ];

    public function prospek()
    {
        return $this->belongsTo(Prospect::class, 'id_prospek', 'id_prospek');
    }
}
