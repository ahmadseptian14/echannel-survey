<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KunjunganUker extends Model
{
    use HasFactory;

    protected $fillable = ['nama_uker', 'kode_uker', 'kunjungan_cabang_id'];

    public function kunjungan_cabang()
    {
        return $this->belongsTo(KunjunganCabang::class);
    }
}
