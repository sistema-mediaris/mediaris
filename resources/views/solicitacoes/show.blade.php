@extends('layouts.interno')

@section('title', 'Criar - Solicitação')

@section('custom-css')

    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/datepicker.css') }}" rel="stylesheet">

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

        h4 {
            margin-top: .75em;
        }
    </style>

@endsection

@section('content')

    <h1>Solicitação de trabalho: <strong>#{{ $solicitacao->id }}</strong></h1>
    <p class="lead">Visualizando a solicitação de trabalho <strong>{{ $solicitacao->nome }}</strong></p>
    <hr>

    <a href="{{ URL::to('solicitacoes/') }}" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-pencil"></span> Listar solicitações</a>
    <a href="{{ URL::to('solicitacoes/') }}" class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-pencil"></span> Altera solicitação</a>
    <a href="{{ URL::to('solicitacoes/') }}" class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-plus"></span> Excluir solicitação</a><br><br>

    <h4><strong>Nome:</strong> {{ $solicitacao->nome }}</h4>
    <h4><strong>Turma:</strong> {{ $solicitacao->turma->id}} - <a href="{{ url('turmas/' . $solicitacao->turma->code) }}"> #{{$solicitacao->turma->code}}</a> {{" - " . $solicitacao->turma->instituicao->nome }}</h4>

    @php
        $dtc = $solicitacao->data_criacao;
        $dte = $solicitacao->data_entrega;
        $criacao = \Carbon\Carbon::parse($dtc)->format('d/m/Y');
        $entrega = \Carbon\Carbon::parse($dte)->format('d/m/Y');
    @endphp
    
    <h4><strong>Data de criação:</strong> {{ $criacao }}</h4>
    <h4><strong>Data de entrega:</strong> {{ $entrega }}</h4>
    <h4><strong>Tipos de arquivo:</strong><h4>
    <ul>

        @foreach ($solicitacao->tipos_arquivos as $tipo)
            <li>{{ $tipo->extensao }}</li>
        @endforeach

    </ul>


    <h4><strong>Descrição detalhada:</strong></h4>
    <p>{{ $solicitacao->complemento->descricao }}</p>
    
    <h4><strong>Assuntos tratados:</strong></h4>
    <p>{{ $solicitacao->complemento->assunto }}</p>
    
    <h4><strong>Objetivos esperados:</strong></h4>
    <p>{{ $solicitacao->complemento->objetivo }}</p>

@endsection