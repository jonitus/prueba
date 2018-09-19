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
	</div>
@endsection