<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Cabang;
use Illuminate\Http\Request;
use App\Models\KunjunganCabang;
use App\Models\Uker;

class KunjunganCabangController extends Controller
{
    public function index()
    {
        $kunjungans = KunjunganCabang::select('id', 'nama_cabang', 'waktu_kunjungan', 'pic')->orderBy('created_at', 'desc')->paginate(6);

        foreach ($kunjungans as $kunjungan) {
            if (is_string($kunjungan->pic)) {
                $kunjungan->pic = json_decode($kunjungan->pic);
            }
            $kunjungan->waktu_kunjungan = Carbon::parse($kunjungan->waktu_kunjungan)->translatedFormat('d F Y');
        }
        return view('pages.kunjungan.cabang.index', compact('kunjungans'));
    }

    public function search(Request $request)
    {
        $search = $request->input('query');

        $kunjungans = KunjunganCabang::query()
        ->where(function($query) use ($search) {
            $query->where('nama_cabang', 'LIKE', "%{$search}%")
                  ->orWhere('waktu_kunjungan', 'LIKE', "%{$search}%")
                  ->orWhereRaw('LOWER(pic) LIKE ?', ['%' . strtolower($search) . '%']);
        })
        ->paginate(6);

        foreach ($kunjungans as $kunjungan) {
            if (is_string($kunjungan->pic)) {
                $kunjungan->pic = json_decode($kunjungan->pic);
            }

            $kunjungan->waktu_kunjungan = Carbon::parse($kunjungan->waktu_kunjungan)->translatedFormat('d F Y');
        }

        return view('partials.kunjungan-cabang-list', compact('kunjungans'))->render();
    }

    public function detail($id)
    {
        $kunjungan = KunjunganCabang::with('kunjungan_ukers')->findOrFail($id);
        $kunjungan->waktu_kunjungan = Carbon::parse($kunjungan->waktu_kunjungan)->translatedFormat('d F Y');

        if (is_array($kunjungan->pic)) {
            $kunjungan->pic = implode(' Dan ', $kunjungan->pic);
        }

        $ukers = Uker::select('nama_uker', 'kode_uker')->where('kode_cabang', $kunjungan->kode_cabang)->get();

        return view('pages.kunjungan.cabang.detail', compact('kunjungan', 'ukers'));
    }

    public function inputKunjungan()
    {
        $cabangs = Cabang::all();
        return view('pages.kunjungan.cabang.input', compact('cabangs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_cabang' => 'required|string',
            'waktu_kunjungan' => 'required|string',
            'pic' => 'required|array',
        ]);

        $nama_cabang = $request->nama_cabang;
        $kode_cabang = Cabang::where('nama_cabang', $nama_cabang)->pluck('kode_cabang')->first();
        $waktu_kunjungan = $request->waktu_kunjungan;

        $kunjungan_cabang = KunjunganCabang::create([
            'nama_cabang' => $nama_cabang,
            'kode_cabang' => $kode_cabang,
            'waktu_kunjungan' => $waktu_kunjungan,
            'pic' => $request->pic,
        ]);

        return redirect()->route('kunjungancabang.detail', ['id' => $kunjungan_cabang->id]);
    }

}
