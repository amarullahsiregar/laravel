<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ambil Antrian</title>
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- @vite('resources/css/app.css') --}}
    @vite([])
</head>
<body>
    @php
        $backto = url('ambil-antrian') ;
        $nav1 = "Dashboard Mahasiswa";
        $nav1ref =  url('mahasiswa-dashboard').'/'.$details->nim ;
        $nav2 = "Ambil Antrian";
        $nav2ref =  url('ambil-antrian').'/' .$details->nim ;
        $nav2class = "active";
        $nav3 = "Ganti Password";
        $nav3ref =  url('change-password').'/'.$details->nim;
        $nav4 = "Logout";
        $nav4ref =  url('logout');
        $class = "text-blue-300";
    @endphp
    @include('partials.navbar')
    <div class="container-fluid py-4 px-5">
        @include('partials.backbutton')

        <div class="card">
            <div class="viewing-area card-header pb-0 px-3">
                @if($details!=null)
                <h1 class="text-2xl leading-6 font-bold text-gray-900 mb-5">
                    <div>
                        Ambil Antrian Bimbingan
                    </div>
                </h1>
            </div>
            <div class="card-body pt-4 p-3">
                <h2>Halo {{ $details->nama }} ({{ $details->nim }}),<br> Silahkan Ambil Antrian !</h2>
                <br>
                <h5 > e-mail : {{ $details->email }}</h5>
                <form action="/antrian-add-post" method="POST" class="mb-10">
                    @csrf
                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="col-span-3 xl:col-span-3 2xl:col-span-4">
                            <label for="nim"></label>
                            <div class="mt-2">
                                <div class="input-imajiner">
                                    <input type="text" name="nim" id="nim" autocomplete="nim"  value="{{ $details->nim }}" hidden>
                                </div>
                            </div>
                            <div class="sm:col-span-4">
                                <label for="nama"></label>
                                <div class="mt-2">
                                    <div class="input-imajiner">
                                        <p class="pl-5 flex rounded-md shadow-sm  ring-gray-300  sm:max-w-md block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400  sm:text-sm sm:leading-6">Nama Mahasiswa  : {{ $details->nama }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="sm:col-span-4">
                                <label for="topik_ta"></label>
                                <div class="mt-2">
                                    <div class="input-imajiner">
                                        <p class="pl-5 flex rounded-md shadow-sm  ring-gray-300  sm:max-w-md block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400  sm:text-sm sm:leading-6">Topik           : {{ $details->topik_ta }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="sm:col-span-4 mt-5">
                                <!-- Cek Urutan Antrian-->
                                @php
                                        $urutan1 = 0 ;
                                        $urutan2 = 0 ;
                                    @endphp
                                @foreach ($antrians as $antrian)
                                    @if ($antrian->email==$dosbing1->email)
                                        @php
                                            $urutan1 +=1 ;
                                            @endphp
                                    @elseif($antrian->email==$dosbing2->email)
                                    @php
                                            $urutan2 +=1 ;
                                        @endphp
                                    @endif
                                @endforeach
                                    <!-- Cek Urutan Antrian-->
                                    <div class="my-5">Urutan Antrian dengan Pembimbing 1 : <span class="rounded bg-blue-500  py-2 px-4">{{ $urutan1 }}</span></div>
                                    <div class="my-5">Urutan Antrian dengan Pembimbing 2 :  <span class="rounded bg-blue-500  py-2 px-4">{{ $urutan2 }}</span></div>
                            </div>
                        </div>

                        <div class="row min-w-fit">
                            <h5>Pilih Dosen 👇</h5>

                                <!-- Pilihan dosen -->
                                @if ($dosbing1->kesediaan_bimbingan=='Bersedia')
                                <label class="flex bg-gray-300 text-gray-700 rounded-md px-3 py-2 my-3 hover:bg-gray-400 cursor-pointer ">
                                    <span class="checkmark"></span>
                                    <input id="dosbing1" type="radio" checked="checked" name="email" value="{{ $dosbing1->email }}">
                                    <p class="font-bold pl-2">{{ $dosbing1->email }}</p>
                                </label>
                                @endif
                                @if ($dosbing2->kesediaan_bimbingan=='Bersedia')
                                <label class="flex bg-gray-300 text-gray-700 rounded-md px-3 py-2 my-3 hover:bg-gray-400 cursor-pointer ">
                                    <input id="dosbing2" type="radio" name="email" value="{{ $dosbing2->email }}">
                                    <span class="checkmark"></span>
                                    <p class="font-bold pl-2">{{ $dosbing2->email }}</p>
                                </label>
                                @endif
                                <!-- Pilihan dosen -->

                                <div class="input-imajiner mx-w-0">
                                    <input type="text" id="status" name="status" value="Menunggu" hidden>
                                </div>
                                <div class="row justify-content mt-2 mb-5">
                                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">Ambil Antrian</button>
                                </div>
                        </div>
                    </div>

                </form>
                @endif
            </div>
        </div>
    </div>
</body>
</html>
