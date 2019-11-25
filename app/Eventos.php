<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Fotos;
use App\Abonos;
class Eventos extends Model
{
  public function fotos()
  {
    return $this->hasMany(Fotos::class, 'evento_id');
  }
  public function abonos(){
    return $this->hasMany(Abonos::class, 'evento_id');
  }
  public function paquetes(){
    return $this->belongsTo(Paquetes::class, 'paquete_id');
  }
}
