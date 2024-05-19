<?php

namespace App\Http\Controllers;

use App\Models\AntrianBimbingan;
use App\Models\Dosen;

class MonitorController extends Controller
{
    public function index()
    {
        $dosens = Dosen::all();
        $antrians = AntrianBimbingan::all();
        return view('monitor.index', compact(
            'dosens',
            'antrians'
        ));
    }
    public function indexMobile()
    {
        $dosens = Dosen::all();
        $antrians = AntrianBimbingan::all();
        return view('monitor.mobile', compact('dosens', 'antrians'));
    }
}
