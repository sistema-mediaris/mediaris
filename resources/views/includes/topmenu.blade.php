<nav class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar"
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
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">

                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        {{ Auth::user()->name }}
                        <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu">
                        <li class="row user-menu">
                            <div class="col-md-12">
                                <div class="profile-avatar"
                                     style="background-image: url({{ Auth::user()->avatar }});"></div>

                                <h4>{{ Auth::user()->name }}</h4>
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

                </li>
            </ul>

        </div>
    </div>
</nav>