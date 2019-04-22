<!doctype html>
<html lang="ja">
<head>
    <title>パスワード再設定</title>
    @include('flovis.flovis_layout.head')
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
</head>

<body class="drawer drawer--left">

@include('flovis.flovis_layout.header')

<main>

    <div class="title">パスワード再設定</div>

    <div class="center">
        <form action="{{ route('password.request') }}" method="post" class="resetForm">
            @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
            <dl>
                <dt><i class="fas fa-envelope-square"></i> メールアドレス</dt>
                <dd>
                    <input id="email" type="email"
                           class="inputForm form-control{{ $errors->has('email') ? ' is-invalid' : '' }} input_form input_inp1" name="email"
                           value="{{ $email ?? old('email') }}" required autofocus placeholder="メールアドレス">
                    <div class="error">
                        @if ($errors->has('email'))
                            {{ $errors->first('email') }}
                        @endif
                    </div>
                </dd>

                <dt><i class="fas fa-key"></i> 新しいパスワード</dt>
                <dd>
                    <input id="password" type="password"
                           class="inputForm form-control{{ $errors->has('password') ? ' is-invalid' : '' }} input_form input_inp2"
                           name="password" required placeholder="パスワード">
                    <br>
                    <input id="password-confirm" type="password" class="inputForm form-control input_form input_inp3"
                           name="password_confirmation" required placeholder="パスワード確認用">
                    @if ($errors->has('password'))
                        <div class="error">{{ $errors->first('password') }}</div>
                    @endif
                    <div class="error">{{ $errors->first('password_confirmation') }}</div>
                </dd>
            </dl>
            <div class="btnSpace">
                <button type="submit" class="btn btn-primary btnForm">
                    {{ __('送信') }}
                </button>
            </div>
        </form>
    </div>
</main>

@include('flovis.flovis_layout.footer')

</body>
</html>