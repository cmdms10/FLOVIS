<!doctype html>
<html lang="ja">
<head>
    <title>登録住所確認</title>
    @include('flovis.flovis_layout.head')
    <link rel="stylesheet" href="{{ asset('css/addressUpdateConfirm.css') }}">
</head>

<body class="drawer drawer--left">

@include('flovis.flovis_layout.header')

<main>
    <div class="title">登録住所確認</div>

    <div id="contents" class="center">

        <form action="{{ route('addressUpdate.finish') }}" method="post">
            @csrf
            <input type="hidden" name="user_id" value="{{ $data['user_id'] }}">
            <input type="hidden" name="yubin21" value="{{ $data['yubin21'] }}">
            <input type="hidden" name="yubin22" value="{{ $data['yubin22'] }}">
            <input type="hidden" name="region21" value="{{ $data['region21'] }}">
            <input type="hidden" name="local21" value="{{ $data['local21'] }}">
            <input type="hidden" name="addr21" value="{{ $data['addr21'] }}">
            <input type="hidden" name="tel" value="{{ $data['tel'] }}">

            <!-- 住所 -->
            <dl>
                <dt>〒 郵便番号</dt>
                <dd>
                    <!-- 郵便番号-->
                    〒{{ $data['yubin21'] }}ー{{ $data['yubin22'] }}
                </dd>

                <dt><i class="fas fa-home"></i> 住所</dt>
                <dd>
                    <div class="address">
                        <!-- 都道府県-->
                        <span>{{ $data['region21'] }}</span><br>
                        <!-- 市区町村-->
                        <span>{{ $data['local21'] }}</span><br>
                        <!-- それ以降-->
                        <span class="addr">{{ $data['addr21'] }}</span>
                    </div>

                </dd>
                <!-- 電話番号 -->
                <dt class="telspace"><i class="fas fa-phone"></i> 電話番号</dt>
                <dd class="dd_right_bottom">
                    {{ $data['tel'] }}
                </dd>
            </dl>
            {{--</fieldset>--}}

            <div class="btn_space form">

                <button type="button" class="btn backbtn" onclick="history.back();">入力画面に戻る</button>

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