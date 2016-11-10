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

<div class="container">

    <!-- Static navbar -->
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url('/') }}">MEDIARIS</a>
            </div>

            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/sobre') }}">Sobre</a></li>
                    <li><a href="{{ url('/ajuda') }}">Ajuda</a></li>
                    <li><a href="{{ url('/contato') }}">Contato</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <p class="navbar-text">Já possui uma conta?</p>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Entrar</b> <span
                                    class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li class="row">

                                <div class="col-md-12">

                                    <p>Realizar autenticação</p>

                                    <div class="social-buttons">
                                        <a href="{{ url('/auth/google') }}" class="btn btn-lg btn-social-icon btn-google">
                                            <i class="demo-icon icon-google" style="font-size: .975em;"></i>
                                        </a>
                                        <a href="{{ url('/auth/live') }}" class="btn btn-lg btn-social-icon btn-microsoft">
                                            <i class="demo-icon icon-outlook" style="font-size: .975em;"></i>
                                        </a>
                                        <a href="{{ url('/auth/linkedin') }}" class="btn btn-lg btn-social-icon btn-linkedin">
                                            <i class="demo-icon icon-linkedin" style="font-size: .975em;"></i>
                                        </a>
                                        <a href="{{ url('/auth/yahoo') }}" class="btn btn-lg btn-social-icon btn-yahoo">
                                            <i class="demo-icon icon-yahoo" style="font-size: .975em;"></i>
                                        </a>
                                    </div>

                                    <hr>

                                </div>

                                <p>Novo por aqui? <a href="{{ url('/cadastro') }}"><b>Cadastre-se!</b></a></p>

                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <hr>

    <footer>
        <div class="row">
            <div class="col-lg-12">
                <div class="footer-distributed">

                    <div class="footer-right">

                        <a href="#"><i class="demo-icon icon-facebook" style="font-size: .975em; color: #fefefe;"></i></a>
                        <a href="https://github.com/sistema-mediaris"><i class="demo-icon icon-github-circled" style="font-size: .975em; color: #fefefe;"></i></a>

                    </div>

                    <div class="footer-left">

                        <p class="footer-links">
                            <a href="{{ url('/') }}">Página Inicial</a> ·
                            <a href="{{ url('/sobre') }}">Sobre</a> ·
                            <a href="{{ url('/ajuda') }}">Ajuda</a> ·
                            <a href="{{ url('/contato') }}">Contato</a> ·
                            <a href="{{ url('/termos') }}">Termos de serviço</a>
                        </p>

                        <p>Mediaris &copy; 2016</p>
                    </div>

                </div>
            </div>
        </div>
    </footer>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<link href="{{ asset('css/ie10-viewport-bug-workaround.css') }}" rel="stylesheet">
<script src="{{ asset('js/ie10-viewport-bug-workaround.js') }}"></script>
</body>

</html>