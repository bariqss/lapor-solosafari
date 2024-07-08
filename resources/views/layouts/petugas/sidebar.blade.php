<aside class="z-20 hidden w-64 overflow-y-auto bg-white md:block flex-shrink-0"
    style="background-color: #696CFF">
    <div class="py-4">
        <div class="flex justify-center">
            <a href="index.html">
                <img src="{{ asset('assets/img/logo-solo-safari-white.png') }}" alt="logo" style="height: 100px">
            </a>
        </div>
        <ul class="mt-6">
            <li class="relative px-6 py-2">
                <span class="absolute inset-y-0 left-0 w-1 bg-white rounded-tr-lg rounded-br-lg" aria-hidden="true" {{
                    \Request::segment(2)=='dashboard' ? 'active' : '' }}></span>
                <a class="inline-flex p-3 items-center w-full text-sm text-white font-medium transition-colors duration-150 rounded-lg hover:bg-gray-100 hover:font-semibold hover:text-gray-700 group"
                    href="{{ route('operator.manajemen-laporan.index') }}">
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
            <li class="relative px-6 py-2 active">
                <a class="inline-flex p-3 items-center w-full text-sm text-white font-medium transition-colors duration-150 rounded-lg hover:bg-gray-100 hover:font-semibold hover:text-gray-700 group"
                    href="{{ route('operator.manajemen-petugas.index') }}">
                    <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                        </path>
                    </svg>
                    <span class="ml-4">Tugas Saya</span>
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
<aside class="fixed inset-y-0 z-20 flex-shrink-0 w-64 mt-16 overflow-y-auto bg-white md:hidden"
    x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150"
    x-transition:enter-start="opacity-0 transform -translate-x-20" x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0 transform -translate-x-20" @click.away="closeSideMenu"
    @keydown.escape="closeSideMenu" style="background-color: #696CFF">
    <div class=" py-4 text-gray-500">
        <div class="flex justify-center">
            <a href="index.html">
                <img src="{{ asset('assets/img/logo-solo-safari.png') }}" alt="logo" style="height: 100px">
            </a>
        </div>
        <ul class="mt-6">
            <li class="relative px-6 py-2">
                <a class="inline-flex p-2 items-center w-full text-sm text-white font-medium transition-colors duration-150 rounded-lg hover:bg-gray-100 hover:font-semibold hover:text-gray-700 group"
                    href="index.html">
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
                <a class="inline-flex p-2 items-center w-full text-sm text-white font-medium transition-colors duration-150 rounded-lg hover:bg-gray-100 hover:font-semibold hover:text-gray-700 group"
                    href="">
                    <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                        </path>
                    </svg>
                    <span class="ml-4">Tugas Saya</span>
                </a>
            </li>
        </ul>
    </div>
</aside>