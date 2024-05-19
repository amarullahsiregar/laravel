@extends('layouts.monitor') <!-- Menggunakan Layout bernama "app.blade.php" pada direktori /views/layouts/ -->

@section('title', 'List Dosens')
@section('refresh-time')
    <meta http-equiv="refresh" content="{{ (count($dosens)*3)+5 }}">
@endsection

@section('content')
</head>
<body class="bg-sky-200 p-6">
<div class="main-container">
    <h1 class="text-5xl tanggal mb-3 px-5 pb-5">
        {{ \Carbon\Carbon::now()->isoFormat('dddd') }}
        {{" ".date("d F Y");}}
    </h1>
    <div class="slider">
        @foreach ($dosens as $dosen)
            @switch($dosen->status_kehadiran)
                @case('Hadir')
                    <div class="rounded-xl mx-2 xl:mx-3 hadir bg-emerald-500 xl:bg-green-500 xl:text-white">
                    @break
                @case('Tidak Hadir')
                    <div class="rounded-xl mx-2 xl:mx-3 absen bg-red-500 text-white ">
                    @break
                @case('Mengajar')
                    <div class="rounded-xl mx-2 xl:mx-3 mengajar bg-sky-500">
                    @break
                @default

            @endswitch
                        <div class="">
                            <div >
                                <h1 class="nama_dosen text-center min-h-28 text-xl xl:text-5xl mt-20 xl:mt-10 mb-6">
                                    {{ $dosen->nama }}
                                </h1>
                                <div class="status-kehadiran text-center">
                                    <h2 class="mb-3 min-h-14 text-lg xl:text-4xl" >Sedang {{ $dosen->status_kehadiran }}</h2>
                                    <h3 class="mb-2 min-h-14 text-base xl:text-2xl" >Kesediaan Bimbingan: {{ $dosen->kesediaan_bimbingan }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white text-black rounded-md min-h-80">
                            <h1 class="text-center pt-3 text-md xl:text-3xl">Antrean Bimbingan</h1>
                            <table class="table-auto border-gray-400 m-5 " id="users-list">
                                <thead class="">
                                    <tr class="tr-mahasiswa">
                                        <th  class="p-1 border border-gray-400 min-w-full" style="width: 11.2641%;">Nama</th>
                                        <th  class="p-1 border border-gray-400 min-w-80" style="width: 7.07134%;">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($antrians as $antrian)
                                        @if ($antrian->email == $dosen->email)
                                        @switch($antrian->status)
                                            @case('Selesai')
                                                <tr class="h-12 py-2 bg-lime-200">
                                                @break
                                            @case('Proses')
                                                <tr class="h-12 py-2 bg-yellow-100">
                                                @break
                                            @case('Menunggu')
                                                <tr class="h-12 py-2 bg-yellow-200">
                                                @break
                                            @default
                                        @endswitch
                                            <td class=" px-4 text-lg font-bold border border-gray-400">{{ $antrian->nama_mahasiswa }}</td>
                                            <td class=" px-4 text-lg font-bold border border-gray-400 text-center">{{ $antrian->status }}</td>
                                        </tr>
                                        @endif
                                    @endforeach


                                </tbody>
                            </table>
                        </div>
                    </div>
        @endforeach
    </div>
</div>
@endsection
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script>
    $(document).ready(function(){

        $('.slider').slick({
            slidesToShow: 2,
            slidesToScroll: 2,
            infinite: false,    //true untuk slide berulang ke awal
            autoplay: true,
            autoplaySpeed: 6000,
            dots: true,
            arrows: true,
        });

    });
</script>
<script type="text/javascript">

    if (screen.width <= 699) {
    document.location = 'landing-mobile';
    }

</script>

@endpush
