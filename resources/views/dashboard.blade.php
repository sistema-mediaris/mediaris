<script type="text/javascript">
	window.onload = function () {
		history.pushState("", document.title, window.location.pathname + window.location.search);
	};
</script>

@if(Auth::check())

    <h4>Bem-vindo {{Auth::user()->name}} !!</h4>
    <h4>Email {{Auth::user()->email}}</h4>
    <h4>Avatar <img src='{{ Auth::user()->avatar }}'/></h4>
    <h4>Serviço {{Auth::user()->provider}}</h4>

@else

	no certo

@endif
