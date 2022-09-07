@if ($paginator->hasPages())
<nav role="navigation" aria-label="Page navigation example">
    <ul class="pagination justify-content-end">
        @if ($paginator->onFirstPage())
        <li class="page-item disabled" aria-disabled="true">
            <a class="page-link" href="javascript:;" tabindex="-1">
                <i class="fa fa-angle-left"></i>
                <span class="sr-only">{!! __('pagination.previous') !!}</span>
            </a>
        </li>
        @else
        <li class="page-item " aria-disabled="true">
            <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" tabindex="-1">
                <i class="fa fa-angle-left"></i>
                <span class="sr-only">{!! __('pagination.previous') !!}</span>
            </a>
        </li>
        @endif

        @if ($paginator->hasMorePages())
        <li class="page-item">
            <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">
                <i class="fa fa-angle-right"></i>
                <span class="sr-only">{!! __('pagination.next') !!}</span>
            </a>
        </li>
        @else
        <li class="page-item disabled" aria-disabled="true">
            <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">
                <i class="fa fa-angle-right"></i>
                <span class="sr-only">{!! __('pagination.next') !!}</span>
            </a>
        </li>
        @endif
    </ul>
</nav>
@endif
