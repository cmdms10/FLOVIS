<!doctype html>
<html lang="ja">
<head>
    <title></title>
    <link rel="stylesheet" href="{{ asset('css/userConfirm.css') }}">
    @include('flovis.flovis_layout.head')
</head>
<body class="drawer drawer--left">

@include('flovis.flovis_layout.header')

<main>


    <div class="title1">
        <label for="label1">ご注文者情報の確認 <span id="show">ー</span></label>
    </div>

    <div class="center">
        <form action="{{ route('buy.user.info') }}" method="post">
            @csrf
            <input type="hidden" name="user_id" value="{{ Auth::id() }}">
            <dl class="dl1">
                <dt>
                    <i class="fas fa-user"></i> お名前
                </dt>
                <dd>{{ $user->firstName }} {{ $user->lastName }}</dd>

                <dt><i class="fas fa-envelope-square"></i> メールアドレス</dt>
                <dd>{{ $user->email }}</dd>

                @forelse($addresses as $address)
                    <dt>〒 郵便番号</dt>
                    <dd>〒{{ $address->firstZip }}-{{ $address->lastZip }}</dd>

                    <dt><i class="fas fa-home"></i> 住所</dt>
                    <dd>
                        <div class="address">
                            {{ $address->region }},
                            {{ $address->local }}<br>
                            {{ $address->addr }}
                        </div>
                    </dd>

                    <dt><i class="fas fa-phone"></i> 電話番号</dt>
                    <dd>{{ $address->tel }}</dd>
                @empty
                    <dt>〒 郵便番号</dt>
                    <dd>
                        <span class="zipmark">〒</span>
                        <input type="text" placeholder=" 123" class="input_form input_inp8" name="yubin21"
                               value="{{ old('yubin21') }}">
                        <span class="zipmark">ー</span>
                        <input type="text" class="input_form input_inp12" name="yubin22" placeholder=" 4567"
                               value="{{ old('yubin22') }}"
                               onkeyup="AjaxZip3.zip2addr('yubin21',this,'region21','local21','addr21')" ;>

                        @if($errors->has('yubin21'))
                            <div class="error">{{ $errors->first('yubin21') }}</div>
                        @elseif($errors->has('yubin22'))
                            <div class="error">{{ $errors->first('yubin22') }}</div>
                        @endif
                    </dd>

                    <dt>
                        <i class="fas fa-home"></i>
                        住所
                    </dt>
                    <dd>
                        <div class="showAddress">
                            {{-- 都道府県 --}}
                            <input type="text" class="input_form input_inp9" name="region21"
                                   value="{{ old('region21') }}"
                                   placeholder="都道府県"><br>
                            @if($errors->has('region21'))
                                <div
                                        class="error">{{ $errors->first('region21') }}</div> @endif

                            {{-- 市区町村 --}}
                            <input type="text" class="input_form input_inp13" name="local21" placeholder="市区町村"
                                   value="{{ old('local21') }}"><br>
                            @if($errors->has('local21'))
                                <div
                                        class="error">{{ $errors->first('local21') }}</div> @endif

                            {{-- それ以降 --}}
                            <input type="text" class="input_form input_inp10" name="addr21" placeholder="それ以降の住所"
                                   value="{{ old('addr21') }}"><br>
                            @if($errors->has('addr21'))
                                <div class="error">{{ $errors->first('addr21') }}</div> @endif
                        </div>
                    </dd>

                    <dt>
                        <i class="fas fa-phone"></i>
                        電話番号
                    </dt>
                    <dd>
                        <input type="text" name="tel" class="input_form input_inp11" value="{{ old('tel') }}"
                               placeholder="ハイフンなし"><br>
                        @if($errors->has('tel'))
                            <div class="error">{{ $errors->first('tel') }}</div> @endif
                    </dd>
                @endforelse
                @forelse($cards as $card)
                    <dt><i class="far fa-credit-card"></i> クレジットカード番号</dt>
                    <dd>{{ $card->cardNum }}</dd>

                    {{--<dt>有効期限</dt>--}}
                    {{--<dd>{{ $card->expirationMonth }}/{{ $card->expirationYear }}</dd>--}}

                    {{--<dt>カード名義人</dt>--}}
                    {{--<dd>{{ $card->name }}</dd>--}}
                @empty
                <dt>
                    <i class="far fa-credit-card"></i>
                    クレジットカード番号
                    <br>
                    <img src="{{ asset('images/credit.png') }}" alt="" class="creditImg">
                </dt>

                <dd>

                    <input type="text" class="inputForm input_inp1" name="cardNum"
                           value="{{ old('cardNum') }}" placeholder="例）1234567890123456"><br>
                    @if($errors->has('cardNum'))
                        <div
                                class="error">{{ $errors->first('cardNum') }}</div> @endif
                </dd>
                <dt><i class="fas fa-key"></i> セキュリティコード</dt>
                <dd>
                    <input type="text" class="inputForm input_inp2" name="securityCode"
                           value="{{ old('securityCode') }}" placeholder="3桁"><br>
                    @if($errors->has('securityCode'))
                        <div
                                class="error">{{ $errors->first('securityCode') }}</div> @endif
                </dd>

                <dt><i class="far fa-clock"></i> 有効期限</dt>
                <dd>
                    月<select name="expirationMonth" class="selectForm" id="">
                        <option value="01">01</option>
                        <option value="02">02</option>
                        <option value="03">03</option>
                        <option value="04">04</option>
                        <option value="05">05</option>
                        <option value="06">06</option>
                        <option value="07">07</option>
                        <option value="08">08</option>
                        <option value="09">09</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                    </select>
                    @if($errors->has('expirationMonth'))
                        <div
                                class="error">{{ $errors->first('expirationMonth') }}</div> @endif
                    /年<select name="expirationYear" class="selectForm" id="">
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                        <option value="24">24</option>
                        <option value="25">25</option>
                        <option value="26">26</option>
                        <option value="27">27</option>
                        <option value="28">28</option>
                        <option value="29">29</option>
                        <option value="30">30</option>
                        <option value="31">31</option>
                        <option value="32">32</option>
                        <option value="33">33</option>
                        <option value="34">34</option>
                        <option value="35">35</option>
                        <option value="36">36</option>
                    </select>
                    @if($errors->has('expirationYear'))
                        <div
                                class="error">{{ $errors->first('expirationYear') }}</div> @endif
                </dd>

                <dt><i class="far fa-user"></i> クレジットカード名義人</dt>
                <dd>
                    <input type="text" class="inputForm input_inp3" name="user_name"
                           value="{{ old('user_name') }}" placeholder="英大文字"><br>
                    @if($errors->has('user_name'))
                        <div
                                class="error">{{ $errors->first('user_name') }}</div> @endif
                </dd>
            </dl>
                @endforelse


                <div class="btnSpace">
                    @forelse($addresses as $address)
                        {{-- o ? --}}
                        @forelse($cards as $card)
                            {{--o o --}}
                            <a href="{{ route('profile') }}">ご注文者情報変更はこちら</a>
                        @empty
                            {{-- o x --}}
                            <form action="{{ action('TreasurerController@creditStore') }}" method="post">
                                <input type="hidden" name="Decision" value="credit">
                                <button type="submit" class="creditbtn">クレジットカード登録</button>
                            </form>

                        @endforelse
                        {{-- o ? --}}

                    @empty
                        {{-- x ? --}}
                        @forelse($cards as $card)
                            {{-- x o --}}
                            <form action="{{ action('TreasurerController@addrStore') }}" method="post">
                                <input type="hidden" name="Decision" value="addr">
                                <button type="submit" class="btn">住所登録</button>
                            </form>


                        @empty
                            {{-- x x --}}
                            <form action="">
                                <input type="hidden" name="Decision" value="all">
                                <button type="submit" class="btn">ご注文者登録</button>
                            </form>

                        @endforelse
                        {{-- x x --}}
                        {{--<p>ka</p>--}}
                    @endforelse
                </div>



        </form>
    </div>


    @foreach($addresses as $address)
        @foreach($cards as $card)

            @if($address->user_id == Auth::id()||$card->user_id == Auth::id())
                <div class="title3">お届け先情報の入力</div>

                <div class="center2">

                    <form action="{{ route('buy.user.card') }}" method="post">
                        @csrf
                        <dl class="dl2">
                            <dt class="dt2">
                                <i class="fas fa-user"></i> お名前
                            </dt>
                            <dd class="dd2">
                                <input type="text" name="ReceiverName" class="input_form input_inp14"
                                       value="{{ old('ReceiverName') }}" placeholder="例）サンプル株式会社 代表取締役 山田太郎"><br>
                                @if($errors->has('ReceiverName'))
                                    <div class="error">{{ $errors->first('ReceiverName') }}</div> @endif

                            </dd>

                            <dt class="dt2">
                                <i class="fas fa-user"></i> お名前（カタカナ）
                            </dt>
                            <dd class="dd2">
                                <input type="text" name="ReceiverkanaName" class="input_form input_inp15"
                                       value="{{ old('ReceiverkanaName') }}" placeholder="例）サンプルカブシキガイシャ ヤマダタロウ"><br>
                                @if($errors->has('ReceiverkanaName'))
                                    <div class="error">{{ $errors->first('ReceiverkanaName') }}</div> @endif
                            </dd>

                            <dt class="dt2">〒 郵便番号</dt>
                            <dd class="dd2">
                                <span class="zipmark">〒</span>
                                <input type="text" placeholder=" 123" class="input_form input_inp8" name="yubin21"
                                       value="{{ old('yubin21') }}">
                                <span class="zipmark">ー</span>
                                <input type="text" class="input_form input_inp12" name="yubin22" placeholder=" 4567"
                                       value="{{ old('yubin22') }}"
                                       onkeyup="AjaxZip3.zip2addr('yubin21',this,'region21','local21','addr21')" ;><br>

                                @if($errors->has('yubin21'))
                                    <div class="error">{{ $errors->first('yubin21') }}</div>
                                @elseif($errors->has('yubin22'))
                                    <div class="error">{{ $errors->first('yubin22') }}</div>
                                @endif
                            </dd>

                            <dt class="dt2">
                                <i class="fas fa-home"></i> 住所
                            </dt>
                            <dd class="dd2">
                                {{--<div>--}}
                                {{-- 都道府県 --}}
                                <input type="text" class="input_form input_inp9" name="region21"
                                       value="{{ old('region21') }}" placeholder="都道府県">
                                <br>
                                @if($errors->has('region21'))
                                    <div class="error">{{ $errors->first('region21') }}</div> @endif


                                {{-- 市区町村 --}}
                                <input type="text" class="input_form input_inp13" name="local21" placeholder="市区町村"
                                       value="{{ old('local21') }}">
                                <br>

                                @if($errors->has('local21'))
                                    <div
                                            class="error">{{ $errors->first('local21') }}</div> @endif

                                {{-- それ以降 --}}
                                <input type="text" class="input_form input_inp10" name="addr21" placeholder="それ以降の住所"
                                       value="{{ old('addr21') }}">
                                @if($errors->has('addr21'))
                                    <div class="error">{{ $errors->first('addr21') }}</div> @endif
                                {{--</div>--}}
                            </dd>

                            <dt class="dt2">
                                <i class="fas fa-phone"></i> 電話番号
                            </dt>
                            <dd class="dd2">
                                <input type="text" name="tel" class="input_form input_inp11" value="{{ old('tel') }}"
                                       placeholder="ハイフンなし"><br>
                                @if($errors->has('tel'))
                                    <div class="error">{{ $errors->first('tel') }}</div> @endif
                            </dd>

                        </dl>

                        <div class="btnSpace">
                            <button type="submit" class="btn">支払い方法の入力へ進む</button>
                        </div>


                    </form>

                </div>

            @endif

        @endforeach

    @endforeach

</main>

@include('flovis.flovis_layout.footer')


<script>
    // $(function() {
    //     $('label').click(function() {
    //         $('.center').slideToggle();
    //     });
    // });

    $(function () {
        $('#show').on('click', function () {
            var menu = $('.center').css('display');
            if (menu == 'none') {
                $('.center').slideToggle();
                $('#show').html("ー");
            } else {
                $('.center').slideToggle();
                $('#show').html("＋");
            }
        })
    })


</script>


</body>
</html>