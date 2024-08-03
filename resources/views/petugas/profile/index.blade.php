@extends('layouts.petugas.dashboard')
@section('title', 'Profile')

@section('content')
<div class=" w-full p-4 mt-4 mb-6 overflow-hidden bg-white rounded-lg shadow-lg">
    <div class="overflow-x-auto p-4">
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <a href="">
                    <svg class="w-5 h-5" data-slot="icon" fill="none" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18"></path>
                </svg>
            </a>
            <h1 class="font-semibold text-lg ml-2 ">Profile</h1>
            </div>
            <div class=" flex items-center">
                <a href="">
                    <svg class="w-5 h-5" data-slot="icon" fill="none" stroke-width="2" stroke="currentColor"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125">
                        </path>
                    </svg>
                </a>
            </div>
        </div>
        <div class="flex flex-col  items-center md:flex-row md:items-start ">
            <div class="mb-4 md:mb-0">
                <img class="rounded-full w-40 h-40 max-w-full"
                    src="{{ asset('assets/img/create-account-office.jpeg') }}" alt="image profile">
            </div>
            <div class="flex flex-col p-8">
                <div class="mb-2">
                    <h1 class="font-semibold">Nama</h1>
                    {{ Auth::user()->name }}
                </div>
                <div class="mb-2">
                    <h1 class="font-semibold">Email</h1>
                    {{ Auth::user()->email }}
                </div>
                <div class="mb-2">
                    <h1 class="font-semibold">No. Telepon</h1>
                    {{ Auth::user()->telepon }}
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
