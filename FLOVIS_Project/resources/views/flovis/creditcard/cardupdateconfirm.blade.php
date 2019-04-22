<!doctype html>
<html lang="ja">
<head>
    <title></title>
    @include('flovis.flovis_layout.head')
    <link rel="stylesheet" href="{{ asset('css/cardUpdateConfirm.css') }}">
</head>
<body class="drawer drawer--left">

@include('flovis.flovis_layout.header')

<main>

    <div class="title">登録クレジットカード確認</div>

    <div class="center">

        <form action="{{ route('card.update.complete') }}" method="post">
            @csrf
            <input type="hidden" name="user_id" value="{{ $data['user_id'] }}">
            <input type="hidden" name="cardNum" value="{{ $data['cardNum'] }}">
            <input type="hidden" name="securityCode" value="{{ $data['securityCode'] }}">
            <input type="hidden" name="expirationMonth" value="{{ $data['expirationMonth'] }}">
            <input type="hidden" name="expirationYear" value="{{ $data['expirationYear'] }}">
            <input type="hidden" name="name" value="{{ $data['name'] }}">

            {{-- カード番号 --}}
            <dl>
                <dt><i class="far fa-credit-card"></i> クレジットカード番号</dt>
                <dd>{{ $data['cardNum'] }}</dd>


                {{-- セキュリティコード --}}
                <dt><i class="fas fa-key"></i> セキュリティコード</dt>
                <dd>{{ $data['securityCode'] }}</dd>

                {{-- 有効期限 --}}
                <dt><i class="far fa-clock"></i> 有効期限</dt>
                <dd>{{ $data['expirationMonth'] }}/{{ $data['expirationYear'] }}</dd>

                {{-- 名義人 --}}
                <dt><i class="far fa-user"></i> クレジットカード名義人</dt>
                <dd>{{ $data['name'] }}</dd>
            </dl>

            <div class="btnSpace">
                <button type="button" class="btn back" onclick="history.back();">入力画面に戻る</button>

                <button type="submit" class="btn next">登録</button>
            </div>



        </form>

    </div>

</main>

@include('flovis.flovis_layout.footer')

</body>
</html>