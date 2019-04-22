<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title','ベータログイン')</title>
</head>
<body>
    <h1>ベータログイン</h1>
    <form action="{{ route('login') }}" method="post" >
        <dl>
            <dt>
                <label for="">ユーザーID</label>
            </dt>
            <dd>
                <input type="text" name="userId" >
            </dd>
        </dl>

        <dl>
            <dt>
                <label for="">パスワード</label>
            </dt>
            <dd>
                <input type="password" name="password">
            </dd>
        </dl>

        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <button type="submit" >ログイン</button>
    </form>
</body>
</html>