<?php

namespace App\Http\Controllers\rhumanos;

use App\Http\Controllers\Controller;
use App\Models\RhPermiso;
use App\Models\Empleado;
use Illuminate\Http\Request;

//agregare para el control de usuarios con Spatie:
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Carbon;

class PermisoPersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $permisos = RhPermiso::all()->where('fk_id_tipo_permiso','like','2')->where('aprobacion', 'like', 'almacenado');
        // $permisos = RhPermiso::all()->where('aprobacion', 'like', 'almacenado')->andWhere('fk_id_tipo_permiso', 'like', '2');
        return view('/recursos-humanos-permisos/permiso-personal.index', compact('permisos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        // esto me llevara los valores de empleados a los formularios
        $permisos = RhPermiso::all();
              $empleados = Empleado::all();
        return view('/recursos-humanos-permisos/permiso-personal.crear', compact('empleados', 'permisos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            
            
            'fk_id_empleado' => 'required',
            'horasPermisoPersonal' => 'required',
            'fechaPermisoPersonalDia1' => 'required',
            'motivoTrabajoEnfermedad' => 'required',
            'fechaSolicitudPermiso' => 'required',
            'lugarSolicitudPermiso' => 'required'
            
        ]);

        // $datosPermisoPersonal = request()->except('_token');
        // RhPermiso::insert($datosPermisoPersonal);
        // $permisos = RhPermiso::all();

        $permiso = new Rhpermiso;
        $permiso->fk_id_empleado = $request->fk_id_empleado;
        $permiso->fk_id_tipo_permiso = $request->fk_id_tipo_permiso;
        $permiso->horasPermisoPersonal = $request->horasPermisoPersonal;
        $permiso->fechaPermisoPersonalDia1 = $request->fechaPermisoPersonalDia1;
        $permiso->fechaPermisoPersonalDia2 = $request->fechaPermisoPersonalDia2;
        $permiso->motivoTrabajoEnfermedad = $request->motivoTrabajoEnfermedad;
        $permiso->fechaSolicitudPermiso = $request->fechaSolicitudPermiso;
        $permiso->lugarSolicitudPermiso = $request->lugarSolicitudPermiso;
        $permiso->save();
        return redirect()->route('recursos_humanos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

     /**
     * Show the form to create a new blog post.
     *
     * @return \Illuminate\View\View
     */
    public function creacion2(Request $request)
    {
        //
        $validated = $request->validate([
            
            
            'fk_id_empleado' => 'required|exists:empleados,id',
     
        ]);
        
        $mes = Carbon::now()->format('m');
        $annio = Carbon::now();
        $annio = $annio->format('Y');
                
        $id = $request->input('fk_id_empleado');
        $empleado = Empleado::findOrFail($id);
        $individual= RhPermiso::where('fk_id_empleado', 'like', $id)
        ->where('aprobacion', 'like', 'almacenado')
        ->where('fk_id_tipo_permiso', 'like', 2)
        ->whereYear('fechaSolicitudPermiso', '=', $annio)
        ->whereMonth('fechaSolicitudPermiso', '=', $mes)->sum('horasPermisoPersonal');
    
        return view('/recursos-humanos-permisos/permiso-personal/crear', compact('empleado', 'individual', 'mes', 'annio'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
