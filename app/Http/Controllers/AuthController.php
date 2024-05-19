<?php

namespace App\Http\Controllers;

use App\Models\Administrator;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('auth.login');
    }
    public function loginPost(Request $request)
    {
        // Validate the request data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (auth()->guard('administrator')->attempt($request->only('email', 'password'))) {
            $administrator = Administrator::whereEmail($request->email)->firstOrFail();
            return redirect()->route('administrator.dashboard', $administrator->id);
        }

        // Attempt to authenticate the mahasiswa
        if (auth()->guard('mahasiswa')->attempt($request->only('email', 'password'))) {
            $mahasiswa = Mahasiswa::whereEmail($request->email)->firstOrFail();
            return redirect()->route('mahasiswa.dashboard', $mahasiswa->nim);
        }

        // If authentication fails, redirect back to the login page
        return redirect()->route('monitor')->withErrors(['email' => 'Invalid credentials.']);
    }
    public function session()
    {
        $current = auth()->guard()->name;
        dump($current);
    }


    public function logout()
    {
        //delete login session current user
        Auth::logout();
        return redirect()->route('login');
    }
}
