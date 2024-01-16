<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Dosen extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guard = 'dosen';

    protected $fillable = [
        'niy',
        'nidn',
        'nama',
        'jabatan',
        'prodi_id',
        'password',
        'email',
    ];

    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }

    public function sempro()
    {
        return $this->belongsToMany(Sempro::class);
    }

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
