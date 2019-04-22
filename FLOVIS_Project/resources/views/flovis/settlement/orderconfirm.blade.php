<!doctype html>
<html lang="ja">
<head>
    <title></title>
    @include('flovis.flovis_layout.head')
    <link rel="stylesheet" href="{{ asset('css/orderconfirm.css') }}">
</head>
<body class="drawer drawer--left">

@include('flovis.flovis_layout.header')

<main>
    <form action="{{ route('buy.user.finish') }}" method="post">
        @csrf
        {{-- 受取人情報 --}}
        <input type="hidden" name="user_id" value="{{ Auth::id() }}">
        <input type="hidden" name="ReceiverName" value="{{ $data['ReceiverName'] }}">
        <input type="hidden" name="ReceiverkanaName" value="{{ $data['ReceiverkanaName'] }}">
        <input type="hidden" name="yubin21" value="{{ $data['yubin21'] }}">
        <input type="hidden" name="yubin22" value="{{ $data['yubin22'] }}">
        <input type="hidden" name="region21" value="{{ $data['region21'] }}">
        <input type="hidden" name="local21" value="{{ $data['local21'] }}">
        <input type="hidden" name="addr21" value="{{ $data['addr21'] }}">
        <input type="hidden" name="tel" value="{{ $data['tel'] }}">
        <input type="hidden" name="ReceiverDate" value="{{ $data['ReceiverDate'] }}">
        <input type="hidden" name="ReceiverTime" value="{{ $data['ReceiverTime'] }}">

        {{-- 備考 --}}
        <input type="hidden" name="remarks" value="{{ $data['remarks'] }}">



        <div class="msgbox">
            <div class="middle">
                <span class="attention">注文ボタンは1度だけ押してください</span><br>
                <p>※注文完了画面の表示に時間がかかる場合がありますが、そのままお待ち下さい。注文ボタンを複数回押されますとご注文手続きが重複する場合がございます。</p>
            </div>
        </div>

        <div class="btnSpace">
            <button type="submit" class="orderBtn btn" onClick="javascript:double(this)">ご注文を確定する</button>
        </div>


        <div class="title">ご注文内容</div>
        <div class="center">
            {{--お届け先情報--}}
            <div class="Addressee">
                <h3 class="subtitle">お届け先情報</h3>
                <p>{{ $data['ReceiverName'] }}/{{ $data['ReceiverkanaName'] }}</p>
                <p>〒{{ $data['yubin21'] }}-{{ $data['yubin22'] }}</p>
                <p>{{ $data['region21'] }},{{ $data['local21'] }},{{ $data['addr21'] }}</p>
                <p>{{ $data['tel'] }}</p>
            </div>

            <hr class="border">

            {{--注文内容--}}
            <div class="orderContent">
                <p>消費税：￥{{ $tax }}</p>
                <p>商品合計：￥{{ $subtotal }}</p>
                <hr class="hr1">
                <p class="total">お支払い合計金額：<span class="totalColor">￥{{ $total }}</span><span class="taxIn">（税込）</span></p>
            </div>
        </div>


        {{--注文商品--}}
        <div class="title2">ご注文商品</div>
        <div class="center2">
            <div class="orderProduct">
                @foreach($contents as $row)
                    <div class="product">
                        @foreach($products as $product)

                            @if($row->id == $product->id)
                                <a href="/flovis/productList/{{ $row->id }}">
                                    <img src="{{ asset('/images/products/'.$product->main_image) }}" alt="" class="orderimg">
                                </a>
                            @endif

                        @endforeach

                        {{--<hr>--}}

                        {{--<div class="">--}}

                        <span class="productTitle">
                            <a class="link" href="/flovis/productList/{{ $row->id }}">{{ $row->name }}</a>
                        </span>
                            <br>
                            <p class="productPrice">商品単価：￥{{ $row->price }} <span class="taxmark">（税抜）</span></p>
                            <p class="productQty">数量：{{ $row->qty }}</p>
                        {{--</div>--}}

                        <span class="productTax">
                            <p>税込価格：<span class="price">￥{{ $row->price * $row->qty * 1.08 }}</span>（送料別途）</p>
                        </span>


                    </div>
                @endforeach
            </div>

        </div>

        {{--注文詳細--}}
        <div class="title3">ご注文詳細</div>
        <div class="center3">
            <h3 class="subtitle">ご注文者情報</h3>
            <p><i class="fas fa-user"></i> お名前：{{ $user->firstName }}{{ $user->lastName }}/{{ $user->kanafirstName }}{{ $user->kanalastName }}</p>
            <p><i class="fas fa-envelope-square"></i> メールアドレス：{{ $user->email }}</p>
            @foreach($addresses as $address)
                <p>〒 {{ $address->firstZip }}-{{ $address->lastZip }} / {{ $address->region }},{{ $address->local }},{{ $address->addr }}</p>
                <p><i class="fas fa-phone"></i> 電話番号：{{ $address->tel }}</p>
            @endforeach
            <a href="{{ route('profile') }}" class="edit">編集</a>
            <hr>

            <h3 class="subtitle">お届け先情報</h3>
            <p><i class="fas fa-user"></i> お名前：{{ $data['ReceiverName'] }} / {{ $data['ReceiverkanaName'] }}</p>
            <p>〒 {{ $data['yubin21'] }}{{ $data['yubin22'] }} / {{ $data['region21'] }}{{ $data['local21'] }}{{ $data['addr21'] }}</p>
            <p><i class="fas fa-phone"></i> 電話番号：{{ $data['tel'] }}</p>
            <a href="{{ route('buy.user.zip') }}" class="edit">編集</a>

            <hr>

            <h3 class="subtitle">お届け方法</h3>
            <p>宅配便</p>
            <p><i class="fas fa-calendar-day"></i> 配送希望日：{{ $data['ReceiverDate'] }}</p>
            <p><i class="far fa-clock"></i> 配送時間帯：{{ $data['ReceiverTime'] }}</p>
            <a href="#" onclick="history.back()" class="edit">編集</a>
        </div>

        <div class="title4">備考</div>
        <div class="center4">
            <p>{{ $data['remarks'] }}</p>
            {{--<a href="#" onclick="history.back()" class="edit">編集</a>--}}
        </div>


        <div class="btnSpace">
            <button type="submit" class="orderBtn btn bottomBtn">ご注文を確定する</button>
        </div>

    </form>
</main>

@include('flovis.flovis_layout.footer')

<script>
    $('.btn').click(function() {
        $(this).click(function () {
            alert('只今処理中です。\nそのままお待ちください。');
            return false;
        });
    });
</script>

</body>
</html>