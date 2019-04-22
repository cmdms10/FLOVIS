{{--<!doctype html>--}}
{{--<html lang="ja">--}}
{{--<head>--}}
    {{--<meta charset="UTF-8">--}}
    {{--<meta name="viewport"--}}
          {{--content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">--}}
    {{--<meta http-equiv="X-UA-Compatible" content="ie=edge">--}}
    {{--<title>@yield('title','パスワード再設定')</title>--}}

    {{--<link href="https://fonts.googleapis.com/earlyaccess/roundedmplus1c.css" rel="stylesheet" />--}}

    {{--<link rel="stylesheet" href="{{ asset('css/password_reset.css') }}">--}}


    {{--<link rel="stylesheet" href="{{ asset('css/header.css') }}">--}}

    {{--<!-- drawer.css -->--}}
    {{--<link rel="stylesheet" href="{{ asset('css/drawer.min.css') }}">--}}

    {{--<!-- jquery & iScroll -->--}}
    {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>--}}
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/iScroll/5.2.0/iscroll.min.js"></script>--}}

    {{--<!-- drawer.js -->--}}
    {{--<script src="{{ asset('js/drawer.js') }}"></script>--}}

    {{-- searchIcon --}}
    {{--<link href='https://fonts.googleapis.com/css?family=Roboto:400,500' rel='stylesheet' type='text/css'>--}}


{{--</head>--}}
{{--<body class="drawer drawer--left">--}}
    {{-- header --}}
    {{--@extends('flovis.header')--}}

    {{--<main role="main">--}}
        {{--<div class="center">--}}
            {{--<form action="{{ route('pw_reset_send_finish') }}" method="post" class="form">--}}
                {{--<div class="title">パスワード再設定</div>--}}
                {{--<div class="str">--}}
                    {{--登録されたメールアドレスを入力してください。<br>パスワード再発行URLを送付いたします。--}}
                {{--</div>--}}
                {{--<div class="input_form">--}}
                    {{--メールアドレス（必須）<input type="email" name="mail" class="input_form" autocomplete="off" required>--}}
                {{--</div>--}}
                {{--<div class="btn_space">--}}
                    {{--<button type="button" class="back" onclick="history.back()">ログイン画面に戻る</button>--}}
                    {{--<button type="submit" class="submit">送　信</button>--}}
                {{--</div>--}}

                {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}

            {{--</form>--}}
        {{--</div>--}}
    {{--</main>--}}

    {{--<footer>--}}

    {{--</footer>--}}


    {{--<script>--}}
        {{--$(document).ready(function() {--}}
            {{--$('.drawer').drawer();--}}
        {{--});--}}
    {{--</script>--}}
    {{--<script src="{{ asset('js/search.js') }}"></script>--}}
{{--</body>--}}
{{--</html>--}}