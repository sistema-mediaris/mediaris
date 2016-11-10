@extends('layouts.externo')

@section('title', 'Erro')

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

    <div class="row custom-valign">

        <div class="col-md-12 text-justify">

            @if(Session::has('error'))
                <div class="alert-box success">
                    <h2>{{ Session::get('error') }}</h2>
                </div>
            @endif

        </div>
    </div>

@endsection