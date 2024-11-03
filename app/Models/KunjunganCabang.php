<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KunjunganCabang extends Model
{
    use HasFactory;

    protected $fillable = ['nama_cabang', 'kode_cabang', 'waktu_kunjungan', 'pic'];
    protected $casts = [
        'pic' => 'array',
    ];

    public function kunjungan_ukers()
    {
        return $this->hasMany(KunjunganUker::class);
    }

}
