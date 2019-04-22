<!doctype html>
<html lang="ja">
<head>
    <title>住所登録</title>
    @include('flovis.flovis_layout.head')
    <link rel="stylesheet" href="{{ asset('css/addressUpdateForm.css') }}">
</head>

<body class="drawer drawer--left">

@include('flovis.flovis_layout.header')


<main>

    <div class="title">住所登録</div>

    <div id="contents" class="center">
        <form action="{{ route('addressUpdate.confirm') }}" method="post" id="signupForm" class="form">
            @csrf
            <input type="hidden" name="user_id" value="{{ Auth::id() }}">
            <!-- 住所 -->
            <dl>
                <dt>〒 郵便番号</dt>

                <dd>
                    <span class="zipmark">〒</span>
                    <input type="text" placeholder=" 123" class="input_form input_inp8" name="yubin21" value="{{ old('yubin21') }}" required>
                    <span class="zipmark">ー</span>
                    <input type="text" class="input_form input_inp12" name="yubin22" placeholder=" 4567" value="{{ old('yubin22') }}"
                           onkeyup="AjaxZip3.zip2addr('yubin21',this,'region21','local21','addr21')" ; required>

                    @if($errors->has('yubin21'))<div class="error">{{ $errors->first('yubin21') }}</div>
                    @elseif($errors->has('yubin22'))<div class="error">{{ $errors->first('yubin22') }}</div>
                    @endif
                </dd>

                <dt><i class="fas fa-home"></i> 住所</dt>
                <dd>
                    {{-- 都道府県 --}}
                    <input type="text" class="input_form input_inp9" name="region21" value="{{ old('region21') }}" placeholder="都道府県"
                           required><br>
                    @if($errors->has('region21'))
                        <div class="error">{{ $errors->first('region21') }}</div> @endif

                    {{-- 市区町村 --}}
                    <input type="text" class="input_form input_inp13" name="local21" placeholder="市区町村" value="{{ old('local21') }}" required><br>
                    @if($errors->has('local21'))<div
                            class="error">{{ $errors->first('local21') }}</div> @endif

                    {{-- それ以降 --}}
                    <input type="text" class="input_form input_inp10" name="addr21" placeholder="それ以降の住所" value="{{ old('addr21') }}" required><br>
                    @if($errors->has('addr21'))<div class="error">{{ $errors->first('addr21') }}</div> @endif
                </dd>


                <dt class="telspace"><i class="fas fa-phone"></i> 電話番号</dt>

                {{-- 電話番号 --}}
                <dd class="dd_right_bottom">
                    <input type="text" name="tel" class="input_form input_inp11" value="{{ old('tel') }}"
                           placeholder="ハイフンなし" required>
                    @if($errors->has('tel'))<div class="error">{{ $errors->first('tel') }}</div> @endif
                </dd>
            </dl>
            {{--</fieldset>--}}


            <div class="btn_space form">

                <button type="button" class="btn backbtn" onclick="location.href='{{ route('profile') }}'">戻る</button>

                <button type="submit" class="btn nextbtn">確認へ進む</button>

            </div>

        </form>
    </div>
</main>

@include('flovis.flovis_layout.footer')


</body>
</html>