<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title','新規会員登録')</title>
    <!-- css -->
    <link rel="stylesheet" href="{{ asset('css/customer_register_form.css') }}">
    <!-- drawer.css -->
<!--    <link rel="stylesheet" href="{{ asset('css/drawer.min.css') }}">-->
    <!-- jquery & iScroll -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!--    <script src="https://cdnjs.cloudflare.com/ajax/libs/iScroll/5.2.0/iscroll.min.js"></script>-->
    <!-- drawer.js -->
<!--    <script src="https://cdnjs.cloudflare.com/ajax/libs/drawer/3.2.2/js/drawer.min.js"></script>-->

    <script src="{{ asset('js/ajaxzip3-source.js') }}"></script>

</head>
<body class="drawer drawer--left">
{{--<img src="{{ asset('images/flovis_background_image.jpg') }}" alt="" class="background">--}}

<header role="banner" class="navbar">

    {{-- ハンバーガーメニュー --}}
    <button type="button" class="drawer-toggle drawer-hamburger">
        {{--<span class="sr-only">toggle navigation</span>--}}
        <span class="drawer-hamburger-icon"></span>
    </button>
    <nav class="drawer-nav" role="navigation">
        <ul class="drawer-menu">
            <li><a class="drawer-menu-item" href="{{ url('/flovis') }}">HOME</a></li>
            <li><a class="drawer-menu-item" href="#">About</a></li>
            <li><a class="drawer-menu-item" href="{{ url('/flovis/productList/') }}">Product</a></li>
            <li><a class="drawer-menu-item" href="{{ url('/flovis/FAQ/') }}">FAQ</a></li>
            <li><a class="drawer-menu-item" href="#"><img src="{{ asset('images/InstagramIcon.svg') }}"
                                                          alt="InstagramIcon" class="instagramIcon"></a></li>
        </ul>
        <img src="{{ asset('images/flovis_logo00.png') }}" alt="logo" class="flovisLogo">
    </nav>

    {{--ロゴ--}}
    <a href="{{ route('home') }}">
        <img src="{{ asset('images/logo.svg') }}" alt="Logo" class="logoImg">
    </a>

    <div class="container">
        {{--検索--}}
        <div class="search">
            <form action="{{ action('ShowController@sort') }}" method="get" name="search">
                <input type="text" class="searchForm" name="keyword" placeholder="キーワード検索">
                <button type="submit" class="bubbly-button">Search</button>
            </form>
        </div>

        {{--ログイン--}}
        <div class="headerLogin">
            <ul class="menu">
                @if(auth()->guest())
                    <li>
                        <a href="{{ route('login') }}">
                            <img src="{{ asset('images/login.svg') }}" alt="login" class="loginImg">
                            <span class="loginMsg">Login</span>
                        </a>
                    </li>
                @else
                    @if(auth()->user())
                        <li class="menu__single">
                            <a href="#">
                                <img src="{{ asset('images/user.svg') }}" alt="user" class="userImg">
                                <span class="userName init-bottom">{{ Auth::user()->name }}</span>
                            </a>

                            <ul class="menu__second-level">
                                {{--<li class="item"><a href="#" class="item">メールアドレスの変更</a></li>--}}
                                <li class="item"><a href="#" class="item">お気に入り</a></li>
                                <li class="item"><a href="{{ route('card') }}" class="item">クレジットカード情報</a></li>
                                <li class="item"><a href="" class="item">購入履歴</a></li>
                                <li class="item"><a href="#" class="item" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">ログアウト</a></li>
                            </ul>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    @endif
                @endif
            </ul>
        </div>

        {{--カート--}}
        <div class="cart">
            <a href="{{ route('cart')}}" class="cart">
                <img src="{{ asset('images/cart.svg') }}" alt="cart" class="cartImg">
                <span class="cartMsg">Cart</span>
            </a>
        </div>

    </div>

</header>

<!--    <h1>新規会員登録画面</h1>-->
    <div class="main">
        <div id="contents">
            <div class="title"><span>新規会員登録</span></div>
            <div class="explain">
                ・ユーザーIDは当サイトでのログインやユーザ管理に使われます。<br>
                ・郵便番号は入力後に住所が自動入力されます。<br>
                ・入力の不備や虚偽の情報を入力されますと、<br>
                ・英数字はすべて半角でご入力下さい。<br>
            </div>
            <form action="{{ route('customer_confirm') }}" method="post" id="signupForm" class="form">
                <fieldset class="tbl_form">

                    <!-- ユーザーID -->
                    <dl>
                        <dt class="dt_left_top">
                            <label>ユーザーID（必須）</label>
                        </dt>
                        <dd class="dd_right_top">
                            <input type="text" name="userId" class="input_form input_inp1" placeholder="ID" value="{{ old('userId') }}">
                            @if($errors->has('userId'))<span class="error">{{ $errors->first('userId') }}</span> @endif
                        </dd>
                    </dl>

                     <!--名前-->
                    <dl>
                        <dt>
                            <label>お名前（必須）</label>
                        </dt>
                        <dd>
                            <input type="text" name="name1" class="input_form input_inp2" placeholder="姓" value="{{ old('name1') }}">
                            <input type="text" name="name2" class="input_form input_inp3" placeholder="名" value="{{ old('name2') }}">
                            @if($errors->has('name1'))<span class="error">{{ $errors->first('name1') }}</span>
                            @elseif($errors->has('name2'))<span class="error">{{ $errors->first('name2') }}</span>
                            @endif
                        </dd>
                    </dl>

                    <!-- 名前（フリガナ） -->
                    <dl>
                        <dt>
                            <label>お名前（フリガナ）</label>
                        </dt>
                        <dd>
                            <input type="text" name="kanaSei" class="input_form input_inp2" placeholder="セイ" value="{{ old('kanaSei') }}" >
                            <input type="text" name="kanaMei" class="input_form input_inp3" placeholder="メイ" value="{{ old('kanaMei') }}" >
                            @if($errors->has('kanaSei'))<span class="error">{{ $errors->first('kanaSei') }}</span>
                            @elseif($errors->has('kanaMei'))<span class="error">{{ $errors->first('kanaMei') }}</span>
                            @endif
                        </dd>
                    </dl>

                    <!-- パスワード -->
                    <dl>
                        <dt>
                            <label>パスワード（必須）</label>
                        </dt>
                        <dd>
                            <input type="password" name="pw" id="pw" class="input_form input_inp4" value="{{ old('pw') }}" placeholder="パスワード" ><span class="error">{{ $errors->first('pw') }}</span><br>
                            <input type="password" name="pwConfirm" id="pwConfirm" class="input_form input_inp5" value="{{ old('pwConfirm') }}" placeholder="パスワード（確認用）" oninput="CheckPassword(this)"><span class="error">{{ $errors->first('pwConfirm') }}</span>
                            @if($errors->has('pw'))
                            @elseif($errors->has('pwConfirm'))
                            @endif
                        </dd>
                    </dl>


                    <!-- メールアドレス -->
                    <dl>
                        <dt>
                            <label>メールアドレス（必須）</label>
                        </dt>
                        <dd>
                            <input type="text" name="email" class="input_form input_inp6" placeholder="メールアドレス" >
                            @if($errors->has('email'))<span class="error">{{ $errors->first('email') }}</span> @endif
                        </dd>
                    </dl>

                    <!-- 住所 -->
                    <dl>
                        <dt>
                            <label>住所（必須）</label>
                        </dt>
                        <dd>
                            <ul>

                                <li class="nonstyle">
                                    <span>〒</span>
                                    <input type="text" placeholder=" 123" class="input_form input_inp8" name="yubin21">
                                    <span>ー</span>
                                    <input type="text"  class="input_form input_inp12" name="yubin22" placeholder=" 4567" onkeyup="AjaxZip3.zip2addr('yubin21',this,'region21','local21','addr21')";>
                                    <!--                                    <div class="msg">入力後に住所が自動入力されます</div>-->
                                    @if($errors->has('yubin21'))<span class="error">{{ $errors->first('yubin21') }}</span>
                                    @elseif($errors->has('yubin22'))<span class="error">{{ $errors->first('yubin22') }}</span>
                                    @endif

                                </li>
                                <li class="nonstyle">
                                    <input type="text" class="input_form input_inp9" name="region21" placeholder="都道府県">
                                    @if($errors->has('region21'))<span class="error">{{ $errors->first('region21') }}</span> @endif
                                </li>
                                <li class="nonstyle">
                                    <input type="text" class="input_form input_inp9" name="local21" placeholder="市区町村">
                                    <!--                                    <div class="msg">住所の続きを入力してください</div>-->
                                    @if($errors->has('local21'))<span class="error">{{ $errors->first('local21') }}</span> @endif
                                </li>
                                <li class="nonstyle">
                                    <input type="text" class="input_form input_inp10" name="addr21" placeholder="それ以降の住所">
                                    @if($errors->has('addr21'))<span class="error">{{ $errors->first('addr21') }}</span> @endif
                                </li>
                            </ul>
                        </dd>
                    </dl>

<!--                    電話番号-->
                    <dl class="hoge">
                        <dt class="telspace">
                            <label>電話番号（必須）</label>
                        </dt>
                        <dd class="dd_right_bottom">
                            <input type="text" name="tel" class="input_form input_inp11" value="{{ old('tel') }}" placeholder="ハイフンなし">
                            @if($errors->has('tel'))<span class="error">{{ $errors->first('tel') }}</span> @endif
                        </dd>
                    </dl>
                </fieldset>

                <div class="btn_space">
                    <button type="submit" class="btn">
                        確認へ進む
                    </button>
                </div>

                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </form>
        </div>
    </div>
    <footer>
        @yield('footer')
    </footer>
<!--<script>-->
<!--    $(document).ready(function() {-->
<!--        $('.drawer').drawer();-->
<!--    });-->
<!--</script>-->
</body>
</html>