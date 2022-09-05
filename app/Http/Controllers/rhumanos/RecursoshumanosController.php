<?php
// ESTA ES SOLO PARA LA VISTA DE EL MENU DE RECURSOS HUMANOS
namespace App\Http\Controllers\rhumanos;

use App\Http\Controllers\Controller;
use App\Models\RhPermiso;
use Illuminate\Http\Request;
use App\Models\Empleado;
//agregare para el control de usuarios con Spatie:
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RecursoshumanosController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:recursos-humanos-ver|recursos-humanos-editar|recursos-humanos-borrar',['only'=>['index','permisos','consultas']]);
        $this->middleware('permission:recursos-humanos-crear',['only'=>['create','store']]);
        $this->middleware('permission:recursos-humanos-editar',['only'=>['edit','update']]);
        $this->middleware('permission:recursos-humanos-borrar',['only'=>['destroy']]);
    }

    public function index()
    {
        $paseSalida= RhPermiso::where('aprobacion', 'like', 'aprobado')->where('fk_id_tipo_permiso','like','1')->count();
        $permisoPersonal= RhPermiso::where('aprobacion', 'like', 'aprobado')->where('fk_id_tipo_permiso','like','2')->count();
        $permisoAdministrativo= RhPermiso::where('aprobacion', 'like', 'aprobado')->where('fk_id_tipo_permiso','like','3')->count();
        $permisoVenta= RhPermiso::where('aprobacion', 'like', 'aprobado')->where('fk_id_tipo_permiso','like','4')->count();
        $permisoIncapacidad= RhPermiso::where('aprobacion', 'like', 'aprobado')->where('fk_id_tipo_permiso','like','5')->count();
        $permisoSubsidio= RhPermiso::where('aprobacion', 'like', 'aprobado')->where('fk_id_tipo_permiso','like','6')->count();
        return view('/recursos-humanos-menu/recursos_humanos', compact('paseSalida', 'permisoPersonal', 'permisoAdministrativo','permisoVenta','permisoIncapacidad','permisoSubsidio'));
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
