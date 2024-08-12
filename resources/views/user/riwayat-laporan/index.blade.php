@extends('layouts.user.dashboard')
@section('title', 'Riwayat Laporan ')

@section('content')
<div class="w-full p-4 mt-6 mb-6 overflow-hidden bg-white rounded-lg shadow-lg">
    <div class="w-full overflow-x-auto">
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
                    [4, 'asc']
                ],
                paging: false,
                info: false,
                searching: false
            });

        });
</script>
@endpush
