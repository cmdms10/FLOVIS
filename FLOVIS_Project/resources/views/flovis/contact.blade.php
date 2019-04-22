<!doctype html>
<html lang="ja">
<head>
    <title>問い合わせ</title>
    @include('flovis.flovis_layout.head')
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
</head>
<body class="drawer drawer--left">

@include('flovis.flovis_layout.header')

<main>
    <span class="title">お問い合わせ</span>

    <div class="center">

        @if(session('flash_message'))
            <div class="flash_message">
                {{ session('flash_message') }}
            </div>
        @endif

        <div class="msg">
            <div class="impotantMsg">
                {{--<p class="msg1">重要</p>--}}
                <p class="msg2">
                    ご入力していただきましたお客様の個人情報は、お問い合わせに関する目的以外に利用することはございません。<br>
                    また、お客様の個人情報はプライバシーポリシーに基づき管理いたします。<br>
                    ※以上の記載事項に同意していただいた上、ご入力をお願い致します。
                </p>
            </div>
        </div>


        <form action="{{ route('contact.store') }}" method="post" class="form">
            @csrf
            <dl>
                    <dt>お名前<span class="required">[必須]</span></dt>
                    <dd>
                        <input type="text" name="name" class="form" value="{{ old('name') }}" placeholder="例）山田太郎"><br>
                        @if($errors->has('name')) <span class="error">{{ $errors->first('name') }}</span> @endif
                    </dd>
                    <dt>お名前（フリガナ）</dt>
                    <dd>
                        <input type="text" name="kanaName" class="form" value="{{ old('kanaName') }}" placeholder="例）ヤマダタロウ"><br>
                        @if($errors->has('kanaName')) <span class="error">{{ $errors->first('kanaName') }}</span> @endif
                    </dd>
                    <dt>メールアドレス<span class="required">[必須]</span></dt>
                    <dd>
                        <input type="email" name="email" class="form" value="{{ old('email') }}" placeholder="例）flovis@exsample.com"><br>
                        @if($errors->has('email')) <span class="error">{{ $errors->first('email') }}</span> @endif
                    </dd>
                    <dt>電話番号</dt>
                    <dd>
                        <input type="text" name="tel" class="form" value="{{ old('tel') }}" placeholder="例）09012345678"><br>
                        @if($errors->has('tel')) <span class="error">{{ $errors->first('tel') }}</span> @endif
                    </dd>
                    <dt>お問い合わせ内容 <span class="required">[必須]</span></dt>
                    <dd>
                        <textarea name="contents" cols="50" rows="4" placeholder="ここにお問い合わせ内容をお書き下さい。">{{ old('contents') }}</textarea><br>
                        @if($errors->has('contents')) <span class="error">{{ $errors->first('contents') }}</span> @endif
                    </dd>


                    <div class="btnSpace">
                        <button type="submit" class="submit">送信する</button>
                    </div>

            </dl>

        </form>

    </div>

</main>

@include('flovis.flovis_layout.footer')

</body>
</html>