@extends('layouts.main')

@section('content')
<header>
  <a class="btn boton-form justify-content-center" href="{{route('cuentos.create')}}">Crear cuento</a>
</header>
<div class="row">
    @foreach($cuentos as $cuento)
  <div class="card col-4">
    <div class="card-header">
      <h2>{{$cuento['titulo']}}</h2>
      <p>Nivel de dificultad: {{$cuento['nivel']}}</p>
    </div>
    <div class="card-body">
      <div class="">
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
      <div class="col">
        <a style="color:white" href="{{action('CuentoController@edit',$cuento['id'])}}" class="btn btn-warning">Editar datos</a>
      </div>
      <div class="col">
        <form class="" action="{{action('CuentoController@destroy',$cuento['id'])}}" method="post">
          @csrf
          <input type="hidden" name="_method" value="DELETE">
          <button type="submit" class="btn btn-danger" name="button">Eliminar</button>
        </form>
      </div>
    </footer>
  </div>
  @endforeach
</div>
@endsection
