<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <!-- Mirrored from pcbuilder.net/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 Oct 2021 17:47:29 GMT -->
    <!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>PC Builder - Build Your Custom PC Online</title>
        <meta name="description" content="Building your PC compatibility was never so easy before - but with the use of PC Builder, just pick the desired PC parts from the list of latest components, and you're ready to turn your imagination into reality. You can use the PC building simulator offered by us to create your own PC virtually and even analyze the compatible pc parts before buying them, and its really easy by simply picking up the pc parts. We at PC Builder also help you to restrain your stress of getting into the complex structure and finding compatibility of the parts. And get assured before purchasing your custom PC with the PC Builder." />

        <meta name="robots" content="follow,index" />
        {{-- <link rel="canonical" href="index.html" /> --}}
        <meta property="og:title" content="PC Builder - Build Your Custom PC Online">
        <meta property="og:url" content="index.html">
        <meta property="og:image" content="../images.pcbuilder.dev/assets/images/og/visit-pc-builder.png">
        <meta property="og:description" content="Building your PC compatibility was never so easy before - but with the use of PC Builder, just pick the desired PC parts from the list of latest components, and you're ready to turn your imagination into reality. You can use the PC building simulator offered by us to create your own PC virtually and even analyze the compatible pc parts before buying them, and its really easy by simply picking up the pc parts. We at PC Builder also help you to restrain your stress of getting into the complex structure and finding compatibility of the parts. And get assured before purchasing your custom PC with the PC Builder.">
        <meta name="twitter:title" content="PC Builder - Build Your Custom PC Online">
        <meta name="twitter:description" content="Building your PC compatibility was never so easy before - but with the use of PC Builder, just pick the desired PC parts from the list of latest components, and you're ready to turn your imagination into reality. You can use the PC building simulator offered by us to create your own PC virtually and even analyze the compatible pc parts before buying them, and its really easy by simply picking up the pc parts. We at PC Builder also help you to restrain your stress of getting into the complex structure and finding compatibility of the parts. And get assured before purchasing your custom PC with the PC Builder.">
        <link rel="preload" as="image" href="{{asset('images/banner/bg-banner.png')}}" />
        <meta name="author" content="Code Smith" />
        <meta property="og:locale" content="en_US">
        <meta property="og:type" content="website">
        <meta property="og:site_name" content="PC Builder">
        <meta property="og:image" content="{{asset('images/banner/bg-banner.png')}}">
        <meta property="og:image:secure_url" content="{{asset('images/banner/bg-banner.png')}}">
        <meta property="og:image:width" content="1200">
        <meta property="og:image:height" content="627">
        <meta property="og:image:alt" content="PC Builder - Build Your Custom PC Online">
        <meta property="og:image:type" content="image/png">
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:creator" content="@pcbuilder_net">
        <meta name="twitter:image" content="{{asset('images/banner/bg-banner.png')}}">
        <meta property="fb:app_id" content="361771148502558">

        <link rel="apple-touch-icon" sizes="57x57" href="{{asset('images/favicon/apple-icon-57x57.png')}}">
        <link rel="apple-touch-icon" sizes="60x60" href="{{asset('images/favicon/apple-icon-60x60.png')}}">
        <link rel="apple-touch-icon" sizes="72x72" href="{{asset('images/favicon/apple-icon-60x60.png')}}">
        <link rel="apple-touch-icon" sizes="76x76" href="{{asset('images/favicon/apple-icon-76x76.png')}}">
        <link rel="apple-touch-icon" sizes="114x114" href="{{asset('images/favicon/apple-icon-114x114.png')}}">
        <link rel="apple-touch-icon" sizes="120x120" href="{{asset('images/favicon/apple-icon-120x120.png')}}">
        <link rel="apple-touch-icon" sizes="144x144" href="{{asset('images/favicon/apple-icon-144x144.png')}}">
        <link rel="apple-touch-icon" sizes="152x152" href="{{asset('images/favicon/apple-icon-152x152.png')}}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{asset('images/favicon/apple-icon-180x180.png')}}">
        <link rel="icon" type="image/png" sizes="192x192" href="{{asset('images/favicon/android-icon-192x192.png')}}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{asset('images/favicon/favicon-32x32.png')}}">
        <link rel="icon" type="image/png" sizes="96x96" href="{{asset('images/favicon/favicon-96x96.png')}}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{asset('images/favicon/favicon-16x16.png')}}">
        <link rel='manifest' href='manifest.json'>
        <meta name="msapplication-TileColor" content="#001119">
        <meta name="msapplication-TileImage" content="{{asset('images/favicon/ms-icon-144x144.png')}}">
        <meta name="theme-color" content="#001119">

        <link rel="dns-prefetch" href="https://fonts.gstatic.com/">
        <link href="https://fonts.gstatic.com/" rel="preconnect" crossorigin>

        <link rel="preload" as="image" href="{{asset('images/logo-80.png')}}" />
        <link rel="preload" as="image" href="https://images.pcbuilder.dev/assets/images/flags/us.svg" />
        <link rel="preload" href="{{asset('css/font.css')}}" as="style">

        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">

        <link rel="stylesheet" href="{{asset('css/all.min.css')}}">

        <link rel="stylesheet" href="{{asset('css/style.css')}}">
        <link rel="stylesheet" href="{{asset('css/extra_styles.css')}}">

        <link rel="stylesheet" type="text/css" href="{{asset('css/font.css')}}">

        @stack('style')
        <script>
            window.auth_user = {!! json_encode(Auth::user()); !!};  //retrieving auth user in a global script variable, it can be accessed in any vue component's script tag
        </script>
        <script async src="{{asset('js/analytics.js')}}"></script>
        <script src="{{(asset('js/analytics-code.js'))}}"></script>
        <!-- Styles -->
        {{-- <link rel="stylesheet" href="{{ mix('css/app.css') }}"> --}}

        <!-- Scripts -->
        {{-- @routes
        <script src="{{ mix('js/app.js') }}" defer></script> --}}
    </head>
    <body>
        
        @include('inc.nav')
        @yield('content')
        @include('inc.footer')
        @stack('script')
        <script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
        <script src="{{asset('js/popper.min.js')}}"></script>
        <script src="{{asset('js/bootstrap.min.js')}}"></script>
        <script src="{{asset('js/lazyload.min.js')}}"></script>
        <script src="{{asset('js/email-decode.min.js')}}"></script>
        <script src="{{asset('js/scripts.js')}}"></script>
        @env ('local')
            <script src="http://localhost:8000/js/bundle.js"></script>
        @endenv
    </body>
</html>