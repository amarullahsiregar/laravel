<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ambil Antrian</title>
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- @vite('resources/css/app.css') --}}
    {{-- @vite([]) --}}
</head>
<body>
    @php
        $backto = url('ambil-antrian') ;
        $nav1 = "Ambil Antrian";
        $nav1ref =  url('ambil-antrian').'/' .$details->nim ;
        $nav2 = "Dashboard Mahasiswa";
        $nav2ref =  url('mahasiswa-dashboard').'/'.$details->nim ;
        $nav3 = "Ganti Password";
        $nav3ref =  url('change-password').'/'.$details->nim;
        $nav4 = "Logout";
        $nav4ref =  url('logout');
        $class = "text-blue-300";
    @endphp
    @include('partials.navbar')
    <div class="container-fluid py-4">
        @include('partials.backbutton')

        <div class="card">
            <div class="viewing-area card-header pb-0 px-3">
                @if($details!=null)
                <h1>Ambil Antrian Bimbingan</h1>
            </div>
            <div class="card-body pt-4 p-3">
                <h2>Halo {{ $details->nama }} ({{ $details->nim }}), Silahkan Ambil Antrian </h2>
                <br>
                <h5 > Email : {{ $details->email }}</h5>
                <form action="/antrian-add-post" method="POST">
                    @csrf
                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-4">
                            <label for="nim"></label>
                            <div class="mt-2">
                                <div class="input-imajiner">
                                    <p class="pl-5 flex rounded-md shadow-sm  ring-gray-300  sm:max-w-md block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400  sm:text-sm sm:leading-6">Nomor Induk     : {{ $details->nim }}</p>
                                    <input type="text" name="nim" id="nim" autocomplete="nim"  value="{{ $details->nim }}" hidden>
                                </div>
                            </div>
                            <div class="sm:col-span-4">
                                <label for="nama"></label>
                                <div class="mt-2">
                                    <div class="input-imajiner">
                                        <p class="pl-5 flex rounded-md shadow-sm  ring-gray-300  sm:max-w-md block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400  sm:text-sm sm:leading-6">Nama Mahasiswa  : {{ $details->nama }}</p>
                                        <input type="text" name="nama" id="nama" autocomplete="nama"  value="{{ $details->nama }}" hidden>
                                    </div>
                                </div>
                            </div>
                            <div class="sm:col-span-4">
                                <label for="topik_ta"></label>
                                <div class="mt-2">
                                    <div class="input-imajiner">
                                        <p class="pl-5 flex rounded-md shadow-sm  ring-gray-300  sm:max-w-md block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400  sm:text-sm sm:leading-6">Topik           : {{ $details->topik_ta }}</p>
                                        <input type="text" name="topik_ta" id="topik_ta" autocomplete="topik_ta"  value="{{ $details->topik_ta }}" hidden>
                                    </div>
                                </div>
                            </div>
                            <div class="sm:col-span-4">
                                <label for="status"></label>
                                <div class="mt-2">
                                    <div class="input-imajiner">
                                        <p class="pl-5 flex rounded-md shadow-sm  ring-gray-300  sm:max-w-md block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400  sm:text-sm sm:leading-6">Topik           : {{ $details->topik_ta }}</p>
                                        <input type="text" name="status" id="status" autocomplete="status"  value="{{ $details->topik_ta }}" hidden>
                                        <p class="pl-5 flex rounded-md shadow-sm  ring-gray-300  sm:max-w-md block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400  sm:text-sm sm:leading-6">
                                            @php
                                                $count = 0;
                                                echo '<ul>';
                                            foreach ($antrians as $antrian) {
                                                # code...
                                                if ($antrian->email==$statushadir1->email) {
                                                    # code...
                                                    echo '<li>'.($antrian->status).'</li>';
                                                }
                                            }
                                                    echo '</ul>'
                                            @endphp
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <h5>Pilih Dosen 👇</h5>
                                <label class="container">{{ $statushadir1->email }}
                                    <input id="dosbing1" type="radio" checked="checked" name="email" value="{{ $statushadir1->email }}">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="container">{{ $statushadir2->email }}
                                    <input id="dosbing2" type="radio" name="email" value="{{ $statushadir2->email }}">
                                    <span class="checkmark"></span>
                                </label>
                                <div class="input-imajiner mx-w-0">
                                    <input type="text" id="status" name="status" value="Menunggu" hidden>
                                </div>
                        </div>
                    <div class="row justify-content mt-2 mb-5 mx-7">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">Ambil Antrian</button>
                    </div>

                </form>
                @endif
            </div>
        </div>
    </div>
</body>
</html>
