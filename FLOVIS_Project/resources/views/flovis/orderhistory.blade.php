<!doctype html>
<html lang="ja">
<head>
    <title>購入履歴</title>
    @include('flovis.flovis_layout.head')
    <link rel="stylesheet" href="{{ asset('css/orderhistory.css') }}">
</head>
<body class="drawer drawer--left">

@include('flovis.flovis_layout.header')

<main>

    <span class="title">ご注文履歴</span>

    <div class="center">
        {{--<div class="test">--}}
            @foreach($products as $product)
                {{--{{ var_dump($prices) }}--}}
                <div class="orderlist">
                    <div class="product">
                        <div>
                            <span class="msg">販売店：</span>{{ $product->name }}　
                            <span class="msg">お届け先：</span>〒{{ $product->firstZip }}-{{ $product->lastZip }}　
                        </div>
                    </div>

                    {{--<p>{{ $product->id }}</p>--}}
                    <a href="{{ action('ShowController@detail', $product->id) }}">
                        <img src="{{ asset('/images/products/'.$product->main_image) }}" alt="" class="image">
                    </a>

                    <p class="message"><span class="msg">購入日：</span>{{ $product->created_at }}</p>
                    <p class="message"><span class="msg">商品名：</span><a href="{{ action('ShowController@detail', $product->id) }}" class="link">{{ $product->title }}</a></p>
                    <p class="message"><span class="msg">　値段：</span><span class="price">￥{{ $product->price }}</span></p>
                    <p class="message"><span class="msg">　数量：</span>{{ $product->qty }}</p>
                </div>
            @endforeach

            @forelse($products as $product)
                @if($product->id != $id)
                    {{--<h1>hoge</h1>--}}
                    @break
                @else

                    @break
                @endif
            @empty
                <p class="msg">
                    購入した商品はありません。<br>
                    <a href="{{ route('home') }}">トップへ戻る</a>
                </p>

            @endforelse

            <div class="next">{{ $products->links() }}</div>
        {{--</div>--}}

    </div>
</main>

@include('flovis.flovis_layout.footer')

</body>
</html>