<div
    class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t bg-gray-50 sm:grid-cols-9">
    <span class="flex items-center col-span-3">
        Showing {{ $paginator->firstItem() }}-{{ $paginator->lastItem() }} of {{ $paginator->total() }}
    </span>
    <span class="col-span-2"></span>

    <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
        @if ($paginator->hasPages())
        <nav aria-label="Table navigation">
            <ul class="pagination inline-flex items-center">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <button class="px-2 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-blue"
                        aria-label="Previous">
                        <svg aria-hidden="true" class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                            <path
                                d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                clip-rule="evenodd" fill-rule="evenodd"></path>
                        </svg>
                    </button>
                    {{-- <span aria-hidden="true">&lsaquo;</span> --}}
                </li>
                @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">
                        <button class="px-2 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-blue"
                            aria-label="Previous">
                            <svg aria-hidden="true" class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                <path
                                    d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                    clip-rule="evenodd" fill-rule="evenodd"></path>
                            </svg>
                        </button>
                    </a>
                    {{-- <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                        aria-label="@lang('pagination.previous')">
                        &lsaquo;</a> --}}
                </li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                <li class="disabled px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-blue"
                    aria-disabled="true">
                    <span>{{ $element }}</span>
                </li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                <li class="active px-3 py-1 text-white transition-colors duration-150 bg-blue-700 border border-r-0 border-blue rounded-md focus:outline-none focus:shadow-outline-blue"
                    aria-current="page"><span>{{ $page }}</span></li>
                @else
                <li class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-blue"><a href="{{ $url }}">{{
                        $page }}</a></li>
                @endif
                @endforeach
                @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">
                        <button class="px-2 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-blue"
                            aria-label="Next">
                            <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
                                <path
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd" fill-rule="evenodd"></path>
                            </svg>
                        </button>
                    </a>
                </li>
                @else
                <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span aria-hidden="true"><button
                            class="px-2 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-blue"
                            aria-label="Next">
                            <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
                                <path
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd" fill-rule="evenodd"></path>
                            </svg>
                        </button>
                    </span>
                </li>
                @endif
            </ul>
        </nav>
        @endif
    </span>
</div>
