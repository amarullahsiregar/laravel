<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index(Request $request)
    {
        $abc = Dosen::all();
        return view('dosen.lists', ['dosens' => $abc]);
    }
    // public function create()
    // {
    //     return view('dosen.create');
    // }
    // public function store(Request $request)
    // {
    //     if ($request->validate([
    //         'id' => 'required|unique:dosens,id',
    //         'email' => 'required|unique:dosens,email',
    //         'nama' => 'required',
    //         'password' => 'required',
    //         'inisial_dosen' => 'required'
    //     ])) {
    //         Dosen::create([
    //             'id' => $request->input('id'),
    //             'email' => $request->input('email'),
    //             'nama' => $request->input('nama'),
    //             'password' => bcrypt($request->input('password')),
    //             'inisial_dosen' => $request->input('inisial_dosen')
    //         ]);
    //     }
    // }
}
