@extends('layouts.interno')

@section('title', 'Criar - Solicitação')

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

        .navbar {
            margin-bottom: 20px;
        }
    </style>

@endsection

@section('content')

    <h1>Adicionar uma entrega de trabalho</h1>
    <p class="lead">Crie uma entrega para solicitação de trabalho</p>
    <hr>

    @if(Session::has('error'))
        <div class="alert-box success">
            <h2>{{ Session::get('error') }}</h2>
        </div>
    @endif

    <form method="POST" action="{{ url('/entregas') }}" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal">

        {{ csrf_field() }}

        <div class="form-group">
            <h4 class="col-md-12"><strong>Aluno:</strong> {{ $aluno->nome_exibicao }}</label>
            <input id="alunos_id" name="alunos_id" type="hidden" value="{{ $aluno->id }}">
        </div>

        <div class="form-group">
            <h4 class="col-md-12"><strong>Solicitação:</strong> #{{ $solicitacao->id }} - {{ $solicitacao->nome }}</h4>
            <h4 class="col-md-12"><strong>Data Limite:</strong> {{ \Carbon\Carbon::parse($solicitacao->data_entrega)->format('d/m/Y') }}</h4>
            <input id="solicitacoes_id" name="solicitacoes_id" type="hidden" value="{{ $solicitacao->id }}">
        </div>

        <div class="form-group">
            <h4 class="col-md-2"><strong>Trabalhos</strong></h4>
            <div class="col-md-10">
                <input type="file" multiple="multiple" name="trabalhos[]" />
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-offset-2 col-md-10">
                <button type="submit" class="btn btn-success">Enviar</button>
                <a href="{{ url()->previous() }}" class="btn btn-default">Cancelar</a>
            </div>
        </div>

    </form>

@endsection