<?php

namespace App\Http\Controllers\rhumanos;

use App\Http\Controllers\Controller;
use App\Models\Empleado;
use App\Models\RhPermiso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;



class SubsidioController extends Controller
{
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
           ->where('fk_id_tipo_permiso', 'like', 6)
           ->whereBetween('fechaSolicitudPermiso', array($request->from_date, $request->to_date));
         }
        else
        {
           $data = RhPermiso::with('empleados')->select('rh_permisos.*')->orderBy('id','DESC')
           ->where('fk_id_tipo_permiso', 'like', 6)
           ->where('aprobacion', 'like', 'almacenado');
           
        }
          return datatables()->of($data)
          
          ->addColumn('action', function ($data) {
         

           return view('/recursos-humanos-permisos/subsidio.action', compact('data'));
           

       })
          
           ->rawColumns(['action'])
          ->make(true);
       }
        return view('/recursos-humanos-permisos/subsidio/index');
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
    public function create5(Request $request){

        $validated = $request->validate([
            
            'fk_id_empleado' => 'required|exists:empleados,id',

        ]);

        $id = $request->input('fk_id_empleado');
        $empleado = Empleado::findOrFail($id);

        return view('/recursos-humanos-permisos/subsidio/crear', compact('empleado'));

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
            'sueldoBaseSubsidio' => 'required',
            'fechaInicioSubsidio' => 'required',
            'fechaFinalSubsidio' => 'required',
            'totalDiassubsidio' => 'required',
            'fechaSolicitudPermiso' => 'required',
            'DiasPagarSubsidio' => 'required',
            'ObservacionesSubsidio' => 'required',
        ]);

        $id = $request->input('fk_id_empleado');
        $permiso= RhPermiso::where('fk_id_empleado', 'like', $id)
        ->where('aprobacion', 'like', 'pendiente')
        ->where('fk_id_tipo_permiso', 'like', 6)->count();

        if($permiso >= 1){
           
            Session::flash('notiPaseSalida', 'El empleado ya tiene un pago de subsidio pendiente');

            return redirect()->route('recursos-h-tipos-de-permisos'); 
          
       }


       else{

      
       $permiso = new Rhpermiso;
       $permiso->fk_id_empleado = $request->fk_id_empleado;
       $permiso->fk_id_tipo_permiso = 6;
       $permiso->aprobacion = 'pendiente';

       $permiso->numCertificadoIncapacidad = $request->numCertificadoIncapacidad;
       $permiso->numAfiliacionIncapacidad =  $request->numAfiliacionIncapacidad;
       $permiso->sueldoBaseSubsidio = $request->sueldoBaseSubsidio;
       $permiso->fechaInicioSubsidio = $request->fechaInicioSubsidio;
       $permiso->fechaFinalSubsidio = $request->fechaFinalSubsidio;
       $permiso->totalDiassubsidio = $request->totalDiassubsidio;
       $permiso->DiasPagarSubsidio = $request->DiasPagarSubsidio;
       $permiso->ObservacionesSubsidio = $request->ObservacionesSubsidio;
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
        return view('/recursos-humanos-permisos/subsidio.editar', compact('permiso'));
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
        return redirect()->route('subsidio.index');
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
        return redirect()->route('subsidio.index');
    }
}
