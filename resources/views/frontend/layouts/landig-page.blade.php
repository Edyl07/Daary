<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--favicon icon-->
    <link rel="icon" href="{{ asset('img-2/icon-96x96.png') }}" type="image/png" sizes="16x16">

    <!-- font-awesome css -->
    <link rel="stylesheet" href="{{ asset('css-2/font-awesome.min.css') }}">

    <!--themify icon-->
    <link rel="stylesheet" href="{{ asset('css-2/themify-icons.css') }}">

    <!-- magnific popup css-->
    <link rel="stylesheet" href="{{ asset('css-2/magnific-popup.css') }}">

    <!--owl carousel -->
    <link href="{{ asset('css-2/owl.theme.default.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css-2/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- bootstrap core css -->
    <link href="{{ asset('css-2/bootstrap.min.css') }}" rel="stylesheet">

    <!-- custom css -->
    <link href="{{ asset('css-2/style.css') }}" rel="stylesheet">

    <!-- responsive css -->
    <link href="{{ asset('css-2/responsive.css') }}" rel="stylesheet">

    <script src="{{ asset('js-2/vendor/modernizr-2.8.1.min.js') }}"></script>

    <script src="https://kit.fontawesome.com/c599999fcf.js" crossorigin="anonymous"></script>

    @yield('css')
    

</head>

<body>

  
    {{-- MAIN CONTENT --}}
    @yield('content')

    <!--=========== all js file link ==============-->

<!-- main jQuery -->
<script src="{{ asset('js-2/jquery-3.3.1.min.js') }}"></script>

<!-- bootstrap core js -->
<script src="{{ asset('js-2/bootstrap.min.js') }}"></script>

<!-- smothscroll -->
<script src="{{ asset('js-2/jquery.easeScroll.min.js') }}"></script>

<!--owl carousel-->
<script src="{{ asset('js-2/owl.carousel.min.js') }}"></script>

<!-- scrolling nav -->
<script src="{{ asset('js-2/jquery.easing.min.js') }}"></script>

<!--fullscreen background video js-->
<script src="{{ asset('js-2/jquery.mb.ytplayer.min.js') }}"></script>

<!--typed js -->
<script src="{{ asset('js-2/typed.min.js') }}"></script>

<!--magnific popup js-->
<script src="{{ asset('js-2/magnific-popup.min.js') }}"></script>

<!-- custom script -->
<script src="{{ asset('js-2/scripts.js') }}"></script>
    @yield('scripts')
</body>

</html>
