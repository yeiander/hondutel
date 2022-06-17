<?php

namespace App\Http\Controllers\mapa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MapaMenuController extends Controller
{
    //
    public function menuMapa(){
    return View('/mapa-interactivo/mapa-menu');
    }

    public function vistaMapa(){
        return View('/mapa-interactivo/mapa');
        }
        public function menuCrearCoordenadas(){
            return View('/mapa-interactivo/menu-crear-coordenadas');
            }
        
}
