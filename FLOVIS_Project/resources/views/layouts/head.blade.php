@section('head')
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="shortcut icon" href="{{ asset('images/flovis_logo00.jpg') }}">

    {{--<link rel="stylesheet" href="/css/app.css">--}}

    {{--main.css--}}
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

    {{-- login.css --}}
    {{--<link rel="stylesheet" href="">--}}

    {{--header.css--}}
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">

    <!-- drawer.css -->
    <link rel="stylesheet" href="{{ asset('css/drawer.min.css') }}">

    <!-- jquery & iScroll -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/iscroll.min.js') }}"></script>

    <!-- drawer.js -->
    <script src="{{ asset('js/drawer.js') }}"></script>
@endsection