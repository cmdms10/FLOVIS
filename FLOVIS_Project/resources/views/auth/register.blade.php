<!doctype html>
<html lang="ja">
<head>
    <title>新規会員登録</title>
    @include('flovis.flovis_layout.head')
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
</head>

<body class="drawer drawer--left">

@include('flovis.flovis_layout.header')

<main>

    <div class="title">新規会員登録</div>

    <div id="contents" class="center">

        <form action="{{ route('registerConfirm') }}" method="post" id="signupForm" class="form">
        @csrf


            <dl>
                <!-- ユーザー名 -->
                <dt class="dt_left_top">
                    <i class="fas fa-user"></i>
                    <label>ユーザー名<span class="required">[必須]</span></label>
                </dt>
                <dd class="dd_right_top">
                    <input type="text" id="name" name="name"
                           class="input_form input_inp1 form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                       placeholder="日本語不可" value="{{ old('name') }}" required>
                    @if($errors->has('name'))<div class="error">{{ $errors->first('name') }}</div> @endif
                </dd>

                <!--名前-->
                <dt>
                    <i class="fas fa-user"></i>
                    <label>お名前<span class="required">[必須]</span></label>
                </dt>
                <dd>
                    <input type="text" name="firstName" class="input_form input_inp2" placeholder="姓"
                           value="{{ old('firstName') }}" required>
                    <input type="text" name="lastName" class="input_form input_inp3" placeholder="名"
                           value="{{ old('lastName') }}" required><br>
                    @if($errors->has('firstName'))<span class="error">{{ $errors->first('firstName') }}</span>
                    @elseif($errors->has('lastName'))<span class="error">{{ $errors->first('lastName') }}</span>
                    @endif
                    {{--<br>--}}
                </dd>
                <dt>
                    <i class="fas fa-user"></i>
                    <label>フリガナ<span class="required">[必須]</span></label>
                </dt>
                <dd>


                    <input type="text" name="kanafirstName" class="input_form input_inp2" placeholder="セイ"
                           value="{{ old('kanafirstName') }}" required>
                    <input type="text" name="kanalastName" class="input_form input_inp3" placeholder="メイ"
                           value="{{ old('kanalastName') }}" required><br>
                    @if($errors->has('kanafirstName'))<span class="error">{{ $errors->first('kanafirstName') }}</span>
                    @elseif($errors->has('kanalastName'))<span class="error">{{ $errors->first('kanalastName') }}</span>
                    @endif
                    <br>
                </dd>


                <!-- メールアドレス -->
                <dt>
                    <i class="far fa-envelope"></i>
                    <label>メールアドレス<span class="required">[必須]</span></label>
                </dt>
                <dd>
                    <input type="text" name="email" class="input_form input_inp6" value="{{ old('email') }}"
                           placeholder="メールアドレス" required>
                    <br>
                    @if($errors->has('email'))<span class="error">{{ $errors->first('email') }}</span> @endif
                </dd>


                <!-- パスワード -->
                <dt>
                    <i class="fas fa-key"></i>
                    <label>パスワード<span class="required">[必須]</span></label>
                </dt>
                <dd>
                    <input type="password" name="password" id="password"
                           class="input_form input_inp4 form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                           placeholder="パスワード" required>

                    <br>
                    <input type="password" name="password_confirmation" id="password-confirm"
                           class="input_form input_inp5" value="{{ old('password_confirmation') }}"
                           placeholder="パスワード（確認用）" oninput="CheckPassword(this)" required>
                    <br>
                    @if ($errors->has('password'))
                        <span class="invalid-feedback error" role="alert">
                            <span class="error">{{ $errors->first('password') }}</span>
                        </span>
                    @endif

                </dd>

            </dl>

            <div class="btn_space form">
                <button type="submit" class="btn">
                    確認へ進む
                </button>
            </div>

        </form>
    </div>
</main>


@include('flovis.flovis_layout.footer')

</body>
</html>