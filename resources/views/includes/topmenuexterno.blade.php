<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}">MEDIARIS</a>
        </div>

        <div id="navbar" class="navbar-collapse collapse">

            <ul class="nav navbar-nav">
                <li><a href="{{ url('/sobre') }}">Sobre</a></li>
                <li><a href="{{ url('/ajuda') }}">Ajuda</a></li>
                <li><a href="{{ url('/contato') }}">Contato</a></li>
                @if(Auth::check() && (Auth::user()->docente || Auth::user()->aluno))
                    <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                @endif
            </ul>

            @if(!Auth::check())
                <ul class="nav navbar-nav navbar-right {{ (Request::is('turmas/*') ? 'hide' : '') }} ">
            @else
                <ul class="nav navbar-nav navbar-right">
            @endif

                @if(!Auth::check())

                    <li>
                        <p class="navbar-text">Já possui uma conta?</p>
                    </li>

                @endif

                <li class="dropdown">


                    @if(!Auth::check())

                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Entrar</b> <span
                                    class="caret"></span></a>

                        <ul class="dropdown-menu">
                            <li class="row">
                                <div class="col-md-12">

                                    <p>Realizar autenticação</p>

                                    <div class="social-buttons">
                                        <a href="{{ url('/auth/google') }}"
                                           class="btn btn-lg btn-social-icon btn-google">
                                            <i class="demo-icon icon-google" style="font-size: .975em;"></i>
                                        </a>
                                        <a href="{{ url('/auth/live') }}"
                                           class="btn btn-lg btn-social-icon btn-microsoft">
                                            <i class="demo-icon icon-outlook" style="font-size: .975em;"></i>
                                        </a>
                                        <a href="{{ url('/auth/linkedin') }}"
                                           class="btn btn-lg btn-social-icon btn-linkedin">
                                            <i class="demo-icon icon-linkedin" style="font-size: .975em;"></i>
                                        </a>
                                        <a href="{{ url('/auth/yahoo') }}" class="btn btn-lg btn-social-icon btn-yahoo">
                                            <i class="demo-icon icon-yahoo" style="font-size: .975em;"></i>
                                        </a>
                                    </div>

                                    <hr>

                                </div>

                                <p>Novo por aqui? <a href="{{ url('/cadastro') }}"><b>Cadastre-se!</b></a></p>

                            </li>
                        </ul>

                    @else

                        @if(Auth::user()->docente || Auth::user()->aluno)

                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                
                                @if(Auth::user()->super)
                                    @if(Auth::user()->docente)
                                        {{ Auth::user()->docente->titulacao->abreviacao . " " . Auth::user()->docente->nome_exibicao }}
                                    @endif
                                @else
                                    @if(Auth::user()->aluno)
                                        {{ Auth::user()->aluno->nome_exibicao }}
                                    @endif
                                @endif

                                <span class="caret"></span>
                            </a>

                        @endif

                        <ul class="dropdown-menu">
                            <li class="row user-menu">
                                <div class="col-md-12">
                                    <div class="profile-avatar"
                                         style="background-image: url({{ Auth::user()->avatar }});"></div>
                                    
                                    @if(Auth::user()->super)
                                        <h4><strong>DOCENTE</strong></h4>
                                    @else
                                        <h4><strong>ALUNO</strong></h4>
                                    @endif
                                    
                                    <!--<h4>{{ Auth::user()->name }}</h4>-->
                                    <p class="text-muted small">{{ Auth::user()->email }}</p>
                                    <p class="text-muted small">Autenticado com {{ Auth::user()->provider }}</p>
                                    <div class="divider"></div>

                                    <a href="{{ url('/perfil') }}" class="btn btn-primary btn-block btn-sm">Editar
                                        perfil</a>

                                    <a href="{{ url('/sair') }}"
                                       class="btn btn-danger btn-block btn-sm pull-right">Sair</a>
                                </div>
                            </li>
                        </ul>

                    @endif

                </li>
            </ul>


        </div>
    </div>
</nav>