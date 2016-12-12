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

        h4 {
            margin-top: .75em;
        }
    </style>

@endsection

@section('content')

    <h1>Entrega: #{{ $entrega->id }} - Solicitação: <strong>#{{ $entrega->solicitacoes_id }}</strong></h1>
    <p class="lead">Visualizando a entrega para a solicitação de trabalho <strong>{{ $solicitacao->nome }}</strong></p>
    <hr>

        <a href="{{ url('aluno/solicitacoes/') }}" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-th-list"></span> Listar solicitações</a>
        <a href="{{ url('aluno/solicitacoes/' . $solicitacao->id . '/entregas/edit') }}" class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-pencil"></span> Alterar entrega</a>
        

    <h4><strong>Aluno:</strong> {{ $aluno->nome_exibicao }}</h4>
    

    @if($entrega->trabalhos)
        <h4><strong>Arquivos enviados:</strong><h4>
        <ul>
            <li><a href="#"><span class="glyphicon glyphicon-pencil"></span> Arquivo 1</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-pencil"></span> Arquivo 2</a></li>
        </ul>
    @endif

    @if($entrega->feedback)

        <h4><strong>Feedback:</strong></h4>
        @if($solicitacao->feedback->comentario)
            <p>{{ $solicitacao->complemento->descricao }}</p>
        @else
            <p>Não foi informada um feedback.</p>
        @endif

    @else
        <h4><strong>Feedback:</strong></h4>
        <p>Não foi informada um feedback.</p>
    @endif

@endsection