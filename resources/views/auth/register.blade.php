@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registrate') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre:') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Apellido:') }}</label>

                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo Electronico:') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <input type="hidden" name="nivel" value="1">

                        <div class="form-group row">
                            <label for="fnacimiento" class="col-md-4 col-form-label text-md-right">Fecha De Nacimiento:</label>

                            <div class="col-md-4">
                          <div style=" font-family: Georgia, 'Times New Roman', serif;">Dia</div>
                         <select name="dia" id="dia">

                                 <option value=""></option>

                            <?php 
                                  $i = 1;
                                    while ( $i <= 31 ) {
                                          if ( $i < 10 ) {
                                         $dia = '0' . $i;
                                     }   
                                    else {
                                          $dia = $i;
                                   }
                                     echo "<option value='$dia'>$dia</option>";
                                            $i++;
                                         }
                            ?>


                         </select>

                            <div style=" font-family: Georgia, 'Times New Roman', serif;">Mes</div>
                            <select name="mes" id="mes">
                        
                          <option value="" ></option>
                            <?php 
                                $meses = array(
                                    '01' => 'Enero',
                                    '02' => 'Febrero',
                                    '03' => 'Marzo',
                                    '04' => 'Abril',
                                    '05' => 'Mayo',
                                    '06' => 'Junio',
                                    '07' => 'Julio',
                                    '08' => 'Agosto',
                                    '09' => 'Septiembre',
                                    '10' => 'Octubre',
                                    '11' => 'Noviembre',
                                    '12' => 'Diciembre'
                                    );
                                foreach ($meses as $num_mes => $mes) {
                                    echo "<option value='$num_mes'>$mes</option>";
                                    }
                            ?>
                        </select>

                            <div style=" font-family: Georgia, 'Times New Roman', serif;">Año</div>
                            <select name="anyo" id="anyo">
                        
                         <option value=""></option>
                            <?php 

                                  $tope = date( 'Y' );
                                  $e_max = 75;
                                  $e_min = 14;
    
                                  $anyo = $tope - $e_min;
                                while ( $anyo >= ( $tope - $e_max )) {
                                echo "<option value='$anyo'>$anyo</option>";
                                --$anyo;
                                }
                            ?>
                            </select>



                        </div>

                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña:') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar Contraseña:') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Aceptar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
