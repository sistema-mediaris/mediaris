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
    <p class="lead">Listagem das entregas para a solicitação</p>
    <hr>

	{{ $entregas }}
	{{ Auth::user()->id }}

@endsection