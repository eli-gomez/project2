<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Eventos;

class Abonos extends Model
{
  public function Evento(){
    return $this->belongsTo(Eventos::class, 'evento_id');
  }
}
