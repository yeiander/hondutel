<?php

namespace App\Http\Controllers\rhumanos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RhPermiso;
use App\Models\Empleado;
use Illuminate\Support\Facades\Session;

class IncapacidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
