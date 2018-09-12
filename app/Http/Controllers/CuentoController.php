<?php

namespace App\Http\Controllers;

use App\Cuento;
use Illuminate\Http\Request;

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
        return view('cuentos.index',compact('cuentos'));
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cuento = new Cuento;

        $cuento->titulo = $request->get('titulo');
        $cuento->idprofesor = $request->get('idprofesor');
        $cuento->nivel = $request->get('nivel');
        $cuento->estado = $request->get('estado');
        $cuento->autor = $request->get('autor');
        $cuento->descripcion = $request->get('descripcion');

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
        //
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
      $cuento = Cuento::find($id);

      $cuento->titulo = $request->get('titulo');
      $cuento->idprofesor = $request->get('idprofesor');
      $cuento->nivel = $request->get('nivel');
      $cuento->estado = $request->get('estado');
      $cuento->descripcion = $request->get('descripcion');
      $cuento->autor = $request->get('autor');

      $cuento->save();

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
