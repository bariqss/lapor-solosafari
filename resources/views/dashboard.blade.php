<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>
        Dashboard - Lapor Solo Safari
    </title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet" />

    @vite('resources/css/app.css')
    @vite(['resources/css/app.css','resources/js/app.js'])

    <link rel="stylesheet" href="{{ asset('assets/css/tailwind.output.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/tailwind.css') }}" />

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
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
                <div class="container grid px-10">
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

                    <div class="w-full p-4 mt-6 mb-6 overflow-hidden bg-white rounded-lg shadow-lg">
                        <div class="w-full overflow-x-auto">
                            <table class="w-full whitespace-no-wrap">
                                <caption
                                    class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white">
                                    Riwayat Kejadian
                                </caption>
                                <thead>
                                    <tr
                                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase bg-gray-50">
                                        <th class="px-4 py-3">Judul Laporan</th>
                                        <th class="px-4 py-3">Tanggal</th>
                                        <th class="px-4 py-3">Kategori</th>
                                        <th class="px-4 py-3">Level Kejadian</th>
                                        <th class="px-4 py-3">Status Penanganan</th>
                                        <th class="px-4 py-3"></th>
                                    </tr>
                                </thead>
                                {{-- <tbody class="bg-white divide-y">
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
                                            {{$report->date}}
                                        </td>
                                        <td class="px-4 py-3 text-sm">
                                            {{$report->category->nama_kategori}}
                                        </td>
                                        <td class="px-4 py-3 text-xs">
                                            @if ($report->level == 1)
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
                                            <span
                                                class="bg-green-100 text-green-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded">
                                                Tertangani
                                            </span>
                                        </td>
                                        <td class="px-4 py-3 text-xs">
                                            <a href="{{ route('laporan.view', $report->id) }}">
                                                <button type="button"
                                                    class="px-5 py-2 focus:outline-none text text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm me-2 mb-2">
                                                    Detail
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody> --}}
                            </table>
                            <div
                                class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t bg-gray-50 sm:grid-cols-9">
                                <span class="flex items-center col-span-3">
                                    Showing 1-10 of 50
                                </span>
                                <span class="col-span-2"></span>
                                <!-- Pagination -->
                                <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                                    <nav aria-label="Table navigation">
                                        <ul class="inline-flex items-center">
                                            <li>
                                                <button
                                                    class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-green"
                                                    aria-label="Previous">
                                                    <svg aria-hidden="true" class="w-4 h-4 fill-current"
                                                        viewBox="0 0 20 20">
                                                        <path
                                                            d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                                            clip-rule="evenodd" fill-rule="evenodd"></path>
                                                    </svg>
                                                </button>
                                            </li>
                                            <li>
                                                <button
                                                    class="px-3 py-1 text-white transition-colors duration-150 bg-green-700 border border-r-0 border-green rounded-md focus:outline-none focus:shadow-outline-green">
                                                    1
                                                </button>
                                            </li>
                                            <li>
                                                <button
                                                    class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-green">
                                                    2
                                                </button>
                                            </li>
                                            <li>
                                                <button
                                                    class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-green">
                                                    3
                                                </button>
                                            </li>
                                            <li>
                                                <button
                                                    class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-green">
                                                    4
                                                </button>
                                            </li>
                                            <li>
                                                <button
                                                    class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-green"
                                                    aria-label="Next">
                                                    <svg class="w-4 h-4 fill-current" aria-hidden="true"
                                                        viewBox="0 0 20 20">
                                                        <path
                                                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                            clip-rule="evenodd" fill-rule="evenodd"></path>
                                                    </svg>
                                                </button>
                                            </li>
                                        </ul>
                                    </nav>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script>
        function logout(){
                    const form = document.getElementById("logout");
                    form.submit();
                }
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="{{ asset('assets/js/init-alpine.js') }}"></script>

    @stack('script')
</body>

</html>