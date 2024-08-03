@extends('layouts.petugas.dashboard')
@section('title', 'Laporkan Penanganan')

<style>
    .hidden {
        display: none;
    }
</style>

@section('content')

<div class="flex flex-col mt-6 mb-6 p-10 rounded-lg shadow-md">
    <div class="flex justify-center">
        <h2 class="mb-4 text-xl font-bold text-gray-900">Laporkan Penanganan</h2>
    </div>
    <form action="{{ route('petugas.laporan.store', $report->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="flex flex-col">
            <div class="w-full mb-4">
                <input type="hidden" name="id_report" value="{{ $report->id }}">
                <label for="brand" class="block mb-2 text-sm font-medium text-gray-900">Tanggal
                    Penanganan</label>
                <div class="relative max-w">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                        </svg>
                    </div>
                    <input id="datepicker-actions" datepicker datepicker-format="yyyy-mm-dd" datepicker-buttons
                        datepicker-autoselect-today datepicker-orientation="bottom right" type="text" name="tanggal"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Select date">
                </div>
                {{-- <div class="relative max-w">
                    <input type="date" name="tanggal" id="tanggal"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5">
                </div> --}}
            </div>

            <div id="image-upload-container" class="flex flex-col justify-center w-full">
                <label for="category" class="block mb-2 text-sm font-medium text-gray-900">Upload
                    Dokumentasi</label>
                <input
                    class="block w-full mb-5 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                    id="gambar" name="gambar" type="file">
            </div>
            {{-- <div class="w-full mb-4">
                <img id="uploaded-image" class="hidden w-full h-64 object-cover rounded-lg" />
            </div> --}}
            <div class="sm:col-span-2">
                <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Deskripsi
                    Penanganan</label>
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
@endsection

@push('script')
<script>
    const dropzone = document.getElementById('dropzone');
    const input = document.getElementById('dropzone-file');
    const gallery = document.getElementById('gallery');

    dropzone.addEventListener('click', () => input.click());

    dropzone.addEventListener('dragover', (event) => {
    event.preventDefault();
    dropzone.classList.add('border-blue-500');
    });

    dropzone.addEventListener('dragleave', () => {
    dropzone.classList.remove('border-blue-500');
    });

    dropzone.addEventListener('drop', (event) => {
    event.preventDefault();
    dropzone.classList.remove('border-blue-500');
    handleFiles(event.dataTransfer.files);
    });

    input.addEventListener('change', (event) => {
    handleFiles(event.target.files);
    });

    function handleFiles(files) {
    gallery.innerHTML = ''; // Clear existing images

    for (const file of files) {
    const reader = new FileReader();
    reader.onload = function(e) {
    const img = document.createElement('img');
    img.src = e.target.result;
    img.alt = file.name;
    img.classList.add('w-32', 'h-32', 'object-cover', 'm-2');
    gallery.appendChild(img);
    }
    reader.readAsDataURL(file);
    }
    }
</script>

<script>
    // document.getElementById('gambar').addEventListener('change', function(event) {
    //         const file = event.target.files[0];
    //         if (file) {
    //             const reader = new FileReader();
    //             reader.onload = function(e) {
    //                 const container = document.getElementById('image-upload-container');
    //                 container.innerHTML = `<img src="${e.target.result}" class="w-full h-64 object-cover rounded-lg" />`;
    //             }
    //             reader.readAsDataURL(file);
    //         }
    //     });

    const dateInput = document.getElementById('datepicker-actions');
    const today = new Date().toISOString().split('T')[0];;
    dateInput.value = today;
</script>
@endpush
