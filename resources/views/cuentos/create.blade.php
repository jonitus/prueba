@extends('layouts.main')

@section('content')
<article class="card">
  <header class="card-header">
    <h1 style="color:olivedrab;">Publicar nuevo cuento</h1>
  </header>
  <form class="card-body" action="{{route('cuentos.store')}}" method="post">
    @csrf
    <div class="row">
        <div class="col">
        <input type="text" class="form-control" name="titulo" placeholder="Título del cuento" value="">
        </div>
      <!--Cuando relacionemos las tablas será idprofesor removido -->
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
              <input type="hidden" name="estado" value="">
          <div class="col">
            <input type="text" name="autor" placeholder="Autor del cuento" class="form-control" value="">
          </div>
    </div>
    <br>
    <div class="row justify-content-center">
          <div class="col-4">
            <textarea name="descripcion" placeholder="Descripción del cuento" rows="3" class="form-control"></textarea>
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
