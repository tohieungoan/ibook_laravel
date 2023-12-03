
 <style>
.pagination-outer{ text-align: center; }
.pagination{
    font-family: 'Quicksand', sans-serif;
    display: inline-flex;
    position: relative;
}
.pagination li a.page-link{
    color: #fff;
    background-color: #0a3d62;
    font-size: 22px;
    font-weight: 600;
    line-height: 33px;
    height: 33px;
    width: 33px;
    padding: 0;
    margin: 0 5px;
    border-radius: 50%;
    border: none;
    box-shadow: 2px 2px rgba(0,0,0,0.2);
    transition: all 0.5s ease 0s;
}
.pagination li a.page-link:hover,
.pagination li a.page-link:focus,
.pagination li.active a.page-link:hover,
.pagination li.active a.page-link{
    color: #fff;
    background: #eb3b5a;
    box-shadow: 2px 2px rgba(0, 0, 0, 0.2), 4px 4px rgba(0,0,0,0.1);
}
.pagination li:first-child a.page-link,
.pagination li:last-child a.page-link{
    color: #eb3b5a;
    background-color: #fff;
    line-height: 27px;
    border: 2px solid #eb3b5a;
}
@media only screen and (max-width: 480px){
    .pagination{
        font-size: 0;
        display: inline-block;
    }
    .pagination li{
        display: inline-block;
        vertical-align: top;
        margin: 0 0 10px;
    }
}
 </style>





@if ($paginator->hasPages())
<label>Page:</label>

<nav class="pagination-outer" aria-label="Page navigation">
    <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
              
                <li class="page-item disabled">
                    <a href="" class="page-link" aria-disabled="true" ria-label="@lang('pagination.previous')">
                        <span aria-hidden="true">&lsaquo;</span>
                    </a>
                </li>
            @else

            <li class="page-item">
                <a href="{{ $paginator->previousPageUrl() }}" class="page-link" aria-label="Previous">
                    <span aria-hidden="true">«</span>
                </a>
            </li>
            
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled" aria-disabled="true"><span>{{ $element }} </span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active"><a class="page-link" href="#"><span>{{ $page }}</span></a></li>
                        @else
                        <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
            <li class="page-item">
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="page-link" aria-label="Next">
                    <span aria-hidden="true">»</span>
                </a>
            </li>


             
            @else
                <li class="disabled page-item" aria-disabled="true" aria-label="Next">
                    <a href="   " rel="next" class="page-link" aria-label="Next">
                    <span aria-hidden="true">»</span>
                </a>
                </li>
                
            @endif
        </ul>
    </nav>
@endif
