<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\PendaftaranKursus;
use Illuminate\Http\Request;
use App\Models\Kursus;

class UserController extends Controller
{
    public function beranda()
    {
        return view('Front-End.Beranda');
    }

    public function kursus()
    {
        $kursus = Kursus::all();
        return view('Front-End.Kursus.Kursus', compact('kursus'));
    }

    public function kursusDetail($kursus_id)
    {
        $kursus = Kursus::find($kursus_id);
        return view('Front-End.Kursus.Show', compact('kursus'));
    }

    public function kursusDaftar(Request $request, $kursus_id)
    {
        $request->validate([
            'foto_krs' => 'required|image|mimes:png,jpeg,jpg|max:5040'
        ]);

        $kursus = Kursus::find($kursus_id);
        $pendaftaranKursus = new PendaftaranKursus([
            'user_id' => Auth::user()->user_id,
            'kursus_id' => $kursus->kursus_id,
            'foto_krs' => $request->foto_krs,
        ]);

        if ($request->hasFile('foto_krs')) {
            $request->file('foto_krs')->storeAs('images/krs', $request->file('foto_krs')->getClientOriginalName());
            $pendaftaranKursus->foto_krs = $request->file('foto_krs')->getClientOriginalName();
            $pendaftaranKursus->save();
        }

        return redirect()->route('Beranda.index')->with('info', "Anda berhasil daftar pada  kursus {$pendaftaranKursus->kursus->nama_kursus}");
    }

    public function riwayatPendaftaran()
    {
        $pendaftaranKursus = PendaftaranKursus::where('user_id', Auth::user()->user_id)->get();
        return view('Front-End.RiwayatPendaftaran', compact('pendaftaranKursus'));
    }
}
