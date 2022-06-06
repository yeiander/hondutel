<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RhTipoPermiso extends Model

{
    
    use HasFactory;

     //funcion para la relacion con los permisos de recursos humanos
       

     public function rhPermisos(){
         return $this->hasMany(RhPermiso::class, 'id');
     }

     public $incrementing = false;
}
