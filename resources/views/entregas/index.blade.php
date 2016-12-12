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

    <h1>Lista de entregas de trabalhos</h1>
    <p class="lead">Listagem das entregas para a solicitação {{}}</p>
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
	                
	                <form action="{{ url('/solicitacoes/' . $val->solicitacao_id) }}" method="post">
	                	
	                	{{ method_field('DELETE') }}
        				{{ csrf_field() }}

		                <a class="btn btn-xs btn-info" href="{{ URL::to('solicitacoes/' . $val->solicitacao_id) }}">
		                	<span class="glyphicon glyphicon-search"></span>
		                </a>

		                <a class="btn btn-xs btn-warning" href="{{ URL::to('solicitacoes/' . $val->solicitacao_id . '/edit') }}">
		                	<span class="glyphicon glyphicon-pencil"></span>
		                </a>

	                	<button type="submit" class="btn btn-xs btn-danger confirmation"><span class="glyphicon glyphicon-remove"></span></button>

	                </form>

	                

	            </td>
	        </tr>
	    
	    @endforeach
	    </tbody>
	</table>

	<script src="{{ asset('js/bootstrap-confirmation.min.js') }}"></script>

	<script type="text/javascript">
		$('.confirmation').confirmation({
			var self = this;
			onConfirm: function() {
				alert('deletado');
				self.preventDefault();
			},
			
			onCancel: function() {
				self.preventDefault();
			}
		});
	</script>

@endsection