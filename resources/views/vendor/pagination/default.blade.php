@if ($paginator->hasPages())
<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-end">
        @if ($paginator->onFirstPage())
        <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
            <a class="page-link" href="javascript:;" tabindex="-1">
                <i class="fa fa-angle-left"></i>
                <span class="sr-only">@lang('pagination.previous')</span>
            </a>
        </li>
        @else
        <li class="page-item " aria-disabled="true">
            <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" tabindex="-1"
                aria-label="@lang('pagination.previous')">
                <i class="fa fa-angle-left"></i>
                <span class="sr-only">@lang('pagination.previous')</span>
            </a>
        </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
        <li class="page-item disabled" aria-disabled="true"><a class="page-link">{{ $element }}</a></li>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
        @foreach ($element as $page => $url)
        @if ($page == $paginator->currentPage())
        <li class="page-item active" aria-current="page"><a class="page-link">{{ $page }}</a></li>
        @else
        <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
        @endif
        @endforeach
        @endif
        @endforeach

        @if ($paginator->hasMorePages())
        <li class="page-item">
            <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next"
                aria-label="@lang('pagination.next')">
                <i class="fa fa-angle-right"></i>
                <span class="sr-only">@lang('pagination.next')</span>
            </a>
        </li>
        @else
        <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
            <a class="page-link" rel="next">
                <i class="fa fa-angle-right"></i>
                <span class="sr-only">@lang('pagination.next')</span>
            </a>
        </li>
        @endif
    </ul>
</nav>
@endif
