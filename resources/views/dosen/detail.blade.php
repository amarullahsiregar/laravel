<!-- lokasi file pada /views/dosen/index.blade.php -->
@extends('layouts.admin') <!-- Menggunakan Layout bernama "app.blade.php" pada direktori /views/layouts/ -->

@section('content')
<body>
<div class="main-container py-4">
    <div class="card dosen-dashboard">
        <div class="card-header pb-0 px-3">
            <h1>Profil Dosen</h1>
        </div>
        <div class="card-body pt-4 p-3">
            <table>
                <thead>
                    <tr>
                        <th>Email</th>
                        <th>Nama</th>
                        <th>Password</th>
                        <!-- Tambahkan kolom lain sesuai kebutuhan -->
                    </tr>
                </thead>
                <tbody>
                        @if($details==null)
                            Maaf user tidak ditemukan!
                        @else
                            <p>{{$details->nama}}</p>
                        @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
