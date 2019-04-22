<!doctype html>
<html lang="ja">
<head>
    <title>ログイン</title>
    @include('flovis.flovis_layout.head')
    {{--<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">--}}
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body class="drawer drawer--left">

@include('flovis.flovis_layout.header')


{{-- content --}}
<main>
    <div class="title">Login</div>
    <div class="center">
        <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}" class="loginForm">
            @csrf

            {{--<label for="email" >メールアドレス</label>--}}
            <div class="form">
                <div class="mail"><i class="far fa-envelope"></i></div><input id="email" type="email"
                           class="inputForm form-control{{ $errors->has('email') ? ' is-invalid' : '' }} mail" name="email"
                           value="{{ old('email') }}" placeholder="メールアドレス" required>

                <br>

                <label for="password"></label>
                <div class="pass"><i class="fas fa-key"></i></div><input id="password" type="password"
                       class="inputForm form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                       placeholder="パスワード" required>
                @if ($errors->has('email'))
                    <div class="error">{{ $errors->first('email') }}</div>
                @endif
                @if ($errors->has('password'))
                    <div class="error">{{ $errors->first('password') }}</div>
                @endif

                <br>

                {{--<span class="pwStore">--}}
                        {{--<input class="inputCheck form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>--}}
                        {{--<label class="inputCheck form-check-label" for="remember">--}}
                            {{--パスワードを保存--}}
                        {{--</label>--}}
                {{--</span>--}}
            </div>


            <button type="submit" class="btnForm">ログイン</button>

            <div class="option">
                <p class="str1"><a href="{{ route('password.request') }}">パスワードをお忘れですか？</a></p>
                <p class="str2"><a href="{{ route('register') }}">はじめてのご利用の方（新規会員登録）</a></p>
            </div>


        </form>

    </div>
</main>

</body>
</html>