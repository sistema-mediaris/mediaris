@extends('layouts.interno')

@section('title', 'Listagem - Solicitação')

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

    <h1>Lista de solicitações de trabalhos</h1>
    <p class="lead">Listagem de todas as solicitações de trabalho</p>
    <hr>

	<!-- se houver alguma mensagem -->
	@if (Session::has('message'))
	    <div class="alert alert-info">{{ Session::get('message') }}</div>
	@endif

	<a href="{{ URL::to('solicitacoes/create') }}" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-plus"></span> Criar nova solicitação</a>
	<br><br>

	<table class="table table-striped table-bordered table-hover">
	    
	    <thead style="text-align: center; font-weight: bold;">
	        <tr>
	            <td>ID</td>
	            <td>Nome</td>
	            <td>Data Criação</td>
	            <td>Data Entrega</td>
	            <td>Ações</td>
	        </tr>
	    </thead>

	    <tbody style="text-align: center;">
	    @foreach($solicitacoes as $k => $val)

	        <tr>
	            <td>{{ $val->solicitacao_id }}</td>
	            <td>{{ $val->nome }}</td>
	            <td>{{ $val->data_criacao }}</td>
	            <td>{{ $val->data_entrega }}</td>
	            <td>

	                <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
	                

	                <form action="{{ url('/solicitacoes/' . $val->solicitacao_id) }}" method="post">
	                	
	                	{{ method_field('DELETE') }}
        				{{ csrf_field() }}

	                	<button type="submit" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-remove"></span></button>

	                </form>

	                <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
	                <a class="btn btn-xs btn-info" href="{{ URL::to('solicitacoes/' . $val->solicitacao_id) }}">
	                	<span class="glyphicon glyphicon-search"></span>
	                </a>

	                <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
	                <a class="btn btn-xs btn-warning" href="{{ URL::to('solicitacoes/' . $val->solicitacao_id . '/edit') }}">
	                	<span class="glyphicon glyphicon-pencil"></span>
	                </a>

	            </td>
	        </tr>
	    
	    @endforeach
	    </tbody>
	</table>

@endsection

<!--
[{
"id":1,
"docentes_id":1,
"instituicoes_id":1,
"cursos_id":1,
"turnos_id":1,
"semestre":4,
"ano":2014,
"code":"p6u48k",
"url":"www.mediaris.com.br\/turmas\/p6u48k",
"created_at":"2016-12-11 22:46:50",
"updated_at":"2016-12-11 22:46:50",
"nome":"Entrega do trabalho final",
"turmas_id":1,
"complementos_id":null,
"data_criacao":"2016-12-11",
"data_entrega":"2016-12-13"
}]
-->