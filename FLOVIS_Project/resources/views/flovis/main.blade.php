<!doctype html>
<html lang="ja">
<head>
    <title>Flovis</title>
    @include('flovis.flovis_layout.head')
    <link href="../css/slick-theme.css" rel="stylesheet" type="text/css">
    {{--<link href="../css/slick.css" rel="stylesheet" type="text/css">--}}
    <link rel="stylesheet" href="{{ asset('css/slick.min.css') }}">
    {{--<script src="https://cdn.jsdelivr.net/npm/jquery@3/dist/jquery.min.js"></script>--}}
    <script type="text/javascript" src="../js/slick.min.js"></script>
    <script type="text/javascript" src="../js/style.js"></script>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <script src="{{ asset('js/jquery.inview.min.js') }}"></script>
</head>
<body class="drawer drawer--left">

@include('flovis.flovis_layout.header')

<!-- MV ======================================== -->
{{--<img src="{{ asset('images/logo-white.png') }}" alt="" class="titleLogo">--}}
<img src="{{ asset('images/top_title.png') }}" alt="" class="titleLogo">

<ul class="slider">
    <li><img src="{{ asset('images/004.png') }}" alt="image01" class="slider"></li>
    {{--<li><img src="../images/004.png" alt="image03" class="slider"></li>--}}
    <li><img src="{{ asset('images/002.png') }}" alt="image02" class="slider"></li>
    <li><img src="{{ asset('images/003.png') }}" alt="image03" class="slider"></li>
</ul>

<div class="fullscreen_scroll">
    <a href="#main">
        Scroll
    </a>
</div>


<!--<div class="mv cf">
    <ul class="mv__slider" id="mv-slider">
        <li>
            <figure>
                <img src="../images/screen_01.jpg" class="js-change-image object-fit-img">
            </figure>
        </li>
        <li>
            <figure>
                <img src="../images/screen_02.jpg" class="js-change-image object-fit-img">
            </figure>
		</li>
	</ul>
    <div class="mv-shield"></div>
</div>-->

<!-- 背景用 -->
<div class="contents-bg">

    <!-- コンセプト ======================================== -->
    <section class="index-section concept" id="main">
        <div class="section-row">
            <h1>世界に一つだけの贈り物を<br>あなたの大切な人へ。</h1>
            <p>
                Flovis（フラヴィス）は、<br>
                フラワーギフト専門のお店です。<br class="visible-pc">
                お好みに合わせてオリジナルの花束のご依頼も承ります。<br>
            </p>
            <p>
                Flovisでぜひお客様の願いを<br>
                素敵に叶えてください。<br>
            </p>
            <img src="../images/a_00.jpg">
        </div>
    </section>

    <!-- プロダクト ======================================== -->
    <section class="index-section product">
        <div class="background"></div>
        <div class="section-row">
            <!-- <img class="catch" src=../images/"> -->
            <h2 class="font-arapey">PRODUCT</h2>
            <div class="description">
                最新のトレンドを押さえつつ、<br>
                コーディネートのしやすいものを<br class="visible-sp">セレクトしております。<br>
                ぜひお気に入りのデザインを見つけてください。<br>
            </div>
        </div>
        <div class="detail">

            <ul class="carousel costume_list product">
                @if($items->count())
                    @foreach($items as $item)
                        <li class="list-items">
                            <a href="{{ action('ShowController@detail',53) }}">
                                <figure>
                                    <div class="thumb-bg hoge"><img src="{{ asset('images/products/c_13_3.jpg') }}" width="320px" height="320px"></div>
                                    <figcaption class="font-arapey">
                                        ジューシーブーケ<br>
                                        ￥ 3,780（tax in）
                                    </figcaption>
                                </figure>
                            </a>
                        </li>
                        <li class="list-items">
                            <a href="{{ action('ShowController@detail',2) }}">
                                <figure>
                                    <div class="thumb-bg hoge"><img src="{{ asset('images/products/s_5.jpg') }}"
                                                                    width="320px" height="320px"></div>
                                    <figcaption class="font-arapey">
                                        赤系デザイナーお任せ花束・ブーケ<br>
                                        ￥ 8,640（tax in）
                                    </figcaption>
                                </figure>
                            </a>
                        </li>
                        <li class="list-items">
                            <a href="{{ action('ShowController@detail',45) }}">
                                <figure>
                                    <div class="thumb-bg hoge"><img src="{{ asset('images/products/c_5_1.jpg') }}"
                                                                    width="320px" height="320px"></div>
                                    <figcaption class="font-arapey">
                                        Weekly Flower 3月27日は桜の日<br>
                                        ￥ 3,240（tax in）
                                    </figcaption>
                                </figure>
                            </a>
                        </li>
                        <li class="list-items">
                            <a href="{{ action('ShowController@detail',10) }}">
                                <figure>
                                    <div class="thumb-bg"><img src="{{ asset('images/products/s_22.jpg') }}"
                                                               width="320px" height="320px"></div>
                                    <figcaption class="font-arapey">
                                        ピンクが映えるイブピアッチェのブーケ<br>
                                        ￥ 3,780（tax in）
                                    </figcaption>
                                </figure>
                            </a>
                        </li>
                        <li class="list-items">
                            <a href="{{ action('ShowController@detail',49) }}">
                                <figure>
                                    <div class="thumb-bg"><img src="{{ asset('images/products/c_9_4.jpg') }}"
                                                               width="320px" height="320px"></div>
                                    <figcaption class="font-arapey">
                                        ロゼブーケ<br>
                                        ￥ 3,780（tax in）
                                    </figcaption>
                                </figure>
                            </a>
                        </li>
                        @break
                    @endforeach
                @endif
            </ul>
        </div>
        <div class="section-row">
            <div class="more">
                <a class="button" href="{{ route('sort') }}"><span class="font-arapey">READ MORE</span></a>
            </div>
        </div>
    </section>

    <!-- インスタグラム ======================================== -->

    <section class="index-section instagram studio">
        <div class="background">
            <div class="section-row">
                <!-- <img class="catch" src=""> -->
                <h2 class="font-arapey">INSTAGRAM</h2>
                <div class="description">
                    <ul class="instagram__list" id="flovis_pj"></ul>
                </div>
                <a class="link" href="https://www.instagram.com/flovis_pj/" target="_blank" rel="nofollow"><span
                            class="font-arapey">See other posts</span></a>
            </div>
            <ul class="carousel instagram__list">
                <li class="">
                    <a href="https://www.instagram.com/p/BtQq_Y4hut5/?utm_source=ig_web_copy_link">
                        <figure>
                            <div class="ing-bg"><img src="../images/inst_01.jpg"></div>
                        </figure>
                    </a>
                </li>
                <li class="">
                    <a href="https://www.instagram.com/p/BtQrr7ghrdf/?utm_source=ig_web_copy_link">
                        <figure>
                            <div class="ing-bg"><img src="../images/inst_02.jpg"></div>
                        </figure>
                    </a>
                </li>
                <li class="">
                    <a href="https://www.instagram.com/p/BtQtXABhrN6/?utm_source=ig_web_copy_link">
                        <figure>
                            <div class="ing-bg"><img src="../images/inst_03.jpg"></div>
                        </figure>
                    </a>
                </li>
                <li class="">
                    <a href="https://www.instagram.com/p/BtlEo_RBQWH/?utm_source=ig_web_copy_link">
                        <figure>
                            <div class="ing-bg"><img src="../images/inst_04.jpg"></div>
                        </figure>
                    </a>
                </li>
                <li class="">
                    <a href="https://www.instagram.com/p/BtlEqW1hvY1/?utm_source=ig_web_copy_link">
                        <figure>
                            <div class="ing-bg"><img src="../images/inst_05.jpg"></div>
                        </figure>
                    </a>
                </li>
                <li class="">
                    <a href="https://www.instagram.com/p/BtlEr3IhFPd/?utm_source=ig_web_copy_link">
                        <figure>
                            <div class="ing-bg"><img src="../images/inst_06.jpg"></div>
                        </figure>
                    </a>
                </li>
                <li class="">
                    <a href="https://www.instagram.com/p/BtlEu_IBDzL/?utm_source=ig_web_copy_link">
                        <figure>
                            <div class="ing-bg"><img src="../images/inst_07.jpg"></div>
                        </figure>
                    </a>
                </li>
                <li class="">
                    <a href="https://www.instagram.com/p/BtlEwgshH-m/?utm_source=ig_web_copy_link">
                        <figure>
                            <div class="ing-bg"><img src="../images/inst_08.jpg"></div>
                        </figure>
                    </a>
                </li>
            </ul>
        </div>
    </section>

    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

</div>

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">


<div id="page_top"><a href="#"></a></div>

<!-- フッター -->
<footer class="footer">
    <div class="footer__info">
        <div class="footer__inside">
            <div class="footer__shop">
                <h2 class="footer__shop--title"><span class="font-arapey name">Flovis</span><span
                            class="visible-pc"> - </span><br class="visible-sp">世界にひとつだけの贈り物を。<br><a href="#">フラワーギフトはFlovisで</a>
                </h2>
            </div>
            <div class="footer__link">
                <ul class="footer__column">
                    <li><a class="font-arapey hover-fade" href="#">HOME</a></li>
                </ul>
                <ul class="footer__column">
                    <li><a class="font-arapey hover-fade" href="#">PRODUCT</a></li>
                </ul>
                <ul class="footer__column">
                    <li><a class="font-arapey hover-fade external" href="https://www.instagram.com/flovis_pj/"
                           target="_blank" rel="nofollow">INSTAGRAM</a></li>
                </ul>
                <ul class="footer__column">
                    <li><a class="font-arapey hover-fade" href="#">FAQ</a></li>
                </ul>
            </div>
        </div>
        <div class="footer__aside">
            <p class="footer__copyright">&copy; <span class="font-arapey">2018flovis inc.</span></p>
            <p class="footer__pagetop"><a href="#" class="hide-text">ページトップへ</a></p>
        </div>
    </div>

    {{--{{ var_dump($items) }}--}}


</footer>

<script>
    $(function () {
        $('.list-items').on('inview', function (event, isInView, visiblePartX, visiblePartY) {
            if (isInView) {
                $(this).stop().addClass('items');
            } else {
                $(this).stop().removeClass('items');
            }
        });
    });
</script>


</body>
</html>