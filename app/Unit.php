<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Unit extends Model
{


  // Связь с сервером
  public function unitLink(){
    return $this->belongsTo(UnitServer::class);
  }
  
}
