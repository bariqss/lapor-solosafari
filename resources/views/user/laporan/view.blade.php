@extends('layouts.user.dashboard')

@section('breadcrumb')
<nav class="py-4 px-4 flex" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
        <li class="inline-flex items-center">
            <a href="#"
                class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                Dashboard
            </a>
        </li>
        <li>
            <div class="flex items-center">
                <span class="mx-2 text-gray-400">/</span>
                <span
                    class="ms-1 text-sm font-medium text-gray-700 md:ms-2 dark:text-gray-400 dark:hover:text-white">Detail
                    Laporan
                </span>
            </div>
        </li>
    </ol>
</nav>
@endsection

@section('content')
<div class="flex flex-col mt-6 mb-6 p-10 rounded-lg shadow-md  bg-white dark:bg-gray-800">
    <div class="flex justify-center">
        <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Detail Laporan</h2>
    </div>
    <div class="container-fluid py-4 px-3">
        <div class="row">
            <div class="mb-4">
                <h2 class="font-semibold">Judul Laporan</h2>
                <p>{{ $report->name }}</p>
            </div>
            <div class="mb-4">
                <h2 class="font-semibold">Tanggal Kejadian</h2>
                <p>{{$report->date}}</p>
            </div>
            <div class="mb-4">
                <h2 class="font-semibold">Kategori</h2>
                <p>{{$report->category}}</p>
            </div>
            <div class="mb-4">
                <h2 class="font-semibold">Level Kejadian</h2>
                @if ($report->level == 1)
                <span
                    class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">Rendah</span>
                @elseif($report->level == 2)
                <span
                    class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-yellow-900 dark:text-yellow-300">Sedang</span>
                @else
                <span
                    class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300">Tinggi</span>
                @endif
            </div>
            <div class="mb-4">
                <h2 class="font-semibold mb-2">Dokumentasi Kejadian</h2>
                @foreach ($report->decumentation_image as $image)
                <img src="{{ url('/assets/images/' . $image->name_image) }}" alt="image" @endforeach
                    style="max-width: 100%; width: 500px">
            </div>
            <div class="mb-4">
                <h2 class="font-semibold">Deskripsi</h2>
                <p>
                    {{$report->description}}
                </p>
            </div>
        </div>
    </div>
</div>
@endsection