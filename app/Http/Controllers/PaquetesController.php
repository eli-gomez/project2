<?php

namespace App\Http\Controllers;

use App\Paquetes;
use Illuminate\Http\Request;

class PaquetesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paquetes  =  Paquetes::all();
        return view('Paquetes.index',compact('paquetes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Paquetes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([
        'descripcion' => 'required',
        'activo' => 'required',
        'precio' => 'integer|required',
      ]);

      $paquete = new Paquetes;
      $paquete->description = $request->descripcion;
      $paquete->nombre = $request->nombre;
      if ($request->hasFile('foto1')){
        $paquete->foto1 =  $request->foto1->store('imagenes');
      }

      if ($request->hasFile('foto2')){
        $paquete->foto2 =  $request->foto2->store('imagenes');
      }

      if ($request->hasFile('foto3')){
        $paquete->foto3 =  $request->foto3->store('imagenes');
      }
      $paquete->activo = $request->activo;
      $paquete->precio = $request->precio;
      $paquete->save();

      return redirect()->back()->with('ok', 'ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Paquetes  $paquetes
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $paquete = Paquetes::findOrFail($id);
      return view('Paquetes.edit', compact('paquete'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Paquetes  $paquetes
     * @return \Illuminate\Http\Response
     */
    public function edit(Paquetes $paquetes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Paquetes  $paquetes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $paquete = Paquetes::findOrFail($id);
      $paquete->description = $request->descripcion;
      $paquete->nombre = $request->nombre;
      if ($request->hasFile('foto1')){
        unlink($paquete->foto1);
        $paquete->foto1 =  $request->foto1->store('imagenes');
      }
      if ($request->hasFile('foto2')){
        unlink($paquete->foto2);
        $paquete->foto2 =  $request->foto2->store('imagenes');
      }
      if ($request->hasFile('foto3')){
        unlink($paquete->foto3);
        $paquete->foto3 =  $request->foto3->store('imagenes');
      }
      $paquete->activo = $request->activo;
      $paquete->precio = $request->precio;
      $paquete->save();

      return redirect()->back()->with('ok', 'ok');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Paquetes  $paquetes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paquetes $paquetes)
    {
        //
    }
}
