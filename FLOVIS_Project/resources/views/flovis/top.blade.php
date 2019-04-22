
<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/style.css">

    <!-- drawer.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/drawer/3.2.2/css/drawer.css">
    <!-- jquery & iScroll -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/iScroll/5.2.0/iscroll.js"></script>
    <!-- drawer.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/drawer/3.2.2/js/drawer.js"></script>

    <title>flovis</title>
</head>
<body>
<header>
    <div class="wrapper">
        <!--　ハンバーガーメニュー　-->
        <div class="drawer drawer--left">
            <div role="banner">
                <button type="button" class="drawer-toggle drawer-hamburger">
                    <span class="sr-only">toggle navigation</span>
                    <span class="drawer-hamburger-icon"></span>
                </button>
                <nav class="drawer-nav" role="navigation">
                    <ul class="drawer-menu">
                        <li><a class="drawer-brand" href="#">メニュー</a></li>
                        <li><a class="drawer-menu-item" href="#">Home</a></li>
                        <li><a class="drawer-menu-item" href="#">About us</a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="searchbar">
            <form id="form02" action="#">
                <input id="input02" type="text" placeholder="検索">
                <!--/input間で改行したい場合はコメントアウト必須/-->
                <input id="submit02" type="submit" value="">
            </form>
        </div>
        <div class="logo">
            <img src="/images/flovis_logo00.png" alt="">
        </div>

    </div>
</header>


<script>
    $(document).ready(function() {
        $('.drawer').drawer();
    });

</script>
</body>
</html>