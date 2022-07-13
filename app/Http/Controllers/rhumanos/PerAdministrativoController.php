<?php

namespace App\Http\Controllers\rhumanos;
use Illuminate\Session\SessionManager;

use App\Http\Controllers\Controller;
use App\Models\RhPermiso;
use App\Models\Empleado;
use Illuminate\Http\Request;
//agregare para el control de usuarios con Spatie:
use Spatie\Permission\Models\Role;

use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;


class PerAdministrativoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $permisos = RhPermiso::all()->where('fk_id_tipo_permiso','like','3')->where('aprobacion', 'like', 'almacenado');
       return view('/recursos-humanos-permisos/administrativo.index', compact('permisos'));
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $permisos = RhPermiso::all();
        $empleados = Empleado::all();
       
        return view('/recursos-humanos-permisos/administrativo.crear', compact('empleados', 'permisos'));
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
            
           
            'horaSalida' => 'required',
            'horaEntradaAproximada' => 'required',
            'motivoTrabajoEnfermedad' => 'required',
            'fechaSolicitudPermiso' => 'required',
            'lugarSolicitudPermiso' => 'required'
        ]);
   

        // $datosPaseSalida = request()->all();

        $datosAdministrativo = request()->except('_token');
        RhPermiso::insert($datosAdministrativo);
        $permisos = RhPermiso::all();
        return redirect()->route('recursos_humanos');

        // $datosAdministrativo = new Rhpermiso;
        // $datosAdministrativo->fk_id_empleado = $request->input('fk_id_empleado');
        // $datosAdministrativo->fk_id_tipo_permiso = $request->input('fk_id_tipo_permiso');
        // $datosAdministrativo->horaSalida = $request->input('horaSalida');
        // $datosAdministrativo->horaEntradaAproximada = $request->input('horaEntradaAproximada');
        // $datosAdministrativo->motivoTrabajoEnfermedad = $request->input('motivoTrabajoEnfermedad');
        // $datosAdministrativo->fechaSolicitudPermiso = $request->input('fechaSolicitudPermiso');
        // $datosAdministrativo->lugarSolicitudPermiso = $request->input('lugarSolicitudPermiso');
        
        // if( $datosAdministrativo->save()){
        //            return redirect()->route('recursos_humanos');
                        
            
        //     }

        //     else{

        //         return redirect()->route('usuarios.index');
        //     }
       


        // return redirect()->route('recursos_humanos')->with('status','Student Added Successfully');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //prueba
    }

    public function prueba($id)
    {
        //prueba
      return view('/recursos-humanos-permisos/administrativo/crear');

    }

    public function create2(Request $request) 
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
        $area = $empleado->areaTrabajo;

        if( $area == 'administrativa' ){
        $individual= RhPermiso::where('fk_id_empleado', 'like', $id)
        ->where('fk_id_tipo_permiso', 'like', 3)
        ->where('aprobacion', 'like', 'almacenado')
        ->whereYear('fechaSolicitudPermiso', '=', $annio)
        ->whereMonth('fechaSolicitudPermiso', '=', $mes)->count();
       
        return view('/recursos-humanos-permisos/administrativo/crear', compact('empleado', 'individual', 'mes', 'annio', 'area'));

        }
        else{
            // $sessionManager->flash('mensaje', 'el usuario '.$empleado->nombreEmpleado. ' no es de Administración');
            return view('/recursos-humanos-menu/tipos-de-permisos')->with('status', 'el usuario no es de administración');
        }
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
