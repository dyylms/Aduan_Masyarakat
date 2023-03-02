<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Masyarakat extends Authenticatable
{
    use HasFactory;

    protected $guard = "masyarakat";
    protected $table = 'masyarakat';
    protected $primaryKey = 'nik';

    protected $fillable = [
        'nik',
        'nama',
        'username',
        'password',
        'telp'
    ];
    
}
