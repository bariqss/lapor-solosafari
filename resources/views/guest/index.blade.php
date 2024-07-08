@extends('layouts.guest.dashboard')

@section('content')
<div class="flex flex-col mt-6 mb-6 shadow-md">
    <div
        class="bg-center bg-no-repeat bg-[url('/resources/img/bg-solo-safari.jpg')] rounded-lg bg-gray-400 bg-blend-multiply">
        <div class="px-4 max-w-screen-xl text-center py-24 lg:py-30">
            <h1 class="mb-4 text-3xl font-extrabold tracking-tight leading-none text-white">
                Laporkan Kejadian
            </h1>
            <p class="mb-4 text-lg text-white">Silahkan login terlebih dahulu untuk melaporkan kejadian</p>
            <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0">
                <a href="#"
                    class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-green-600 hover:bg-green-800 focus:ring-4 focus:ring-green-200">
                    Login
                </a>
            </div>
        </div>
    </div>
</div>

@include('layouts.user.table')

@endsection