@extends('layouts.petugas.dashboard')
@section('title', 'Dashboard')
@section('content')

<div class="w-full p-4 mt-6 mb-6 overflow-hidden bg-white rounded-lg shadow-lg">
    <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
            <caption class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white">
                Daftar Laporan Kejadian
            </caption>
            <thead>
                <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase bg-gray-50">
                    <th class="px-4 py-3">Judul Laporan</th>
                    <th class="px-4 py-3">Tanggal</th>
                    <th class="px-4 py-3">Kategori</th>
                    <th class="px-4 py-3">Level Kejadian</th>
                    <th class="px-4 py-3">Status Penanganan</th>
                    <th class="px-4 py-3">Aksi</th>
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
                        {{Carbon\Carbon::parse($report->date)->format("d/m/Y")}}
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
                        @if ($report->status == 1)
                        <span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-md">Belum
                            Ditangani</span>
                        @elseif($report->status == 2)
                        <span
                            class="bg-yellow-50 text-yellow-800 border border-yellow-300 text-xs font-medium me-2 px-2.5 py-0.5 rounded-md">Proses
                            Penanganan</span>
                        @else
                        <span
                            class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-md">Selesai</span>
                        @endif
                    </td>
                    <td class="px-4 py-3 text-xs">
                        <a href="{{ route('petugas.laporan.view', $report->id) }}">
                            <button type="button"
                                class="px-5 py-2 focus:outline-none text text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm me-2 mb-2">
                                Detail
                            </button>
                        </a>
                        <a href="{{ route('petugas.laporan.create', $report->id) }}">
                            <button type="button"
                                class="px-5 py-2 focus:outline-none text text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm me-2 mb-2">
                                Buat Laporan
                            </button>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div>
            {{ $reports->links() }}
        </div>
    </div>
</div>

@endsection