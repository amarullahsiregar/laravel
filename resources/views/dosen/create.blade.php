@extends('layouts.app')

@section('title','Tambah Data Dosen')

@section('content')
    @php
    $inputclass = "block w-full rounded-md border-0 py-1.5 pl-5 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6";

    $nav1= 'Tambah Dosen';
    $nav1ref = url('dosen-add'.'/'.$details->id);
    $nav2 = "Dashboard Admin";
    $nav2ref = url('administrator-dashboard'.'/'.$details->id);
    $nav3 = "Tambah Mahasiswa";
    $nav3ref = url('mahasiswa-add'.'/'.$details->id);
    $nav4 = "Logout";
    $nav4ref =  url('logout');
    @endphp
@include('partials.navbar')
    <div class="container-xl">
        <div class="card form-container mt-8">
            <div class="card-header mx-5 mb-5 pb-1 text-left bg-transparent">
                    <h1 class="text-2xl leading-6 font-bold text-gray-900 mb-5">
                        <div>
                            Tambah Data Dosen
                        </div>
                    </h1>
            </div>
            <div class="mt-5 mt-lg-4">
                <form action="/dosen-add-post/{{$details->id}}" method="post">
                    @csrf

                    <div class="mb-3 row mx-5 w-10/12">
                        <label class="col-sm-3 col-form-label" for="id">Nomor Induk Dosen : </label>
                        <input type="number" class="{{ $inputclass }}" name="id" id="id" required>
                    </div>
                    <br>
                    <div class="mb-3 row mx-5 w-10/12">
                        <label class="col-sm-3 col-form-label" for="email">E-mail Dosen: </label>
                        <input type="email" class="{{ $inputclass }}" name="email" id="email" required>
                    </div>
                    <br>
                    <div class="mb-3 row mx-5 w-10/12">
                        <label class="col-sm-3 col-form-label" for="nama">Nama Dosen: </label>
                        <input type="text" class="{{ $inputclass }}" name="nama" id="nama" required>
                    </div>
                    <br>
                    <div class="mb-3 row mx-5 w-10/12">
                        <label class="col-sm-3 col-form-label" for="inisial_dosen">Inisial : </label>
                        <input type="text" class="{{ $inputclass }}" name="inisial_dosen" id="inisial_dosen" required>
                    </div>
                    <br>
                    <div class="mb-3 row mx-5 w-10/12">
                        <label class="col-sm-3 col-form-label" for="password">Password : </label>
                        <input type="password" class="{{ $inputclass }}" name="password" id="password" required>
                    </div>
                    <br>
                    <div class="row justify-content mt-2 mb-5 mx-5">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
