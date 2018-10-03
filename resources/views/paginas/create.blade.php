@extends('layouts.layout')

@section('content')
<!-- <article class="card row">
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
</article> -->
<div class="row j">
  <div class="col-10 form-container">
    <div class="row justify-content-center">
      <h1 class="display-4">A<span class="dark-letter">ñ</span>adir nu<span class="light-letter">e</span>va <span class="dark-letter">P</span>ágina</h1>
    </div>
                    <!-- Errores de validación -->
    @if(count($errors) > 0)
    <div class="alert alert-danger validate-error alert-dismissible fade show" role="alert">
        <ul style="list-style-type: none;">
          @foreach($errors->all() as $error)
          <li>{{$error}}</li>
          @endforeach
        </ul>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </div>
    @endif
    {!! Form::open(['action' => ['PaginaController@store',$cuento->id],'enctype' => 'multipart/form-data', 'id' => 'form']) !!}
    {!! Form::hidden('idcuento', $cuento->id, []) !!}
    <div class="row form-items">
      <h3>Rellena correctamente los espacios.</h3>
    </div>
    <div class="row form-items">
      <div class="col-3">
        {!! Form::label('filename', 'Imágen:', ['class' => 'form-label']) !!}
      </div>
      <div class="col-3">
        {!! Form::file('filename', []) !!}
      </div>
    </div>
    <div class="row form-items">
      <div class="col-3">
        {!! Form::label('contenido', 'Texto:', []) !!}
      </div>
      <div class="col-3">
        {!! Form::textarea('contenido', '', ['class' => 'form-input']) !!}
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-2">
        {!! Form::submit('Agregar Página', ['class' => 'btn form-button', 'id' => 'btn-validate']) !!}
      </div>
    </div>
    {!! Form::close() !!}
  </div>
</div>
<!-- Script para alert -->
<script type="text/javascript">
  $('.alert').alert()
</script>
@endsection
