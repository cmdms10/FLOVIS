<!doctype html>
<html lang="ja">
<head>
    <title>ログイン情報確認</title>
    @include('flovis.flovis_layout.head')
    <link rel="stylesheet" href="{{ asset('css/UpdateConfirm.css') }}">
</head>

<body class="drawer drawer--left">

@include('flovis.flovis_layout.header')

<main>

    <div class="title">ユーザー情報確認</div>

    <div class="center">
        <form action="{{ route('loginUpdate.finish') }}" method="post">
            @csrf
            <input type="hidden" name="Name" value="{{ $data['Name'] }}">
            <input type="hidden" name="firstName" value="{{ $data['firstName'] }}">
            <input type="hidden" name="lastName" value="{{ $data['lastName'] }}">
            <input type="hidden" name="kanafirstName" value="{{ $data['kanafirstName'] }}">
            <input type="hidden" name="kanalastName" value="{{ $data['kanalastName'] }}">
            <input type="hidden" name="email" value="{{ $data['email'] }}">
            <input type="hidden" name="password" value="{{ $data['password'] }}">

            <dl>
                <dt><i class="fas fa-user"></i> ユーザー名</dt>
                <dd>{{ $data['Name'] }}</dd>

                <dt><i class="fas fa-user"></i> お名前</dt>
                <dd>{{ $data['firstName'] }} {{ $data['lastName'] }}</dd>

                <dt><i class="fas fa-user"></i> フリガナ</dt>
                <dd>{{ $data['kanafirstName'] }} {{ $data['kanalastName'] }}</dd>

                <dt><i class="far fa-envelope"></i> メールアドレス</dt>
                <dd>{{ $data['email'] }}</dd>

                <dt><i class="fas fa-key"></i> パスワード</dt>
                {{--<p>{{ $pass }}</p>--}}
                <dd>＊＊＊＊＊＊</dd>

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