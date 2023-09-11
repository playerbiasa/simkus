<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticate;

class AdminModel extends Authenticate
{
    use HasFactory;

    protected $table = 'admin';
    protected $guarded = ['id'];
}
