<p class="lead">
    <strong>Menu</strong>
</p>
<ul class="nav nav-pills nav-stacked">

        <li role="presentation" {{ (Request::is('dashboard') ? 'class=active' : '') }}>
            <a href="{{ url('/dashboard') }}">Dashboard</a>
        </li>
        <li role="presentation" {{ (Request::is('turmas/*') ? 'class=active' : '') }}>
            <a href="{{ url('/turmas') }}">Turmas</a>
        </li>
        <li role="presentation" {{ (Request::is('solicitacoes','solicitacoes/*') ? 'class=active' : '') }}>
            <a href="{{ url('/solicitacoes') }}">Trabalhos</a>
        </li>
        <li role="presentation"  {{ (Request::is('perfil/*') ? 'class=active' : '') }}>
            <a href="{{ url('/perfil') }}">Perfil</a>
        </li>
</ul>