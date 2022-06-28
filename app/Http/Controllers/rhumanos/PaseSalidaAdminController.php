<?php

namespace App\Http\Controllers\rhumanos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RhPermiso;
use App\Models\Empleado;

class PaseSalidaAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $permisos = RhPermiso::all()->where('aprobacion', 'like', 'pendiente');
        return view('/recursos-humanos-permisos/pase-salida-admin.index', compact('permisos'));

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
    public function edit(Request $request, $id)
    {
        //   
        $permiso = RhPermiso::findOrFail($id);
        // $individual= RhPermiso::where('fk_id_empleado')->where('fechaSolicitudPermiso','>=', now()->subDays(30))->count();
        return view('/recursos-humanos-permisos/pase-salida-admin/editar', compact('permiso'));

    //     $datos = vEstadoPedidos::where('created_at', '>=', now()->subDays(30))
    //          ->whereCodVendedor($userAct->codvendedor)
    //          ->get();
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

        $permiso = RhPermiso::findOrFail($id);
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
        return redirect()->route('pase-salida-admin.index');

    }
}
