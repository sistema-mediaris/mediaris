@extends('layouts.externo')

@section('title', 'Página Inicial')

@section('custom-css')

    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

@endsection

@section('inline-css')

    <style>
        .dropdown-menu {padding: 1em 1.5em; text-align: center;}
        .social-buttons {width: 14em; margin-bottom: .5em;}
        .navbar-brand {font-weight: 600;}
    </style>

@endsection

@section('content')

    <div class="jumbotron">
        <div class="row custom-valign">

            <div class="col-md-7">
                <h1>Simples e focado</h1>
                <p>Mediaris é uma plataforma educacional de apoio, voltada para o gerenciamento e controle de informações relacionadas aos métodos de avaliação acadêmica.</p>
                <p>
                    <a class="btn btn-lg btn-primary" href="{{ url('/sobre') }}" role="button">Como funciona &raquo;</a>
                </p>
            </div>

            <div class="col-md-5" style="text-align: center;">
                <img src="{{ asset('/img/Logo-full.svg') }}" alt="Logo - Mediaris" />
            </div>
        </div>
    </div>

@endsection