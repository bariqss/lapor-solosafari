@extends('layouts.operator.dashboard')

@section('title', 'Detail Laporan')

@section('breadcrumb')
<nav class="py-4 px-4 flex" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
        <li class="inline-flex items-center">
            <a href="{{ route('operator.manajemen-laporan.index') }}"
                class="inline-flex items-center text-sm font-medium text-gray-400 hover:text-blue-600">
                Operator
            </a>
        </li>
        <li>
            <div class="flex items-center">
                <span class="mx-2 text-gray-400">/</span>
                <span class="ms-1 text-sm font-medium text-gray-700 md:ms-2">
                    Detail Laporan
                </span>
            </div>
        </li>
    </ol>
</nav>
@endsection

@section('content')
<div class="grid grid-flow-row-dense grid-cols-3">
    <div class="col-span-2 mb-6 p-10 rounded-lg shadow-md bg-white">
        <div class="flex justify-center">
            <h2 class="mb-4 text-xl font-bold text-gray-900">Detail Laporan</h2>
        </div>
        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
            <div class="sm:col-span-2">
                <label for="name" class="block mb-2 text-sm font-semibold text-gray-900">Judul
                    Laporan
                </label>
                <p>{{ $report->name }}</p>
            </div>
            <div>
                <label for="date" class="block mb-2 text-sm font-semibold text-gray-900">Tanggal Laporan</label>
                <p>{{$report->date}}</p>
                {{-- <p>{{\Carbon\Carbon::parse($report->date)->format(d-m-Y) }}</p> --}}
            </div>
            <div>
                <label for="category" class="block mb-2 text-sm font-semibold text-gray-900">Kategori</label>
                <p>{{ $report->category->nama_kategori }}</p>
            </div>
            <div class="sm:col-span-2">
                <label for="location" class="block mb-2 text-sm font-semibold text-gray-900">Lokasi
                    Kejadian</label>
                <div class="p-4 bg-white rounded-md shadow-md">
                    <p class="mb-2"> Latitude : {{$location->latitude}} | Longitude : {{$location->longitude}}</p>
                    <div id="map" style="height: 280px; max-width: 100%;"></div>
                </div>
            </div>
            <div class="mb-4">
                <h2 class="font-semibold mb-2">Dokumentasi Kejadian</h2>
                @foreach ($report->decumentation_image as $image)
                <img src="{{ url('/assets/images/' . $image->name_image) }}" alt="image" @endforeach
                    style="max-width: 100%; width: 500px">
            </div>
            <div class="sm:col-span-2">
                <label for="description" class="block mb-2 text-sm font-semibold text-gray-900">Deskripsi
                    Kejadian</label>
                <p>
                    {{$report->description}}
                </p>
            </div>
        </div>
    </div>

    <div class="ml-4 ">
        <div class="flex flex-col h-fit mb-4 p-6 rounded-lg shadow-md bg-white">
            <h1 class="text-lg font-bold">Tindak Lanjut Laporan</h1>
            <div class="mt-4">
                <form action="{{ route('operator.manajemen-laporan.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="validasi" class="block mb-2 text-sm font-semibold text-gray-900">
                            Status Laporan
                        </label>
                        <select id="status"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5">
                            <option selected>Pilih Status Laporan</option>
                            <option value="V">Valid</option>
                            <option value="TV">Tidak Valid</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="level" class="block mb-2 text-sm font-semibold text-gray-900">Level
                            Kejadian</label>
                        <select id="level" name="level"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5">
                            <option selected="">Pilih Level</option>
                            <option value="1">Rendah</option>
                            <option value="2">Sedang</option>
                            <option value="3">Tinggi</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="validasi" class="block mb-2 text-sm font-semibold text-gray-900">
                            Status Penanganan
                        </label>
                        <select id="penaganan"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5">
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

        <div class="flex flex-col h-fit p-6 rounded-lg shadow-md bg-white">
            <h1 class="text-lg font-bold">Pelapor Kejadian</h1>
            <div class="mt-4">
                <div class="flex items-center mb-3">
                    <svg class="w-5 h-5" data-slot="icon" fill="none" stroke-width="2" stroke="currentColor"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z">
                        </path>
                    </svg>
                    <h3 class="ml-2">{{ $report->user->name }}</h3>
                </div>
                <div class="flex items-center">
                    <svg class="w-5 h-5" data-slot="icon" fill="none" stroke-width="2" stroke="currentColor"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75">
                        </path>
                    </svg>
                    <h3 class="ml-2">{{ $report->user->email }}</h3>
                </div>
            </div>
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
