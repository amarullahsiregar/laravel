@extends('layouts.app')
@section('content')
<div class="fixed inset-0 flex items-center justify-center z-50 backdrop-blur confirm-dialog ">
    <div class="">

        <!-- The Card-->
        <div class="bg-white rounded-lg md:max-w-md md:mx-auto p-4 fixed inset-x-0 bottom-0 z-50 mb-4 mx-4 md:relative shadow-lg">
            <div class="md:flex items-center">
                <div class="rounded-full border-gray-300 flex items-center justify-center w-16 h-16 flex-shrink-0 mx-auto">
                    <svg width="60" height="60" viewBox="0 0 67 67" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M22.5081 35.1286L28.8183 41.4388L44.5938 25.6633" stroke="#1C274C" stroke-width="3.75" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M17.7755 6.22096C22.4162 3.53644 27.8043 2 33.551 2C50.976 2 65.102 16.1259 65.102 33.551C65.102 50.976 50.976 65.102 33.551 65.102C16.1259 65.102 2 50.976 2 33.551C2 27.8043 3.53644 22.4162 6.22096 17.7755" stroke="#1C274C" stroke-width="3.75" stroke-linecap="round"/>
                    </svg>
                </div>
                <div class="mt-4 md:mt-0 md:ml-6 text-center md:text-left">
                <p class="font-bold">{{ $judul_dialog ?? '' }}</p>
                <p class="text-base font-bold text-gray-700 mt-1">Anda antrian ke : {{ $urutan ?? '' }}</p>
                <p class="text-base font-bold text-gray-700 mt-1">Dengan Dosen</p>
                <p class="text-base font-bold text-gray-700 mt-1">{{ $dosen->nama ?? '' }}</p>
                </p>
                </div>
            </div>
            <div class="text-center md:text-right mt-4 md:flex md:justify-end">
                <!-- <button id="confirm-delete-btn" class="block w-full md:inline-block md:w-auto px-4 py-3 md:py-2 bg-red-200 text-red-700 rounded-lg font-semibold text-sm md:ml-2 md:order-2">
                    Delete
                </button> -->
                <button onclick="history.back()" id="confirm-cancel-btn" class="block w-full md:inline-block md:w-auto px-4 py-3 md:py-2 bg-gray-200 rounded-lg font-semibold text-sm mt-4 md:mt-0 md:order-1">
                    Back
                </button>
            </div>
        </div>
        <!-- The Card-->

    </div>
</div>
@endsection
