<!doctype html>
<html lang="ja">
<head>
    @yield('head')
</head>

<body class="drawer drawer--left">
@yield('layouts.header')
<main>
    {{--@if (session('status'))--}}
    {{--<div class="alert alert-success" role="alert">--}}
    {{--{{ session('status') }}--}}
    {{--</div>--}}
    {{--@endif--}}

    <div class="center">

    </div>

</main>

<footer>

</footer>

{{--ハンバーガーエフェクト--}}
<script>
    $(document).ready(function () {
        $('.drawer').drawer();
    });
</script>

{{--submitボタンエフェクト--}}
<script>
    var animateButton = function (e) {

        e.preventDefault;
        //reset animation
        e.target.classList.remove('animate');

        e.target.classList.add('animate');
        setTimeout(function () {
            e.target.classList.remove('animate');
        }, 700);
    };

    var bubblyButtons = document.getElementsByClassName("bubbly-button");

    for (var i = 0; i < bubblyButtons.length; i++) {
        bubblyButtons[i].addEventListener('click', animateButton, false);
    }
</script>

</body>
</html>