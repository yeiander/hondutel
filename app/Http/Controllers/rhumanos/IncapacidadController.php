<?php

namespace App\Http\Controllers\rhumanos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RhPermiso;
use App\Models\Empleado;
use Illuminate\Support\Facades\Session;
//agregare para el control de usuarios con Spatie:
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class IncapacidadController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:recursos-humanos-ver|recursos-humanos-editar|recursos-humanos-borrar',['only'=>['index','create4']]);
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
        if(request()->ajax())
        {
       if(!empty($request->from_date))
        {
         $data = RhPermiso::with('empleados')->select('rh_permisos.*')->orderBy('id','DESC')
           ->where('aprobacion', 'like', 'almacenado')
           ->where('fk_id_tipo_permiso', 'like', 5)
           ->whereBetween('fechaSolicitudPermiso', array($request->from_date, $request->to_date));
         }
        else
        {
           $data = RhPermiso::with('empleados')->select('rh_permisos.*')->orderBy('id','DESC')
           ->where('fk_id_tipo_permiso', 'like', 5)
           ->where('aprobacion', 'like', 'almacenado');
           
        }
          return datatables()->of($data)
          
          ->addColumn('action', function ($data) {
         

           return view('/recursos-humanos-permisos/incapacidad.action', compact('data'));
           

       })
          
           ->rawColumns(['action'])
          ->make(true);
       }
        
      
        return view('/recursos-humanos-permisos/incapacidad/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

    }

    public function create4(Request $request){

        $validated = $request->validate([
            
            'fk_id_empleado' => 'required|exists:empleados,id',

        ]);

        $id = $request->input('fk_id_empleado');
        $empleado = Empleado::findOrFail($id);

        return view('/recursos-humanos-permisos/incapacidad/crear', compact('empleado'));

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
            
           
            'numCertificadoIncapacidad' => 'required',
            'numAfiliacionIncapacidad' => 'required',
            'motivoTrabajoEnfermedad' => 'required',
            'fechaInicioIncapacidad' => 'required',
            'fechafinalIncapacidad' => 'required',
            'totalDiasIncapacidad' => 'required',
            'fechaSolicitudPermiso' => 'required',
            'ihss' => 'required'
        ]);

        $id = $request->input('fk_id_empleado');
        
        $permiso= RhPermiso::where('fk_id_empleado', 'like', $id)
        ->where('aprobacion', 'like', 'pendiente')
        ->where('fk_id_tipo_permiso', 'like', 5)->count();

        if($permiso >= 1){
           
            Session::flash('notiPaseSalida', 'El empleado ya tiene un permiso de incapacidad pendiente');

            return redirect()->route('recursos-h-tipos-de-permisos'); 
          
       }


       else{

      
       $permiso = new Rhpermiso;
       $permiso->fk_id_empleado = $request->fk_id_empleado;
       $permiso->fk_id_tipo_permiso = 5;
       $permiso->aprobacion = 'pendiente';

       $permiso->numCertificadoIncapacidad = $request->numCertificadoIncapacidad;
       $permiso->numAfiliacionIncapacidad =  $request->numAfiliacionIncapacidad;
       $permiso->motivoTrabajoEnfermedad = $request->motivoTrabajoEnfermedad;
       $permiso->fechaInicioIncapacidad = $request->fechaInicioIncapacidad;
       $permiso->fechafinalIncapacidad = $request->fechafinalIncapacidad;
       $permiso->totalDiasIncapacidad = $request->totalDiasIncapacidad;
       $permiso->ihss = $request->ihss;
       $permiso->lugarSolicitudPermiso = 'Juticalpa';
       $permiso->nombreQuienCreo =  (\Illuminate\Support\Facades\Auth::user()->name);
       $permiso->fechaSolicitudPermiso = $request->fechaSolicitudPermiso;
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
        //
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
        return view('/recursos-humanos-permisos/incapacidad/editar', compact('permiso'));
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
        Session::flash('notiEditado', 'El permiso ha sido editado');
        return redirect()->route('incapacidad.index');
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
        return redirect()->route('incapacidad.index');
    }
}
