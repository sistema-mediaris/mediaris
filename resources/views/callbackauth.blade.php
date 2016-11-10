<?php

/**
 * Verifica se existe um usuário autenticado e retornado
 */

try {

    $user = Socialite::driver($driver)->user();

} catch (Exception $e) {
    $user = false;
}

?>

@extends('layouts.externo')

@section('title', 'Confirmação')

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

        .vertical-divider {
            border-left: 1px solid #eff0f1;
            border-right: 1px solid #e4e6e8;
            height: 15em;
            max-width: 2px;
        }

        .profile-avatar {
            -webkit-background-size: cover;
            background-size: cover;
            background-position: center;
            height: 8em;
            width: 8em;
        }

    </style>

@endsection

@section('content')

    <div class="row custom-valign">

        <div class="col-md-5 text-justify">

            <h1>Confirmação - Autenticação</h1>

            @if($user)

                <h4>Para prosseguir com o cadastro, confira os dados e preencha as informações complementares.</h4>
                <h4>Confira os dados a serem compartilhados abaixo:</h4>

                <p><strong>Nome:</strong> {{ $user->name }}</p>
                <p><strong>Email:</strong> {{ $user->email }}</p>
                <p><strong>Serviço:</strong> {{ $driver }}</p>
                <p><strong>Detalhe da foto:</strong></p>
                <div class="profile-avatar" style="background-image: url({{ $user->avatar }});"></div>

            @else

                <p>É necessário realizar uma autenticação. Acesse a página de <a
                            href="{{ url('/cadastro') }}">Cadastro</a> para mais informações.</p>
            @endif


        </div>

        <div class="col-md-1 text-center">
            <div class="vertical-divider hidden-xs hidden-sm"></div>
        </div>

        <div class="col-md-4 offset-md-2" style="padding-top: 2em;">

            @if(Session::has('error'))
                <div class="alert-box success">
                    <h2>{{ Session::get('error') }}</h2>
                </div>
            @endif

            @if($user)

                <form action="{{ url('/auth/' . $driver . '/callback') }}" method="post" class="row form-horizontal">

                    @if($user->super)
                        <h4>Você está sendo cadastrado como <strong>DOCENTE</strong></h4>
                    @else
                        <h4>Você está sendo cadastrado como <strong>ALUNO</strong></h4>
                    @endif

                    <div class="form-group">
                        <label class="control-label" for="nomeexibicao">Nome de exibição</label>
                        <input id="nomeexibicao" name="nomeexibicao" type="text"
                               placeholder="Insira seu nome de exibição" class="form-control input-md">
                        <span class="help-block">O nome de exibição é o nome a ser apresentado dentro do sistema. Se não informado, seu nome de apresentação será o nome completo fornecido pela autenticação.</span>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="aceitacao">Termos de aceitação</label>
                        <div class="checkbox">
                            <label for="aceitacao-0">
                                <input type="checkbox" name="aceitacao_info" id="aceitacao-0" value="1" {{ Input::old('aceitacao_info') ? 'checked' : '' }} >
                                <span class="hidden-xs hidden-sm">Confirmo que as informações ao lado são verídicas.</span>
                                <span class="hidden-md hidden-lg">Confirmo que as informações acima são verídicas.</span>
                            </label>
                        </div>
                        <div class="checkbox">
                            <label for="aceitacao-1">
                                <input type="checkbox" name="aceitacao_usuario" id="aceitacao-1" value="2" {{ Input::old('aceitacao_usuario') ? 'checked' : '' }} >
                                @if($user->super)
                                    Confirmo que desejo prosseguir como Docente.
                                @else
                                    Confirmo que desejo prosseguir como Aluno.
                                @endif
                            </label>
                        </div>
                        <div class="checkbox">
                            <label for="aceitacao-2">
                                <input type="checkbox" name="aceitacao_termo" id="aceitacao-2" value="3" {{ Input::old('aceitacao_termo') ? 'checked' : '' }} >
                                Concordo com os <a href="{{ url('/termos') }}" target="_blank">Termos de serviço</a>.
                            </label>
                        </div>
                        <p class="errors">{{$errors->first('aceitacao')}}</p>
                    </div>

                    <div class="form-group">
                        <input type="submit" id="cadastrar" value="Cadastrar" class="btn btn-success">
                        <a href="{{ url('/') }}">
                            <button id="cancelar" name="cancelar" class="btn btn-danger">Cancelar</button>
                        </a>
                    </div>

                </form>

            @else

                <div style="text-align: center;">

                    <h4>Acesse a página de Cadastro para mais informações.</h4>
                    <a class="btn btn-md btn-primary" href="{{ url('/cadastro') }}" role="button">Ir para
                        página de Cadastro &raquo;</a>

                </div>

            @endif

        </div>
    </div>

@endsection