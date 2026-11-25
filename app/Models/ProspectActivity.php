<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProspectActivity extends Model
{
    protected $table = 'prospect_activities';
    protected $primaryKey = 'id_aktivitas';

    protected $fillable = [
        'is_merespon',
        'is_survey',
        'is_deal',
        'poin_sementara',
        'id_prospek',
    ];

    protected function casts(): array
    {
        return [
            'is_merespon' => 'boolean',
            'is_survey' => 'boolean',
            'is_deal' => 'boolean',
        ];
    }

    public function prospek()
    {
        return $this->belongsTo(Prospect::class, 'id_prospek', 'id_prospek');
    }
}
