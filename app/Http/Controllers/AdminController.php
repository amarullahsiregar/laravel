<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function dashboard($username)
    {
        if (Admin::all()->where('email', '=', $username)->first() != null) {
            $details = Admin::all()->where('email', '=', $username)->first();
            $mahasiswas = Mahasiswa::all();
            return view('admin.dashboard', compact('details', 'mahasiswas'));
        } else {
            return redirect()->route('logout');
        }
    }
    public function addStudent($key)
    {
        $details = Admin::find($key);
        if ($details != null) {
            return view('mahasiswa.create', compact('details'));
        } else {
            return redirect()->route('logout');
        }
    }
    public function addDosen($key)
    {
        $details = Admin::find($key);
        if ($details != null) {
            return view('dosen.create', compact('details'));
        } else {
            return redirect()->route('logout');
        }
    }
    public function storeDosen(Request $request)
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
            return redirect('admin-dashboard');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
