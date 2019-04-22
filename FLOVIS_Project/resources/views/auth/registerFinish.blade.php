<!doctype html>
<html lang="ja">
<head>
    <title>登録完了</title>
    @include('flovis.flovis_layout.head')
    <link rel="stylesheet" href="{{ asset('css/registerFinish.css') }}">
</head>
<body class="drawer drawer--left">

@include('flovis.flovis_layout.header')

<main>

    <div class="title">登録を完了しました。</div>

    <div class="center">

        <div>
            <p class="msg">引き続きショッピングをお楽しみ下さい。</p>
        </div>

    </div>

    <div class="btnSpace">
        <a class="btn" href="{{ route('home') }}">トップへ戻る</a>
    </div>


</main>


</body>
</html>






