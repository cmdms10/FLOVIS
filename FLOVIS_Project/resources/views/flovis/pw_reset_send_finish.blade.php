<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title','hoge')</title>
    <!-- css -->
    <link rel="stylesheet" href="{{ asset('css/password_reset_finish.css') }}">

</head>
<body>
<header>
    @yield('navbar')
</header>
<h1>パスワードの再発行</h1>
<div class="content">
    <p class="str1">入力されたメールアドレスにメールを送信しました。</p>
    <p class="str2">メールをご確認の上、新しく設定してください。</p>
</div>

<a class="btn" href="#">トップページへ戻る</a>

<footer>
    @yield('footer')
</footer>
</body>
</html>