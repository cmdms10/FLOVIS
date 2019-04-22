<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Document</title>
</head>
<body>


<form action="{{ action('SearchController@getindex') }}" method="get">
    <input type="text" class="searchForm" name="keyword" placeholder="キーワード検索" value="{{ $keyword }}">
    <button type="submit" class="bubbly-button">Search</button>
</form>


{{--<button type="button" onclick="location.href='{{ action('SearchController@asc') }}'">新着順</button>--}}

{{--<button type="button" onclick="location.href='{{ route('desc') }}'">古い順</button>--}}


{{--<form action="{{ route('index') }}">--}}
    {{--<button type="submit" value="new">新着</button>--}}
    {{--<button type="submit" value="old">古い</button>--}}
    {{--<select name="" id="">--}}
        {{--<option value="new">新着</option>--}}
        {{--<option value="old">古い</option>--}}
    {{--</select>--}}
    {{--<button type="submit">並び替え</button>--}}
{{--</form>--}}

{{--<button type="button" onclick="location.href='{{ action('SearchController@change') }}'" value="desc" name="hoge">新着順</button>--}}
<form action="{{ action('SearchController@getindex') }}">
    <input type="hidden" name="keyword" value="{{ $keyword }}">
    <button type="submit" name="hoge" value="desc">新着順</button>
</form>

<form action="{{ action('SearchController@getindex')  }}">
    <input type="hidden" name="keyword" value="{{ $keyword }}">
    <button type="submit" name="hoge" value="asc">古い順</button>
</form>


<div>
{{--    {{ var_dump($users) }}--}}

    @foreach($products as $product)
        <div>{{ $product->id }}</div>
        <div>{{ $product->title }}</div>
        <div>{{ $product->price }}</div>
{{--                <div>{{ $user-> }}</div>--}}
        <hr>
    @endforeach

{{--    {{ var_dump($keyword) }}--}}
    <br>
{{--    {{ var_dump($products) }}--}}
    <br>
    {{ $message }}
    <br>
    <br>
    {{--<div>現在のページに表示されている件数: {{ $products->count() }}</div>--}}
    {{--<div>現在のページ数: {{ $products->currentPage() }}</div>--}}
    {{--<div>現在のページの最初の要素: {{ $products->firstItem() }}</div>--}}
    {{--<div>次のページがあるかどうか: {{ $products->hasMorePages() }}</div>--}}
    {{--<div>現在のページの最後の要素: {{ $products->lastItem() }}</div>--}}
    {{--<div>最後のページ数: {{ $products->lastPage() }}</div>--}}
    {{--<div>次のページのURL: {{ $products->nextPageUrl() }}</div>--}}
    {{--<div>1ページに表示する件数: {{ $products->perPage() }}</div>--}}
    {{--<div>前のページのURL: {{ $products->previousPageUrl() }}</div>--}}
    {{--<div>合計件数: {{ $products->total() }}</div>--}}
    {{--<div>指定ページのURL: {{ $products->url(4) }}</div>--}}
    <div>
        <div class="next">{{ $products->appends(Request::query())->links(/*'flovis.hoge.search'*/) }}</div>
    </div>
    {{--{{ $message }}--}}

{{--{{ var_dump($message) }}--}}

</div>

{{--{{ var_dump($data) }}--}}
<br>
<br>
{{--{{ var_dump($keyword) }}--}}
{{--{{ var_dump($query) }}--}}

<div>
    {{--    {{ $data->appends(Request::only('keyword'))->links() }}--}}
</div>


</body>
</html>