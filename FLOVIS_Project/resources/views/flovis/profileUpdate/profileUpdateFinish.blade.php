<!doctype html>
<html lang="ja">
<head>
    <title>更新完了</title>
    @include('flovis.flovis_layout.head')
    <link rel="stylesheet" href="{{ asset('css/profileUpdateFinish.css') }}">
</head>
<body  class="drawer drawer--left">

@include('flovis.flovis_layout.header')

<main>

    <div class="title">登録を完了しました。</div>

    <div class="center">

        <div>
            <p class="msg">引き続きflovisをお楽しみください。</p>
        </div>

    </div>

    <div class="btnSpace">
        <a href="{{ route('home') }}" class="btn">トップへ戻る</a>
    </div>

</main>

{{--@include('flovis.flovis_layout.footer')--}}

</body>
</html>