<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kursus;
use App\Models\PendaftaranKursus;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class KursusController extends Controller
{
    public function dashboard()
    {
        return view('Back-End.Dashboard');
    }

    // Mahasiswa
        public function mahasiswa()
        {
            $users = User::all();
            return view('Back-End.Mahasiswa.Mahasiswa', compact('users'));
        }

        public function mahasiswaCreate()
        {
            return view('Back-End.Mahasiswa.Add');
        }

        public function mahasiswaStore(Request $request)
        {
            $request->validate([
                'nama' => 'required|max:32|string',
                'npm' => 'required|max:8',
                'kelas' => 'required|max:5|string',
                'password' => 'required|min:5|string',
            ]);

            $user = new User([
                'nama' => $request->nama,
                'npm' => $request->npm,
                'kelas' => $request->kelas,
                'password' => Hash::make($request->password),
            ]);
            $user->save();

            return redirect()->route('mahasiswa.index')->with('info', "Data mahasiswa berhasil ditambahkan");
        }

        public function mahasiswaEdit($user_id)
        {
            $users = User::find($user_id);
            return view('Back-End.Mahasiswa.Edit', compact('users'));
        }

        public function mahasiswaUpdate(Request $request, $user_id)
        {
            $request->validate([
                'nama' => 'required|max:32|string',
                'npm' => 'required|max:8',
                'kelas' => 'required|max:5|string',
            ]);

            $users = User::find($user_id);
            $users->update([
                'nama' => $request->nama,
                'npm' => $request->npm,
                'kelas' => $request->kelas,
            ]);

            return redirect()->route('mahasiswa.index')->with('info', "Data mahasiswa berhasil diupdate");
        }
    // Mahasiswa

    // Kursus
    public function index()
    {
        $kursus = Kursus::all();
        return view('Back-End.Kursus.Kursus', compact('kursus'));
    }

    public function create()
    {
        return view('Back-End.Kursus.Add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kursus' => 'required|max:32|string',
            'keterangan' => 'required|max:150|string',
            'mulai_kursus' => 'required',
            'selesai_kursus' => 'required',
        ]);
        $kursus = new Kursus([
            'nama_kursus' => $request->nama_kursus,
            'keterangan' => $request->keterangan,
            'mulai_kursus' => $request->mulai_kursus,
            'selesai_kursus' => $request->selesai_kursus,
        ]);
        $kursus->save();

        return redirect()->route('kursus.index')->with('info', 'Kursus berhasil ditambah');
    }

    public function edit($kursus_id)
    {
        $kursus = Kursus::find($kursus_id);
        return view('Back-End.Kursus.Edit', compact('kursus'));
    }

    public function update(Request $request, $kursus_id)
    {
        $request->validate([
            'nama_kursus' => 'required|max:32|string',
            'keterangan' => 'required|max:150|string',
            'mulai_kursus' => 'required',
            'selesai_kursus' => 'required',
        ]);

        $kursus = Kursus::find($kursus_id);
        $kursus->update([
            'nama_kursus' => $request->nama_kursus,
            'keterangan' => $request->keterangan,
            'mulai_kursus' => $request->mulai_kursus,
            'selesai_kursus' => $request->selesai_kursus,
        ]);

        return redirect()->route('kursus.index')->with('info', "Data kursus berhasil diupdate");
    }
    // Kursus

    // Pendaftaran
    public function pendaftaran()
    {
        $pendaftaranKursus = PendaftaranKursus::all();
        return view('Back-End.Pendaftaran.Pendaftaran', compact('pendaftaranKursus'));
    }

    public function pendaftaranEdit($pendaftaran_id)
    {
        $pendaftaranKursus = PendaftaranKursus::find($pendaftaran_id);
        return view('Back-End.Pendaftaran.Edit', compact('pendaftaranKursus'));
    }

    public function pendaftaranUpdate(Request $request, $pendaftaran_id)
    {
        $request->validate([
            'status' => 'required'
        ]);

        $pendaftaranKursus = PendaftaranKursus::find($pendaftaran_id);
        $pendaftaranKursus->update([
            'status' => $request->status
        ]);

        return redirect()->route('mahasiswa.index')->with('info', "Data pendaftaran berhasil diupdate");
    }
    // Pendaftaran
}
