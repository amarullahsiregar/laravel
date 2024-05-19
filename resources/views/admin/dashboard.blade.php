@extends('layouts.admin')
@section('title', 'Dashboard')
@section('content')
<body>
    @php
    $nav1 = "Dashboard Admin";
    $nav1ref = url('administrator-dashboard'.'/'.$details->id);
    $nav2 = "Tambah Dosen";
    $nav2ref = url('dosen-add'.'/'.$details->id);
    $nav3 = "Tambah Mahasiswa";
    $nav3ref = url('mahasiswa-add'.'/'.$details->id);
    $nav4 = "Logout";
    $nav4ref =  url('logout-admin');
    @endphp
    <div class="administrator-dashboard bg-white overflow-hidden shadow rounded-lg border">
        @include('partials.navbar')
        <div class="px-4 py-5 sm:px-6">
            @if($details!=null)
            <div>
                <h1 class="text-lg leading-6 font-medium text-gray-900">
                    <div>Dashboard Admin</div>
                </h1>

            </div>
            <div class="col-span-4 sm:col-span-3">
                <div class="bg-white shadow rounded-lg p-6">
                    <div class="flex flex-col items-center">
                        <h1 class="text-xl font-bold">
                            {{ $details->nama }}
                        </h1>
                        <p class="text-gray-700">Admin Utama
                            <span><p class="mt-1 mb-1 max-w-2xl text-sm text-gray-500">
                                {{ $details->email }}
                            </p></span>
                        </p>
                    </div>
                    <hr class="my-6 border-t border-gray-300">
                    <div class="flex-col">
                        <span class="text-gray-700 uppercase font-bold tracking-wider mb-2">Mahasiswa Tugas Akhir : {{ count($mahasiswas) }}</span>
                        <a href="{{ url('mahasiswas') }}" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">
                            <p class="inline xl:hidden">Lihat</p>
                            <p class="hidden xl:inline">Lihat Semua Mahasiswa</p>
                        </a>

                    </div>
                </div>
            </div>
            @else
                <p>Maaf Identitas Tidak Ditemukan</p>

            @endif
        </div>
    </div>

@endsection
