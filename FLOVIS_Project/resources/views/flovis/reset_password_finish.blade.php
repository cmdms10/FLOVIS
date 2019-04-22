<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--css-->
    <link rel="stylesheet" href="{{ asset('css/reset_password.css') }}">
    <!--script-->
    <script src="{{ asset('/vendor/jquery/jquery.js') }}"></script>
    <title>demo</title>
</head>
<body>
<header>
    @yield('navbar')
</header>
<h1>パスワードの再設定</h1>
<div class="content">
    <p class="str1">更新を完了しました</p>
    <p class="str2">引き続き当サイトをお楽しみください。</p>
</div>

<a class="btn" href="#">トップページへ戻る</a>

<footer>
    @yield('footer')
</footer>
</body>
</html>