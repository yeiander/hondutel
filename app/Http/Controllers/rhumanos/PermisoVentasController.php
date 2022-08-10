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
use Illuminate\Support\Facades\Session;


class PermisoVentasController extends Controller
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
           ->where('fk_id_tipo_permiso', 'like', 4)
           ->whereBetween('fechaSolicitudPermiso', array($request->from_date, $request->to_date));
         }
        else
        {
           $data = RhPermiso::with('empleados')->select('rh_permisos.*')->orderBy('id','DESC')
           ->where('fk_id_tipo_permiso', 'like', 4)
           ->where('aprobacion', 'like', 'almacenado');
           
        }
          return datatables()->of($data)
          
          ->addColumn('action', function ($data) {
         

           return view('/recursos-humanos-permisos/ventas-rc.action', compact('data'));
           

       })
          
           ->rawColumns(['action'])
          ->make(true);
       }
          return view('/recursos-humanos-permisos/ventas-rc.index');
        
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
        return view('/recursos-humanos-permisos/ventas-rc.crear', compact('empleados', 'permisos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $validated = $request->validate([
            
           
            'horaSalida' => 'required',
            'horaEntradaAproximada' => 'required',
            'motivoTrabajoEnfermedad' => 'required',
            'fechaSolicitudPermiso' => 'required',
            'lugarSolicitudPermiso' => 'required',
            'vehiculoDescripcion' => 'required',
            'lineaVendida' => 'required',
            'telefonoVendido' => 'required',
            'internetVendido' => 'required'
        ]);

        $id = $request->input('fk_id_empleado');
        $permiso= RhPermiso::where('fk_id_empleado', 'like', $id)
        ->where('aprobacion', 'like', 'pendiente')
        ->where('fk_id_tipo_permiso', 'like', 4)->count();

        if($permiso >= 1){
           
             Session::flash('notiPaseSalida', 'El empleado ya tiene un permiso administrativo pendiente');
             return redirect()->route('recursos-h-tipos-de-permisos'); 
          
        }

        else {
        $permiso = new Rhpermiso;
        $permiso->fk_id_empleado = $request->fk_id_empleado;
        $permiso->fk_id_tipo_permiso = 4;
        $permiso->aprobacion = 'pendiente';
        $permiso->horaSalida = $request->horaSalida;
        $permiso->horaEntradaAproximada =  $request->horaEntradaAproximada;
        $permiso->motivoTrabajoEnfermedad = $request->motivoTrabajoEnfermedad;
        $permiso->fechaSolicitudPermiso = $request->fechaSolicitudPermiso;
        $permiso->lugarSolicitudPermiso = $request->lugarSolicitudPermiso;
        $permiso->nombreQuienCreo =  (\Illuminate\Support\Facades\Auth::user()->name);
        $permiso->vehiculoDescripcion = $request->vehiculoDescripcion;
        $permiso->internetVendido = $request->internetVendido;
        $permiso->telefonoVendido = $request->telefonoVendido;
        $permiso->lineaVendida = $request->lineaVendida;
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
     * Show the form to create a new blog post.
     *
     * @return \Illuminate\View\View
     */
    public function create3(Request $request)
    {
        //
        $validated = $request->validate([
            
            
            'fk_id_empleado' => 'required|exists:empleados,id',
     
        ]);
        
       
                
        $id = $request->input('fk_id_empleado');
        $empleado = Empleado::findOrFail($id);
       
    
        return view('/recursos-humanos-permisos/ventas-rc/crear', compact('empleado'));
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
        
        return view('/recursos-humanos-permisos/ventas-rc/editar', compact('permiso'));
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
        return redirect()->route('ventas-rc.index');
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
        return redirect()->route('ventas-rc.index');

    }
}
