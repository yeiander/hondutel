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

class PermisoPersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        // $permisos = RhPermiso::all()->where('fk_id_tipo_permiso','like','2')->where('aprobacion', 'like', 'almacenado');
        // $permisos = RhPermiso::all()->where('aprobacion', 'like', 'almacenado')->andWhere('fk_id_tipo_permiso', 'like', '2');
        // return view('/recursos-humanos-permisos/permiso-personal.index', compact('permisos'));

        if(request()->ajax())
         {
        if(!empty($request->from_date))
         {
          $data = RhPermiso::with('empleados')->select('rh_permisos.*')
            ->where('aprobacion', 'like', 'almacenado')
            ->where('fk_id_tipo_permiso', 'like', 2)
            ->whereBetween('fechaSolicitudPermiso', array($request->from_date, $request->to_date));
          }
         else
         {
            $data = RhPermiso::with('empleados')->select('rh_permisos.*')
            ->where('aprobacion', 'like', 'almacenado')
            ->where('fk_id_tipo_permiso', 'like', 2);
         }
           return datatables()->of($data)
           
           ->addColumn('action', function ($data) {
            // return '<a href="#edit-'.$data->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
      
            // $btn =  '<a href="pase-salida/'. $data->id .'/edit" class="btn btn-primary btn-sm">Editar</a>';
         
            // $btn = $btn.'<a href="javascript:void(0)" class="edit btn btn-danger btn-sm">Borrar</a>';

            return view('/recursos-humanos-permisos/permiso-personal.action', compact('data'));
            

        })
            // ->editColumn('id', 'ID: {{$id}}')
            ->rawColumns(['action'])
           ->make(true);
        }
           return view('/recursos-humanos-permisos/permiso-personal.index');
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
        $fecha123 =  $request->fechaPermisoPersonalDia1;
        $condicion = $request->horasPermisoPersonal;

        $id = $request->input('fk_id_empleado');
        
        $permiso= RhPermiso::where('fk_id_empleado', 'like', $id)
        ->where('aprobacion', 'like', 'pendiente')
        ->where('fk_id_tipo_permiso', 'like', 2)->count();

        if($permiso >= 1){

            Session::flash('notiPaseSalida', 'El empleado ya tiene un pase de salida pendiente');

       
            return redirect()->route('recursos-h-tipos-de-permisos'); 
           //  return view('/recursos-humanos-menu/tipos-de-permisos');  
    }

    else {
       


       if($condicion == 16){

        $permiso = new Rhpermiso;
        $permiso->fk_id_empleado = $request->fk_id_empleado;
        $permiso->fk_id_tipo_permiso = 2;
        $permiso->aprobacion = 'pendiente';
        $permiso->horasPermisoPersonal = $request->horasPermisoPersonal;
        $permiso->fechaPermisoPersonalDia1 =  $request->fechaPermisoPersonalDia1;
        $permiso->fechaPermisoPersonalDia2 = $request->fechaPermisoPersonalDia2;
        $permiso->motivoTrabajoEnfermedad = $request->motivoTrabajoEnfermedad;
        $permiso->fechaSolicitudPermiso = $request->fechaSolicitudPermiso;
        $permiso->lugarSolicitudPermiso = $request->lugarSolicitudPermiso;
        $permiso->nombreQuienCreo =  (\Illuminate\Support\Facades\Auth::user()->name);
        $permiso->save();
        return redirect()->route('recursos_humanos');

        }


        else{
            $permiso = new Rhpermiso;
        $permiso->fk_id_empleado = $request->fk_id_empleado;
        $permiso->fk_id_tipo_permiso = 2;
        $permiso->aprobacion = 'pendiente';
        $permiso->horasPermisoPersonal = $request->horasPermisoPersonal;
        $permiso->fechaPermisoPersonalDia1 =  $request->fechaPermisoPersonalDia1;
        $permiso->fechaPermisoPersonalDia2 = $fecha123;
        $permiso->motivoTrabajoEnfermedad = $request->motivoTrabajoEnfermedad;
        $permiso->fechaSolicitudPermiso = $request->fechaSolicitudPermiso;
        $permiso->lugarSolicitudPermiso = $request->lugarSolicitudPermiso;
        $permiso->nombreQuienCreo =  (\Illuminate\Support\Facades\Auth::user()->name);
        $permiso->save();
        return redirect()->route('recursos_humanos');
        }
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
        $permiso = RhPermiso::findOrFail($id);
        
        return view('/recursos-humanos-permisos/permiso-personal/editar', compact('permiso'));
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
        Rhpermiso::find($id)->delete();
        return redirect()->route('permiso-personal.index');
    }
}
