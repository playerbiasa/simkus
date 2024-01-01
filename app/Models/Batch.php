<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'kegiatan_id',
        'mulai',
        'selesai',
        'tahun'
    ];

    public function kegiatan(){
        return $this->belongsTo(Kegiatan::class);
    }
}
