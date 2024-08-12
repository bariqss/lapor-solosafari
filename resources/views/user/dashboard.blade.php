@extends('layouts.user.dashboard')
@section('title', 'Dashboard')

@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.0/css/dataTables.tailwindcss.css">
@endpush

@section('content')
<div class="flex flex-col mt-6 mb-6 shadow-md">
    <div
        class="bg-center bg-no-repeat bg-[url('/resources/img/bg-solo-safari.jpg')] rounded-lg bg-gray-400 bg-blend-multiply">
        <div class="px-4 max-w-screen-xl text-center py-24 lg:py-30">
            <h1 class="mb-2 text-2xl font-extrabold tracking-tight leading-none text-white">
                Selamat Datang,
            </h1>
            <p class="mb-4 text-lg text-white">Laporkan kejadian yang ada di lingkungan Solo Safari</p>
            <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0">
                <a href="/user/laporan/create"
                    class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-green-600 hover:bg-green-800 focus:ring-4 focus:ring-green-200">
                    Laporkan
                </a>
            </div>
        </div>
    </div>
</div>

<!-- New Table -->
<div class="w-full p-4 mt-4 mb-6 overflow-hidden bg-white rounded-lg shadow-lg">
    <div class="w-full overflow-x-auto">


        <div class="flex flex-col">
            <h1 class="p-2 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white">
                Daftar Laporan Kejadian
            </h1>

            <div class="px-2 flex items-center justify-between">
                <div class="me-2">
                    <label for="search" class="sr-only">Search</label>
                    <div class="relative mt-1">
                        <div
                            class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <input type="text" id="table-search"
                            class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-green-500 focus:border-green-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500"
                            placeholder="Search ...">
                    </div>
                </div>

                <div>
                    <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown1"
                        class="text-gray-800 border-2 font-medium rounded-lg text-sm px-4 py-1.5 text-center inline-flex items-center"
                        type="button">Status
                        <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>

                    <!-- Dropdown menu -->
                    <div id="dropdown1"
                        class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownHoverButton">
                            <li>
                                <a href="{{ url()->current() }}"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Status</a>
                            </li>
                            <li>
                                <a href="{{ url()->current() . '?status=1' }}"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Belum
                                    Ditangani</a>
                            </li>
                            <li>
                                <a href="{{ url()->current() . '?status=2' }}"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Proses
                                    Penanganan</a>
                            </li>
                            <li>
                                <a href="{{ url()->current() . '?status=3' }}"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Selesai</a>
                            </li>
                        </ul>
                    </div>

                    <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                        class="text-gray-800 border-2 font-medium rounded-lg text-sm px-4 py-1.5 text-center inline-flex items-center"
                        type="button">Level
                        <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>

                    <!-- Dropdown menu -->
                    <div id="dropdown"
                        class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownHoverButton">
                            <li>
                                <a href="{{ url()->current() }}"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Level</a>
                            </li>
                            <li>
                                <a href="{{ url()->current() . '?level=1' }}"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Rendah</a>
                            </li>
                            <li>
                                <a href="{{ url()->current() . '?level=2' }}"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Sedang</a>
                            </li>
                            <li>
                                <a href="{{ url()->current() . '?level=3' }}"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Tinggi</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <table id="table" class="w-full whitespace-no-wrap">
            <thead>
                <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase bg-gray-50">
                    <th class="px-4 py-3 cursor-pointer">
                        <div scope="col" class="flex items-center">
                            Judul Laporan
                            <svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                            </svg>
                        </div>
                    </th>
                    <th class="px-4 py-3 cursor-pointer">
                        <div scope="col" class="flex items-center">
                            Tanggal
                            <svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                            </svg>
                        </div>
                    </th>
                    <th class="px-4 py-3 cursor-pointer">
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
                    <th class="px-4 py-3 cursor-pointer">
                        <div scope="col" class="flex items-center">
                            Level Kejadian
                            <svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                            </svg>
                        </div>
                    </th>
                    <th class="px-4 py-3 cursor-pointer">
                        <div scope="col" class="flex items-center">
                            Status Penanganan
                            <svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                            </svg>
                        </div>
                    </th>
                    <th class="px-4 py-3 cursor-pointer"></th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y">
                @foreach ($reports as $report)
                <tr class="text-gray-700">
                    <td class="px-4 py-3 ">
                        <div class="flex items-center text-sm">
                            <div>
                                <p>{{ $report->name }}</p>
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
                        <span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-md">Belum
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
                        <a href="{{ route('user.laporan.view', $report->id) }}">
                            <button type="button"
                                class="px-5 py-2 focus:outline-none text text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm me-2 mb-2">
                                Detail
                            </button>
                        </a>
                        <a href="{{ route('user.laporan.edit', $report->id) }}">
                            <button type="button"
                                class="px-5 py-2 focus:outline-none text text-white bg-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm me-2 mb-2">
                                Edit
                            </button>
                        </a>
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

<div class="grid gap-6 mb-8 md:grid-cols-2">
    <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
            Jumlah Kejadian Menurut Waktu
        </h4>
        <canvas id="chart"></canvas>
        <div class="flex justify-center mt-4 space-x-3 text-sm text-gray-600 dark:text-gray-400">
            <!-- Chart legend -->
            <div class="flex items-center">
                <span class="inline-block w-3 h-3 mr-1 bg-teal-600 rounded-full"></span>
                <span>Jumlah Laporan</span>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>

{{-- <script src="https://cdn.datatables.net/2.1.0/js/dataTables.tailwindcss.js"></script> --}}

<script>
    $(document).ready(function() {
            var table = $('#table').DataTable({
                columns: [null, null, null, null, null, {
                    orderable: false,
                }],
                order: [
                    [1, 'asc']
                ],
                paging: false,
                info: false,
                searching: true
            });

            $('#table-search').on('keyup', function() {
                table.search(this.value).draw();
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            const barConfig = {
                type: 'bar',
                data: {
                    labels: @json($chartData['labels']),
                    datasets: [{
                        label: 'Kejadian',
                        backgroundColor: '#0694a2',
                        // borderColor: window.chartColors.red,
                        borderWidth: 1,
                        data: @json($chartData['data']),
                    }, ],
                },
                options: {
                    responsive: true,
                    legend: {
                        display: false,
                    },
                    scales: {
                        y: {
                            ticks: {
                                callback: function(value) {
                                    return Math.floor(value); // Mengubah nilai menjadi integer
                                }
                            }
                        }
                    }
                },
            }

            const barsCtx = document.getElementById('chart')
            window.myBar = new Chart(barsCtx, barConfig)
        });
</script>
@endpush
