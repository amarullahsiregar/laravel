@extends('layouts.admin')
@section('title', 'Dashboard')

@section('content')


    @php
        if (isset($details)) {
           dd($details);
        }
        $nav1 = "<< Dashboard";
        $nav1ref =  url('administrator-dashboard'.'/' . $key );
        $inputclass = "bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500";
    @endphp
    <div>
        @include('partials.navbar');
        <div class="divide-x divide-dashed card-header pb-0 px-3">
            <h1 class="border-gray-800 text-xl">Edit Data Mahasiswa</h1>
        </div>

        <form action="/mahasiswa-edit-put/{{ $key }}" method="POST" class="max-w-sm mx-auto">
            @csrf
            @method('PUT')
            <div class="row">
                <label for="nim">NIM : </label>
                <div>
                    <input type="number" class="{{ $inputclass }}" value="{{ $user->nim }}" placeholder="NIM" name="nim"  >
                </div>
            </div>
            <div class="row">
                <label for="nama">Nama : </label>
                <div>
                    <input type="text" class="{{ $inputclass }}" value="{{ $user->nama }}" placeholder="Nama Mahasiswa" name="nama">
                </div>
            </div>
            <div class="row">
                <label for="nama">Email : </label>
                <div>
                    <input type="email" class="{{ $inputclass }}" value="{{ $user->email }}" placeholder="Email Mahasiswa" name="email"  >
                </div>
            </div>
            <div class="row">
                <label for="topik">Topik TA : </label>
                <div >
                    <textarea  class="min-w-full border-2 border-sky-300 p-2" rows="4" placeholder="Topik TA" name="topik" >{{ $user->topik_ta }}</textarea>
                </div>
            </div>
            <div class="row">
                <label for="dosbing1">Dosen Pembimbing 1 :</label>
                <div>
                    <input type="email" class="{{ $inputclass }}" value="" placeholder="{{ $user->dosbing1 }}" name="dosbing1"  >
                </div>
            </div><div class="row">
                <label for="dosbing2">Dosen Pembimbing 2 :</label>
                <div>
                    <input type="email" class="{{ $inputclass }}" value="" placeholder="{{ $user->dosbing2 }}" name="dosbing2"  >
                </div>
            </div>
            <div class="row justify-content mt-2 mb-5 mx-5">
                <a href="#" class="bg-gradient-to-r from-cyan-500 to-blue-500 border-2 border-solid border-gray-500 hover:bg-blue-400 text-white py-2 px-4 rounded mr-5">
                    <button type="submit" class="btn  btn-md mt-4 mb-4 ">Ubah Data</button>
                </a>
                <a href="{{ url('mahasiswa-delete').'/'.$user->nim }}" class="bg-gradient-to-r from-orange-500 to-red-400 border-2 border-solid border-gray-500 hover:bg-blue-400 text-white py-2 px-4 rounded">
                    <button class="p-1 text-black font-bold">
                        Hapus Mahasiswa !
                    </button>
                </a>

        </form>


    {{-- Detail Mahasiswa --}}

    </div>
@endsection
