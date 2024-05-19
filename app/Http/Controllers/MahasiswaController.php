<?php

namespace App\Http\Controllers;

use App\Models\AntrianBimbingan;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

use function Laravel\Prompts\alert;

class MahasiswaController extends Controller
{
    public function index(Request $request)
    {
        $mahasiswas = Mahasiswa::all();
        return view('mahasiswa.index', ['mahasiswas' => $mahasiswas]);
    }

    public function dashboard($username)
    {
        $details = Mahasiswa::find($username);

        if ($details != null) {
            $statusdosen1 = Dosen::where('email', '=', $details->dosbing1)->first();
            $statusdosen2 = Dosen::where('email', '=', $details->dosbing2)->first();
            return view('mahasiswa.dashboard', ['details' => $details, 'statusdosen1' => $statusdosen1, 'statusdosen2' => $statusdosen2]);
        } else {
            return 'Mahasiswa ' . $username . ' Tidak Terdaftar Sebagai Mahasiswa yang mengambil Tugas Akhir';
        }
    }
    public function store(Request $request, $nim)
    {
        $mahasiswa = Mahasiswa::find($nim);
        $mahasiswa->update([
            'nim' => $request->input('nim'),
            'nama' => $request->input('nama'),
            'email' => $request->input('email'),
            'topik_ta' => $request->input('topik'),
        ]);
        Session::flash('message', 'This is a message!');
        return redirect('/mahasiswa-dashboard' . '/' . $request->input('nim'));
    }
    public function storeStudent(Request $request)
    {
        // Validasi input data (optional)
        if ($request->validate([
            'nim' => 'required|unique:mahasiswas,nim',
            'nama' => 'required',
            'password' => 'required',
            'topik_ta' => 'required',
            'dosbing1' => 'required',
            'dosbing2' => ''
        ])) {
            Mahasiswa::create([
                'nim' => $request->input('nim'),
                'nama' => $request->input('nama'),
                'email' => $request->email,
                'password' => bcrypt($request->input('password')),
                'topik_ta' => $request->input('topik_ta'),
                'dosbing1' => $request->input('dosbing1'),
                'dosbing2' => $request->input('dosbing2')
            ]);
            Log::alert("Berhasil Ditambahkan");
            return redirect(route('monitor'));
        } else {
            $mahasiswa = Mahasiswa::find($request->nim);
            return redirect('/mahasiswa' . '/' . $mahasiswa->nama);
        }
    }
    public function create(Request $request)
    {
        // Validasi input data (optional)
        if ($request->validate([
            'nim' => 'required|unique:mahasiswas,nim',
            'nama' => 'required',
            'password' => 'required',
            'topik_ta' => 'required',
            'dosbing1' => 'required',
            'dosbing2' => ''
        ])) {
            Mahasiswa::create([
                'nim' => $request->input('nim'),
                'nama' => $request->input('nama'),
                'email' => $request->email,
                'password' => bcrypt($request->input('password')),
                'topik_ta' => $request->input('topik_ta'),
                'dosbing1' => $request->input('dosbing1'),
                'dosbing2' => $request->input('dosbing2')
            ]);
            Log::alert("Berhasil Ditambahkan");
            return redirect(route('monitor'));
        } else {
            $mahasiswa = Mahasiswa::find($request->nim);
            return redirect('/mahasiswa' . '/' . $mahasiswa->nama);
        }
    }
    public function gantiPassword($username)
    {
        $detail = Mahasiswa::where('nim', '=', $username)->first();
        return view('mahasiswa.gantipassword', ['details' => $detail, 'username' => $username]);
    }
    public function storeGantiPassword(Request $request, $username)
    {
        $mahasiswa = Mahasiswa::find($username);
        $password = bcrypt($request->input('password'));
        if ($password != null) {
            $mahasiswa->update([
                'password' => bcrypt($request->input('password')),
            ]);
            return redirect('/mahasiswa-dashboard' . '/' . $username);
        }
    }
    public function ambilAntrian($username)
    {
        $details = Mahasiswa::find($username);
        $statushadir1 = Dosen::where('email', '=', $details->dosbing1)->first();
        $statushadir2 = Dosen::where('email', '=', $details->dosbing2)->first();
        $antrians = AntrianBimbingan::all();
        return view('mahasiswa.antri', compact('details', 'statushadir1', 'statushadir2', 'antrians'));
    }
    public function createAntrian(Request $request)
    {
        // Validasi input data (optional)
        if ($request->validate([
            //     'nim' => 'required|nim',
            'email' => 'required|email',
        ])) {
            $now = count(AntrianBimbingan::where('nim', '=', $request->nim)
                ->where('email', '=', $request->email)
                ->get());

            if ($now == 0) {
                # code...
                AntrianBimbingan::create([
                    'nim' => $request->input('nim'),
                    'nama_mahasiswa' => $request->input('nama'),
                    'topik_ta' => $request->input('topik_ta'),
                    'email' => $request->email,
                    'status' => $request->status,
                ]);
                return redirect('/mahasiswa-dashboard' . '/' . $request->nim);
            } else {
                $antrian = AntrianBimbingan::where('nim', '=', $request->nim)
                    ->where('email', '=', $request->email)
                    ->first();
                $antrian->update([
                    'status' => 'Menunggu',
                    'waktu_pengajuan' => Carbon::now()
                ]);
                return redirect('/ambil-antrian' . '/' . $request->nim);
            }
            // return redirect('/dosen/create')->with('success', 'Data dosen berhasil disimpan.');
        }
    }
}
