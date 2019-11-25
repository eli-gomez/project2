<?php

namespace App\Http\Controllers;

use App\Eventos;
use App\Paquetes;
use App\Fotos;
Use Auth;
use Illuminate\Http\Request;

class EventosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if( Auth::User()->rol == 1){
        return redirect()->route('Eventos.Aindex');
      }
      if( Auth::User()->rol == 2){
        $eventos = Eventos::where('confirmado','1')->get();
      }elseif(Auth::User()->rol == 3){
        $eventos = Eventos::where('cliente_id', Auth::User()->id)->get();
      }

      return view('Eventos.index', compact('eventos'));
    }

    public function AIndex()
    {
      $eventos = Eventos::with('paquetes')->get();
      return view('Eventos.Aindex', compact('eventos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
      $paquete  =  Paquetes::findOrFail($id);
      return view('Eventos.create',compact('paquete'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $evento = new Eventos;
        $evento->fecha = $request->fecha;
        $evento->tipo = $request->tipo;
        $evento->precio = 0;
        $evento->quien_contrato = null;
        $evento->confirmado = 0 ;
        $evento->cliente_id = Auth::user()->id;
        $evento->paquete_id = $request->id_paquete;
        $evento->save();

        if ($request->hasFile('fotos')) {
          foreach ($request->fotos as $foto) {
            $nfoto  = new Fotos;
            $nfoto->evento_id = $evento->id;
            $nfoto->path = $foto->store('imagenes/eventos');
            $nfoto->subida_por = Auth::user()->id;
            $nfoto->save();
          }
        }
      return redirect()->back()->with('ok', 'ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Eventos  $eventos
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $evento = Eventos::where('id', $id)->with('fotos')->first();
      return view('Eventos.editar', compact('evento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Eventos  $eventos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $evento = Eventos::findOrFail($id);
      $paquete = Paquetes::findOrFail($evento->paquete_id);
      return view('Eventos.confirmar', compact('evento', 'paquete'));
    }

    public function cStore(Request $request, $id)
    {
      $evento = Eventos::findOrFail($id);
      $evento->confirmado = 1;
      $evento->precio = $request->precio;
      $evento->quien_contrato = Auth::User()->id;
      $evento->save();

      return redirect()->route('Eventos.Aindex')->with('confirmado', 'confirmado');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Eventos  $eventos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $evento = Eventos::findOrFail($id);
      if(isset($request->fecha)){
        $evento->fecha = $request->fecha;
      }
      if(isset($request->tipo)){
        $evento->tipo = $request->tipo;
      }
      $evento->save();
      return redirect()->back()->with('ok', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Eventos  $eventos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $evento  = Eventos::where('id', $id)
      ->with('fotos')->first();
      if(isset($evento->fotos)){
        foreach ($evento->fotos as $foto) {
          $foto= fotos::findOrFail($foto->id);
          unlink($foto->path);
          $foto->delete();
        }
      }
      $evento->delete();
      return redirect()->back()->with('eliminado', 'eliminado');

    }
}
