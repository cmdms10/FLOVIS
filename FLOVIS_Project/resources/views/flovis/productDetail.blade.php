<!doctype html>
<html lang="ja">
<head>

    @include('flovis.flovis_layout.head')
    <title>{{ $product->title }}</title>
    <link rel="stylesheet" href="{{ asset('css/productDetail.css') }}">

</head>

<body class="drawer drawer--left">

@include('flovis.flovis_layout.header')

<main>
    <div class="title">
        <h1>
            <span>{{ $product->title }}</span>
        </h1>
    </div>
    <div class="center">

        <div id="content">
            <div id="featured_img">
                <a href="#" class="mainImg">
                    <img src="{{ asset('images/products/'.$product->main_image) }}" alt="aaa" id="img" class="main">
                </a>
            </div>
            <div id="thumb_img" class="cf">
                <ul>
                    @if(isset($product->main_image))
                        <li>
                            <img src="{{ asset('images/products/'.$product->main_image) }}" alt="1"
                                 class="product active"
                                 onclick="changeimg('{{ asset("images/products/".$product->main_image) }}',this);">

                        </li>
                    @endif
                    @if(isset( $product->second_image ))
                        <li>
                            <img src="{{ asset('images/products/'.$product->second_image) }}" alt="1"
                                 class="second product"
                                 onclick="changeimg('{{ asset("images/products/".$product->second_image) }}',this);">
                        </li>
                    @endif
                    @if(isset( $product->third_image ))
                        <li>
                            <img src="{{ asset('images/products/'.$product->third_image) }}" alt="2"
                                 class="third product"
                                 onclick="changeimg('{{ asset("images/products/".$product->third_image) }}',this);">

                        </li>
                    @endif
                    @if(isset( $product->fourth_image ))
                        <li>
                            <img src="{{ asset('images/products/'.$product->fourth_image) }}" alt="3"
                                 class="fourth product"
                                 onclick="changeimg('{{ asset("images/products/".$product->fourth_image) }}',this);">
                        </li>
                    @endif
                </ul>
            </div>
        </div>

        <div class="content">
            <h3>
                <span>商品説明</span>
                <p class="description">{!! $product->description !!}</p>
            </h3>

            <h3>
                <span>参考花材</span>
                <P>{{ $product->material }}</P>
            </h3>

            <h3>
                <span>参考サイズ</span>
                <p>高さ: {{ $product->height }}cm x 幅: {{ $product->width }}cm</p>
            </h3>

            <h3>
                <span>取扱店舗</span>
                @foreach($markets as $market)
                    <dl>

                        <dt>店名</dt>
                        <dd>{{ $market->name }}</dd>
                        <dt>メールアドレス</dt>
                        <dd>{{ $market->mail }}</dd>
                        <dt>電話番号</dt>
                        <dd>{{ $market->phone }}</dd>
                        <dt>URL</dt>
                        <dd>
                            @if(empty($market->url))
                                {{--なし--}}
                            @else
                                <a href="{{ $market->url }}" class="site">{{ $market->url }}</a>
                            @endif
                        </dd>

                    </dl>
                    @break
                @endforeach
            </h3>

            <hr class="pill">

            <div class="price">
                <span class="price">販売価格：￥{{ $product->price }}</span>
            </div>

            <div class="productNum">
                <span class="productNum">商品番号 ： {{ $product->id }}</span>
            </div>

            <div class="total">
                <form action="{{--{{ action('flovis\productList\{id}',$product->id) }}--}}#" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{ $product->id }}">
                    <input type="hidden" name="title" value="{{ $product->title }}">
                    <input type="hidden" name="price" value="{{ $product->price }}">
                    <div class="form">
                        <span class="number">数量 </span>
                        {{--<input type="number" min="1" max="10" placeholder="最大10個まで">--}}
                        <select name="qty" id="qty">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                    </div>
                    <div class="btn_space">
                        <button type="submit" class="btn"><span class="btnMessage">カートに入れる</span></button>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <div class="center2">
        {{-- 商品レビュー --}}
        <div class="reviewRange">
            <h3 class="reviewTitle">
                <span class="reviewTitle">Customer Voice</span>
            </h3>

            @if(Auth::check())
                <div class="commentForm">
                    <form action="{{ action('CommentController@comments') }}" method="post">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        {{--<input type="text" name="comment" required>--}}
                        <textarea name="comment" cols="30" rows="10" required></textarea>
                        @if($errors->has('comment')) <div class="error">{{ $errors->first('comment') }}</div> @endif
                        <button type="submit" class="cmtBtn">コメントを送信する</button>
                    </form>
                </div>
            @else
                <div class="commentForm">
                    <p>ログインしてレビューを書こう！</p>
                </div>
            @endif


            <div class="reviewList">
                <div>
                    <h3>他のユーザーの声</h3>
                </div>

                <div class="reviewSpace">
                    @forelse($comments as $comment)
                        {{--<p>$commentsに配列データ有り</p>--}}
                        @if($comment->product_id == $product->id)
                            <div class="review">
                                <p class="cmtUser">{{ $comment->name }}</p>
                                <p class="posted">投稿日：{{ $comment->created_at }}</p>
                                <p class="commentContent">{{ $comment->comment }}</p>
                            </div>
                        @endif
                    @empty
                        {{--<p>空</p>--}}
                    @endforelse
                </div>

            </div>

        </div>

    </div>

</main>

@include('flovis.flovis_layout.footer')

</body>
</html>
