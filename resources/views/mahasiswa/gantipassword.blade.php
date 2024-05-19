@extends('layouts.app')
@section('title', 'Dashboard')
@section('title','Ganti Password')
@section('content')

@php
        $nav1 = "Dashboard Mahasiswa";
        $nav1ref =  url('mahasiswa-dashboard').'/'.$details->nim ;
        $nav2 = "Ambil Antrian";
        $nav2ref =  url('ambil-antrian').'/' . $details->nim ;
        $nav4 = "Logout";
        $nav4ref =  url('logout');
@endphp

@include('partials.navbar')
<div class="container-fluid py-4">
    <div class="card">
        @if($details==null)
        Maaf user tidak ditemukan!
        @else
        <div class="card-header pb-0 px-3 my-5">
            <h1 class="border-gray-800 text-xl">Ganti Password</h1>
        </div>
        <div class="divide-x divide-dashed card-header pb-0 px-3">
                <h1 class="mb-5">{{ $details->nama }}</h1>
            <form action="/change-password-put/{{ $details->nim }}" method="POST">
                @csrf
                @method('PUT')
                <label for="password" class="block h-24 max-w-96" >
                    <span class="block text-sm font-medium text-slate-700">Password Baru</span>

                    <input type="password" placeholder="Masukkan Password Baru" name="password" class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
                      focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
                      disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none
                      invalid:border-pink-500 invalid:text-pink-600
                      focus:invalid:border-pink-500 focus:invalid:ring-pink-500
                    "/>
                </label>
                {{-- <label class="block pb-5 h-24 max-w-96" >
                    <span class="block text-sm font-medium text-slate-700">Konfirmasi Password Baru</span>

                    <input type="password" placeholder="Masukkan Password Baru" class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
                      focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
                      disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none
                      invalid:border-pink-500 invalid:text-pink-600
                      focus:invalid:border-pink-500 focus:invalid:ring-pink-500
                    "/>
                </label> --}}

                <div class="d-flex justify-content-end">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">Simpan Password Baru</button>
                </div>
            </form>

        </div>
        @endif
    </div>
</div>
@endsection
