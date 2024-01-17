<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sempro extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function mahasiswa(){
        return $this->belongsTo(Mahasiswa::class);
    }

    public function prodi() {
        return $this->belongsTo(Prodi::class);
    }

    public function batch(){
        return $this->belongsTo(Batch::class);
    }

    public function dosen(){
        return $this->belongsToMany(Dosen::class)->withPivot('sebagai', 'ke')->orderBy('ke', 'asc')->withTimestamps();
    }
}
