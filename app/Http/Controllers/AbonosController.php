<?php

namespace App\Http\Controllers;

use App\Abonos;
use App\Eventos;
use Auth;
use Illuminate\Http\Request;

class AbonosController extends Controller
{
    public function create($id)
    {
      $evento = Eventos::where('id', $id)->with('abonos')->first();
      $abonototal = 0;
      foreach ($evento->abonos as $abono) {
        $abonototal +=  $abono->monto;
      }

        return view('Abonos.create', compact('abonototal', 'evento'));
    }

    public function store(Request $request)
    {
      $abono =  new Abonos;
      $abono->Fecha = now();
      $abono->monto = $request->abono;
      $abono->evento_id = $request->evento_id;
      $abono->quien_recibio = Auth::User()->id;
      $abono->save();
      return redirect()->back()->with('ok','ok');
    }
}
