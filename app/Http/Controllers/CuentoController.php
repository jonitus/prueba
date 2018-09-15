<?php

namespace App\Http\Controllers;

use App\Cuento;
use Illuminate\Http\Request;
use Image;

class CuentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cuentos = Cuento::all();
        return view('cuentos.index',['cuentos'=>$cuentos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cuentos.create');
    }

    //Generar un random_string
    protected function random_string()
    {
    $key = '';
    $keys = array_merge( range('a','z'), range(0,9) );

    for($i=0; $i<10; $i++)
    {
        $key .= $keys[array_rand($keys)];
    }

    return $key;
  }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      // ruta de las imagenes guardadas
      $ruta = public_path().'/img/';

      // recogida del form
      $imagenOriginal = $request->file('cover');

      // crear instancia de imagen
      $imagen = Image::make($imagenOriginal);

      // generar un nombre aleatorio para la imagen
      $temp_name = $this->random_string() . '.' . $imagenOriginal->getClientOriginalExtension();

      $imagen->resize(300,300);

      // guardar imagen
      // save( [ruta], [calidad])
      $imagen->save($ruta . $temp_name, 100);

      $cuento = new Cuento;

      $cuento->titulo       = $request->get('titulo');
      $cuento->cover        = $temp_name;
      $cuento->idprofesor   = $request->get('idprofesor');
      $cuento->nivel        = $request->get('nivel');
      $cuento->estado       = $request->get('estado');
      $cuento->autor        = $request->get('autor');
      $cuento->descripcion  = $request->get('descripcion');

      $cuento->save();

      return redirect()->route('cuentos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cuento  $cuento
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cuento = Cuento::find($id);
        return view('cuentos.show',compact('cuento','id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cuento  $cuento
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cuento = Cuento::find($id);
        return view('cuentos.edit',compact('cuento','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cuento  $cuento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      // ruta de las imagenes guardadas
      $ruta = public_path().'/img/';

      // recogida del form
      $imagenOriginal = $request->file('cover');

      // crear instancia de imagen
      $imagen = Image::make($imagenOriginal);

      // generar un nombre aleatorio para la imagen
      $temp_name = $this->random_string() . '.' . $imagenOriginal->getClientOriginalExtension();

      $imagen->resize(300,300);

      // guardar imagen
      // save( [ruta], [calidad])
      $imagen->save($ruta . $temp_name, 100);

      $cuento = new Cuento;

      $cuento->titulo       = $request->get('titulo');
      $cuento->cover        = $temp_name;
      $cuento->idprofesor   = $request->get('idprofesor');
      $cuento->nivel        = $request->get('nivel');
      $cuento->estado       = $request->get('estado');
      $cuento->autor        = $request->get('autor');
      $cuento->descripcion  = $request->get('descripcion');

      $cuento->update();

      return redirect()->route('cuentos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cuento  $cuento
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $cuento = Cuento::find($id);
      $cuento->delete();
      return redirect()->route('cuentos.index');
    }
}
