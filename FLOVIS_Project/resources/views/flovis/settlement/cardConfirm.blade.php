<!doctype html>
<html lang="ja">
<head>
    <title></title>
    @include('flovis.flovis_layout.head')
    <link rel="stylesheet" href="{{ asset('css/cardConfirm.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js" integrity="sha384-0pzryjIRos8mFBWMzSSZApWtPl/5++eIfzYmTgBBmXYdhvxPc+XcFEk+zJwDgWbP" crossorigin="anonymous"></script>
</head>

<body class="drawer drawer--left">

@include('flovis.flovis_layout.header')

<main>
    <form action="{{ route('buy.user.lastconfirm') }}" method="post">
        @csrf
        <div class="title">お届け方法の指定</div>

        <div class="center">

            <input type="hidden" name="user_id" value="{{ Auth::id() }}">
            <input type="hidden" name="ReceiverName" value="{{ $data['ReceiverName'] }}">
            <input type="hidden" name="ReceiverkanaName" value="{{ $data['ReceiverkanaName'] }}">
            <input type="hidden" name="yubin21" value="{{ $data['yubin21'] }}">
            <input type="hidden" name="yubin22" value="{{ $data['yubin22'] }}">
            <input type="hidden" name="region21" value="{{ $data['region21'] }}">
            <input type="hidden" name="local21" value="{{ $data['local21'] }}">
            <input type="hidden" name="addr21" value="{{ $data['addr21'] }}">
            <input type="hidden" name="tel" value="{{ $data['tel'] }}">

            {{--<input type="text" name="" value="{{ $data[''] }}">--}}

            <dl class="dl2">
                <div class="middle">
                    <dt>
                        <i class="fas fa-calendar-day"></i> お届け日指定
                    </dt>
                    <dd>
                        <input type="date" name="ReceiverDate" min="2019-03-15" max="2019-06-15" required>
                    </dd>
                    <br>
                    <dt>
                        <i class="far fa-clock"></i> お届け希望時間帯</dt>
                    <dd>
                        <select name="ReceiverTime" id="" required>
                            <option value="指定なし">指定なし</option>
                            <option value="午前中">午前中</option>
                            <option value="14時~16時">14時~16時</option>
                            <option value="16時~18時">16時~18時</option>
                            <option value="18時~20時">18時~20時</option>
                        </select>
                    </dd>
                </div>

            </dl>

        </div>
        
        <div class="title3">備考</div>
        <div class="center3">
            <p></p>
            <textarea name="remarks" id="" cols="30" rows="10" placeholder="希望・ご質問がございましたら気軽にご入力ください。"></textarea>
        </div>

        <div class="btnSpace">
            <button type="button" class="btn back" onclick="location.href='{{ route('buy.user.zip') }}'">お届け先入力へ戻る</button>
            <button type="submit" class="btn next">ご注文最終確認へ進む</button>
        </div>

    </form>

</main>

@include('flovis.flovis_layout.footer')

</body>
</html>