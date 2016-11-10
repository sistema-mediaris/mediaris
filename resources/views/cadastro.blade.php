@extends('layouts.externo')

@section('title', 'Cadastro')

@section('custom-css')

    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

@endsection

@section('inline-css')

    <style>
        .dropdown-menu {padding: 1em 1.5em; text-align: center;}
        .social-buttons {width: 14em; margin-bottom: .5em;}
        .navbar-brand {font-weight: 600;}

        .vertical-divider {
            border-left: 1px solid #eff0f1;
            border-right: 1px solid #e4e6e8;
            height: 13em;
            max-width: 2px;
        }
    </style>

@endsection

@section('content')

    <div class="row custom-valign">

        <div class="col-md-5 text-justify">

            <h1>Cadastro facilitado</h1>
            <p>Para utilizar o Mediaris você não precisa criar uma nova conta.</p>
            <p>Por meio da autenticação social externa fornecida pelos provedores de serviços, podemos utilizar de
                uma conta que você já possui para controlar a sua conta no Mediaris.</p>
            <p>Comodidade para você, que não necessita memorizar mais uma conta. Segurança para nós, que asseguramos
                a veracidade das informações.</p>
            <h4 class="hidden-xs hidden-sm"><strong>Para continuar com o seu cadastro, selecione um dos serviços listados ao lado.</strong></h4>
            <h4 class="hidden-md hidden-lg"><strong>Para continuar com o seu cadastro, selecione um dos serviços listados abaixo.</strong></h4>

        </div>

        <div class="col-md-1 text-center">
            <div class="vertical-divider hidden-xs hidden-sm"></div>
        </div>

        <div class="col-md-4 offset-md-2" style="text-align: center;">
            <a href="{{ url('/auth/google') }}" class="btn btn-block btn-social btn-google">
                <i class="demo-icon icon-google" style="font-size: .975em;"></i> Autenticar com Google Gmail
            </a>
            <a href="{{ url('/auth/live') }}" class="btn btn-block btn-social btn-microsoft">
                <i class="demo-icon icon-outlook" style="font-size: .975em;"></i> Autenticar com Windows Outlook
            </a>
            <a href="{{ url('/auth/linkedin') }}" class="btn btn-block btn-social btn-linkedin">
                <i class="demo-icon icon-linkedin" style="font-size: .975em;"></i> Autenticar com LinkedIn
            </a>
            <a href="{{ url('/auth/yahoo') }}" class="btn btn-block btn-social btn-yahoo">
                <i class="demo-icon icon-yahoo" style="font-size: .975em;"></i> Autenticar com Yahoo
            </a>
        </div>
    </div>

@endsection