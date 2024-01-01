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

    public function batch(){
        return $this->belongsTo(Batch::class);
    }
}
