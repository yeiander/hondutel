<?php

namespace App\Http\Controllers\atencionCliente;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Registrocancelaciones;
use Barryvdh\DomPDF\Facade\Pdf;
class RegistroCancelacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $registros=Registrocancelaciones::all();
        return view('/atencion-al-cliente/cancelaciones.index', compact('registros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('/atencion-al-cliente/cancelaciones.crear');
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
        $registrocancelacion = request()->except('_token');
        Registrocancelaciones::insert($registrocancelacion);
        return redirect()->route('menu-cancelaciones');
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
        $registro=Registrocancelaciones::findOrFail($id);
        return view('/atencion-al-cliente/cancelaciones.editar', compact('registro'));
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
        $registro = request()->except(['_token', '_method']);
        Registrocancelaciones::where('id','=',$id)->update($registro);

        return redirect()->route('cancelaciones.index');
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
        Registrocancelaciones::find($id)->delete();
        return redirect()->route('cancelaciones.index');
    }

    public function imprimir($id)
    {
        //
        $cancelaciones = Registrocancelaciones::find($id);

        $vista = view('pdf/pdf-atencion-cliente.reporte-cancelacion')
        ->with('cancelaciones', $cancelaciones);

        $pdf = PDF::loadHTML($vista);
        
        return $pdf->stream('nombre.pdf');
        
    }
    
}
