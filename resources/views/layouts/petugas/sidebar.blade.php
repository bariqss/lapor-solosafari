<aside class="z-20 hidden w-64 overflow-y-auto bg md:block flex-shrink-0" style="background-color: #EDB666">
    <div class="py-4">
        <div class="flex justify-center">
            <a href="{{ route('petugas.laporan.index') }}">
                <img src="{{ asset('assets/img/logo-solo-safari-white.png') }}" alt="logo" style="height: 100px">
            </a>
        </div>
        <ul class="mt-6">
            <li class="relative px-6 py-2">
                <a class="inline-flex p-2 items-center w-full text-sm font-medium transition-colors duration-150 rounded-lg text-white hover:bg-yellow-700 hover:text-grey-50 group {{ request()->routeIs('petugas.laporan.index') ? 'bg-yellow-700 font-semibold text-gray-100' : '' }}"
                    href="{{ route('petugas.laporan.index') }}">
                    <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                        </path>
                    </svg>
                    <span class="ml-4">Dashboard</span>
                </a>
            </li>
        </ul>
        <ul>
            <li class="relative px-6 py-2">
                <a class="inline-flex p-2 items-center w-full text-sm font-medium transition-colors duration-150 rounded-lg text-white hover:bg-yellow-700 hover:text-grey-50 group {{ request()->routeIs('petugas.laporan-tertangani.riwayat') ? 'bg-yellow-700 font-semibold text-gray-100' : '' }}"
                    href="{{ route('petugas.laporan-tertangani.riwayat') }}">
                    <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path
                            d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                        </path>
                    </svg>
                    <span class="ml-4">Laporan Tertangani</span>
                </a>
            </li>
        </ul>
    </div>
</aside>

<div x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150"
    x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"></div>
<aside class="fixed inset-y-0 z-20 flex-shrink-0 w-64 mt-16 overflow-y-auto bg-white md:hidden" x-show="isSideMenuOpen"
    x-transition:enter="transition ease-in-out duration-150"
    x-transition:enter-start="opacity-0 transform -translate-x-20" x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0 transform -translate-x-20" @click.away="closeSideMenu"
    @keydown.escape="closeSideMenu" style="background-color: #EDB666">
    <div class=" py-4 text-gray-500">
        <div class="flex justify-center">
            <a href="index.html">
                <img src="{{ asset('assets/img/logo-solo-safari-white.png') }}" alt="logo" style="height: 100px">
            </a>
        </div>
        <ul class="mt-6">
            <li class="relative px-6 py-2">
                <a class="inline-flex p-2 items-center w-full text-sm font-medium transition-colors duration-150 rounded-lg text-white hover:bg-gray-100 hover:text-black group {{ request()->routeIs('petugas.laporan.index') ? 'bg-yellow-700 font-semibold text-gray-100' : '' }}"
                    href="{{ route('petugas.laporan.index') }}">
                    <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                        </path>
                    </svg>
                    <span class="ml-4">Dashboard</span>
                </a>
            </li>
        </ul>
        <ul>
            <li class="relative px-6 py-2">
                <a class="inline-flex p-2 items-center w-full text-sm font-medium transition-colors duration-150 rounded-lg text-white hover:bg-gray-100 hover:text-black group {{ request()->routeIs('petugas.laporan-tertangani.riwayat') ? 'bg-yellow-700 font-semibold text-gray-100' : '' }}"
                    href="{{ route('petugas.laporan-tertangani.riwayat') }}">
                    <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path
                            d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                        </path>
                    </svg>
                    <span class="ml-4">Laporan Tertangani</span>
                </a>
            </li>
    </div>
</aside>
