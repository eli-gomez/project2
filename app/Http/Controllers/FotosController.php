<?php

namespace App\Http\Controllers;

use App\Fotos;
use Auth;
use Illuminate\Http\Request;

class FotosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('Fotos.create', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
     if ($request->hasFile('fotos')) {
       foreach ($request->fotos as $foto) {
         $fotonueva  = new Fotos;
         $fotonueva->evento_id = $id;
         $fotonueva->path = $foto->store('imagenes/eventos');
         $fotonueva->subida_por = Auth::user()->id;
         $fotonueva->save();
       }
     }
     return redirect()->back()->with('ok', 'ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Fotos  $fotos
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      return view('Fotos.Edit',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Fotos  $fotos
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Fotos  $fotos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      if ($request->hasFile('foto')){
        $foto= fotos::findOrFail($id);
        unlink($foto->path);
        $foto->path = $request->foto->store('imagenes/eventos');
        $foto->save();
      }
      return redirect()->back()->with('fotoEdit', 'FotoEdit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Fotos  $fotos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     $foto= fotos::findOrFail($id);
     unlink($foto->path);
     $foto->delete();
     return redirect()->back()->with('fotoDeleted', 'fotoDeleted');
    }
}
