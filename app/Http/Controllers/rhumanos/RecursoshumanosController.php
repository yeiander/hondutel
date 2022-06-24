<?php
// ESTA ES SOLO PARA LA VISTA DE EL MENU DE RECURSOS HUMANOS

namespace App\Http\Controllers\rhumanos;

use App\Http\Controllers\Controller;
use App\Models\RhPermiso;
use Illuminate\Http\Request;
use App\Models\Empleado;


class RecursoshumanosController extends Controller
{
    //

    public function index()
    {
        $paseSalida= RhPermiso::where('aprobacion', 'like', 'aprobado')->where('fk_id_tipo_permiso','like','1')->count();
        $permisoPersonal= RhPermiso::where('aprobacion', 'like', 'aprobado')->where('fk_id_tipo_permiso','like','2')->count();
        $permisoAdministrativo= RhPermiso::where('aprobacion', 'like', 'aprobado')->where('fk_id_tipo_permiso','like','3')->count();
        $permisoVenta= RhPermiso::where('aprobacion', 'like', 'aprobado')->where('fk_id_tipo_permiso','like','4')->count();
        return view('/recursos-humanos-menu/recursos_humanos', compact('paseSalida', 'permisoPersonal', 'permisoAdministrativo','permisoVenta'));
    }

    public function permisos()
    {
        return view('/recursos-humanos-menu/tipos-de-permisos');
    }

    public function consultas()
    {
        return view('/recursos-humanos-menu/consultas');
    }
    
}
