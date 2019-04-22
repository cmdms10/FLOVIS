<!doctype html>
<html lang="ja">
<head>
    <title>クレジットカード情報</title>
    @include('flovis.flovis_layout.head')
    <link rel="stylesheet" href="{{ asset('css/creditcard.css') }}">
</head>
<body class="drawer drawer--left">

@include('flovis.flovis_layout.header')

<main>
    <span class="title">クレジットカード情報</span>

    <div class="center">
        <div class="info">
            @forelse($cards as $card)
                <dl>
                    {{--クレジットカード番号--}}
                    <dt>クレジットカード番号</dt>
                    <dd>{{ $card->cardNum }}</dd>

                    {{--有効期限--}}
                    <dt>有効期限</dt>
                    <dd>{{ $card->expirationMonth }}月/{{ $card->expirationYear }}年</dd>

                    {{--名義人--}}
                    <dt>クレジットカード名義人</dt>
                    <dd>{{ $card->name }}</dd>
                </dl>

                <div class="form">
                    <form action="{{ route('card.update.form') }}" method="get">
                        <button type="button" class="destorybtn btn" id="confirm">
                            <span class="btnmsg">破棄</span>
                        </button>

                        <button type="submit" class="changebtn btn">
                            <span class="btnmsg">変更</span>
                        </button>
                    </form>
                </div>

                @break

                @empty

                <p>登録されたクレジットカードはありません。</p>
                <a href="{{ route('creditcard.form') }}">カードを登録する</a>

            @endforelse



        </div>


        @if(!empty($cards))
            {{--<p>データあり</p>--}}
            @forelse($cards as $card)
                @if($card->user_id == Auth::id())
                    {{--<p>データ有り</p>--}}

                @endif
            @empty
                {{--<p>データなし</p>--}}

            @endforelse
        @else
            {{--<p>データなし</p>--}}

        @endif

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


<script>
    $('#confirm').modaal({
        type: 'confirm',
        confirm_button_text: '破棄する',
        confirm_cancel_button_text: '戻る',
        confirm_title: 'クレジットカードの削除確認',
        confirm_content: '<p class="deleteMessage">登録済みのクレジットカードを破棄しますか？</p>',
        confirm_callback: function() {
            location.href='{{ action('CreditcardController@destroy') }}'
        },
        confirm_cancel_callback: function() {

        }
    });
</script>

</body>
</html>