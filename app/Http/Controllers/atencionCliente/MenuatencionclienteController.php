<?php

namespace App\Http\Controllers\atencionCliente;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MenuatencionclienteController extends Controller
{
    //
    public function menuatencion()
    {
        return view('/atencion-al-cliente/menu');
    }
    public function menuRegistroAveria()
    {
        return view('/atencion-al-cliente/menu-registro-averia');
    }
    public function menuventas()
    {
        return view('/atencion-al-cliente/ventas/menu-ventas');
    }
    public function menucancelaciones()
    {
        return view('/atencion-al-cliente/cancelaciones/menu-cancelaciones');
    }



}
