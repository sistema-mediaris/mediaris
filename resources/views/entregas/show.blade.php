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
    <form action="{{ url('/solicitacoes/' . $solicitacao->id) }}" method="post">
                        
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}

    <a href="{{ url('/solicitacoes/') }}" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-th-list"></span> Listar solicitações</a>
    <a href="{{ url('/solicitacoes/' . $solicitacao->id . '/edit') }}" class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-pencil"></span> Altera solicitação</a>
    <button type="submit" class="btn btn-sm btn-danger confirmation"><span class="glyphicon glyphicon-plus"></span> Excluir solicitação</button>

                    </form>

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
    
    @if($solicitacao->tipos_arquivos)
        <h4><strong>Tipos de arquivo:</strong><h4>
        <ul>

        @if(count($solicitacao->tipos_arquivos) > 0)
            @foreach ($solicitacao->tipos_arquivos as $tipo)
                <li>{{ $tipo->extensao }}</li>
            @endforeach
        @else
            <li>Nenhum tipo de arquivo informado.</li>
        @endif

        </ul>
    @endif

    @if($solicitacao->complemento)

        <h4><strong>Descrição detalhada:</strong></h4>
        @if($solicitacao->complemento->descricao)
            <p>{{ $solicitacao->complemento->descricao }}</p>
        @else
            <p>Não foi informada uma descrição.</p>
        @endif
        
        <h4><strong>Assuntos tratados:</strong></h4>
        @if($solicitacao->complemento->assunto)
            <p>{{ $solicitacao->complemento->assunto }}</p>
        @else
            <p>Não foi informado um assunto.</p>
        @endif

        <h4><strong>Objetivos esperados:</strong></h4>
        @if($solicitacao->complemento->objetivo)
            <p>{{ $solicitacao->complemento->objetivo }}</p>
        @else
            <p>Não foi informado um objetivo.</p>
        @endif
    @else
        <h4><strong>Descrição detalhada:</strong></h4>
        <p>Não foi informada uma descrição.</p>
        <h4><strong>Assuntos tratados:</strong></h4>
        <p>Não foi informado um assunto.</p>
        <h4><strong>Objetivos esperados:</strong></h4>
        <p>Não foi informado um objetivo.</p>
    @endif

@endsection