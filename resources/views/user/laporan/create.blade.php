@extends('layouts.user.dashboard')
@section('title', 'Laporkan-Kejadian')

@section('content')

<div class="flex flex-col mt-6 mb-6 p-10 rounded-lg shadow-md">
    <div class="flex justify-center">
        <h2 class="mb-4 text-xl font-bold text-gray-900">Laporkan Kejadian</h2>
    </div>
    <form action="{{ route('user.laporan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
            <div class="sm:col-span-2">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Judul
                    Laporan</label>
                <input type="text" name="judul" id="name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5"
                    placeholder="Judul Laporan" required="">
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
                        datepicker-orientation="bottom right" datepicker-format="dd/mm/yyyy" type="text" id="tanggal"
                        name="tanggal"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full ps-10 p-2.5"
                        placeholder="Select date">
                </div>
            </div>
            <div>
                <label for="category" class="block mb-2 text-sm font-medium text-gray-900">Kategori</label>
                <select id="category" name="kategori"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5">
                    <option selected="">Pilih Kategori</option>
                    @foreach ($categories as $item)
                    <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                    @endforeach
                </select>
            </div>
            <div class="sm:col-span-2">
                <label for="lokasi" class="block mb-2 text-sm font-medium text-gray-900">
                    Lokasi
                </label>
                <button type="button" id="getLocationBtn" onclick="getLocation()"
                    class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Get
                    Location</button>
            </div>
            <div>
                <label for="latitude" class="block mb-2 text-sm font-medium text-gray-900">
                    Latitude</label>
                <input type="text" name="latitude" id="latitude"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5"
                    placeholder="Latitude" value="" required="">
            </div>
            <div>
                <label for="longitude" class="block mb-2 text-sm font-medium text-gray-900">
                    Longitude</label>
                <input type="text" name="longitude" id="longitude"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5"
                    placeholder="longitude" value="" required="">
            </div>

            <div id="image-upload-container" class="flex flex-col justify-center w-full">
                <label for="category" class="block mb-2 text-sm font-medium text-gray-900">Upload
                    Dokumentasi</label>
                <label for="dropzone-file"
                    class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 ">
                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                        <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                        </svg>
                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to
                                upload</span> or
                            drag and drop</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                    </div>
                    <input id="dropzone-file" type="file" class="hidden" accept="image/*" />
                </label>
            </div>
            <div class="w-full mb-4">
                <img id="uploaded-image" class="hidden w-full h-64 object-cover rounded-lg" />
            </div>
            <div class="sm:col-span-2">
                <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Description</label>
                <textarea id="description" name="deskripsi" rows="8"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-green-500 focus:border-green-500"
                    placeholder="Your description here"></textarea>
            </div>
        </div>
        <div class="flex items-center justify-end">
            <button type="submit"
                class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-green-700 rounded-lg focus:ring-4 focus:ring-green-200 hover:bg-green-800">
                Submit
            </button>
        </div>
    </form>
</div>

<script>
    const x = document.getElementById("latitude");
    const y = document.getElementById("longitude");

function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else {
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}

function showPosition(position) {
  x.value = position.coords.latitude;
  y.value = position.coords.longitude;
}
</script>

<script>
    document.getElementById('dropzone-file').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const container = document.getElementById('image-upload-container');
                    container.innerHTML = `<img src="${e.target.result}" class="w-full h-64 object-cover rounded-lg" />`;
                }
                reader.readAsDataURL(file);
            }
        });

    const dateInput = document.getElementById('tanggal');
    const today = new Date().toISOString().split('T')[20];
    dateInput.value = today;
</script>
@endsection