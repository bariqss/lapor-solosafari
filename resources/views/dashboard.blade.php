<!DOCTYPE html>
<html :class="{ 'theme-dark': light }" x-data="data()" lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>
        Dashboard - Lapor Solo Safari
    </title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet" />

    @vite('resources/css/app.css')
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet" href="{{ asset('assets/css/tailwind.output.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/tailwind.css') }}" />

    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.0/css/dataTables.tailwindcss.css">

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
</head>

<body>
    <div class="flex h-screen bg-gray-50" :class="{ 'overflow-hidden': isSideMenuOpen }">
        <!-- Desktop sidebar -->
        @include('layouts.user.sidebar')
        <!-- Mobile sidebar -->

        <div class="flex flex-col flex-1 w-full">
            <header class="z-10 py-4 bg-white shadow-md">
                <div class="container flex items-center justify-between h-full px-6 mx-auto text-green-500">
                    <!-- Mobile hamburger -->
                    <button class="p-1 mr-5 -ml-1 rounded-md md:hidden focus:outline-none focus:shadow-outline-green"
                        @click="toggleSideMenu" aria-label="Menu">
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <!-- Search input -->
                    <div class="flex justify-center flex-1 lg:mr-32">
                        <div class="relative w-full max-w-xl mr-6 focus-within:text-green-500">
                            <div class="absolute inset-y-0 flex items-center pl-2"></div>
                        </div>
                    </div>
                    <ul class="flex items-center flex-shrink-0 space-x-6">

                        </li>
                        <!-- Profile menu -->
                        <li class="relative">
                            <a href="{{ route('login') }}"
                                class="inline-flex justify-center items-center py-2 px-4 text-base font-medium text-center text-white rounded-lg bg-green-600 hover:bg-green-800 focus:ring-4 focus:ring-green-200">
                                Login
                            </a>
                        </li>
                    </ul>
                </div>
            </header>

            <main class="h-full pb-16 overflow-y-auto">
                <div class="grid w-full px-10">
                    <div class="flex flex-col mt-6 mb-6 shadow-md">
                        <div
                            class="bg-center bg-no-repeat bg-[url('/resources/img/bg-solo-safari.jpg')] rounded-lg bg-gray-400 bg-blend-multiply">
                            <div class="px-4 max-w-screen-xl text-center py-24 lg:py-30">
                                <h1 class="mb-4 text-3xl font-extrabold tracking-tight leading-none text-white">
                                    Laporkan Kejadian
                                </h1>
                                <p class="mb-4 text-lg text-white">Silahkan login terlebih dahulu untuk melaporkan
                                    kejadian</p>
                                <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0">
                                    <a href="{{ route('user.laporan.create') }}"
                                        class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-green-600 hover:bg-green-800 focus:ring-4 focus:ring-green-200">
                                        Login
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
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
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
                                            <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                                            </svg>
                                        </button>

                                        <!-- Dropdown menu -->
                                        <div id="dropdown1"
                                            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                                aria-labelledby="dropdownHoverButton">
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
                                            <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                                            </svg>
                                        </button>

                                        <!-- Dropdown menu -->
                                        <div id="dropdown"
                                            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                                aria-labelledby="dropdownHoverButton">
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
                                    <tr
                                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase bg-gray-50">
                                        <th class="px-4 py-3 cursor-pointer">
                                            <div scope="col" class="flex items-center">
                                                Judul Laporan
                                                <svg class="w-3 h-3 ms-1.5" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path
                                                        d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                                </svg>
                                            </div>
                                        </th>
                                        <th class="px-4 py-3 cursor-pointer">
                                            <div scope="col" class="flex items-center">
                                                Tanggal
                                                <svg class="w-3 h-3 ms-1.5" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path
                                                        d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                                </svg>
                                            </div>
                                        </th>
                                        <th class="px-4 py-3 cursor-pointer">
                                            <div scope="col" class="flex items-center">
                                                Kategori
                                                <a href="#">
                                                    <svg class="w-3 h-3 ms-1.5" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path
                                                            d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                                    </svg></a>
                                            </div>
                                        </th>
                                        <th class="px-4 py-3 cursor-pointer">
                                            <div scope="col" class="flex items-center">
                                                Level Kejadian
                                                <svg class="w-3 h-3 ms-1.5" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path
                                                        d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                                </svg>
                                            </div>
                                        </th>
                                        <th class="px-4 py-3 cursor-pointer">
                                            <div scope="col" class="flex items-center">
                                                Status Penanganan
                                                <svg class="w-3 h-3 ms-1.5" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                    viewBox="0 0 24 24">
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
                                            <a href="{{ route('user.laporan.view', $report->id) }}">
                                                <button type="button"
                                                    class="px-5 py-2 focus:outline-none text text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm me-2 mb-2">
                                                    Detail
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

                    <div class=" gap-6 mb-8">
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
                </div>
            </main>
        </div>
    </div>

    <script>
        function logout() {
            const form = document.getElementById("logout");
            form.submit();
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>
    <script src="{{ asset('assets/js/init-alpine.js') }}"></script>

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js">
    </script>

    <script src="https://cdn.datatables.net/2.1.0/js/dataTables.tailwindcss.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script> --}}

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

    @stack('script')
</body>

</html>
