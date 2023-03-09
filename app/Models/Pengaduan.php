<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tanggapan;

class Pengaduan extends Model
{
    protected $table = 'pengaduan';
    protected $primarykey = 'id';
    protected $fillable = [
        'id_pengaduan',
        'tgl_pengaduan',
        'nik',
        'isi_laporan',
        'foto',
        'status',
    ];

    public function masyarakat()
    {
        return $this->hasOne('App\Masyarakat', 'nik', 'nik');
    }

    public function tanggapans()
    {
        return $this->belongsTo(Pengaduan::class, 'id_pengaduan');
    }
}
