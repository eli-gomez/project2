<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Eventos;
use App\User;
class Fotos extends Model
{

  public function Eventos(){
    return $this->belongsTo(Eventos::class);
  }

  public function Usuario(){
    return $this->belongsTo(User::class, 'subida_por');
  }

}
