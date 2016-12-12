@extends('layouts.externo')

@section('title', 'Visualizar - Turma')

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

            {!! QrCode::size(270)->margin(0)->generate($turma->code); !!}

        </div>

        <div class="col-md-1 text-center">
            <div class="vertical-divider hidden-xs hidden-sm"></div>
        </div>

        <div class="col-md-6 offset-md-2" style="padding-top: 2em;">

            <h1><strong>Turma #{{ $turma->code }}</strong></h1>

            <p><strong>Docente:</strong> {{ $turma->docente->nome_exibicao }}</p>
            <p><strong>Nome da instituição:</strong> {{ $turma->instituicao->nome }}</p>
            <p><strong>Campus:</strong>
            @php
                foreach ($turma->instituicao->cidades as $cidade)
                    echo $cidade->nome; 
            @endphp
            </p>
            <p><strong>Curso:</strong> {{ $turma->cursos->nome }}</p>
            <p><strong>Semestre/ciclo:</strong> {{ $turma->semestre }}º</p>
            <p><strong>Período:</strong> {{ $turma->turnos->periodo }}</p>
            <p><strong>Ano:</strong> {{ $turma->ano }}</p>

        </div>
    </div>

    <div class="row">
        <div class="col-md-12 text-center" style="margin-top: 1em;">
            <h4><strong>Se você pertence a esta turma mas ainda não está inscrito nela, <a href="#">inscreva-se clicando aqui.</a></strong></h4>
        </div>
    </div>

@endsection