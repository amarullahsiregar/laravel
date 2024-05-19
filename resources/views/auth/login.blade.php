@extends('layouts.app')
@section('title','Login')
@section('adds')

<!-- My Style v -->
<link id="pagestyle" href="../assets/css/main.css" rel="stylesheet" />
<link id="pagestyle" href="../assets/css/glass.css" rel="stylesheet" />
<!-- My Style ^-->

 <!-- Google Font v -->
 <link rel="preconnect" href="https://fonts.gstatic.com">
 <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
 <!-- Google Font ^ -->
@endsection
@section('content')
    <div class="main-container">
        <div class="background top-2/4 xl:top-96 w-80 xl:w-96">
            <div class="shape max-w-32 xl:max-w-52 max-h-32 xl:max-h-52 ml-32 xl:ml-0"><img class="logo-if max-w-20 xl:max-w-32 max-h-20 xl:max-h-32 ml-6 pl-5 xl:ml-0 xl:pl-0" src="../assets/img/favicon.png" alt="Teknik Informatika" ></div>
            <div class="shape"></div>
        </div>
        <form class="mx-0 w-80 xl:w-96" method="POST" action="/login-post">
            @csrf
                <h3>Login Mahasiswa</h3>

                <label class="px-4 pb-4" for="email">Email</label>
                <input class="p-4 text-white" type="text" placeholder="user@email.com" id="email"  name="email">

                <label class="px-4 pb-4" for="password">Password</label>
                <input class="p-4 text-white" type="password" placeholder="Masukkan Password Anda" id="password"  name="password" >

                <button class="mt-10 bg-white py-4 mb-5" type="submit">Log In</button>
                <br>
                <!-- Pindah ke Halaman Home -->
                <p class="help-link signup-link text-xs ">
                    <span class="help-link__text">
                        Daftar hadir dosen ?
                    </span>
                    <a href="https://cekdos.my.id" class="text-blue-600 text-sm ui-button ui-button--link arrow-link">
                        ke Home »
                    </a>
                </p>
                <!-- Pindah ke Halaman Home -->
        </form>
    </div>
@endsection
