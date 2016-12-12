@extends('layouts.interno')

@section('title', 'Listagem - Entregas')

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

    <h1>Lista de entregas de trabalhos</h1>
    @if($solicitacao = \App\Models\Solicitacao::findOrFail($id))
    	<p class="lead">Listagem das entregas para a solicitação <a href="{{ URL::to('solicitacoes/' . $solicitacao->id) }}"><strong>#{{ $solicitacao->id }} - {{ $solicitacao->nome }}</strong></a></p>
    @else
    	<p class="lead">Listagem das entregas para a solicitação</p>
    @endif
    <hr>

	<!-- se houver alguma mensagem -->
	@if (Session::has('message'))
	    <div class="alert alert-info">{{ Session::get('message') }}</div>
	@endif

	<a href="{{ URL::to('solicitacoes/') }}" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-th-list"></span> Listar solicitações</a>
	<br><br>

	<table class="table table-striped table-bordered table-hover">
	    
	    <thead style="text-align: center; font-weight: bold;">
	        <tr>
	            <td>ID</td>
	            <td>Aluno</td>
	            <td>Hora/Data Entrega</td>
	            <td>Ações</td>
	        </tr>
	    </thead>

	    <tbody style="text-align: center;">
	    @if(count($entregas) == 0)
	    	<tr><td colspan="4">Ainda não há nenhuma entrega para esta solicitação.</td></tr>
	    @endif

	    @foreach($entregas as $k => $val)

	        <tr>
	            <td>{{ $val->entregas_id }}</td>
	            @if($aluno = \App\Models\Aluno::findOrFail($val->alunos_id))
	            	<td>{{ $aluno->nome_exibicao }}</td>
	            @else
	            	<td>{{ $val->alunos_id}}
	            @endif
	            <td>{{ \Carbon\Carbon::parse($val->up_at)->format('H:i:s d/m/Y') }}</td>
	            <td>

	                <a class="btn btn-xs btn-success" href="{{ URL::to('entregas/' . $val->entregas_id) }}">
	                	<span class="glyphicon glyphicon-search"></span> Ver arquivos
	                </a>

	                <!--<a class="btn btn-xs btn-warning" href="{{ URL::to('entregas/' . $val->entregas_id . '/edit') }}">
	                	<span class="glyphicon glyphicon-pencil"></span>
	                </a>-->

	            </td>
	        </tr>
	    
	    @endforeach
	    </tbody>
	</table>

@endsection
