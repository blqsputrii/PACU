<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    const ROLE_ADMIN = 1;
    const ROLE_PEGAWAI = 2;

    protected $table = 'users';
    protected $primaryKey = 'id_user';

    protected $fillable = [
        'nama',
        'email',
        'password',
        'status_aktif',
        'id_role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
            'status_aktif' => 'boolean',
        ];
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'id_role', 'id_role');
    }

    public function prospek()
    {
        return $this->hasMany(Prospect::class, 'id_user', 'id_user');
    }

    public function verifikasi()
    {
        return $this->hasMany(Verification::class, 'id_user', 'id_user');
    }

    public function poin()
    {
        return $this->hasMany(PointsLedger::class, 'id_user', 'id_user');
    }

    public function leaderboard()
    {
        return $this->hasMany(MonthlyLeaderboard::class, 'id_user', 'id_user');
    }
}
