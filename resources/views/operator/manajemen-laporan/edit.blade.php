@extends('layouts.operator.dashboard')

@section('content')

<div class="grid grid-cols-3 gap-4">
    <div class=" col-span-2 flex flex-col mt-6 mb-6 p-10 rounded-lg shadow-md bg-white dark:bg-gray-800">
        <div class="flex justify-center">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Detail Laporkan</h2>
        </div>
        <form action="{{ route('manajemen-laporan.update', $report->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                <div class="sm:col-span-2">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul
                        Laporan</label>
                    <input type="text" name="judul" id="name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-purple-600 focus:border-purple-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-500 dark:focus:border-purple-500"
                        placeholder="Judul Laporan" value="{{ $report->name }}" readonly>
                </div>
                <div class="w-full">
                    <label for="brand" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                        Kejadian</label>
                    <div class="relative max-w">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                            </svg>
                        </div>
                        <input datepicker datepicker-buttons datepicker-autoselect-today datepicker-autohide
                            datepicker-orientation="bottom right" datepicker-format="dd/mm/yyyy" type="text"
                            name="tanggal"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-purple-600 focus:border-purple-600 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-500 dark:focus:border-purple-500"
                            placeholder="Select date" value="{{ $report->date }}" readonly>
                    </div>
                </div>
                <div>
                    <label for="category"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
                    <select id="category" name="kategori"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-500 dark:focus:border-purple-500">
                        <option selected>Pilih Kategori</option>
                        @foreach ($categories as $item)
                        <option value="{{ $item->id }}" @if ($item->id == $report->id_category) selected @endif>
                            {{ $item->nama_kategori }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="level" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Level
                        Kejadian</label>
                    <div class="flex items-center">
                        @if ($report->level == 1)
                        <span
                            class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-2 rounded-full dark:bg-green-900 dark:text-green-300">Rendah</span>
                        @elseif($report->level == 2)
                        <span
                            class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-2 rounded-full dark:bg-yellow-900 dark:text-yellow-300">Sedang</span>
                        @else
                        <span
                            class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-2 rounded-full dark:bg-red-900 dark:text-red-300">Tinggi</span>
                        @endif
                    </div>
                    {{-- <select id="level" name="level"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-500 dark:focus:border-purple-500">
                        <option selected="">Pilih Level</option>
                        <option value="{{ $report->level }}" selected>
                            @if ($report->level == 1)
                            <span
                                class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-2 rounded-full dark:bg-green-900 dark:text-green-300">Rendah</span>
                            @elseif($report->level == 2)
                            <span
                                class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-2 rounded-full dark:bg-yellow-900 dark:text-yellow-300">Sedang</span>
                            @else
                            <span
                                class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-2 rounded-full dark:bg-red-900 dark:text-red-300">Tinggi</span>
                            @endif
                        </option>
                    </select> --}}
                </div>
                <div>
                    <label for="lokasi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lokasi
                    </label>
                    <select id="lokasi" name="lokasi"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-500 dark:focus:border-purple-500">
                        <option selected="">Pilih Lokasi</option>
                        <option value="1">Toilet</option>
                        <option value="2">Fasilitas Solo Safari</option>
                    </select>
                </div>
                <div class="flex flex-col justify-center w-full">
                    <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Dokumentasi Laporan
                    </label>
                    <div>
                        @foreach ($report->decumentation_image as $image)
                        <img src="{{ url('/assets/images/' . $image->name_image) }}" alt="image" @endforeach
                            style="max-width: 40%; width: 500px">
                    </div>
                </div>
                <div class="sm:col-span-2">
                    <label for="description"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
                    <textarea id="description" name="deskripsi" rows="8" readonly
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-purple-500 focus:border-purple-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-500 dark:focus:border-purple-500"> {{ $report->description }} </textarea>
                </div>
            </div>
            <div class="flex items-center justify-end">
                <button type="submit"
                    class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-purple-700 rounded-lg focus:ring-4 focus:ring-purple-200 dark:focus:ring-purple-600 hover:bg-purple-500">
                    Submit
                </button>
            </div>
        </form>
    </div>

    <div class="h-80 mt-6 mb-6 p-10 rounded-lg shadow-md bg-white dark:bg-gray-800">01</div>
</div>
@endsection