@extends('layouts.layout')

@section('content')
	<div class="pages-container">
		<header class="header">
			<h1 class="display-4">{{ $cuento->titulo }}</h1>
		</header>
		<div class="page-body">
			@foreach($paginas as $pagina)
				<div><img class="img-thumbnail rounded mx-auto d-block" src="{{ asset('img/'.$pagina->filename) }}" alt=""></div>
				<div>{{ $pagina->contenido }}</div>
			@endforeach
		</div>
		<footer class="row pages-footer justify-content-center">
			<div class="col">
				<a href="{{ route('cuentos.index') }}" class="btn form-button" data-toggle="tooltip" title="Inicio">
					<img src="{{asset('rsc/home32.png')}}" alt="home">
				</a>
			</div>
			<div class="col paginate-links">{{ $paginas->links() }}</div>
			<div class="col">
				<a href="{{ action('PaginaController@create',$cuento->id) }}">
					<img src="{{asset('rsc/pencil32.png')}}" alt="addpage" class="btn form-button" data-toggle="tooltip" title="Seguir escribiendo...">
				</a>
			</div>
		</footer>
	</div>
@endsection
