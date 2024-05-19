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
}
