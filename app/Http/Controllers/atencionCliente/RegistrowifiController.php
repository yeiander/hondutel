<?php

namespace App\Http\Controllers\atencionCliente;

use App\Http\Controllers\Controller;
use App\Models\Registrolinea;
use App\Models\Registrowifi;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


class RegistrowifiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $registros=Registrowifi::all();
        return view('/atencion-al-cliente/ventas-wifi.index', compact('registros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('/atencion-al-cliente/ventas-wifi.crear');
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
        $registrowifi = request()->except('_token');
        Registrowifi::insert($registrowifi);
        return redirect()->route('ventas-wifi.index');
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
        $registro=Registrowifi::findOrFail($id);
        return view('/atencion-al-cliente/ventas-wifi.ver', compact('registro'));
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
        $registro=Registrowifi::findOrFail($id);
        return view('/atencion-al-cliente/ventas-wifi.editar', compact('registro'));
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
        Registrowifi::where('id','=',$id)->update($registro);

        return redirect()->route('ventas-wifi.index');
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
        Registrowifi::find($id)->delete();
        return redirect()->route('ventas-wifi.index');
    }

    public function imprimir($id)
    {
        //
        $ventaswifi = Registrowifi::find($id);

        $vista = view('pdf/pdf-atencion-cliente.reporte-ventaswifi')
        ->with('ventas-wifi', $ventaswifi);

        $pdf = PDF::loadHTML($vista);
        
        return $pdf->stream('nombre.pdf');
        
    }



}
