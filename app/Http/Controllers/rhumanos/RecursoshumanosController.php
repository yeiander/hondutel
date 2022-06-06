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
        return view('/rc/recursos_humanos', compact('paseSalida', 'permisoPersonal', 'permisoAdministrativo'));
    }

    public function permisos()
    {
        $empleados = Empleado::all(); 
        return view('/rc/recursos-h-tipos-de-permisos', compact('empleados'));
    }

    public function consultas()
    {
        return view('/rc/recursos-humanos-consultas');
    }
    
}
