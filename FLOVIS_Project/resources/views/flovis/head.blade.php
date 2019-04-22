{{--@extends('flovis.demo')--}}

{{--@section('head')--}}
{{--<head>--}}
    {{--<meta charset="UTF-8">--}}
    {{--<meta name="viewport"--}}
          {{--content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">--}}
    {{--<meta http-equiv="X-UA-Compatible" content="ie=edge">--}}
    {{--<title>Document</title>--}}

    {{--<link rel="shortcut icon" href="{{ asset('images/flovis_logo00.jpg') }}">--}}

    {{--profileUpdateFinish.css--}}
    {{--<link rel="stylesheet" href="{{ asset('css/profileUpdateFinish.css') }}">--}}

    {{--header.css--}}
    {{--<link rel="stylesheet" href="{{ asset('css/header.css') }}">--}}

    {{--<!-- drawer.css -->--}}
    {{--<link rel="stylesheet" href="{{ asset('css/drawer.min.css') }}">--}}

    {{--<!-- jquery & iScroll -->--}}
    {{--<script src="{{ asset('js/jquery.min.js') }}"></script>--}}
    {{--<script src="{{ asset('js/iscroll.min.js') }}"></script>--}}

    {{--<!-- drawer.js -->--}}
    {{--<script src="{{ asset('js/drawer.js') }}"></script>--}}

{{--</head>--}}
{{--@endsection--}}

{{--@section('header')--}}
    {{--<header role="banner" class="navbar">--}}

        {{-- ハンバーガーメニュー --}}
        {{--<button type="button" class="drawer-toggle drawer-hamburger">--}}
            {{--<span class="sr-only">toggle navigation</span>--}}
            {{--<span class="drawer-hamburger-icon"></span>--}}
        {{--</button>--}}
        {{--<nav class="drawer-nav" role="navigation">--}}
            {{--<ul class="drawer-menu">--}}
                {{--<li>--}}
                    {{--<a class="drawer-menu-item" href="{{ route('home') }}">--}}
                        {{--<span class="en">HOME</span>--}}
                        {{--<span class="ja">ホーム</span>--}}
                    {{--</a>--}}
                {{--</li>--}}

                {{--<li>--}}
                    {{--<a class="drawer-menu-item" href="{{ route('sort') }}">--}}
                        {{--<span class="en">PRODUCT</span>--}}
                        {{--<span class="ja">商品一覧</span>--}}
                    {{--</a>--}}
                {{--</li>--}}

                {{--<li>--}}
                    {{--<a class="drawer-menu-item" href="{{ route('FAQ') }}">--}}
                        {{--<span class="en">FAQ</span>--}}
                        {{--<span class="ja">よくある質問</span>--}}
                    {{--</a>--}}
                {{--</li>--}}

                {{--<li>--}}
                    {{--<a class="drawer-menu-item" href="{{ route('FAQ') }}">--}}
                        {{--<span class="en">CONTACT</span>--}}
                        {{--<span class="ja">お問い合わせ</span>--}}
                    {{--</a>--}}
                {{--</li>--}}

                {{--<li>--}}
                    {{--<a class="drawer-menu-item" href="https://www.instagram.com/">--}}
                        {{--<span class="en"><img src="{{ asset('images/InstagramIcon.svg') }}" alt="InstagramIcon" class="instagramIcon"></span>--}}
                        {{--<span class="ja"><img src="{{ asset('images/colorinstaicon.png') }}" alt="" class="instagramIcon"></span>--}}
                    {{--</a>--}}
                {{--</li>--}}
            {{--</ul>--}}
            {{--<img src="{{ asset('images/flovis_logo00.png') }}" alt="logo" class="flovisLogo">--}}
        {{--</nav>--}}

        {{--ロゴ--}}
        {{--<a href="{{ route('home') }}">--}}
            {{--<img src="{{ asset('images/logo.svg') }}" alt="Logo" class="logoImg">--}}
        {{--</a>--}}

        {{--<div class="container">--}}
            {{--検索--}}
            {{--<div class="search">--}}
                {{--<form action="{{ action('ShowController@sort') }}" method="get" name="search">--}}
                    {{--<input type="text" class="searchForm" name="keyword" placeholder="キーワード検索">--}}
                    {{--<button type="submit" class="bubbly-button">Search</button>--}}
                {{--</form>--}}
            {{--</div>--}}

            {{--ログイン--}}
            {{--<div class="headerLogin">--}}
                {{--<ul class="menu">--}}
                    {{--@if(auth()->guest())--}}
                        {{--<li>--}}
                            {{--<a href="{{ route('login') }}">--}}
                                {{--<img src="{{ asset('images/login.svg') }}" alt="login" class="loginImg">--}}
                                {{--<span class="loginMsg">Login</span>--}}
                            {{--</a>--}}
                        {{--</li>--}}
                    {{--@else--}}
                        {{--@if(auth()->user())--}}
                            {{--<li class="menu__single">--}}
                                {{--<a href="#">--}}
                                    {{--<img src="{{ asset('images/user.svg') }}" alt="user" class="userImg">--}}
                                    {{--<span class="userName init-bottom">{{ Auth::user()->name }}</span>--}}
                                {{--</a>--}}

                                {{--<ul class="menu__second-level">--}}
                                    {{--<li class="item"><a href="#" class="item">メールアドレスの変更</a></li>--}}
                                    {{--<li class="item">--}}
                                        {{--<a href="{{ route('profile') }}" class="item">--}}
                                            {{--<span class="en">Profile</span>--}}
                                            {{--<span class="ja">プロフィール編集</span>--}}
                                        {{--</a>--}}
                                    {{--</li>--}}
                                    {{--<li class="item">--}}
                                        {{--<a href="{{ route('card') }}" class="item">--}}
                                            {{--<span class="en">CreditCard</span>--}}
                                            {{--<span class="ja">クレジットカード情報</span>--}}
                                        {{--</a>--}}
                                    {{--</li>--}}
                                    {{--<li class="item">--}}
                                        {{--<a href="{{ route('orderhistory') }}" class="item">--}}
                                            {{--<span class="en">Purchase history</span>--}}
                                            {{--<span class="ja">購入履歴</span>--}}
                                        {{--</a>--}}
                                    {{--</li>--}}
                                    {{--<li class="item">--}}
                                        {{--<a href="#" class="item" onclick="event.preventDefault();--}}
                                                     {{--document.getElementById('logout-form').submit();">--}}
                                            {{--<span class="en">Logout</span>--}}
                                            {{--<span class="ja">ログアウト</span>--}}
                                        {{--</a>--}}
                                    {{--</li>--}}
                                {{--</ul>--}}

                                {{--<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
                                    {{--@csrf--}}
                                {{--</form>--}}
                            {{--</li>--}}
                        {{--@endif--}}
                    {{--@endif--}}
                {{--</ul>--}}
            {{--</div>--}}

            {{--カート--}}
            {{--<div class="cart">--}}
                {{--<a href="{{ route('cart')}}" class="cart">--}}
                    {{--<img src="{{ asset('images/cart.svg') }}" alt="cart" class="cartImg">--}}
                    {{--<span class="cartMsg">Cart　<span class="cartnum">{{ Cart::count() }}</span></span>--}}
                {{--</a>--}}
            {{--</div>--}}

        {{--</div>--}}

    {{--</header>--}}
{{--@endsection--}}

















<!doctype html>
<html lang="ja">

@yield('head')

<body  class="drawer drawer--left">

@yield('header')

<main>

    <div class="title">更新を完了しました。</div>

    <div class="center">
        <p>引き続きflovisをお楽しみください。</p>
    </div>
</main>

<footer>

</footer>

</body>
</html>