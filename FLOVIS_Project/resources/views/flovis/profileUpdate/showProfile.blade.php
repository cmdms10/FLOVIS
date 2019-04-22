<!doctype html>
<html lang="ja">
<head>
    <title>プロフィール</title>
    @include('flovis.flovis_layout.head')
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
</head>

<body class="drawer drawer--left">

@include('flovis.flovis_layout.header')

<main>

    {{--<div class="title">My Profile</div>--}}

    <div class="center">

        @if(session('message'))
            <div class="flash_message">
                {{ session('message') }}
            </div>
        @endif

        <div class="tabs">
            {{--{{ var_dump($profiles) }}--}}
            @forelse($profiles as $profile)
                <input id="profile" type="radio" name="tab_item" checked>
                <label class="tab_item" for="profile">ユーザー情報</label>

                <input id="credit" type="radio" name="tab_item">
                <label class="tab_item" for="credit">クレジットカード</label>

                <input id="address" type="radio" name="tab_item">
                <label class="tab_item tab_item2" for="address">ご住所</label>

                <div class="tab_content" id="profile_content">

                    <dl>
                        <dt>
                            <i class="fas fa-user"></i> ユーザー名
                        </dt>
                        <dd>
                            {{ $profile->name }}
                        </dd>

                        <dt><i class="fas fa-user"></i> 氏名</dt>
                        <dd>{{ $profile->firstName }} {{ $profile->lastName }}
                            （{{ $profile->kanafirstName }} {{ $profile->kanalastName }}）
                        </dd>

                        <dt><i class="fas fa-envelope-square"></i> メールアドレス</dt>
                        <dd>
                            {{ $profile->email }}
                        </dd>

                        <dt><i class="fas fa-key"></i> パスワード</dt>
                        <dd>
                            ＊＊＊＊＊＊<br>(パスワード保護のため＊で表示)
                        </dd>

                    </dl>

                    <div class="form">
                        <form action="{{ route('loginUpdate.form') }}" method="get" class="changeLoginInfo">
                            <button type="submit" class="loginUpdate">ユーザー情報の変更</button>
                        </form>
                    </div>


                </div>

                <div class="tab_content credit" id="credit_content">

                    <div class="info">
                        @forelse($cards as $card)
                            <dl>
                                {{--クレジットカード番号--}}
                                <dt><i class="far fa-credit-card"></i> カード番号</dt>
                                <dd>{{ $card->cardNum }}</dd>

                                {{--有効期限--}}
                                <dt><i class="far fa-clock"></i> 有効期限</dt>
                                <dd>{{ $card->expirationMonth }}月/{{ $card->expirationYear }}年</dd>

                                {{--名義人--}}
                                <dt><i class="far fa-user"></i> カード名義人</dt>
                                <dd>{{ $card->name }}</dd>
                            </dl>

                            <div class="form">
                                <form action="{{ route('card.update.form') }}" method="get">
                                    <button type="button" class="destorybtn btn" id="cardConfirm">
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

                <div class="tab_content" id="address_content">
                    @forelse($addresses as $address)
                        <dl>
                            <dt>
                                〒 郵便番号
                            </dt>
                            <dd>〒{{ $address->firstZip }}-{{ $address->lastZip }}</dd>

                            <dt><i class="fas fa-home"></i> 住所</dt>
                            <dd>
                                <div class="address">
                                    <span>{{ $address->region }}</span>,
                                    <span>{{ $address->local }}</span><br>
                                    <span>{{ $address->addr }}</span>
                                </div>
                            </dd>

                            <dt><i class="fas fa-phone"></i> 電話番号</dt>
                            <dd>{{ $address->tel }}</dd>
                        </dl>

                        <div class="form">
                            <form action="{{ route('addressUpdate.form') }}" method="get" class="changeAddrInfo">
                                <button type="submit" class="addressUpdate">登録住所の変更</button>
                            </form>
                        </div>
                    @empty
                        @if(!empty($addresses))
                            @forelse($addresses as $address)

                            @empty
                                <div class="unregisterd">
                                    <p>登録された住所はありません。</p>
                                    <a href="{{ route('address.form') }}">住所を登録する</a>
                                </div>

                                {{--<form action="{{ route('address.form') }}">--}}
                                {{--<button type="submit" class="loginUpdate">登録</button>--}}
                                {{--</form>--}}
                            @endforelse
                        @endif

                    @endforelse
                </div>

            @empty

            @endforelse

        </div>

    </div>

    <div class="delete">
        <a href="#" class="deletebtn confirm" id="confirm">退会する方はこちら</a>
    </div>

</main>

@include('flovis.flovis_layout.footer')

<script>
    $('#confirm').modaal({
        type: 'confirm',
        confirm_button_text: '退会する。',
        confirm_cancel_button_text: '戻る',
        confirm_title: '退会確認',
        confirm_content: '<p class="deleteMessage">本当に退会しますか？</p>',
        confirm_callback: function () {
            location.href = '{{ action('UpdateProfileController@delete') }}'
        },
        confirm_cancel_callback: function () {

        }
    });
</script>

<script>
    $('#cardConfirm').modaal({
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

{{--<script>--}}
{{--$(function() {--}}
{{--if($("#input1").val().length == 0) {--}}
{{--$("#submit1").prop("disabled",true);--}}
{{--}--}}
{{--$("#submit1").on("keydown keyup keypress change",function() {--}}
{{--if($(this).val().length < 2) {--}}
{{--$("#submit1").prop("disabled", true);--}}
{{--}else {--}}
{{--$("#submit1").prop("disabled", false);--}}
{{--}--}}
{{--});--}}
{{--});--}}
{{--</script>--}}


</body>
</html>