<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pagina;
use App\Cuento;
use Image;

class PaginaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginas = Pagina::paginate(1);
        return view('paginas.index',['paginas' => $paginas]);
    }

    // ------------------------------------------------------
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
      $cuento = Cuento::find($id);
      return view('paginas.create',compact('cuento','id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      //código para guardar la imagen
      $ruta = public_path().'/img/';
      if ($request->file('filename')!=null){
      $imagenOriginal = $request->file('filename');
      $imagen = Image::make($imagenOriginal);
      $temp_name = $this->random_string() . '.' . $imagenOriginal->getClientOriginalExtension();
      $imagen->resize(300,300);
      $imagen->save($ruta . $temp_name, 100);
      }

      $pagina = new Pagina;
      $pagina->idcuento = $request->get('idcuento');
      $pagina->contenido = $request->get('contenido');
      if ($request->file('filename')!=null){
      $pagina->filename = $temp_name;}
      else {$pagina->filename = null;}
      $pagina->save();

      return redirect()->route('cuentos.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
