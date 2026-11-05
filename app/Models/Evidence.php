<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evidence extends Model
{
    use HasFactory;

    protected $table = 'evidences';
    protected $primaryKey = 'idevidence';

    protected $fillable = [
        'idactivity',
        'file_path',
        'tipe_file',
    ];

    public function activity()
    {
        return $this->belongsTo(ProspectActivity::class, 'idactivity', 'idactivity');
    }
}
