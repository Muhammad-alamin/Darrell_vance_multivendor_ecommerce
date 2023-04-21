@if ($paginator->hasPages())
<div class="toolbox toolbox-pagination justify-content-between">
    <p class="showing-info mb-2 mb-sm-0">
    </p>
    <ul class="pagination">
        @if ($paginator->onFirstPage())
            <li class="prev disabled">
                    <i class="w-icon-long-arrow-left"></i>Prev
            </li>
        @else
            <li class="">
                <a href="{{ $paginator->previousPageUrl() }}" aria-label="Previous" >
                    <i class="w-icon-long-arrow-left"></i>Prev
                </a>
            </li>
        @endif

            @foreach ($elements as $element)

                @if (is_string($element))
                    <li class="page-item disabled">
                        {{ $element }}
                    </li>
                @endif
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                                <li class="page-item active">
                                    {{ $page }}
                                </li>
                        @else
                                <li class="page-item">
                                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->hasMorePages())
                <li class="next">
                    <a href="{{ $paginator->nextPageUrl() }}" aria-label="Next">
                        Next<i class="w-icon-long-arrow-right"></i>
                    </a>
                </li>
            @else
                <li class="next disabled">
                        Next<i class="w-icon-long-arrow-right"></i>
                </li>
            @endif
    </ul>
</div>
@endif
