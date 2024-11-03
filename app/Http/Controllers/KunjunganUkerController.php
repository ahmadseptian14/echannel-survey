<?php

namespace App\Http\Controllers;

use App\Models\Uker;
use Illuminate\Http\Request;
use App\Models\KunjunganUker;

class KunjunganUkerController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'kunjungan_cabang_id' => 'required',
            'nama_uker' => 'required|string|max:255',
        ]);

        $nama_uker = $request->nama_uker;
        $kode_uker = Uker::where('nama_uker', $nama_uker)->pluck('kode_uker')->first();

        KunjunganUker::create([
            'kunjungan_cabang_id' => $request->kunjungan_cabang_id,
            'nama_uker' => $request->nama_uker,
            'kode_uker' => $kode_uker,
        ]);

        return response()->json(['message' => 'Unit Kerja berhasil ditambahkan!']);
    }

    public function detail($id)
    {
        $kunjungan = KunjunganUker::findOrFail($id);

        return view('pages.kunjungan.uker.detail', compact('kunjungan'));
    }
}
