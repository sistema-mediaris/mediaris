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
    </style>

@endsection

@section('content')

    <h1>Adicionar uma nova solicitação de trabalho</h1>
    <p class="lead">Crie uma nova solicitação de trabalho</p>
    <hr>

    <form class="form-horizontal">

        <div class="form-group row">
            <label class="col-md-2 control-label" for="nome">Nome</label>
            <div class="col-md-10">
                <input id="nome" name="nome" type="text" placeholder="Nome de identificação da solicitação"
                       class="form-control" required="">
                <span class="help-block">Informe um nome para identificar a solicitação</span>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label" for="turma">Turma</label>
            <div class="col-md-10">
                <select id="turma" name="turma" class="form-control">
                    <option value="1">TURMA 1 - FACULDADE EXEMPLO</option>
                    <option value="2">TURMA 2 - FACULDADE FICTÍCIA</option>
                </select>
                <span class="help-block">Selecione a turma referente à solicitação de trabalho</span>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label" for="dataentrega">Data de entrega</label>
            <div class="col-md-10">
                <div class="input-group">
                    <input id="dataentrega" name="dataentrega" class="form-control"
                           placeholder="Data de entrega" type="text" required="">
                    <div class="input-group-btn">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            Calendário
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu pull-right">
                        </ul>
                    </div>
                </div>
                <span class="help-block">Defina uma data de entrega (clique em "Calendário" para visualizar os dias)</span>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label" for="tipoarquivos">Arquivos permitidos</label>
            <div class="col-md-10">
                <select id="tipoarquivos" name="tipoarquivos" class="form-control" multiple="multiple">
                    <option value="1">DOC</option>
                    <option value="2">PDF</option>
                    <option value="3">ZIP</option>
                    <option value="4">JAVA</option>
                    <option value="5">CPP</option>
                    <option value="6">PHP</option>
                </select>
                <span class="help-block">Informe os tipos de arquivos permitidos (segure a tecla "Ctrl" para selecionar múltiplos)</span>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label" for="detalhes">Descrição detalhada</label>
            <div class="col-md-10">
                <textarea class="form-control" id="detalhes" name="detalhes"></textarea>
                <span class="help-block">OPCIONAL: informe uma descrição detalhada da solicitação de trabalho</span>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label" for="assuntos">Assuntos tratados</label>
            <div class="col-md-10">
                <textarea class="form-control" id="assuntos" name="assuntos"></textarea>
                <span class="help-block">OPCIONAL: liste os assuntos tratados na solicitação de trabalho</span>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label" for="objetivos">Objetivos esperados</label>
            <div class="col-md-10">
                <textarea class="form-control" id="objetivos" name="objetivos"></textarea>
                <span class="help-block">OPCIONAL: liste os objetivos esperados da solicitação de trabalho</span>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-offset-2 col-md-10">
                <button type="submit" class="btn btn-success">Enviar</button>
                <button type="submit" class="btn btn-default">Cancelar</button>
            </div>
        </div>

    </form>

    {{--<script type="text/javascript">--}}
    {{--window.onload = function () {--}}
    {{--history.pushState("", document.title, window.location.pathname + window.location.search);--}}
    {{--};--}}
    {{--</script>--}}
@endsection