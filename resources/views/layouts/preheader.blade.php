<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('meta_tag_title')</title>
    <meta name="description" content="@yield('meta_tag_description')" />
    <meta name="keywords" content="@yield('meta_tag_keywords')" />
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/plugins.js') }}" defer></script>
    <link href="{{ asset('img/tpl_img/favicon.png') }}" rel="shortcut icon">
    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/plugins.css') }}" rel="stylesheet">
</head>
