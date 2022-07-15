<?php

namespace App\Http\Controllers\mapa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Crudmapa;


class MapaMenuController extends Controller
{
    //
    public function menuMapa(){
    return View('/mapa-interactivo/mapa-menu');
    }

    public function vistaMapa(){

        $registros=Crudmapa::all();
        return View('/mapa-interactivo/mapa', compact('registros'));
        }



        public function menuCrearCoordenadas(){
            return View('/mapa-interactivo/menu-crear-coordenadas');
            }

          
          
            public function consultaArmario(){
                return View('/mapa-interactivo/consultas/armario123');
                }
            
        
}




