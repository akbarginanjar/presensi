<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tb_riwayat extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function keterangan()
    {
        return $this->belongsTo(Tb_keterangan::class, 'id_keterangan');
    }
    public function jadwal()
    {
        return $this->belongsTo(Tb_kerja::class, 'id_kerja');
    }
    // public function m()
    // {
    //     return $this->belongsTo(Tb_keterangan::class, 'id_keterangan');
    // }
}
