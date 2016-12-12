<p class="lead">
    <strong>Menu</strong>
</p>
<ul class="nav nav-pills nav-stacked">

    @if(Auth::user()->super)
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
    @else
        <li role="presentation" {{ (Request::is('dashboard') ? 'class=active' : '') }}>
            <a href="{{ url('/dashboard') }}">Dashboard</a>
        </li>
        <li role="presentation" {{ (Request::is('turmas/*') ? 'class=active' : '') }}>
            <a href="{{ url('aluno/turmas') }}">Turmas</a>
        </li>
        <li role="presentation" {{ (Request::is('*solicitacoes*') ? 'class=active' : '') }}>
            <a href="{{ url('aluno/solicitacoes') }}">Trabalhos</a>
        </li>
        <li role="presentation"  {{ (Request::is('perfil/*') ? 'class=active' : '') }}>
            <a href="{{ url('aluno/perfil') }}">Perfil</a>
        </li>
    @endif

</ul>