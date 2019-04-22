<!doctype html>
<html lang="ja">
<head>
    <title>登録情報確認</title>
    @include('flovis.flovis_layout.head')
    <link rel="stylesheet" href="{{ asset('css/registerConfirm.css') }}">
</head>

<body class="drawer drawer--left">

@include('flovis.flovis_layout.header')

<main>
    <div class="title">登録情報確認</div>

    <div id="contents" class="center">

        <form action="{{ route('register') }}" method="post">
            @csrf
            <input type="hidden" name="name" value="{{ $data['name'] }}">
            <input type="hidden" name="firstName" value="{{ $data['firstName'] }}">
            <input type="hidden" name="lastName" value="{{ $data['lastName'] }}">
            <input type="hidden" name="kanafirstName" value="{{ $data['kanafirstName'] }}">
            <input type="hidden" name="kanalastName" value="{{ $data['kanalastName'] }}">
            <input type="hidden" name="password" value="{{ $data['password'] }}">
            <input type="hidden" name="email" value="{{ $data['email'] }}">

            <dl>
                <!-- ユーザー名 -->
                <dt class="dt_left_top">
                    <i class="fas fa-user"></i>
                    ユーザー名
                </dt>
                <dd class="dd_right_top">{{ $data['name'] }}</dd>

                <!-- 名前 -->
                <dt>
                    <i class="fas fa-user"></i>
                    お名前
                </dt>
                <dd>{{ $data['firstName'] }}　{{ $data['lastName'] }}</dd>

                <!-- 名前（フリガナ） -->
                <dt>
                    <i class="fas fa-user"></i>
                    フリガナ
                </dt>
                <dd>{{ $data['kanafirstName'] }}　{{ $data['kanalastName'] }}</dd>


                <!-- メールアドレス -->
                <dt>
                    <i class="far fa-envelope"></i>
                    メールアドレス
                </dt>
                <dd>{{ $data['email'] }}</dd>

                <!-- パスワード -->
                <dt>
                    <i class="fas fa-key"></i>
                    パスワード
                </dt>
                <dd>＊＊＊＊＊＊</dd>

            </dl>

            <div class="btn_space form">

                <button type="button" class="btn backbtn" onclick="history.back();">
                    入力画面に戻る
                </button>

                <button type="submit" class="btn nextbtn">
                    登録
                </button>

            </div>

        </form>

    </div>

</main>

@include('flovis.flovis_layout.footer')


</body>
</html>