@extends('layouts.main')

@section('content')
	<div class="card">
		<header class="card-header">
			<h1>{{ $cuento->titulo }}</h1>
		</header>
		<div class="card-body">
			@foreach($paginas as $pagina)
				<div><img class="img-thumbnail rounded mx-auto d-block" src="{{ asset('img/'.$pagina->filename) }}" alt=""></div>
				<div>{{ $pagina->contenido }}</div>
			@endforeach
		</div>
		<div class="card-footer row">
			<div class="col" style="float:left">
				<a href="{{ route('cuentos.index') }}" class="btn btn-primary">Volver</a>
			</div>
			<div class="col">{{ $paginas->links() }}</div>
			<div class="col">
				<a href="{{ action('PaginaController@create',$cuento->id) }}">Añadir página</a>
			</div>
		</div>
	</div>
@endsection