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
use Illuminate\Support\Facades\Session;


class PerAdministrativoController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:recursos-humanos-ver|recursos-humanos-editar|recursos-humanos-borrar',['only'=>['index']]);
        $this->middleware('permission:recursos-humanos-crear',['only'=>['create','store']]);
        $this->middleware('permission:recursos-humanos-editar',['only'=>['edit','update']]);
        $this->middleware('permission:recursos-humanos-borrar',['only'=>['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
    //     $permisos = RhPermiso::all()->where('fk_id_tipo_permiso','like','3')->where('aprobacion', 'like', 'almacenado');
    //    return view('/recursos-humanos-permisos/administrativo.index', compact('permisos'));
    if(request()->ajax())
    {
   if(!empty($request->from_date))
    {
     $data = RhPermiso::with('empleados')->select('rh_permisos.*')->orderBy('id','DESC')
       ->where('aprobacion', 'like', 'almacenado')
       ->where('fk_id_tipo_permiso', 'like', 3)
       ->whereBetween('fechaSolicitudPermiso', array($request->from_date, $request->to_date));
     }
    else
    {
       $data = RhPermiso::with('empleados')->select('rh_permisos.*')->orderBy('id','DESC')
       ->where('fk_id_tipo_permiso', 'like', 3)
       ->where('aprobacion', 'like', 'almacenado');
       
    }
      return datatables()->of($data)
      
      ->addColumn('action', function ($data) {
     

       return view('/recursos-humanos-permisos/administrativo.action', compact('data'));
       

   })
      
       ->rawColumns(['action'])
      ->make(true);
   }
      return view('/recursos-humanos-permisos/administrativo.index');


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
        $fecha = Carbon::now()->format('Y-m-d');
        $semanaNum=date('W',strtotime($fecha));
        $id = $request->input('fk_id_empleado');
   
        $permiso= RhPermiso::where('fk_id_empleado', 'like', $id)
        ->where('aprobacion', 'like', 'pendiente')
        ->where('fk_id_tipo_permiso', 'like', 3)->count();

        if($permiso >= 1){
           
             Session::flash('notiPaseSalida', 'El empleado ya tiene un permiso administrativo pendiente');

       
             return redirect()->route('recursos-h-tipos-de-permisos'); 
            //  return view('/recursos-humanos-menu/tipos-de-permisos');  
        }

        else {
        // $datosPaseSalida = request()->all();

        // $datosAdministrativo = request()->except('_token');
        // RhPermiso::insert($datosAdministrativo);
        // $permisos = RhPermiso::all();
        // return redirect()->route('recursos_humanos');

        $permiso = new Rhpermiso;
        $permiso->fk_id_empleado = $request->fk_id_empleado;
        $permiso->semanaSolicitudPermiso = $semanaNum;
        $permiso->aniioSolicitudPermiso = $fecha;
        $permiso->fk_id_tipo_permiso = 3;
        $permiso->aprobacion = 'pendiente';
        $permiso->horaSalida = $request->horaSalida;
        $permiso->horaEntradaAproximada =  $request->horaEntradaAproximada;
        $permiso->motivoTrabajoEnfermedad = $request->motivoTrabajoEnfermedad;
        $permiso->fechaSolicitudPermiso = $request->fechaSolicitudPermiso;
        $permiso->lugarSolicitudPermiso = $request->lugarSolicitudPermiso;
        $permiso->nombreQuienCreo =  (\Illuminate\Support\Facades\Auth::user()->name);
        $permiso->save();
        Session::flash('notiEnviado', 'El permiso ha sido enviado');
        return redirect()->route('recursos_humanos');
        }
        
        
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

          if($individual >= 6){
            Session::flash('notiAdministrativo', 'El empleado agoto el numero de permisos en este mes');
            return redirect()->route('recursos-h-tipos-de-permisos'); 

          }
          else{
       
        return view('/recursos-humanos-permisos/administrativo/crear', compact('empleado', 'individual', 'mes', 'annio', 'area'));
          }
        }


        else{
            Session::flash('notiAdministrativo', 'El empleado no es de Administración');
            return redirect()->route('recursos-h-tipos-de-permisos'); 
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
        $permiso = RhPermiso::findOrFail($id);
        return view('/recursos-humanos-permisos/administrativo/editar', compact('permiso'));
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
        $permiso = request()->except(['_token', '_method']);
        RhPermiso::where('id','=', $id)->update($permiso);

        Session::flash('notiConfirmado', 'El permiso ha sido editado');
        return redirect()->route('administrativo.index');
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

        Rhpermiso::find($id)->delete();
        Session::flash('notiBorrado', 'El permiso ha sido borrado');
        return redirect()->route('administrativo.index');
    }
}
