<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'user';
    protected $primaryKey = 'iduser';

    protected $fillable = [
        'idrole',
        'nama',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'idrole', 'idrole');
    }

    public function prospects()
    {
        return $this->hasMany(Prospect::class, 'iduser', 'iduser');
    }

    public function activities()
    {
        return $this->hasMany(ProspectActivity::class, 'iduser', 'iduser');
    }

    public function pointsLedgers()
    {
        return $this->hasMany(PointsLedger::class, 'iduser', 'iduser');
    }

    public function leaderboards()
    {
        return $this->hasMany(MonthlyLeaderboard::class, 'iduser', 'iduser');
    }

    public function verifications()
    {
        return $this->hasMany(Verification::class, 'iduser', 'iduser');
    }
}
