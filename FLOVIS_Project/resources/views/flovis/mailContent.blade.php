<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <title>ご注文内容確認メール</title>

    <style type="text/css">
        * {
            margin: 0;
            padding: 0;
        }

        div.backImg {
            background-image: url("https://static.wixstatic.com/media/dae918_d6f530d2210847ebab8f26a6623e4d8c~mv2_d_2985_4477_s_4_2.jpg/v1/fill/w_640,h_960,al_c,q_85,usm_0.66_1.00_0.01/dae918_d6f530d2210847ebab8f26a6623e4d8c~mv2_d_2985_4477_s_4_2.webp");
            /*background-size: cover;*/
        }

        div.backcolor {
            max-width: 100%;
            background-color: rgba(255,255,255,0.75);

        }

        header {
            letter-spacing: 2px;
            font-size: 30px;
            font-weight: bold;
            background-color: #68e58a;
            color: #fff;
            text-align: center;
        }

        h3 {
            text-align: center;
            margin: 20px 0 20px 0;
        }

        div.msg {
            word-wrap: break-word;
            /*padding: 5px;*/
            /*background-color: #fff;*/
            border-radius: 10px;
            /*box-shadow: 2px 2px 2px rgba(255,255,255,0.6);*/
        }

        div.imageShadow {
            box-shadow: 2px 2px 2px rgba(255,255,255,0.6);
            /*border: solid 1px #222;*/
            width: 100px;
            margin: 0 auto;
            /*background-color: #0b7ad1;*/
        }

        dl.dl1 {
            margin: 30px 0 0 0;
        }

        dd {
            word-wrap: break-word;
        }

        dd.dd1 {
            margin: 0 0 0 20px;
        }

        dd.productTitle {
            color: #8099fd;
        }

        dd.dd1 > span.productPrice {
            color: #ff4040;
        }

        .taxIn {
            font-size: 14px;
        }

        p.total {
            font-size: 20px;
            margin: 10px 0;
        }

        p.total > span.color {
            color: #ff4040;
        }

        hr.hr1 {
            margin-top: 20px;
            border-top: 1px dashed #8c8b8b;
        }

        dd.ddImage {
            text-align: center;
        }

        img.productImage {
            /*border: solid 1px #222;*/
            width: 150px;

        }

        h4 {
            margin: 30px 0 20px 0;
            padding: 10px 0;
            text-align: center;
            border: solid 2px #222;
            border-left: none;
            border-right: none;
        }


        dd.dd2 {
            max-width: 100%;
            /*background-color: #0b7ad1;*/
            font-size: 16px;
            align-items: center;
            align-content: center;
            margin: 10px 0 20px 20px;
            /*padding: 10px 0 20px 100px;*/
            word-wrap: break-word;
        }


        footer {
            clear: left;
            margin: 30px 0 0 0;
            padding: 20px 0;
        }

        footer p.copyright {
            text-align: center;
        }

    </style>

</head>
<body>
<div class="backImg">


<div class="backcolor">

<header>
    flovis
</header>

<main>
        <h3>{{ Auth::user()->name }}様</h3>

        <div class="msg">この度はflovisをご利用していただき、ありがとうございます。ご注文して頂いた商品の手続きが完了しましたので、お知らせいたします。</div>
        {{--<p>※このメールは転送専用アドレスです。返信しないでください。</p>--}}

    <h4>購入内容</h4>

        @foreach($contents as $content)
            <dl class="dl1">
                {{--<dt>商品画像</dt>--}}
                <dd class="ddImage">
                    @foreach($products as $product)

                        @if($product->id == $content->id)
                            {{--<div class="imageShadow">--}}
                                <img src="{{ asset('images/products/'.$product->main_image) }}" alt="" class="productImage">
                            {{--</div>--}}
                        @endif

                    @endforeach
                </dd>
                <dt>商品名</dt>
                <dd class="dd1 productTitle">{{ $content->name }}</dd>

                <dt>価格</dt>
                <dd class="dd1">
                <span class="productPrice">
                    ￥{{ $content->price * 1.08 }}
                </span>
                    <span class="taxIn">
                    (tax in)
                </span>
                </dd>

                <dt>数量</dt>
                <dd class="dd1">{{ $content->qty }}</dd>
            </dl>
            <hr class="hr1">
        @endforeach
        <p class="total">
            合計：
            <span class="color">
                ￥{{ $total }}
            </span>
            <span class="taxIn">
            (tax in)
        </span>
        </p>


        <h4>お届け情報</h4>

        <dl>
            <dt class="dt2">受取人</dt>
            <dd class="dd2">{{ $data['ReceiverName'] }}様</dd>

            <dt class="dt2">お届け先</dt>
            <dd class="dd2">
                {{--<div>--}}
                〒{{ $data['yubin21'] }}-{{ $data['yubin22'] }}　
                {{ $data['region21'] }},{{ $data['local21'] }}<br>{{ $data['addr21'] }}
                {{--</div>--}}

            </dd>

            <dt class="dt2">電話番号</dt>
            <dd class="dd2">{{ $data['tel'] }}</dd>

            <dt class="dt2">お届け日時</dt>
            <dd class="dd2">
                {{ $data['ReceiverDate'] }}　{{ $data['ReceiverTime'] }}
            </dd>

        </dl>
</main>


<footer>
    <p>※このメールは転送専用アドレスです。返信しないようお願い致します。</p>
    <p class="copyright">&copy; おしゃ研 flovis</p>
</footer>

</div>


</div>
</body>
</html>