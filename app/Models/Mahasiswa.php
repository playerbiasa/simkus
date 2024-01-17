<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class Mahasiswa extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guard = 'mahasiswa';

    protected $fillable = [
        'nim',
        'nama',
        'email',
        'password',
        'phone',
        'status',
        'prodi_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }

    public function sempro() {
        return $this->hasMany(Sempro::class);
    }
}
