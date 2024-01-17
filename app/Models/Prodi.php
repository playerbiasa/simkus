<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'singkatan',
        'jenjang'
    ];

    public function sempro() {
        return $this->hasMany(Sempro::class);
    }
}
