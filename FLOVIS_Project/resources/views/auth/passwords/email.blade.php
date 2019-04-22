<!doctype html>
<html lang="ja">
<head>
    <title>パスワード再設定</title>
    @include('flovis.flovis_layout.head')
    <link rel="stylesheet" href="{{ asset('css/email.css') }}">
</head>

<body class="drawer drawer--left">

@include('flovis.flovis_layout.header')

<main>

    <div class="title">パスワード再設定</div>

    <div class="center">
        <form action="{{ route('password.email') }}" method="post" class="form">
            @if (session('status'))
                <div class="flash_message">
                    {{ session('status') }}
                </div>
            @endif

            @csrf
            <div class="str">
                登録されたメールアドレスを入力してください。<br>パスワード再発行URLを送付いたします。<br>メールが届いてから1時間以内に再設定が行われない場合、もう一度やり直して下さい。
            </div>

            <span class="form">
                    <div class="input_form">
                        メールアドレス<input id="email" type="email"
                                      class="input_form form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                      name="email" value="{{ $email ?? old('email') }}" placeholder="例）flovis@example.com" autocomplete="off" required
                                      autofocus><br>
                        <div class="error">
                            @if($errors->has('email'))
                                {{ $errors->first('email') }}
                            @endif
                        </div>

            </div>
                </span>


            <div class="btn_space">
                <button type="button" class="back" onclick="location.href='{{ route('login') }}'">ログイン画面に戻る</button>
                <button type="submit" class="submit">送　信</button>
            </div>

        </form>
    </div>
</main>

@include('flovis.flovis_layout.footer')

</body>
</html>