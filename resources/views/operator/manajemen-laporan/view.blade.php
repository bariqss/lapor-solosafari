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
<div class="mb-4 border-b border-gray-200 dark:border-gray-700">
    <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-styled-tab"
        data-tabs-toggle="#default-styled-tab-content"
        data-tabs-active-classes="text-blue-600 hover:text-blue-600 dark:text-blue-500 dark:hover:text-blue-500 border-blue-600 dark:border-blue-500"
        data-tabs-inactive-classes="dark:border-transparent text-gray-500 hover:text-gray-600 dark:text-gray-400 border-gray-100 hover:border-gray-300 dark:border-gray-700 dark:hover:text-gray-300"
        role="tablist">
        <li class="me-2" role="presentation">
            <button class="inline-block p-4 border-b-2 rounded-t-lg" id="profile-styled-tab"
                data-tabs-target="#styled-profile" type="button" role="tab" aria-controls="profile"
                aria-selected="false">Laporan Kejadian</button>
        </li>
        <li class="me-2" role="presentation">
            <button
                class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                id="dashboard-styled-tab" data-tabs-target="#styled-dashboard" type="button" role="tab"
                aria-controls="dashboard" aria-selected="false">Laporan Penanganan</button>
        </li>
    </ul>
</div>
<div id="default-styled-tab-content">
    <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="styled-profile" role="tabpanel"
        aria-labelledby="profile-tab">
        <div class="grid grid-flow-row-dense grid-cols-3">
            <div class="col-span-2 mb-6 p-10 rounded-lg shadow-md bg-white">
                <div class="flex justify-center">
                    <h2 class="mb-4 text-xl font-bold text-gray-900">Detail Laporan Kejadian</h2>
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
                        <p>{{ \Carbon\Carbon::parse($report->date)->translatedFormat('d F Y') }}</p>
                    </div>
                    <div>
                        <label for="category" class="block mb-2 text-sm font-semibold text-gray-900">Kategori</label>
                        <p>{{ $report->category->nama_kategori }}</p>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="location" class="block mb-2 text-sm font-semibold text-gray-900">Lokasi
                            Kejadian</label>
                        <div class="p-4 bg-white rounded-md shadow-md">
                            <p class="mb-2"> Latitude : {{$location->latitude}} | Longitude : {{$location->longitude}}
                            </p>
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
                        <div class="mb-4">
                            <label for="validasi" class="block mb-2 text-sm font-medium text-gray-900">
                                Status Laporan
                            </label>
                            @if ($report->validasi == 1)
                            <span
                                class="bg-green-100 text-green-800 text-md font-medium me-2 px-4 py-0.5 rounded-md">Laporan
                                Valid</span>
                            @else
                            <span class="bg-red-100 text-red-800 text-md font-medium me-2 px-4 py-0.5 rounded-md">Tidak
                                Valid</span>
                            @endif
                        </div>
                        <div class="mb-4">
                            <label for="validasi" class="block mb-2 text-sm font-medium text-gray-900">
                                Level Kejadian
                            </label>
                            @if ($report->level == null)
                            <span
                                class="bg-gray-100 text-gray-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded-full">-</span>
                            @elseif ($report->level == 1)
                            <span
                                class="bg-green-100 text-green-800 text-md font-medium me-2 px-4 py-0.5 rounded-full">Rendah</span>
                            @elseif($report->level == 2)
                            <span
                                class="bg-yellow-100 text-yellow-800 text-md font-medium me-2 px-4 py-0.5 rounded-full">Sedang</span>
                            @else
                            <span
                                class="bg-red-100 text-red-800 text-md font-medium me-2 px-4 py-0.5 rounded-full">Tinggi</span>
                            @endif
                        </div>
                        <div class="mb-4">
                            <label for="validasi" class="block mb-2 text-sm font-medium text-gray-900">
                                Status Penanganan
                            </label>
                            @if ($report->status == null)
                            <span
                                class="bg-gray-100 text-gray-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded-full">-</span>
                            @elseif ($report->status == 1)
                            <span class="bg-red-100 text-red-800 text-md font-medium me-2 px-4 py-0.5 rounded-md">Belum
                                Ditangani</span>
                            @elseif($report->status == 2)
                            <span
                                class="bg-yellow-50 text-yellow-800 border text-md font-medium me-2 px-4 py-0.5 rounded-md">Proses
                                Penanganan</span>
                            @else
                            <span
                                class="bg-green-100 text-green-800 text-md font-medium me-2 px-4 py-0.5 rounded-md">Selesai</span>
                            @endif
                        </div>
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
    </div>

    <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="styled-dashboard" role="tabpanel"
        aria-labelledby="dashboard-tab">

        <div class="grid grid-flow-row-dense grid-cols-3">
            <div class="col-span-2 mb-6 p-10 rounded-lg shadow-md bg-white">
                <div class="flex justify-center">
                    <h2 class="mb-4 text-xl font-bold text-gray-900">Detail Laporan Penanganan</h2>
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
                        <p>{{ \Carbon\Carbon::parse($report->date)->translatedFormat('d F Y') }}</p>
                    </div>
                    <div class="mb-4 sm:col-span-2">
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
                    <div class="mt-4">
                        <div class="mb-4">
                            <label for="validasi" class="block mb-2 text-sm font-medium text-gray-900">
                                Status Laporan
                            </label>
                            @if ($report->validasi == 1)
                            <span
                                class="bg-green-100 text-green-800 text-md font-medium me-2 px-4 py-0.5 rounded-md">Laporan
                                Valid</span>
                            @else
                            <span class="bg-red-100 text-red-800 text-md font-medium me-2 px-4 py-0.5 rounded-md">Tidak
                                Valid</span>
                            @endif
                        </div>
                        <div class="mb-4">
                            <label for="validasi" class="block mb-2 text-sm font-medium text-gray-900">
                                Level Kejadian
                            </label>
                            @if ($report->level == null)
                            <span
                                class="bg-gray-100 text-gray-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded-full">-</span>
                            @elseif ($report->level == 1)
                            <span
                                class="bg-green-100 text-green-800 text-md font-medium me-2 px-4 py-0.5 rounded-full">Rendah</span>
                            @elseif($report->level == 2)
                            <span
                                class="bg-yellow-100 text-yellow-800 text-md font-medium me-2 px-4 py-0.5 rounded-full">Sedang</span>
                            @else
                            <span
                                class="bg-red-100 text-red-800 text-md font-medium me-2 px-4 py-0.5 rounded-full">Tinggi</span>
                            @endif
                        </div>
                        <div class="mb-4">
                            <label for="validasi" class="block mb-2 text-sm font-medium text-gray-900">
                                Status Penanganan
                            </label>
                            @if ($report->status == null)
                            <span
                                class="bg-gray-100 text-gray-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded-full">-</span>
                            @elseif ($report->status == 1)
                            <span class="bg-red-100 text-red-800 text-md font-medium me-2 px-4 py-0.5 rounded-md">Belum
                                Ditangani</span>
                            @elseif($report->status == 2)
                            <span
                                class="bg-yellow-50 text-yellow-800 border text-md font-medium me-2 px-4 py-0.5 rounded-md">Proses
                                Penanganan</span>
                            @else
                            <span
                                class="bg-green-100 text-green-800 text-md font-medium me-2 px-4 py-0.5 rounded-md">Selesai</span>
                            @endif
                        </div>
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