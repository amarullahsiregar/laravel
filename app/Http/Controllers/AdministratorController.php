<?php

namespace App\Http\Controllers;

use App\Models\Administrator;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdministratorController extends Controller
{
    public function dashboard($username)
    {
        $current = auth()->guard()->name;
        if (Administrator::find($username) != null) {
            $details = Administrator::find($username);
            $mahasiswas = Mahasiswa::all();
            $dosens = Dosen::all();
            return view('admin.dashboard', compact('details', 'mahasiswas', 'dosens'));
        } else {
            // $current = auth()->guard()->name;
            // dump($current);
            return redirect()->route('logout-admin');
        }
    }
    public function dosens(Request $request)
    {
        $dosens = Dosen::all();
        $key = auth()->guard()->user()->id;
        return view('dosen.index', compact('dosens', 'key'));
    }
    public function mahasiswas(Request $request)
    {
        $mahasiswas = Mahasiswa::all();
        $key = auth()->guard()->user()->id;
        return view('mahasiswa.index', compact('mahasiswas', 'key'));
    }
    public function addStudent($key)
    {
        $details = Administrator::find($key);
        if ($details != null) {
            return view('mahasiswa.create', compact('details'));
        } else {
            return redirect()->route('logout-admin');
        }
    }
    public function storeStudent(Request $request, $key)
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
            return redirect('administrator-dashboard' . '/' . $key);
        } else {
            $mahasiswa = Mahasiswa::find($request->nim);
            return redirect('/mahasiswa' . '/' . $mahasiswa->nama);
        }
    }
    public function editStudent($nim)
    {
        $user = Mahasiswa::find($nim);
        $key = auth()->guard()->user()->id;
        return view('admin.edit_mahasiswa', compact('user', 'key'));
    }
    public function store(Request $request, $key)
    {
        $mahasiswa = Mahasiswa::find($request->nim);
        $mahasiswa->update([
            'nim' => $request->input('nim'),
            'nama' => $request->input('nama'),
            'email' => $request->input('email'),
            'topik_ta' => $request->input('topik'),
        ]);
        return redirect('/administrator-dashboard' . '/' . $key);
    }
    public function addDosen($key)
    {
        $details = Administrator::find($key);
        if ($details != null) {
            return view('dosen.create', compact('details'));
        } else {
            return redirect()->route('logout-admin');
        }
    }
    public function storeDosen(Request $request, $key)
    {
        if ($request->validate([
            'id' => 'required|unique:dosens,id',
            'email' => 'required|unique:dosens,email',
            'nama' => 'required',
            'password' => 'required',
            'inisial_dosen' => 'required'
        ])) {
            Dosen::create([
                'id' => $request->input('id'),
                'email' => $request->input('email'),
                'nama' => $request->input('nama'),
                'password' => bcrypt($request->input('password')),
                'inisial_dosen' => $request->input('inisial_dosen')
            ]);
            return redirect('administrator-dashboard' . '/' . $key);
        }
    }
}
