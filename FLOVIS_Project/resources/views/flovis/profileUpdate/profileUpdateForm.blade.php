<!doctype html>
<html lang="ja">
<head>
    <title>ユーザー情報変更</title>
    @include('flovis.flovis_layout.head')
    <link rel="stylesheet" href="{{ asset('css/profileUpdateForm.css') }}">
</head>

<body class="drawer drawer--left">

@include('flovis.flovis_layout.header')

<main>

    <div class="title">ユーザー情報変更</div>

    <div class="center">
        <form action="{{ route('loginUpdate.confirm') }}" method="post">
        @csrf
        <!-- ユーザーID -->
            <dl>
                <dt class="dt_left_top">
                    <label><i class="fas fa-user"></i> ユーザー名</label>
                </dt>
                <dd class="dd_right_top">
                    <input type="text" id="name" name="Name"
                           class="input_form input_inp1 form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                           placeholder="ユーザー名" value="{{ Auth::user()->name }}">
                    @if($errors->has('Name'))<div class="error">{{ $errors->first('Name') }}</div> @endif
                </dd>

                <!--名前-->
                <dt>
                    <label><i class="fas fa-user"></i> お名前</label>
                </dt>
                <dd>
                    <input type="text" name="firstName" class="input_form input_inp2" placeholder="姓"
                           value="{{ Auth::User()->firstName }}">
                    <input type="text" name="lastName" class="input_form input_inp3" placeholder="名"
                           value="{{ Auth::User()->lastName }}">
                    @if($errors->has('firstName'))<div class="error">{{ $errors->first('firstName') }}</div>
                    @elseif($errors->has('lastName'))<div class="error">{{ $errors->first('lastName') }}</div>
                    @endif
                </dd>

                <!-- 名前（フリガナ） -->
                <dt>
                    <label><i class="fas fa-user"></i> フリガナ</label>
                </dt>
                <dd>
                    <input type="text" name="kanafirstName" class="input_form input_inp2" placeholder="セイ"
                           value="{{ Auth::User()->kanafirstName }}">
                    <input type="text" name="kanalastName" class="input_form input_inp3" placeholder="メイ"
                           value="{{ Auth::User()->kanalastName }}">
                    @if($errors->has('kanafirstName'))<div class="error">{{ $errors->first('kanafirstName') }}</div>
                    @elseif($errors->has('kanalastName'))<div class="error">{{ $errors->first('kanalastName') }}</div>
                    @endif
                </dd>

                <!-- メールアドレス -->
                <dt>
                    <label><i class="far fa-envelope"></i> メールアドレス</label>
                </dt>
                <dd>
                    <input type="text" name="email" class="input_form input_inp6" placeholder="example.com" value="{{ Auth::User()->email }}"><br>
                    @if($errors->has('email'))<div class="error">{{ $errors->first('email') }}</div> @endif
                </dd>


                <!-- パスワード -->

                <dt>
                    <label><i class="fas fa-key"></i> パスワード</label>
                </dt>
                <dd>
                    <input type="password" name="password" id="password"
                           class="input_form input_inp4 form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                           value="{{ old('pw') }}" placeholder="新しいパスワード">

                    <br>
                    <input type="password" name="password_confirmation" id="password-confirm"
                           class="input_form input_inp5" value="{{ old('password_confirmation') }}"
                           placeholder="確認用" oninput="CheckPassword(this)"><br>
                    @if ($errors->has('password'))
                        <span class="invalid-feedback error" role="alert">
                        <div class="error">{{ $errors->first('password') }}</div>
                    </span>
                    @endif
                    <div class="error">{{ $errors->first('password_confirmation') }}</div>
                </dd>

            </dl>

            <div class="btnSpace">
                <button type="button" class="btn back" onclick="location.href='{{ route('profile') }}'">戻る</button>
                <button type="submit" class="btn next">確認</button>
            </div>

        </form>
    </div>

</main>

@include('flovis.flovis_layout.footer')


</body>
</html>