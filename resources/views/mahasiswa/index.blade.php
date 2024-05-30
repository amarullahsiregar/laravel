@extends('layouts.app')
@section('content')

@php
$details = array('email'=>'sambilansada@gmail.com');
$nav1 = "◀ Dashboard";
$nav1ref =  url('administrator-dashboard'.'/' . 1 );
@endphp

@include('partials.navbar')
<div class="container-fluid py-4 px-7">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-lg-flex">
                        <div>
                            <h1 class="text-4xl font-bold">Mahasiswa Yang Sedang Mengambil Tugas Akhir</h1>
                        </div>
                        <div class="ms-auto my-auto mt-lg-0 mt-4">
                            <div class="ms-auto my-auto">
                                <a href="{{'/mahasiswa-add'.'/'.$key}}" class="bg-gradient-to-r from-cyan-500 to-blue-500 border-2 border-solid border-gray-500 hover:bg-blue-400 text-white py-2 px-4 rounded">
                                    <button type="submit" class="btn  btn-md mt-4 mb-4 ">+&nbsp; Tambah Mahasiswa</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <table class="table table-flush dataTable-table m-5 border-2 max-w-100" id="users-list">
                    <thead class="thead-light">
                        <tr class=" p-5 ">
                            <th data-sortable="" style="width: 7.07134%;"><a href="#" class="dataTable-sorter">ID</a></th>
                            <th data-sortable="" style="width: 11.2641%;"><a href="#" class="dataTable-sorter">NAME</a></th>
                            <th data-sortable="" style="width: 19.9625%;"><a href="#" class="dataTable-sorter">EMAIL</a></th>
                            <th data-sortable="" style="width: 20.025%;"><a href="#" class="dataTable-sorter">DOSBING 1</a></th>
                            <th data-sortable="" style="width: 20.025%;"><a href="#" class="dataTable-sorter">DOSBING 2</a></th>
                            <th data-sortable="" style="width: 10.4506%;"><a href="#" class="dataTable-sorter">ACTION</a></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mahasiswas as $mahasiswa)
                        <tr>
                            <td class="text-sm">{{ $mahasiswa->nim }}</td>

                            <td class="text-sm">{{ $mahasiswa->nama }}</td>
                            <td class="text-sm">{{ $mahasiswa->email }}</td>
                            <td class="text-sm">{{ $mahasiswa->dosbing1 }}</td>
                            <td class="text-sm">{{ $mahasiswa->dosbing2 }}</td>
                            <td class="text-sm">
                                <a href="/mahasiswa/{{ $mahasiswa->nim }}" class="mx-3 p-auto" data-bs-toggle="tooltip" data-bs-original-title="Edit user">
                                    <svg width="25px" height="25px" viewBox="-2.4 -2.4 28.80 28.80" fill="none" xmlns="http://www.w3.org/2000/svg" transform="rotate(0)">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="#CCCCCC" stroke-width="0.144"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path d="M16.19 2H7.81C4.17 2 2 4.17 2 7.81V16.18C2 19.83 4.17 22 7.81 22H16.18C19.82 22 21.99 19.83 21.99 16.19V7.81C22 4.17 19.83 2 16.19 2ZM10.95 17.51C10.66 17.8 10.11 18.08 9.71 18.14L7.25 18.49C7.16 18.5 7.07 18.51 6.98 18.51C6.57 18.51 6.19 18.37 5.92 18.1C5.59 17.77 5.45 17.29 5.53 16.76L5.88 14.3C5.94 13.89 6.21 13.35 6.51 13.06L10.97 8.6C11.05 8.81 11.13 9.02 11.24 9.26C11.34 9.47 11.45 9.69 11.57 9.89C11.67 10.06 11.78 10.22 11.87 10.34C11.98 10.51 12.11 10.67 12.19 10.76C12.24 10.83 12.28 10.88 12.3 10.9C12.55 11.2 12.84 11.48 13.09 11.69C13.16 11.76 13.2 11.8 13.22 11.81C13.37 11.93 13.52 12.05 13.65 12.14C13.81 12.26 13.97 12.37 14.14 12.46C14.34 12.58 14.56 12.69 14.78 12.8C15.01 12.9 15.22 12.99 15.43 13.06L10.95 17.51ZM17.37 11.09L16.45 12.02C16.39 12.08 16.31 12.11 16.23 12.11C16.2 12.11 16.16 12.11 16.14 12.1C14.11 11.52 12.49 9.9 11.91 7.87C11.88 7.76 11.91 7.64 11.99 7.57L12.92 6.64C14.44 5.12 15.89 5.15 17.38 6.64C18.14 7.4 18.51 8.13 18.51 8.89C18.5 9.61 18.13 10.33 17.37 11.09Z" fill="#000000"></path>
                                        </g>
                                    </svg>
                                    Edit
                                </a>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <footer class="footer pt-3  ">
        <div class="container-fluid">
            <div class="row align-items-center justify-content-lg-between">
                <div class="col-lg-6 mb-lg-0 mb-4">
                    <div class="copyright text-center text-sm text-muted text-lg-start">
                        ©   <script>
                                                document.write(new Date().getFullYear())
                            </script>
                            made with ❤️ by
                        <a style="color: #252f40;" href="https://www.instagram.com/euisgn" class="font-weight-bold ml-1" target="_blank">Rahman Amarullah</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>

@endsection
