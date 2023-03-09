<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{Pengaduan, User};

class Tanggapan extends Model
{
    protected $table = 'tanggapan';
    protected $fillable = [
        'id_pengaduan' ,
        'tgl_tanggapan',
        'tanggapan',
        'id_petugas'
    ];

    public function pengaduan()
    {
        return $this->belongsTo(Pengaduan::class, 'id_pengaduan', 'id');
    }

    public function petugas()
    {
        return $this->belongsTo(User::class, 'id_petugas', auth()->user()->id);
    }
}
