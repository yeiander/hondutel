<?php

namespace App\Http\Controllers\rhumanos;

use App\Http\Controllers\Controller;
use App\Models\Empleado;
use Illuminate\Http\Request;


class SubsidioController extends Controller
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
