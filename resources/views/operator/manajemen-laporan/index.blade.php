@extends('layouts.operator.dashboard')
@section('title', 'Dashboard')

@section('breadcrumb')
<nav class="py-4 px-4 flex" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
        <li class="inline-flex items-center">
            <a href="#" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-purple-600">
                Operator
            </a>
        </li>
        <li>
            <div class="flex items-center">
                <span class="mx-2 text-gray-400">/</span>
                <span class="ms-1 text-sm font-medium text-gray-700 md:ms-2">Dashboard
                </span>
            </div>
        </li>
    </ol>
</nav>
@endsection

@section('content')
<div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700">
        Dashboard
    </h2>

    <!-- Cards -->
    <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
        <!-- Card -->
        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs">
            <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                        clip-rule="evenodd"></path>
                </svg>
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-600">
                    Laporan Masuk
                </p>
                <p class="text-lg font-semibold text-gray-700">
                    {{ $laporanMasuk }}
                </p>
            </div>
        </div>
        <!-- Card -->
        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs">
            <div class="p-3 mr-4 text-yellow-500 bg-yellow-100 rounded-full">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z">
                    </path>
                </svg>
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-600">
                    Laporan Ditangani
                </p>
                <p class="text-lg font-semibold text-gray-700">
                    {{ $laporanDitangani }}
                </p>
            </div>
        </div>
        <!-- Card -->
        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs">
            <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z">
                    </path>
                </svg>
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-600">
                    Laporan Tertangani
                </p>
                <p class="text-lg font-semibold text-gray-700">
                    {{ $laporanTertangani }}
                </p>
            </div>
        </div>
        <!-- Card -->
        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs">
            <div class="p-3 mr-4 text-red-500 bg-red-100 rounded-full">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z"
                        clip-rule="evenodd"></path>
                </svg>
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-600">
                    Laporan Ditolak
                </p>
                <p class="text-lg font-semibold text-gray-700">
                    {{ $laporanDitolak }}
                </p>
            </div>
        </div>
    </div>

    <!-- New Table -->
    <div class="w-full p-4 mt-4 mb-6 overflow-hidden bg-white rounded-lg shadow-lg">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <caption class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white">
                    Daftar Laporan Kejadian
                </caption>
                <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase bg-gray-50">
                        <th class="px-4 py-3">Judul Laporan</th>
                        <th class="px-4 py-3">Tanggal</th>
                        <th class="px-4 py-3">
                            <div scope="col" class="flex items-center">
                                Kategori
                                <a href="#">
                                    <svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                    </svg></a>
                            </div>
                        </th>
                        <th class="px-4 py-3">Level Kejadian</th>
                        <th class="px-4 py-3">Status Penanganan</th>
                        <th class="px-4 py-3"></th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y">
                    @foreach ($reports as $report)
                    <tr class="text-gray-700">
                        <td class="px-4 py-3 ">
                            <div class="flex items-center text-sm">
                                <div>
                                    <p>{{$report->name}}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            {{ \Carbon\Carbon::parse($report->date)->translatedFormat('d F Y') }}
                        </td>
                        <td class="px-4 py-3 text-sm">
                            {{ $report->category->nama_kategori }}
                        </td>
                        <td class="px-4 py-3 text-xs">
                            @if ($report->level == null)
                            <span
                                class="bg-gray-100 text-gray-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded-full">-</span>
                            @elseif ($report->level == 1)
                            <span
                                class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full">Rendah</span>
                            @elseif($report->level == 2)
                            <span
                                class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full">Sedang</span>
                            @else
                            <span
                                class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full">Tinggi</span>
                            @endif
                        </td>
                        <td class="px-4 py-3 text-xs">
                            @if ($report->status == null)
                            <span
                                class="bg-gray-100 text-gray-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded-full">-</span>
                            @elseif ($report->status == 1)
                            <span
                                class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-md">Belum
                                Ditangani</span>
                            @elseif($report->status == 2)
                            <span
                                class="bg-yellow-50 text-yellow-800  text-xs font-medium me-2 px-2.5 py-0.5 rounded-md">Proses
                                Penanganan</span>
                            @else
                            <span
                                class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-md">Selesai</span>
                            @endif
                        </td>
                        <td class="px-4 py-3 text-xs">
                            <div class="flex">
                                <a href="{{ route('operator.manajemen-laporan.view', $report->id) }}">
                                    <button type="button"
                                        class="text-white bg-blue-600 hover:bg-blue-400 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center me-2">
                                        <svg class="w-4 h-4" data-slot="icon" fill="none" stroke-width="1.5"
                                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                            aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z">
                                            </path>
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"></path>
                                        </svg>
                                    </button>
                                </a>
                                <a href="{{ route('operator.manajemen-laporan.edit', $report->id) }}">
                                    <button type="button"
                                        class="text-white bg-yellow-400 hover:bg-yellow-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center me-2">
                                        <svg class="w-4 h-4" data-slot="icon" fill="none" stroke-width="1.5"
                                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                            aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125">
                                            </path>
                                        </svg>
                                    </button>
                                </a>
                                <button data-modal-target="popup-modal{{ $report->id }}"
                                    data-modal-toggle="popup-modal{{ $report->id }}" type="button"
                                    class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center me-2">
                                    <svg class="w-4 h-4" data-slot="icon" fill="none" stroke-width="1.5"
                                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                        aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0">
                                        </path>
                                    </svg>
                                </button>

                                <!-- Main modal -->
                                <form action="{{ route('operator.manajemen-laporan.delete', $report->id) }}"
                                    method="POST">
                                    <div id="popup-modal{{ $report->id }}" tabindex="-1"
                                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                        <div class="relative p-4 w-full max-w-md max-h-full">
                                            <div class="relative bg-white rounded-lg shadow">
                                                <button type="button"
                                                    class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                                                    data-modal-hide="popup-modal">
                                                    <svg class="w-3 h-3" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                    </svg>
                                                    <span class="sr-only">Close</span>
                                                </button>
                                                <div class="p-4 md:p-5 text-center">
                                                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 20 20">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                    </svg>
                                                    <h3 class="mb-5 text-lg font-normal text-gray-500">Hapus laporan
                                                        kejadian?</h3>
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="hidden" name="report_id" value="{{ $report->id }}">
                                                    <button data-modal-hide="popup-modal" type="submit"
                                                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                        Hapus
                                                    </button>
                                                    <button data-modal-hide="popup-modal" type="button"
                                                        class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-gray-700 focus:z-10 focus:ring-4 focus:ring-gray-100">
                                                        Cancel
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
                {{ $reports->links('pagination::default') }}
            </div>
        </div>
    </div>
</div>
@endsection

{{-- @push('script')
<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>

<script src="https://cdn.datatables.net/2.1.0/js/dataTables.tailwindcss.js"></script>

<script>
    $(document).ready(function() {
            $('table').DataTable();
        });
</script>
@endpush --}}
