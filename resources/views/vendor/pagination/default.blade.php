@if ($paginator->hasPages())

    <div class="layui-box layui-laypage layui-laypage-default" id="layui-laypage-0">

        @if (!$paginator->onFirstPage())
            <a href="{{ $paginator->previousPageUrl() }}" class="layui-laypage-prev">上一页</a>
        @endif


            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <span>{{ $element }}</span>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span class="layui-laypage-curr"><em class="layui-laypage-em"></em><em>{{ $page }}</em></span>
                        @else
                            <a href="{{ $url }}">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="layui-laypage-next">下一页</a>
            @endif


    </div>

@endif
