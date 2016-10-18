<div class="wpb_row vc_row-fluid ish-row-notfull ish-row_notsection">
    <div class="ish-vc_row_inner">
        <div class="ish-sc-element ish-sc_separator ish-separator-text ish-separator-double ish-separator-home-pagination">
            <span class="ish-line ish-left"><span class="ish-line-border"></span></span>
        </div>
        <div class='ish-pagination'>
    <!-- Previous Page Link -->
    @if ($paginator->onFirstPage())
        <span>&laquo;</span>
    @else
      <a href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo;</a>
    @endif

    <!-- Pagination Elements -->
    @foreach ($elements as $element)
        <!-- "Three Dots" Separator -->
        @if (is_string($element))
            <li class="disabled"><span>{{ $element }}</span></li>
        @endif

        <!-- Array Of Links -->
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <span class='current'>{{ $page }}</span>
                @else
                  <a href='{{ $url }}' class='inactive'>{{ $page }}</a>
                @endif
            @endforeach
        @endif
    @endforeach

    <!-- Next Page Link -->
    @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a>
    @else
        <span>&raquo;</span>
    @endif
  </div>
</div>
</div>
