<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    protected $table = 'petugas';
    protected $primarykey = 'id_petugas';
    protected $fillable = [
        'id_user',
        'nama_petugas',
        'username',
        'password',
        'telp',
        'level'
    ];

    public function tanggapan()
    {
        return $this->hasMany('App\Tanggapan', 'id_petugas', 'id_petugas');
    }
}
