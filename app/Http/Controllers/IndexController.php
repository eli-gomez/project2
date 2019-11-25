<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Paquetes;
class IndexController extends Controller
{
  public function welcome(){
    $paquetes = Paquetes::where('activo', '1')->get();
    return view('welcome', compact('paquetes'));
  }
}
