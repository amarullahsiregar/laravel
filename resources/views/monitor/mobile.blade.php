@extends('layouts.monitor') <!-- Menggunakan Layout bernama "app.blade.php" pada direktori /views/layouts/ -->

@section('title', 'List Dosens')
@section('refresh-time')
{{-- <meta http-equiv="refresh" content="{{ (count($dosens)*3)+5 }}"> --}}
@endsection

@section('content')
</head>
<body class="bg-sky-200 p-6">
<div class="main-container">
    <h1 class="tanggal mb-3 px-5 pl-2 pb-5 text-sky-950 bg-sku-600 font-bold text-xl">
        {{ \Carbon\Carbon::now()->isoFormat('dddd') }}
        {{" ".date("d F Y");}}
    </h1>
    <div class="bg-white rounded py-14 sm:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <h2 class="text-center text-lg font-semibold leading-8 text-gray-900">
                Kehadiran Dosen Informatika
            </h2>
            <div class="mx-auto mt-10 grid max-w-lg grid-cols-4 items-center gap-x-8 gap-y-10 sm:max-w-xl sm:grid-cols-6 sm:gap-x-10 lg:mx-0 lg:max-w-none lg:grid-cols-5">

            @foreach ($dosens as $dosen)
                @switch($dosen->status_kehadiran)
                    @case('Hadir')
                    <div class="flex items-center justify-center rounded-lg border border-gray-200 px-6 py-5 shadow-sm bg-green-600 text-white">
                        <p class="font-extrabold">
                            {{ $dosen->inisial_dosen }}
                        @break
                    @case('Tidak Hadir')
                    <div class="flex items-center justify-center rounded-lg border border-gray-200px-6 py-5 shadow-sm bg-red-600 text-gray-800">
                        <p class="font-bold hover:font-extrabold">
                            {{ $dosen->inisial_dosen }}
                        @break
                    @case('Mengajar')
                    <div class="flex items-center justify-center rounded-lg border border-gray-200 text-white px-6 py-5 shadow-sm bg-sky-600">
                        <p class="font-extrabold">
                            {{ $dosen->inisial_dosen }}
                        @break
                    @default
                @endswitch
                </p>
            </div>
            @endforeach

            </div>
        <div class="mt-5 p-1">Keterangan : <br class="mb-3">
            <span class="p-1 m-1 rounded max-w-2xl bg-green-600 text-white">Hadir</span>
            <span class="p-1 m-1 rounded bg-sky-600 text-white">Mengajar</span>
            <span class="p-1 m-1 rounded bg-red-600">Tidak Hadir</span>
        </div>
        </div>
    </div>
    Ambil antrian bimbingan ? silahkan
    <button class="text-sky-950 bg-sku-600 font-bold">
            <a href="{{ url('login') }}">
            Login
        </a>
        </button>
</div>
@endsection
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script type="text/javascript">
    if (screen.width > 699) {
    document.location = '/';
    }
</script>

@endpush
