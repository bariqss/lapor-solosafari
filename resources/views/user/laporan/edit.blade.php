@extends('layouts.user.dashboard')
@section('title', 'Laporkan-Kejadian')

@section('content')

<div class="flex flex-col mt-6 mb-6 p-10 rounded-lg shadow-md">
    <div class="flex justify-center">
        <h2 class="mb-4 text-xl font-bold text-gray-900">Laporkan Kejadian</h2>
    </div>
    <form action="{{ route('user.laporan.update', $report->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
            <div class="sm:col-span-2">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Judul
                    Laporan</label>
                <input type="text" name="judul" id="name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5"
                    placeholder="Judul Laporan" value="{{ $report->name }}" required="">
            </div>
            <div class="w-full">
                <label for="brand" class="block mb-2 text-sm font-medium text-gray-900">Tanggal
                    Kejadian</label>
                <div class="relative max-w">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                        </svg>
                    </div>
                    <input datepicker datepicker-format="yyyy-mm-dd" datepicker-buttons readonly
                        datepicker-autoselect-today datepicker-orientation="bottom right" type="text" name="tanggal"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Select date" value="{{ $report->date }}" readonly>
                </div>
                {{-- <div class="relative max-w">
                    <input type="date" name="tanggal" id="tanggal"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5">
                </div> --}}
            </div>
            <div>
                <label for="category" class="block mb-2 text-sm font-medium text-gray-900">Kategori</label>
                <select id="category" name="kategori"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5">
                    <option selected>Pilih Kategori</option>
                    @foreach ($categories as $item)
                    <option value="{{ $item->id }}" @if ($item->id == $report->id_category) selected @endif>
                        {{ $item->nama_kategori }}
                    </option>
                    @endforeach
                </select>
            </div>
            {{-- <div class="w-full">
                <label for="lokasi" class="block mb-2 text-sm font-medium text-gray-900">
                    Lokasi
                </label>
                <button type="button" id="getLocationBtn" onclick="getLocation()"
                    class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Get
                    Location</button>
            </div> --}}
            <div class="w-full">
                <label for="nama_lokasi" class="block mb-2 text-sm font-medium text-gray-900">Kategori</label>
                <select id="nama_lokasi" name="nama_lokasi"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5">
                    <option selected>Pilih Lokasi</option>
                    @foreach ($locations as $lokasi)
                    <option value="{{ $lokasi->id }}" @if ($lokasi->id == $report->id_report_location) selected @endif>
                        {{ $lokasi->nama_lokasi }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div></div>
            <div>
                <label for="latitude" class="block mb-2 text-sm font-medium text-gray-900">
                    Latitude</label>
                <input type="text" name="latitude" id="latitude"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5"
                    placeholder="Latitude" value="{{ $colocation->latitude }}" readonly>
            </div>
            <div>
                <label for="longitude" class="block mb-2 text-sm font-medium text-gray-900">
                    Longitude</label>
                <input type="text" name="longitude" id="longitude"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5"
                    placeholder="Longitude" value="{{ $colocation->longitude }}" readonly>
            </div>

            <div id="image-upload-container" class="flex flex-col justify-center w-full">
                <label for="category" class="block mb-2 text-sm font-medium text-gray-900">Upload
                    Dokumentasi</label>
                <input
                    class="block w-full mb-5 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                    id="gambar" accept="image/*" name="gambar" type="file">
                <img style="max-width: 50%; width: 300px" src="{{ asset('assets/images/' . $report->gambar) }}"
                    alt="image">
            </div>

            <div class="sm:col-span-2">
                <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Description</label>
                <textarea id="description" name="deskripsi" rows="8"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-green-500 focus:border-green-500"
                    placeholder="Your description here">{{ $report->description }}"</textarea>
            </div>
        </div>
        <div class="flex items-center justify-end">
            <button type="submit"
                class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-green-700 rounded-lg focus:ring-4 focus:ring-green-200 hover:bg-green-800">
                Submit
            </button>
        </div>

        <div id="alert" tabindex="-1"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <div class="flex justify-center items-center">
                    <div class="bg-white rounded-lg shadow-lg p-6 max-w-sm w-full text-center">
                        <div class="bg-green-500 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-white" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                        <h2 class="text-2xl font-bold mb-2">
                            {{\Session::get('success') }}
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@push('script')
<script>
    // const x = document.getElementById("latitude");
    // const y = document.getElementById("longitude");

    // function getLocation() {
    //     if (navigator.geolocation) {
    //         navigator.geolocation.getCurrentPosition(showPosition);
    //     } else {
    //         x.innerHTML = "Geolocation is not supported by this browser.";
    //     }
    // }

    // function showPosition(position) {
    //     x.value = position.coords.latitude;
    //     y.value = position.coords.longitude;
    // }

    $( document ).ready(function() {
        // $('#alert').modal('show')
        @if (\Session::has('success'))
        $('#alert').removeClass('hidden');
        @endif
        // alert( "alert!" );
    });
</script>

{{-- <script>
    const dateInput = document.getElementById('datepicker-actions');
    const today = new Date().toISOString().split('T')[0];;
    dateInput.value = today;
</script> --}}
@endpush
