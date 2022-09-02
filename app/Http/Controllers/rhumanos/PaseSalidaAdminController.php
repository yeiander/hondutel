<?php

namespace App\Http\Controllers\rhumanos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RhPermiso;
use App\Models\RhTipoPermiso;
use App\Models\Empleado;
//agregare para el control de usuarios con Spatie:
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Session;



class PaseSalidaAdminController extends Controller
{

    function __construct()
    {    
        $this->middleware('permission:admin-ver|admin-crear|admin-editar|admin-borrar',['only'=>['index']]);
        $this->middleware('permission:admin-crear',['only'=>['create','store']]);
        $this->middleware('permission:admin-editar',['only'=>['edit','update']]);
        $this->middleware('permission:admin-borrar',['only'=>['destroy']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        // $permisos = RhPermiso::all()->where('aprobacion', 'like', 'pendiente');
        // return view('/recursos-humanos-permisos/pase-salida-admin.index', compact('permisos'));

        if(request()->ajax())
        {
       if(!empty($request->from_date))
        {
         $data = RhPermiso::with('permisos','empleados')->select('rh_permisos.*')->orderBy('id','DESC')
           ->where('aprobacion', 'like', 'pendiente')
           
           ->whereBetween('fechaSolicitudPermiso', array($request->from_date, $request->to_date));
         }
        else
        {
           $data = RhPermiso::with('permisos','empleados')->select('rh_permisos.*')->orderBy('id','DESC')
           
           ->where('aprobacion', 'like', 'pendiente');
           
        }
          return datatables()->of($data)
          
          ->addColumn('action', function ($data) {
         

           return view('/recursos-humanos-permisos/pase-salida-admin.action', compact('data'));
           

       })
          
           ->rawColumns(['action'])
           ->make(true);
       }
          return view('/recursos-humanos-permisos/pase-salida-admin.index');

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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        return view('/recursos-humanos-permisos/pase-salida-admin/editar', compact('permiso'));
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
        
        $permiso = request()->except(['_token', '_method']);
        RhPermiso::where('id','=', $id)->update($permiso);

        Session::flash('notiAprobado', 'El permiso ha sido aprobado');
        return redirect()->route('pase-salida-admin.index');

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
        RhPermiso::find($id)->delete();
        Session::flash('notiBorrado', 'El permiso ha sido borrado');
        return redirect()->route('pase-salida-admin.index');

    }
}
