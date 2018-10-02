@extends('layouts.layout')

@section('content')
@foreach($cuentos as $cuento)
<div class="cuento col-4">
  <div class="card card-cuento">
    <div class="card-body">
      <div class="card-cover">
        <img src="{{asset('img/'.$cuento->cover)}}" class="cover" alt="cover">
      </div>
      <div class="card-content">
        <h2>{{$cuento->titulo}}</h2>
        <p>{{$cuento->descripcion}}</p>
      </div>
      <div class="card-info">
        <span class="badge badge-pill badge-nivel">{{$cuento->nivel}}</span>
        <span class="badge badge-pill badge-autor">{{$cuento->autor}}</span>
      </div>
    </div>
  </div>
  <footer class="card-actions">
    <div class="row">
      <div class="col-3">
        <a class="btn btn-link card-link card-link" href="{{route('paginas.mostrar',$cuento->id)}}" data-toggle="tooltip" title="Leer">
          <img src="{{asset('rsc/read16.png')}}" alt="">
        </a>
      </div>
      <div class="col-3">
        <a class="btn btn-link card-link" href="{{route('cuentos.edit',$cuento->id)}}" data-toggle="tooltip" title="Editar">
          <img src="{{asset('rsc/edit16.png')}}" alt="">
        </a>
      </div>
      <div class="col-6">
        <form class="hidden" action="{{action('CuentoController@destroy',$cuento->id)}}" method="post">
          @csrf
          <input type="hidden" name="_method" value="DELETE">
          <button type="submit" name="button" class="btn btn-link card-link-delete">Eliminar</button>
        </form>
      </div>
    </div>
  </footer>
</div>

<!-- Nivelar height de columnas -->
<script>
$(document).ready(function() {
    var heights = $(".cuento").map(function() {
        return $(this).height();
    }).get(),

    maxHeight = Math.max.apply(null, heights);

    $(".cuento").height(maxHeight);
});
</script>


@endforeach
@endsection
