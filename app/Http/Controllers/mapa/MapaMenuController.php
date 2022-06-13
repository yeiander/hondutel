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
}
