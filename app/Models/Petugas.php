<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Petugas extends Authenticatable
{
    use HasFactory;
    protected $guard = "petugas";
    protected $table = 'petugas';
    protected $primaryKey='id_petugas';

    protected $fillable = [
        'nama_petugas',
        'username',
        'password',
        'telp',
        'level'
    ];

    public function petugas()
    {
        return $this->hasMany(Petugas::class, 'id_petugas');
    }
}
