@extends('layouts.externo')

@section('title', 'Confirmação')

@section('custom-css')

    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

@endsection

@section('inline-css')

    <style>
        .dropdown-menu {
            padding: 1em 1.5em;
            text-align: center;
        }

        .social-buttons {
            width: 14em;
            margin-bottom: .5em;
        }

        .navbar-brand {
            font-weight: 600;
        }

        .vertical-divider {
            border-left: 1px solid #eff0f1;
            border-right: 1px solid #e4e6e8;
            height: 15em;
            max-width: 2px;
        }

        .profile-avatar {
            -webkit-background-size: cover;
            background-size: cover;
            background-position: center;
            height: 8em;
            width: 8em;
        }

    </style>

@endsection

@section('content')

    <div class="row custom-valign">

        <div class="col-md-3 text-center">

            <!--<img src="{{ asset('/img/qrcode.png') }}" alt="QR Turma" style="max-height: 16em;"/>-->
            {!! QrCode::size(270)->margin(0)->generate('http://mediaris.com.br/turmas/123'); !!}

        </div>

        <div class="col-md-1 text-center">
            <div class="vertical-divider hidden-xs hidden-sm"></div>
        </div>

        <div class="col-md-6 offset-md-2" style="padding-top: 2em;">

            <h1>Turma #abc312CX895</h1>

            <h4>Confira os dados da turma:</h4>

            <p><strong>Nome da instituição:</strong> FACULDADE FICTÍCIA DE SÃO PAULO</p>
            <p><strong>Campus:</strong> Zona Norte</p>
            <p><strong>Curso:</strong> ANÁLISE E DESENVOLVIMENTO DE SISTEMAS</p>
            <p><strong>Semestre/ciclo:</strong> 2º SEM</p>
            <p><strong>Período:</strong> Matutino</p>
            <p><strong>Ano:</strong> 2016</p>
            <p><strong>Cidade:</strong> São Paulo</p>
            {{--<div class="profile-avatar" style="background-image: url({{ Auth::user()->avatar }});"></div>--}}


        </div>
    </div>

    <div class="row">
        <div class="col-md-12 text-center" style="margin-top: 1em;">
            <h4><strong>Se você pertence a esta turma mas ainda não está inscrito nela, <a href="#">inscreva-se clicando aqui.</a></strong></h4>
        </div>
    </div>

@endsection