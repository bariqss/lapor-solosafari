@extends('layouts.user.dashboard')

@section('content')
<div class="w-full p-4 mt-6 mb-6 overflow-hidden bg-white rounded-lg shadow-lg">
    <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
            <caption
                class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                Riwayat Kejadian
            </caption>
            <thead>
                <tr
                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="px-4 py-3">Judul Laporan</th>
                    <th class="px-4 py-3">Tanggal</th>
                    <th class="px-4 py-3">Kategori</th>
                    <th class="px-4 py-3">Level Kejadian</th>
                    <th class="px-4 py-3">Status Penanganan</th>
                    <th class="px-4 py-3"></th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                <tr class="text-gray-700 dark:text-gray-400">
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
                        {{$report->category}}
                    </td>
                    <td class="px-4 py-3 text-xs">
                        <span
                            class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                            {{$report->level}}
                        </span>
                    </td>
                    <td class="px-4 py-3 text-xs">
                        <span
                            class="bg-green-100 text-green-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">
                            Tertangani
                        </span>
                    </td>
                    <td class="px-4 py-3 text-xs">
                        <a href="{{ route('laporan.view', $report->id) }}">
                            <button type="button"
                                class="px-3 py-2 focus:outline-none text-sm text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                Detail
                            </button>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
        <div
            class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
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
                                <svg aria-hidden="true" class="w-4 h-4 fill-current" viewBox="0 0 20 20">
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
                            <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-green">
                                2
                            </button>
                        </li>
                        <li>
                            <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-green">
                                3
                            </button>
                        </li>
                        <li>
                            <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-green">
                                4
                            </button>
                        </li>
                        <li>
                            <button
                                class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-green"
                                aria-label="Next">
                                <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
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