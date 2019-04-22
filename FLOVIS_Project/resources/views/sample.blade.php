<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- css -->
    <link rel="stylesheet" href="{{ asset('css/registerFinish.css') }}">

    {{--header.css--}}
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">

    {{--login.css--}}
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">


    <!-- drawer.css -->
    <link rel="stylesheet" href="{{ asset('css/drawer.min.css') }}">

    <!-- jquery & iScroll -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/iScroll/5.2.0/iscroll.min.js"></script>

    <!-- drawer.js -->
    <script src="{{ asset('js/drawer.js') }}"></script>


</head>
<body class="drawer drawer--left">
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

<main>

    <div class="title">新規会員登録</div>

    <div class="center">
        <p class="str1">会員登録が完了しました</p>
        <p class="str2">引き続き当サイトをお楽しみ下さい。</p>

        <a class="btn" href="{{ route('home') }}">トップページへ戻る</a>
    </div>

</main>

<footer>
    <div class="insta">
        <img src="{{ asset('images/InstagramIcon.svg') }}" alt="" class="footerIcon">
    </div>

    <div class="copyright">
        <span class="footermsg">&copy; 2018 おしゃ研</span>
    </div>
</footer>
</body>
</html>