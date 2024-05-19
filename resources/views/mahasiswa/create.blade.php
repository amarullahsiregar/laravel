@extends('layouts.app')

@section('title','Tambah Data Dosen')

@section('content')
@php
    $inputclass = "block w-full rounded-md border-0 py-1.5 pl-5 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6";

    $nav1= 'Tambah Mahasiswa';
    $nav1ref = url('mahasiswa-add'.'/'.$details->id);
    $nav2 = "Dashboard Admin";
    $nav2ref = url('administrator-dashboard'.'/'.$details->id);
    $nav3 = "Tambah Dosen";
    $nav3ref = url('dosen-add'.'/'.$details->id);
    $nav4 = "Logout";
    $nav4ref =  url('logout');
@endphp
@include('partials.navbar')
    <div class="container-xl">
        <div class="card form-container mt-8">
            <div class="card-header mx-5 mb-5 pb-1 text-left bg-transparent">
                    <h1 class="position-absolute font-weight-bolder text-title grd-steelblue ">Tambah Data Mahasiswa</h1>
            </div>
            <div class="mt-5 mt-lg-4">
                <form action="/mahasiswa-add-post/{{$details->id}}" method="post">
                    @csrf <!-- Laravel CSRF token-->
                    <div class="mb-3 row mx-5">
                        <label class="col-md-2 col-form-label" for="nim">NIM : </label>
                        <div class="col-md-10">
                            <input type="number" class="{{ $inputclass }}" name="nim" id="nim" required>
                        </div>
                    </div>
                    <div class="mb-3 row mx-5">
                        <label class="col-md-2 col-form-label" for="nama">Nama : </label>
                        <div class="col-md-10">
                            <input type="text" class="{{ $inputclass }}" name="nama" id="nama" required>
                        </div>
                    </div>

                    <div class="mb-3 row mx-5">
                        <label for="email" class="col-md-2 col-form-label">Email : </label>
                        <div class="col-md-10">
                            <input type="email" class="{{ $inputclass }}" placeholder="user@email.com" id="email"  name="email" >
                        </div>
                    </div><!-- end row -->
                    <div class="mb-3 row mx-5">
                        <label class="col-md-2 col-form-label" for="password">Password : </label>
                        <div class="col-md-10">
                            <input type="password" class="{{ $inputclass }}" name="password" id="password" required>
                        </div>
                    </div>
                    <div class="mb-3 row mx-5">
                        <label class="col-md-2 col-form-label" for="topik_ta">Topik TA : </label>
                        <div class="col-md-10">
                            <input type="text" class="{{ $inputclass }}" name="topik_ta" id="topik_ta" required>
                        </div>
                    </div>

                    <div class="mb-3 row mx-5">
                        <label class="col-md-2 col-form-label" for="dosbing1">E-mail Dosen Pembimbing 1: </label>
                        <div class="col-md-10">
                            <input type="email" class="{{ $inputclass }}" name="dosbing1" id="dosbing1" required>
                        </div>
                    </div>
                    <div class="mb-3 row mx-5">
                        <label class="col-md-2 col-form-label" for="dosbing2">Email Dosen Pembimbing : *opsional</label>
                        <div class="col-md-10">
                            <input type="email" class="{{ $inputclass }}" name="dosbing2" id="dosbing2" >
                        </div>
                    </div>
                    <div class="row justify-content mt-2 mb-5 mx-5">
                        <a href="#" class="">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">Simpan</button>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
