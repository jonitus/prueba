@extends('layouts.main')

@section('content')
<article class="card">
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
      <!--Cuando relacionemos las tablas este input será removido -->
          <input type="hidden" name="idprofesor"  value="01">
          <div class="col">
            <select class="form-control" name="nivel">
              <option value="0">Nivel de dificultad</option>
              <option value="1">Lector Nivel Uno</option>
              <option value="2">Lector Nivel Dos</option>
              <option value="3">Lector Nivel Tres</option>
            </select>
          </div>
          <!--Por defecto es "En revisión" hasta que el "moderador" acepte la publicación -->
              <input type="hidden" name="estado" value="publicado">
          <div class="col">
            <input type="text" name="autor" placeholder="Autor del cuento" class="form-control" value="{{$cuento->autor}}">
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
</article>
@endsection
