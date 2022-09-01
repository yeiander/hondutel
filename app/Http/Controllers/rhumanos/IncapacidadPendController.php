<?php

namespace App\Http\Controllers\rhumanos;

use App\Http\Controllers\Controller;
use App\Models\RhPermiso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
//agregare para el control de usuarios con Spatie:
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class IncapacidadPendController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:recursos-humanos-ver|recursos-humanos-editar|recursos-humanos-borrar',['only'=>['index']]);
        $this->middleware('permission:recursos-humanos-crear',['only'=>['create','store']]);
        $this->middleware('permission:recursos-humanos-ver',['only'=>['edit','update']]);
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
           ->where('aprobacion', 'like', 'aprobado')
           ->where('fk_id_tipo_permiso', 'like', 5)
           ->whereBetween('fechaSolicitudPermiso', array($request->from_date, $request->to_date));
         }
        else
        {
           $data = RhPermiso::with('empleados')->select('rh_permisos.*')->orderBy('id','DESC')
           ->where('fk_id_tipo_permiso', 'like', 5)
           ->where('aprobacion', 'like', 'aprobado');
           
        }
          return datatables()->of($data)
          
          ->addColumn('action', function ($data) {
         

           return view('/recursos-humanos-permisos/incapacidad-pendiente.action', compact('data'));
           

       })
          
           ->rawColumns(['action'])
          ->make(true);
       }
        
        return view('/recursos-humanos-permisos/incapacidad-pendiente/index');
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
        Session::flash('notiAlmacenado', 'El permiso ha sido almacenado');
        return redirect()->route('incapacidad-pendiente.index');
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
        return redirect()->route('incapacidad-pendiente.index');
    }
}
