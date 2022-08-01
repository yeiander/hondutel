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
use Illuminate\Support\Facades\Session;

class PerAdminisPendienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        // $permisos = RhPermiso::all()->where('fk_id_tipo_permiso','like','3')->where('aprobacion', 'like', 'aprobado');
        // $permisos = RhPermiso::all()->where('aprobacion', 'like', 'almacenado')->andWhere('fk_id_tipo_permiso', 'like', '2');
        // return view('/recursos-humanos-permisos/administrativo-pendiente.index', compact('permisos'));

        if(request()->ajax())
        {
       if(!empty($request->from_date))
        {
         $data = RhPermiso::with('empleados')->select('rh_permisos.*')->orderBy('id','DESC')
           ->where('aprobacion', 'like', 'aprobado')
           ->where('fk_id_tipo_permiso', 'like', 3)
           ->whereBetween('fechaSolicitudPermiso', array($request->from_date, $request->to_date));
         }
        else
        {
           $data = RhPermiso::with('empleados')->select('rh_permisos.*')->orderBy('id','DESC')
           ->where('fk_id_tipo_permiso', 'like', 3)
           ->where('aprobacion', 'like', 'aprobado');
           
        }
          return datatables()->of($data)
          
          ->addColumn('action', function ($data) {
         

           return view('/recursos-humanos-permisos/administrativo-pendiente.action', compact('data'));
           

       })
          
           ->rawColumns(['action'])
          ->make(true);
       }
          return view('/recursos-humanos-permisos/administrativo-pendiente.index');


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
        return view('/recursos-humanos-permisos/administrativo-pendiente/editar', compact('permiso'));
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

        // $permiso = RhPermiso::findOrFail($id);
           
        Session::flash('notiConfirmado', 'El permiso ha sido almacenado');
        return redirect()->route('administrativo-pendiente.index');
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
        return redirect()->route('administrativo-pendiente.index');
    }
}
