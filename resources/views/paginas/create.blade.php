@extends('layouts.main')

@section('content')
<article class="card row">
  <header class="card-header">
    <h2 class="display-5">Añadir página</h2>
  </header>
  <form class="card-body" action="{{route('paginas.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="idcuento" value="{{$cuento->id}}">
    <div class="col">
      <div class="row">
        <label for="filename">Agregar imagen:</label>
      </div>
      <div class="row">
        <input type="file" name="filename" value="Seleccionar archivo">
      </div>
    </div>
    <div class="col">
      <div class="row">
        <label for="contenido">Texto:</label>
      </div>
      <div class="row">
        <textarea name="contenido" rows="8" cols="80"></textarea>
      </div>
    </div>
    <footer class="card-footer row">
      <div class="col">
        <input type="submit" name="store" class="btn btn-primary" value="Publicar">
      </div>
    </footer>
  </form>
</article>
@endsection
