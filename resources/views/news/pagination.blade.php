@if ($paginator->hasPages())
    <nav>
        <ul class="pagination custom-pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled" aria-disabled="true">
                    <span class="page-link prev">
                        <i class="fa fa-angle-left"></i>
                    </span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link prev" href="{{ $paginator->previousPageUrl() }}" rel="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                </li>
            @endif
            <?php
                $start = $paginator->currentPage() - 2; // show 3 pagination links before current
                $end = $paginator->currentPage() + 2; // show 3 pagination links after current
                if($start < 1) {
                    $start = 1; // reset start to 1
                    $end += 1;
                } 
                if($end >= $paginator->lastPage() ) $end = $paginator->lastPage(); // reset end to last page
            ?>

            @if($start > 1)
            
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->url(1) }}">{{1}}</a>
                </li>
                @if($paginator->currentPage() != 4)
                    {{-- "Three Dots" Separator --}}
                    <li class="page-item" aria-disabled="true">
                        <span class="page-link">...</span>
                    </li>
                @endif
            @endif
                @for ($i = $start; $i <= $end; $i++)
                    <li class="page-item {{ ($paginator->currentPage() == $i) ? ' active' : '' }}">
                        <a class="page-link {{ ($paginator->currentPage() == $i) ? ' active' : '' }}" href="{{ $paginator->url($i) }}">{{$i}}</a>
                    </li>
                @endfor
            @if($end < $paginator->lastPage())
                @if($paginator->currentPage() + 3 != $paginator->lastPage())
                    {{-- "Three Dots" Separator --}}
                    <li class="page-item dot" aria-disabled="true">
                        <span class="page-link">...</span>
                    </li>
                @endif
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->url($paginator->lastPage()) }}">{{$paginator->lastPage()}}</a>
                </li>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link next" href="{{ $paginator->nextPageUrl() }}" rel="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </li>
            @else
                <li class="page-item disabled" aria-disabled="true">
                    <span class="page-link next">
                        <i class="fa fa-angle-right"></i>
                    </span>
                </li>
            @endif
        </ul>
    </nav>
@endif
