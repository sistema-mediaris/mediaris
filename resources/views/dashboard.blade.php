@extends('layouts.interno')

@section('title', 'Dashboard')

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

        .calendario * {
            box-sizing: border-box;
        }

        .calendario ul {
            list-style-type: none;
        }

        .calendario .month {
            padding: 10px 20px;
            width: 100%;
            background: #337ab7;
        }

        .calendario .month ul {
            margin: 0;
            padding: 0;
        }

        .calendario .month ul li {
            color: white;
            font-size: 20px;
            text-transform: uppercase;
            letter-spacing: 3px;
        }

        .calendario .month .prev {
            float: left;
            padding-top: 10px;
        }

        .calendario .month .next {
            float: right;
            padding-top: 10px;
        }

        .calendario .weekdays {
            margin: 0;
            padding: 10px 0;
            background-color: #ddd;
        }

        .calendario .weekdays li {
            display: inline-block;
            width: 13.6%;
            color: #666;
            text-align: center;
        }

        .calendario .days {
            padding: 10px 0;
            background: #eee;
            margin: 0;
        }

        .calendario .days li {
            list-style-type: none;
            display: inline-block;
            width: 13.6%;
            text-align: center;
            margin-bottom: 5px;
            font-size: 12px;
            color: #777;
        }

        .calendario .days li .active {
            padding: 5px;
            background: #337ab7;
            color: white !important
        }

        /* Add media queries for smaller screens */
        @media screen and (max-width: 720px) {
            .calendario .weekdays li, .calendario .days li {
                width: 13.1%;
            }
        }

        @media screen and (max-width: 420px) {
            .calendario .weekdays li, .calendario .days li {
                width: 12.5%;
            }

            .calendario .days li .active {
                padding: 2px;
            }
        }

        @media screen and (max-width: 290px) {
            .calendario .weekdays li, .calendario .days li {
                width: 12.2%;
            }
        }

        .btn-quick {
            margin: .5em 0;
            text-align: left;
        }

        .panel-green {
            border-color: #5cb85c;
        }

        .panel-green > .panel-heading {
            border-color: #5cb85c;
            color: white;
            background-color: #5cb85c;
        }

        .panel-yellow {
            border-color: #f0ad4e;
        }

        .panel-yellow > .panel-heading {
            border-color: #f0ad4e;
            color: white;
            background-color: #f0ad4e;
        }

        .huge {
            font-size: 2em;
        }
    </style>

@endsection

@section('content')

    {{--<h4><strong>Menu rápido</strong></h4>--}}

    <div class="row">
        <div class="col-md-5">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <strong>Menu rápido</strong>
                </div>
                <div class="panel-body">
                    <a href="{{ url('/turmas/create') }}" class="btn btn-primary btn-block btn-success btn-quick"><span
                                class="glyphicon glyphicon-plus"></span> Cadastrar uma nova turma</a>
                    <a href="{{ url('/solicitacoes/create') }}" class="btn btn-primary btn-block btn-success btn-quick"><span
                                class="glyphicon glyphicon-plus"></span> Cadastrar uma nova solicitação</a>

                    <a href="{{ url('/turmas') }}" class="btn btn-primary btn-block btn-info btn-quick"><span
                                class="glyphicon glyphicon-list"></span> Visualizar lista de turmas</a>
                    <a href="{{ url('/solicitacoes') }}" class="btn btn-primary btn-block btn-info btn-quick"><span
                                class="glyphicon glyphicon-list"></span> Visualizar lista de solicitações</a>

                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <strong>Sumário</strong>
                </div>
                <div class="panel-body">
                    {{--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt est vitae ultrices accumsan. Aliquam ornare lacus adipiscing, posuere lectus et, fringilla augue.</p>--}}
                    <div class="row">
                        <div class="col-md-6">

                            <div class="panel panel-yellow">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="glyphicon glyphicon-user" style="font-size: 2em;"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge">{{ \App\Models\Turma::all()->count() }}</div>
                                            <div>Turmas criadas e gerenciadas</div>
                                        </div>
                                    </div>
                                </div>
                                {{--<a href="#">--}}
                                {{--<div class="panel-footer">--}}
                                {{--<span class="pull-left"></span>--}}
                                {{--<div class="clearfix"></div>--}}
                                {{--</div>--}}
                                {{--</a>--}}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="panel panel-yellow">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="glyphicon glyphicon-folder-open" style="font-size: 2em;"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge">104</div>
                                            <div>Trabalhos recebidos</div>
                                        </div>
                                    </div>
                                </div>
                                {{--<a href="#">--}}
                                {{--<div class="panel-footer">--}}
                                {{--<span class="pull-left"></span>--}}
                                {{--<div class="clearfix"></div>--}}
                                {{--</div>--}}
                                {{--</a>--}}
                            </div>
                        </div>
                    </div>
                </div>
                {{--<div class="panel-footer">--}}
                {{--Panel Footer--}}
                {{--</div>--}}
            </div>
        </div>
    </div>



    <div class="calendario">
        <div class="month">
            <ul>
                <li class="prev">❮</li>
                <li class="next">❯</li>
                <li style="text-align:center">
                    Novembro<br>
                    <span style="font-size:18px">2016</span>
                </li>
            </ul>
        </div>

        <ul class="weekdays">
            <li>Dom</li>
            <li>Seg</li>
            <li>Ter</li>
            <li>Qua</li>
            <li>Qui</li>
            <li>Sex</li>
            <li>Sáb</li>
        </ul>

        <ul class="days">
            <li>30</li>
            <li>31</li>
            <li>1</li>
            <li>2</li>
            <li>3</li>
            <li>4</li>
            <li>5</li>
            <li>6</li>
            <li>7</li>
            <li>8</li>
            <li>9</li>
            <li><span class="active">10</span></li>
            <li>11</li>
            <li>12</li>
            <li>13</li>
            <li>14</li>
            <li>15</li>
            <li>16</li>
            <li>17</li>
            <li>18</li>
            <li>19</li>
            <li>20</li>
            <li>21</li>
            <li>22</li>
            <li>23</li>
            <li>24</li>
            <li>25</li>
            <li>26</li>
            <li>27</li>
            <li>28</li>
            <li>29</li>
            <li>30</li>
            <li>1</li>
            <li>2</li>
            <li>3</li>
        </ul>
    </div>

    {{--<script type="text/javascript">--}}
    {{--window.onload = function () {--}}
    {{--history.pushState("", document.title, window.location.pathname + window.location.search);--}}
    {{--};--}}
    {{--</script>--}}
@endsection