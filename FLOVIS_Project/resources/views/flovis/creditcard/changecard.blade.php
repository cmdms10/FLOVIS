<!doctype html>
<html lang="ja">
<head>
    <title>クレジットカード変更</title>
    @include('flovis.flovis_layout.head')
    <link rel="stylesheet" href="{{ asset('css/changeCard.css') }}">
</head>
<body class="drawer drawer--left">

@include('flovis.flovis_layout.header')

<main>
    <div class="title">クレジットカード登録</div>
    <div class="center">
        <div class="content">
            <form action="{{ route('card.update.store') }}" method="post">
                @csrf
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <dl>
                    <dt><i class="far fa-credit-card"></i> クレジットカード番号</dt>
                    <dd>
                        <input type="text" class="inputForm input_inp1" name="cardNum" value="{{ old('cardNum') }}" placeholder="半角数字"><br>
                        @if($errors->has('cardNum'))<span class="error">{{ $errors->first('cardNum') }}</span> @endif
                    </dd>

                    <dt><i class="fas fa-key"></i> セキュリティコード</dt>

                    <dd>
                        <input type="text" class="inputForm input_inp2" name="securityCode" value="{{ old('securityCode') }}" placeholder="3桁"><br>
                        @if($errors->has('securityCode'))<span class="error">{{ $errors->first('securityCode') }}</span> @endif
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
                        @if($errors->has('expirationMonth'))<span class="error">{{ $errors->first('expirationMonth') }}</span> @endif
                        /年<select name="expirationYear" class="selectForm" id="">
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                        </select>
                        @if($errors->has('expirationYear'))<span class="error">{{ $errors->first('expirationYear') }}</span> @endif
                    </dd>

                    <dt><i class="far fa-user"></i> クレジットカード名義人</dt>

                    <dd>
                        <input type="text" class="inputForm input_inp3" name="name" value="{{ old('name') }}" placeholder="英大文字"><br>
                        @if($errors->has('name'))<span class="error">{{ $errors->first('name') }}</span> @endif
                    </dd>

                </dl>


                <div class="btnSpace">
                    <button type="button" class="btn back" onclick="location.href='{{ route('profile') }}'">戻る</button>

                    <button type="submit" class="btn next">確認へ進む</button>
                </div>

            </form>

        </div>


    </div>

</main>

@include('flovis.flovis_layout.footer')

</body>
</html>




