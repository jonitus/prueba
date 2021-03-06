@extends('layouts.layout')

@section('content')

<!-- <div class="card col">
  <div class="card-header">
    <h1 class="display-5">{{$cuento['titulo']}}</h1>
    <div class="lead">
      <p>Nivel de dificultad: {{$cuento['nivel']}}</p>
    </div>
    <div class="row">
      <div class="col">
        <a style="color:white" href="{{action('PaginaController@create',$cuento->id)}}" class="btn btn-success">Continuar</a>
      </div>
    </div>
  </div>
  <div class="card-body">
    <div class="">
      <img class="img-thumbnail rounded mx-auto d-block" src="{{asset('img/'.$cuento['cover'])}}" alt="cover">
    </div>
    <br>
    <div class="blockquote">
      {{$cuento['descripcion']}}
    </div>
    <footer class="card-footer" style="background-color:white;">
      <ul>
        <li>Autor:{{$cuento['autor']}}</li>
        <li>Publicado:{{$cuento['created_at']}}</li>
      </ul>
    </footer>
  </div>
  <footer class="card-footer row">
    <div class="col-1">
      <a style="color:white" href="{{action('CuentoController@edit',$cuento['id'])}}" class="btn btn-warning">Editar</a>
    </div>
    <div class="col-1">
      <form class="" action="{{action('CuentoController@destroy',$cuento['id'])}}" method="post">
        @csrf
        <input type="hidden" name="_method" value="DELETE">
        <button type="submit" class="btn btn-danger" name="button">Eliminar</button>
      </form>
    </div>
  </footer>
</div> -->

<div class="row justify-content-center">
  <div class="col-md-8 preview-container">
    <header>
      <h1 class="display-4"> <span class="dark-letter">V</span>ista Pre<span class="dark-letter">v</span>ia</h1>
      <h3>{{$cuento->titulo}}</h3> <span class="badge badge-nivel">Nivel:{{$cuento->nivel}}</span>
    </header>
    <div class="preview-body">
      <img class="img-thumbnail rounded mx-auto d-block" src="{{asset('img/'.$cuento['cover'])}}" alt="cover">
      <div class="blockquote">
        {{$cuento['descripcion']}}
      </div>
      <div class="blockquote-footer">
        {{$cuento->autor}}
      </div>
    </div>
    <footer class="preview-footer row">
      <div class="col">
        <a style="color:white" href="{{action('PaginaController@create',$cuento->id)}}" class="btn form-button">Continuar</a>
      </div>
      <div class="col">
        <a style="color:white" href="{{action('CuentoController@edit',$cuento['id'])}}" class="btn form-button">Editar</a>
      </div>
      <div class="col">
        <form class="" action="{{action('CuentoController@destroy',$cuento['id'])}}" method="post">
          @csrf
          <input type="hidden" name="_method" value="DELETE">
          <button type="submit" class="btn btn-danger" name="button">Cancelar</button>
        </form>
      </div>
    </footer>
  </div>
</div>

@endsection
