<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard Mahasiswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- @vite('resources/css/app.css') --}}
    {{-- @vite([]) --}}
</head>
<body>
    @php
        $inputclass = "block w-full rounded-md border-0 py-1.5 pl-5 pr-5 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6";

        $nav1 = "Dashboard Mahasiswa";
        $nav1ref =  url('mahasiswa-dashboard').'/'.$details->nim ;
        $nav2 = "Ambil Antrian";
        $nav2ref =  url('ambil-antrian').'/' . $details->nim ;
        $nav3 = "Ganti Password";
        $nav3ref =  url('change-password').'/'.$details->nim;
        $nav4 = "Logout";
        $nav4ref =  url('logout');
        $class = "text-orange-500";
    @endphp
    @include('partials.navbar')
    <div class="container-fluid py-4">
        <div class="card">
            <div class="divide-x divide-dashed card-header pb-0 px-3">
                <a href="{{ url('/') }}">
                    <button class="mb-5 rounded border-gray-600 border-2 px-5 bg-gray-300" onclick="alert('Kembali Ke Home')">◀ Landing Page</button>
                </a>
                <h1 class="border-gray-800 text-xl">Profil Mahasiswa</h1>
            </div>
            <div class="card-body pt-4 p-3">
                @if($details==null)
                Maaf user tidak ditemukan!
                @else
                <form action="/mahasiswa-put/{{ $details->nim }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <label for="nim">NIM : </label>
                        <div>
                            <input type="number" class="{{ $inputclass }}" value="{{ $details->nim }}" placeholder="NIM" name="nim" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <label for="nama">Nama : </label>
                        <div>
                            <input type="text" class="{{ $inputclass }}" value="{{ $details->nama }}" placeholder="Nama Mahasiswa" name="nama">
                        </div>
                    </div>
                    <div class="row">
                        <label for="nama">Email : </label>
                        <div>
                            <input type="email" class="{{ $inputclass }}" value="{{ $details->email }}" placeholder="Email Mahasiswa" name="email" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <label for="topik">Topik TA : </label>
                        <div >
                            <textarea  class="min-w-full border-2 border-sky-300 p-2" rows="4" placeholder="Topik TA" name="topik" >{{ $details->topik_ta }}</textarea>
                        </div>
                    </div>
                    <div class="row">
                        <label for="dosbing1">Dosen Pembimbing 1 : Sedang {{ $statusdosen1->status_kehadiran }}</label>
                        <div>
                            <div class="{{ $inputclass }}">{{ $details->dosbing1 }}</div>
                        </div>
                    </div><div class="row">
                        <label for="dosbing2">Dosen Pembimbing 2 : Sedang {{ $statusdosen2->status_kehadiran }}</label>
                        <div>
                            <div class="{{ $inputclass }}" >{{ $details->dosbing2 }}</div>
                        </div>
                    </div>
                    <div class="row justify-content mt-2 mb-5 mx-5">
                        <a href="#" class="bg-gradient-to-r from-cyan-500 to-blue-500 border-2 border-solid border-gray-500 hover:bg-blue-400 text-white py-2 px-4 rounded">
                            <button type="submit" class="btn  btn-md mt-4 mb-4 ">Ubah Data</button>
                        </a>
                    </div>

                </form>
                @endif
            </div>
        </div>
    </div>

</body>
</html>
