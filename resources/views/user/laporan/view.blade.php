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
<div class="flex flex-col mt-6 mb-6 p-10 rounded-lg shadow-md dark:bg-gray-800">
    <div class="flex justify-center">
        <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Detail Laporan</h2>
    </div>
    <div class="container-fluid py-4 px-3">
        <div class="row">
            <div class="mb-4">
                <h2 class="font-semibold">Judul Laporan</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit</p>
            </div>
            <div class="mb-4">
                <h2 class="font-semibold">Tanggal Kejadian</h2>
                <p>24 Januari 2024</p>
            </div>
            <div class="mb-4">
                <h2 class="font-semibold">Kategori</h2>
                <p>Fasilitas Solo Safari</p>
            </div>
            <div class="mb-4">
                <h2 class="font-semibold">Level Kejadian</h2>
                <p>Sedang</p>
            </div>
            <div class="mb-4">
                <img src="{{ asset('assets/img/login-office.jpeg')}}" alt="image" style="max-width: 100%; width: 500px">
            </div>
            <div class="mb-4">
                <h2 class="font-semibold">Deskripsi</h2>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Culpa, cumque corrupti. Voluptatibus nobis
                    enim sint earum explicabo quibusdam unde nemo porro reprehenderit ea illo est ratione velit fugit
                    nulla eaque, hic labore. Accusantium, reprehenderit sint officia vero voluptatum reiciendis.
                    Molestias a aliquam unde, modi impedit repudiandae consequatur fuga distinctio quaerat.</p>
            </div>
        </div>
    </div>
</div>
</div>
@endsection