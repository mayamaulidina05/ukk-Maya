<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Masyarakat extends Model
{
    protected $table = 'masyarakat';
    protected $primarykey = 'nik';
    protected $fillable= [
        'id_user',
        'nama',
        'nik',
        'username',
        'password',
        'telp'
    ];

    public function pengaduan()
    {
        return $this->hasMany('App\Model\Pengaduan','id_pengaduan', 'id');
    }
}
