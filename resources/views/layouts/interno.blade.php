<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Sistema de gerenciamento e controle de trabalhos didáticos">
    <meta name="author" content="Mediaris">

    <title>Mediaris - @yield('title')</title>

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/icons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('/icons/favicon-32x32.png') }}" sizes="32x32">
    <link rel="icon" type="image/png" href="{{ asset('/icons/favicon-16x16.png') }}" sizes="16x16">
    <link rel="manifest" href="{{ asset('/icons/manifest.json') }}">
    <link rel="mask-icon" href="{{ asset('/icons/safari-pinned-tab.svg') }}" color="#e7e7e7">
    <link rel="shortcut icon" href="{{ asset('/icons/favicon.ico') }}">
    <meta name="apple-mobile-web-app-title" content="Mediaris">
    <meta name="application-name" content="Mediaris">
    <meta name="msapplication-TileColor" content="#e7e7e7">
    <meta name="msapplication-TileImage" content="{{ asset('/icons/mstile-144x144.png') }}">
    <meta name="msapplication-config" content="{{ asset('/icons/browserconfig.xml') }}">
    <meta name="theme-color" content="#e7e7e7">

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    @yield('custom-css')
    <link href="{{ asset('css/social.css') }}" rel="stylesheet">
    <link href="{{ asset('css/ie10-viewport-bug-workaround.css') }}" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

@yield('inline-css')

<body>

@include('includes.topmenu')

<div class="container">

    <div class="row">

        <div class="col-md-3">
            @include('includes.sidemenu')
        </div>

        <div class="col-md-9" style="border-left: 1px solid #eee;">
            @yield('content')
        </div>


    </div>

</div>

<div class="container">
    <hr>
    @include('includes.footer')
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<link href="{{ asset('css/ie10-viewport-bug-workaround.css') }}" rel="stylesheet">
<script src="{{ asset('js/ie10-viewport-bug-workaround.js') }}"></script>
</body>

</html>