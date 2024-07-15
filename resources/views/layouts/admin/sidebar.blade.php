<aside class="z-20 hidden w-64 overflow-y-auto bg-white md:block flex-shrink-0">
    <div class="py-4">
        <div class="flex justify-center">
            <a href="index.html">
                <img src="{{ asset('assets/img/logo-solo-safari.png') }}" alt="logo" style="height: 100px">
            </a>
        </div>
        <ul class="mt-6">
            <li class="relative px-6 py-2">
                <a class="inline-flex p-2 items-center w-full text-sm font-medium transition-colors duration-150 rounded-lg hover:bg-gray-100 hover:text-green-500 group {{ request()->routeIs('admin.dashboard') ? 'bg-gray-100 font-semibold text-green-500' : '' }}"
                    href="{{ route('admin.dashboard') }}">
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
                <a class="inline-flex p-2 items-center w-full text-sm font-medium transition-colors duration-150 rounded-lg hover:bg-gray-100 hover:text-green-500 group {{ request()->routeIs('admin.manajemen-pelaporan.index') ? 'bg-gray-100 font-semibold text-green-500' : '' }}"
                    href="{{ route('admin.manajemen-pelaporan.index') }}">
                    <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                        </path>
                    </svg>
                    <span class="ml-4">Manajemen Pelaporan</span>
                </a>
            </li>
            <li class="relative px-6 py-2">
                <a class="inline-flex p-2 items-center w-full text-sm font-medium transition-colors duration-150 rounded-lg hover:bg-gray-100 hover:text-green-500 group {{ request()->routeIs('admin.manajemen-role.index') ? 'bg-gray-100 font-semibold text-green-500' : '' }}"
                    {{-- href="{{ route('manajemen-role.index') }}"> --}}
                    <svg class="w-5 h-5" data-slot="icon" fill="none" stroke-width="1.5" stroke="currentColor"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z">
                        </path>
                    </svg>
                    <span class="ml-4">Manajemen Role</span>
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
    @keydown.escape="closeSideMenu">
    <div class=" py-4 text-gray-500">
        <div class="flex justify-center">
            <a href="index.html">
                <img src="{{ asset('assets/img/logo-solo-safari.png') }}" alt="logo" style="height: 100px">
            </a>
        </div>
        <ul class="mt-6">
            <li class="relative px-6 py-2">
                <a class="inline-flex p-2 items-center w-full text-sm font-medium transition-colors duration-150 rounded-lg hover:bg-gray-100 hover:text-green-500 group"
                    href="{{ route('admin.dashboard') }}">
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
                <a class="inline-flex p-2 items-center w-full text-sm font-medium transition-colors duration-150 rounded-lg hover:bg-gray-100 hover:text-green-500 group"
                    href="{{ route('admin.manajemen-pelaporan.index') }}">
                    <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                        </path>
                    </svg>
                    <span class="ml-4">Manajemen Laporan</span>
                </a>
            </li>
            <li class="relative px-6 py-2">
                <a class="inline-flex p-2 items-center w-full text-sm font-medium transition-colors duration-150 rounded-lg hover:bg-gray-100 hover:text-green-500 group"
                    {{-- href="{{ route('manajemen-role.index') }}"> --}}
                    <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path
                            d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                        </path>
                    </svg>
                    <span class="ml-4">Manajemen Role</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
