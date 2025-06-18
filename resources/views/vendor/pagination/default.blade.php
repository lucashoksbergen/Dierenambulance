@if ($paginator->hasPages())
    <ul class="pagination" role="navigation" aria-label="Pagination Navigation">

        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li><span class="disabled" aria-disabled="true" aria-label="Previous">&laquo; Previous</span></li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="Previous">&laquo; Previous</a></li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li><span class="disabled">{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li><span class="current" aria-current="page">{{ $page }}</span></li>
                    @else
                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="Next">Next &raquo;</a></li>
        @else
            <li><span class="disabled" aria-disabled="true" aria-label="Next">Next &raquo;</span></li>
        @endif

    </ul>
@endif
