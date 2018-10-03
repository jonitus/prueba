@extends('layouts.layout')

@section('content')
<!-- <article class="card">
  <header class="card-header">
    <h1 style="color:olivedrab;">Editar información del cuento</h1>
  </header>
  <form class="card-body" action="{{route('cuentos.update',$cuento->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col">
        <input type="text" class="form-control" name="titulo" placeholder="Título del cuento" value="{{$cuento->titulo}}">
        </div>
          <input type="hidden" name="idprofesor"  value="01">
          <div class="col">
            <select class="form-control" name="nivel">
              <option value="1">Nivel de dificultad</option>
              <option value="1">Lector Nivel Uno</option>
              <option value="2">Lector Nivel Dos</option>
              <option value="3">Lector Nivel Tres</option>
            </select>
          </div>

              <input type="hidden" name="estado" value="publicado">
          <div class="col">
            <input type="text" name="autor" placeholder="Autor del cuento" class="form-control" value="{{$cuento->autor}}">
          </div>
    </div>
    <br>
    <div class="row justify-content-center">
      <div class="col-4 justify-content-center">
      <label for="cover">Foto de portada:</label>
      <input type="file" name="cover" value="{{asset('img/'.$cuento['cover'])}}">
      <p class="text-danger">Este campo es obligatorio*</p>
      </div>
    </div>
    <br>
    <div class="row justify-content-center">
          <div class="col-4">
            <textarea name="descripcion" placeholder="Descripción del cuento" rows="3" class="form-control">{{$cuento->descripcion}}</textarea>
          </div>
    </div>
    <br>
    <footer class="card-footer">
      <div class="row justify-content-center">
            <input class="btn boton-form" type="submit" name="store" value="Continuar">
      </div>
    </footer>
  </form>
</article> -->

<div class="row justify-content-center">

  <div class="col-8 form-container">
      <div class="row justify-content-center">
        <h1 class="display-4 form-header"><span class="dark-letter">E</span>ditar Cuen<span class="dark-letter">t</span>o</h1>
      </div>
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
      {!! Form::open(['action' => ['CuentoController@update', $cuento->id],'enctype' => 'multipart/form-data', 'id' => 'form']) !!}
      {!! Form::hidden('_method', 'PATCH', []) !!}
      <div class="row form-items">
        <h3>Rellena correctamente los espacios.</h3>
      </div>
      <div class="row form-items justify-content-center">
        <span class="badge badge-danger badge-form">Todos los campos son obligatorios*</span>
      </div>
      <div class="row justify-content-center form-items">
        <div class="col-3">
          {!! Form::label('titulo', 'Título del cuento:', ['class' => 'form-label','required']) !!}
        </div>
        <div class="col-3">
          {!! Form::text('titulo', $cuento->titulo , ['class' => 'form-input']) !!}
        </div>
      </div>
      {!! Form::hidden('idprofesor', $value='1', []) !!}
      <div class="row justify-content-center form-items">
        <div class="col-3">
          {!! Form::label('nivel', 'Nivel del cuento:', ['class' => 'form-label']) !!}
        </div>
        <div class="col-3">
          {!! Form::select('nivel', ['1' => 'Nivel Uno',
                                      '2' => 'Nivel Dos',
                                      '3' => 'Nivel Tres',
                                      '4' => 'Nivel Cuatro',
                                      '5' => 'Nivel Cinco'],  []) !!}
        </div>
      </div>
      {!! Form::hidden('estado', $value='publicado', []) !!}
      <div class="row justify-content-center form-items">
        <div class="col-3">
          {!! Form::label('autor', 'Autor:', ['class' => 'form-label']) !!}
        </div>
        <div class="col-3">
          {!! Form::text('autor',$cuento->autor, ['class' => 'form-input']) !!}
        </div>
      </div>
      <div class="row justify-content-center form-items">
        <div class="col-3">
          {!! Form::label('cover', 'Foto de portada:', ['class' => 'form-label']) !!}
        </div>
        <div class="col-3">
          {!! Form::file('cover',[]) !!}
        </div>
      </div>
      <div class="row justify-content-center form-items">
        <div class="col-3">
          {!! Form::label('descripcion', 'Descripción del cuento:', ['class' => 'form-label']) !!}
        </div>
        <div class="col-3">
          {!! Form::textarea('descripcion', $cuento->descripcion, ['rows' => '2', 'cols' => '20', 'class' => 'form-input']) !!}
        </div>
      </div>
      <div class="row justify-content-center form-items">
        <div class="col-2">
          {!! Form::submit('Editar Cuento', ['class' => 'btn form-button','id' => 'btn-validate']) !!}
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
