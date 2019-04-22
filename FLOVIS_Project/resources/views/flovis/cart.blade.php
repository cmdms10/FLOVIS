<!doctype html>
<html lang="ja">
<head>
    <title>カート</title>
    @include('flovis.flovis_layout.head')
    <link rel="stylesheet" href="{{ asset('css/cart.css') }}">
</head>
<body class="drawer drawer--left">

@include('flovis.flovis_layout.header')

<main>

    @forelse($contents as $row)

        <form action="{{ route('buy.user.zip') }}" class="topForm">
            <button type="submit" class="submit">ご注文お手続きへ</button>
        </form>

        @break

    @empty
        <form action="#" class="topForm">
            <button type="button" onclick="history.back();" class="back">戻る</button>
        </form>
    @endforelse


    <div class="center">

        <div class="total">
            <span class="middle">
                <p>　　消費税：￥{{ $tax }}</p>
                <p>　　　小計：￥{{ $subtotal }}</p>
                <p>　商品合計：<span class="price">￥{{ $total }}</span><span class="taxmark">（税込）</span></p>
                <p>　※送料や割引によって変動する場合がございます。</p>
            </span>

        </div>

        <hr>

        <div class="contentList">

            <div class="content">
                <p>▼カートには以下の商品が入っています。</p>

                <div class="cartlist">

                    @forelse($contents as $row)
                        {{--{{ var_dump($row->name) }}--}}
                        <div class="product">
                            @foreach($products as $product)

                                @if($row->id == $product->id)
                                    <img src="{{ asset('/images/products/'.$product->main_image) }}" alt=""
                                         class="cartimg">
                                @endif

                            @endforeach

                            {{--<hr>--}}

                            {{--<div class="">--}}

                            <span class="productTitle">
                                <a class="link" href="productList/{{ $row->id }}">{{ $row->name }}</a>
                            </span>
                            <br>
                            <span class="productPrice">商品単価：￥{{ $row->price }} <span class="taxmark">（税抜）</span></span>
                            {{--</div>--}}

                            <br>
                            <span class="num">
                            <form action="{{ route('cart.update') }}" method="get">
                                <input type="hidden" name="rowId" value="{{ $row->rowId }}">

                                    数量：<select name="qty">
                                    <option value="1" @if($row->qty == 1) selected @endif>1</option>
                                    <option value="2" @if($row->qty == 2) selected @endif>2</option>
                                    <option value="3" @if($row->qty == 3) selected @endif>3</option>
                                    <option value="4" @if($row->qty == 4) selected @endif>4</option>
                                    <option value="5" @if($row->qty == 5) selected @endif>5</option>
                                    <option value="6" @if($row->qty == 6) selected @endif>6</option>
                                    <option value="7" @if($row->qty == 7) selected @endif>7</option>
                                    <option value="8" @if($row->qty == 8) selected @endif>8</option>
                                    <option value="9" @if($row->qty == 9) selected @endif>9</option>
                                    <option value="10" @if($row->qty == 10) selected @endif>10</option>
                                    <input type="hidden" name="rowId" value="{{ $row->rowId }}">
                                </select>

                                <button type="submit" class="numChange">数量変更</button>
                            </form>
                            </span>

                            <span class="productTax">
                                <p>税込価格：<span class="price">￥{{ $row->price * $row->qty * 1.08 }}</span>（送料別途）</p>
                            </span>

                            <span class="productDetailBtn">
                                    <form action="{{ route('cart.delete') }}" method="post" class="productDeleteBtn">
                                        @csrf
                                        <input type="hidden" name="rowId" value="{{ $row->rowId }}">
                                        <button type="submit" class="deletebtn">削除</button>
                                    </form>
                            </span>


                        </div>
                    @empty

                        <p class="cartNone">ショッピングカートには商品が入っていません。引続きお買い物をお楽しみ下さい。</p>
                    @endforelse

                </div>

            </div>
        </div>

        @forelse($contents as $row)

            <div class="text-right">

                <form action="{{ route('buy.user.zip') }}" class="buttonForm">
                    <button type="submit" class="submit">ご注文お手続きへ</button>
                    <br>
                    <button type="button" onclick="history.back();" class="back">戻る</button>
                </form>

            </div>
            @break

        @empty
            <div class="buttonForm">
                <button type="button" class="back btn" onclick="history.back();" >戻る</button>
            </div>

            {{--<div class="text-right">--}}
            {{--<button type="button" class="btn btn-success" onclick="history.back()">戻る</button>--}}
            {{--</div>--}}

        @endforelse

    </div>

</main>

@include('flovis.flovis_layout.footer')

</body>
</html>