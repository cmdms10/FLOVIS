<!doctype html>
<html lang="ja">
<head>
    <title>購入手続き完了</title>
    <link rel="stylesheet" href="{{ asset('css/orderFinish.css') }}">
    @include('flovis.flovis_layout.head')
</head>
<body  class="drawer drawer--left">

@include('flovis.flovis_layout.header')

<main>

    <div class="title">ご注文ありがとうございました。</div>

    <div class="center">

        <div class="msgbox">
            <p>登録して頂いたメールアドレスに購入確認メールをお送りしました。</p>
            <p>このメールにはお客様の購入内容が記載されておりますので、商品到着まで大切に保管してください。</p>
            <p class="attention">到着予定日：{{ $data['ReceiverDate'] }}　{{ $data['ReceiverTime'] }}</p>
{{--            <p>{{ var_dump($cards) }}</p>--}}
            <p class="msg">引き続きflovisをお楽しみください。</p>
        </div>

    </div>

    <div class="btnSpace">
        <a href="{{ route('home') }}" class="btn">トップへ戻る</a>
    </div>

</main>

</body>
</html>