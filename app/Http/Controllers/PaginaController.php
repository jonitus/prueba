<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pagina;
use App\Http\Requests\PaginaRequest;
use App\Cuento;
use Image;

class PaginaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //
    }

     public function mostrar($id)
    {
        $cuento = Cuento::find($id);
        $paginas = Pagina::where('idcuento',$cuento->id)->paginate(1);
        return view('paginas.index',compact('cuento','paginas'))->withPaginas($paginas);
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
    public function store(PaginaRequest $request)
    {

      //código para guardar la imagen
      $ruta = public_path().'/img/';
<<<<<<< HEAD
      if ($request->file('filename')!=null){
=======
      //imagen es opcional
      if($request->file('filename')!=null){

>>>>>>> 2ac6c98be40f3d980a851ac2eb037ae12344f260
      $imagenOriginal = $request->file('filename');
      $imagen = Image::make($imagenOriginal);
      $temp_name = $this->random_string() . '.' . $imagenOriginal->getClientOriginalExtension();
      $imagen->save($ruta . $temp_name, 100);
<<<<<<< HEAD
=======

>>>>>>> 2ac6c98be40f3d980a851ac2eb037ae12344f260
      }

      $pagina = new Pagina;
      $pagina->idcuento = $request->get('idcuento');
      $pagina->contenido = $request->get('contenido');
<<<<<<< HEAD
<<<<<<< HEAD
      if ($request->file('filename')!=null){
      $pagina->filename = $temp_name;}
      else {$pagina->filename = null;}
=======
      if ($request->file('filename')!=null) {      
=======
      if ($request->file('filename')!=null) {
>>>>>>> 64533dc29a97358ce5384d508c5115b8221676de
      $pagina->filename = $temp_name;
      }
      else{
        $pagina->filename = null;
      }
>>>>>>> 2ac6c98be40f3d980a851ac2eb037ae12344f260
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
    public function update(PaginaRequest $request, $id)
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
