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
    </style>

@endsection

@section('content')

    <h1>Editar uma solicitação de trabalho</h1>
    <p class="lead">Editando solicitação de trabalho: <strong>{{ $solicitacao->nome }}</strong></p>
    <hr>

    @if(Session::has('error'))
        <div class="alert-box success">
            <h2>{{ Session::get('error') }}</h2>
        </div>
    @endif

    <form action="{{ url('/solicitacoes') }}" class="form-horizontal">

        {{ method_field('PUT') }}
        {{ csrf_field() }}

        <div class="form-group @if ($errors->has('nome')) has-error @endif">
            <label class="col-md-2 control-label" for="nome">Nome</label>
            <div class="col-md-10">
                <input id="nome" name="nome" type="text" placeholder="Nome de identificação da solicitação"
                       class="form-control" value="{{ $solicitacao->nome }}">
                <span class="help-block">Informe um nome para identificar a solicitação</span>
            </div>
        </div>

        <div class="form-group @if ($errors->has('turma')) has-error @endif">
            <label class="col-md-2 control-label" for="turmas_id">Turma</label>
            <div class="col-md-10">
                <select id="turmas_id" name="turmas_id" class="form-control">

                    @php

                    $user = Auth::user();
                    $turmas = Illuminate\Support\Facades\DB::table('docentes')
                        ->select('docentes.*')->where('docentes.usuarios_id', '=', $user->id)
                        ->join('turmas', 'docentes.id', '=', 'turmas.docentes_id')
                        ->join('instituicoes', 'instituicoes.id', '=', 'turmas.instituicoes_id')
                        ->select('turmas.*','instituicoes.nome')
                        ->get();

                    @endphp

                    @foreach($turmas as $k => $val)
                        @if ($val->id == old('turmas_id') || $val->id == $solicitacao->turma->id)
                            <option value="{{ $val->id }}" selected>
                        @else
                            <option value="{{ $val->id }}">
                        @endif
                            Turma {{ $val->id . " - #" . $val->code . " - " . $val->nome }}
                        </option>
                    @endforeach

                </select>
                <span class="help-block">Selecione uma de suas turmas referente à solicitação de trabalho</span>
            </div>
        </div>

        @php
            $dte = $solicitacao->data_entrega;
            $entrega = \Carbon\Carbon::parse($dte)->format('d/m/Y');
        @endphp

        <div class="form-group @if ($errors->has('data_entrega')) has-error @endif">
            <label class="col-md-2 control-label" for="data_entrega">Data de entrega</label>
            <div id="calendario" class="col-md-10">
                <div class="input-group date">
                    <input id="data_entrega" name="data_entrega" class="form-control"
                           placeholder="Data de entrega" type="text" value="{{ $entrega }}"><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i>Calendário</span>
                </div>
                <span class="help-block">Defina uma data de entrega</span>
            </div>
        </div>

        <div class="form-group @if ($errors->has('tipos_arquivos')) has-error @endif">
            <label class="col-md-2 control-label" for="tipos_arquivos">Arquivos permitidos</label>
            <div class="col-md-10">
                <select id="tipo_arquivos" name="tipos_arquivos[]" class="form-control" multiple="multiple" style="height: 8em;">

                    @php
                        $array_exts = [];
                        foreach($solicitacao->tipos_arquivos as $role)
                            array_push($array_exts, $role->id);
                    @endphp

                    @if($exts = App\Models\TiposArquivo::all())

                        @foreach($exts as $ext)
                            @if(in_array($ext->id, $array_exts))
                                <option value="{{ $ext->id }}" selected>{{ $ext->extensao }}</option>
                            @else
                                <option value="{{ $ext->id }}">{{ $ext->extensao }}</option>
                            @endif
                        @endforeach

                    @endif

                </select>
                <span class="help-block">Informe os tipos de arquivos permitidos (segure a tecla "Ctrl" para selecionar múltiplos)</span>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label" for="descricao">Descrição detalhada</label>
            <div class="col-md-10">
                <textarea class="form-control" id="descricao" name="descricao" rows="4">{{ $solicitacao->complemento->descricao }}</textarea>
                <span class="help-block">OPCIONAL: informe uma descrição detalhada da solicitação de trabalho</span>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label" for="assunto">Assuntos tratados</label>
            <div class="col-md-10">
                <textarea class="form-control" id="assunto" name="assunto" rows="4">{{ $solicitacao->complemento->assunto }}</textarea>
                <span class="help-block">OPCIONAL: liste os assuntos tratados na solicitação de trabalho</span>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label" for="objetivo">Objetivos esperados</label>
            <div class="col-md-10">
                <textarea class="form-control" id="objetivo" name="objetivo" rows="4">{{ $solicitacao->complemento->objetivo }}</textarea>
                <span class="help-block">OPCIONAL: liste os objetivos esperados da solicitação de trabalho</span>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-offset-2 col-md-10">
                <button type="submit" class="btn btn-success">Salvar</button>
                <a href="{{ url('/solicitacoes') }}" class="btn btn-default">Cancelar</a>
            </div>
        </div>

    </form>

    <script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('js/locales/bootstrap-datepicker.pt-BR.min.js') }}"></script>

    <script type="text/javascript">
        $('#calendario .input-group.date').datepicker({
            language: "pt-BR",
            autoclose: true,
            todayHighlight: true,
            orientation: "bottom auto"
        });
    </script>

@endsection