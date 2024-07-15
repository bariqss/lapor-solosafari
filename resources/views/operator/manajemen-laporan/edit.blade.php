@extends('layouts.operator.dashboard')

@section('breadcrumb')
<nav class="py-4 px-4 flex" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
        <li class="inline-flex items-center">
            <a href="#" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
                Dashboard
            </a>
        </li>
        <li>
            <div class="flex items-center">
                <span class="mx-2 text-gray-400">/</span>
                <span class="ms-1 text-sm font-medium text-gray-700 md:ms-2">Update
                    Laporan
                </span>
            </div>
        </li>
    </ol>
</nav>
@endsection

@section('content')
<div class="grid grid-rows-3 grid-flow-col gap-4">
    <div class="flex flex-col row-span-3 mb-6 p-10 rounded-lg shadow-md bg-white">
        <div class="flex justify-center">
            <h2 class="mb-4 text-xl font-bold text-gray-900">Detail Laporan</h2>
        </div>
        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
            <div class="sm:col-span-2">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Judul
                    Laporan</label>
                <input type="text" name="judul" id="name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-purple-600 focus:border-purple-600 block w-full p-2.5"
                    placeholder="Judul Laporan" value="{{ $report->name }}" readonly>
            </div>
            <div class="w-full">
                <label for="brand" class="block mb-2 text-sm font-medium text-gray-900">Tanggal
                    Kejadian</label>
                <div class="relative max-w">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                        </svg>
                    </div>
                    <input datepicker datepicker-buttons datepicker-autoselect-today datepicker-autohide
                        datepicker-orientation="bottom right" datepicker-format="dd/mm/yyyy" type="text" name="tanggal"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-purple-600 focus:border-purple-600 block w-full ps-10 p-2.5"
                        placeholder="Select date" value="{{ $report->date }}" readonly>
                </div>
            </div>
            <div>
                <label for="category" class="block mb-2 text-sm font-medium text-gray-900">Kategori</label>
                <select id="category" name="kategori"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5">
                    <option selected>Pilih Kategori</option>
                    @foreach ($categories as $item)
                    <option value="{{ $item->id }}" @if ($item->id == $report->id_category) selected @endif>
                        {{ $item->nama_kategori }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="level" class="block mb-2 text-sm font-medium text-gray-900">Level
                    Kejadian</label>
                <div class="flex items-center">
                    @if ($report->level == 1)
                    <span
                        class="bg-green-100 text-green-800 text-sm font-medium me-2 px-3 py-2 rounded-full">Rendah</span>
                    @elseif($report->level == 2)
                    <span
                        class="bg-yellow-100 text-yellow-800 text-sm font-medium me-2 px-3 py-2 rounded-full">Sedang</span>
                    @else
                    <span class="bg-red-100 text-red-800 text-sm font-medium me-2 px-3 py-2 rounded-full">Tinggi</span>
                    @endif
                </div>
                {{-- <select id="level" name="level"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5">
                    <option selected="">Pilih Level</option>
                    <option value="{{ $report->level }}" selected>
                        @if ($report->level == 1)
                        <span
                            class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-2 rounded-full">Rendah</span>
                        @elseif($report->level == 2)
                        <span
                            class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-2 rounded-full">Sedang</span>
                        @else
                        <span
                            class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-2 rounded-full">Tinggi</span>
                        @endif
                    </option>
                </select> --}}
            </div>
            <div class="sm:col-span-2">
                <label for="lokasi" class="block mb-2 text-sm font-medium text-gray-900">Lokasi
                </label>
                <p class="mb-2"> {{$location->latitude}}, {{$location->longitude}}</p>
                <div id="map" style="height: 280px; max-width: 100%;"></div>
            </div>
            <div class="flex flex-col justify-center w-full">
                <label for="category" class="block mb-2 text-sm font-medium text-gray-900">
                    Dokumentasi Laporan
                </label>
                <div>
                    @foreach ($report->decumentation_image as $image)
                    <img class="hover:scale-150" src="{{ url('/assets/images/' . $image->name_image) }}" alt="image"
                        @endforeach style="max-width: 40%; width: 500px">
                </div>
            </div>
            <div class="sm:col-span-2">
                <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Deskripsi</label>
                <textarea id="description" name="deskripsi" rows="8" readonly
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-purple-500 focus:border-purple-500"> {{ $report->description }} </textarea>
            </div>
        </div>
    </div>

    <div class="w-80 flex flex-col p-6 col-span-2 rounded-lg shadow-md bg-white">
        <h1 class="text-lg font-bold">Tindak Lanjut Laporan</h1>
        <div class="mt-4">
            <form action="{{ route('operator.manajemen-laporan.update', $report->id) }}" method="POST"
                @csrf
                enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="validasi" class="block mb-2 text-sm font-medium text-gray-900">
                        Status Laporan
                    </label>
                    <select id="status"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option selected>Pilih Status Laporan</option>
                        <option value="V">Valid</option>
                        <option value="TV">Tidak Valid</option>
                    </select>
                </div>
                <div>
                    <label for="level" class="block mb-2 text-sm font-medium text-gray-900">Level
                        Kejadian</label>
                    <select id="level" name="level"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5">
                        <option selected="">Pilih Level</option>
                        <option value="1">Rendah</option>
                        <option value="2">Sedang</option>
                        <option value="3">Tinggi</option>
                    </select>
                </div>
                <div>
                    <label for="validasi" class="block mb-2 text-sm font-medium text-gray-900">
                        Status Penanganan
                    </label>
                    <select id="penaganan"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option selected>Pilih Status Penanganan</option>
                        <option value="1">Belum Ditangani</option>
                        <option value="2">Proses Penanganan</option>
                        <option value="3">Selesai</option>
                    </select>
                </div>
                <div class="flex items-center justify-end gap-6">
                    <button type="submit"
                        class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-purple-700 rounded-lg focus:ring-4 focus:ring-purple-200-200 hover:bg-purple-800">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="col-span-2 mb-6 p-6 rounded-lg shadow-md bg-white">
        <div class="mt-4">
            <h1 class="text-lg font-bold">Pelapor</h1>
            <div class="flex items-center mt-4">
                <svg class="w-4 h-4" data-slot="icon" fill="none" stroke-width="1.5" stroke="currentColor"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z">
                    </path>
                </svg>
                <h1>Ahmad Azi</h1>
            </div>
            <div class="flex items-center mt-4">
                <svg class="w-4 h-4" data-slot="icon" fill="none" stroke-width="1.5" stroke="currentColor"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75">
                    </path>
                </svg>
                <h1>ahmadazi@gmail.com</h1>
            </div>
        </div>
    </div>
    @endsection

    @push('script')
    <script>
        var layer = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
        var map = L.map('map', {
            center: ['{{ $location->latitude }}', '{{ $location->longitude }}'],
            zoom: 15,
            scrollWheelZoom: false
        });

        map.addLayer(layer);
        var customMarker = L.icon({
            iconUrl: 'https://static.vecteezy.com/system/resources/thumbnails/016/314/482/small/map-pointer-art-icons-and-graphics-free-png.png',
            iconSize: [40, 40],
        });

       var marker = L.marker(['{{ $location->latitude }}', '{{ $location->longitude }}']).addTo(map);
    </script>
    @endpush
