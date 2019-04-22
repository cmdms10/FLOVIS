<!doctype html>
<html lang="ja">
<head>
    <title>商品一覧</title>
    @include('flovis.flovis_layout.head')
    <link rel="stylesheet" href="{{ asset('css/productList.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
</head>

<body class="drawer drawer--left">

@include('flovis.flovis_layout.header')


<main>
    <img src="{{ asset('images/productList.jpg') }}" alt="" class="productTitle">
    <div class="center">

        <div class="list">
            <dl>
                <dt>表示順 ：</dt>
                <dd>
                    <form action="{{ action('ShowController@sort') }}" class="form">
                        <input type="hidden" name="keyword" value="{{ $keyword }}">
                        <button type="submit" class="btn sort1 btn-brackets" name="sort" value="desc"><span class="sort">新着順　｜</span></button>
                    </form>
                </dd>

                <dd>
                    <form action="{{ action('ShowController@sort') }}" class="form">
                        <input type="hidden" name="keyword" value="{{ $keyword }}">
                        <button type="submit" class="btn sort2 btn-brackets" name="sort" value="asc"><span class="sort">登録順　｜</span></button>
                    </form>
                </dd>

                <dd>
                    <form action="{{ action('ShowController@sort') }}" class="form">
                        <input type="hidden" name="keyword" value="{{ $keyword }}">
                        <button type="submit" class="btn sort3 btn-brackets" name="sort" value="cheap"><span class="sort">価格が安い順　｜</span>
                        </button>
                    </form>
                </dd>

                <dd>
                    <form action="{{ action('ShowController@sort') }}" class="form">
                        <input type="hidden" name="keyword" value="{{ $keyword }}">
                        <button type="submit" class="btn sort4 btn-brackets" name="sort" value="expensive"><span class="sort">価格が高い順</span>
                        </button>
                    </form>
                </dd>
            </dl>

        </div>

        <div class="msg">
            {{--<div class="word">--}}
            @if(!empty($keyword))
                <span class="keyword">検索結果："{{ $keyword }}"</span>
            @endif
            {{--</div>--}}
            {{--<div class="countmsg">--}}
            @if($items->count() == 0)
                <span class="count">{{ $items->count() }}件（全{{ $items->total() }}件）</span>
            @else
                <span class="count">{{ $items->firstItem() }}件〜{{ $items->lastItem() }}件（全{{ $items->total() }}件）</span>
            @endif
            {{-- </div>--}}
        </div>


        @if($items->count())
            <ul class="itemList">
                @foreach($items as $item)
                    <a href="{{ action('ShowController@detail', $item->id) }}">
                        <li class="list">
                            <div class="item">
                                <a href="{{ action('ShowController@detail', $item->id) }}">
                                    <div class="hoge">
                                        <img src="{{ asset('images/products/'.$item->main_image) }}" alt="" class="product">

                                    </div>
                                </a>
                            </div>
                            <div class="item">
                                <a class="item" href="{{ action('ShowController@detail', $item->id) }}">
                                    <span>{{ $item->title }}</span>
                                </a>

                            </div>
                            <div class="item">
                                <span>￥{{ $item->price }}</span>
                            </div>
                        </li>
                    </a>

                @endforeach
            </ul>
        @else
            <p>該当する商品はありませんでした。</p>
        @endif

        {{--{{ $message }}--}}
        {{--<div>現在のページに表示されている件数: {{ $items->count() }}</div>--}}
        {{--<div>現在のページ数: {{ $items->currentPage() }}</div>--}}
        {{--<div>現在のページの最初の要素: {{ $items->firstItem() }}</div>--}}
        {{--<div>次のページがあるかどうか: {{ $items->hasMorePages() }}</div>--}}
        {{--<div>現在のページの最後の要素: {{ $items->lastItem() }}</div>--}}
        {{--<div>最後のページ数: {{ $items->lastPage() }}</div>--}}
        {{--<div>次のページのURL: {{ $items->nextPageUrl() }}</div>--}}
        {{--<div>1ページに表示する件数: {{ $items->perPage() }}</div>--}}
        {{--<div>前のページのURL: {{ $items->previousPageUrl() }}</div>--}}
        {{--<div>合計件数: {{ $items->total() }}</div>--}}
        {{--<div>指定ページのURL: {{ $items->url(4) }}</div>--}}


        <div class="next">{{ $items->appends(Request::query())->links() }}</div>
    </div>
</main>


@include('flovis.flovis_layout.footer')


<script src="{{ asset('js/submitbtn.js') }}"></script>

</body>
</html>