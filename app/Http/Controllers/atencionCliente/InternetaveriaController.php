<?php

namespace App\Http\Controllers\atencionCliente;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RegistroAveria;
use Barryvdh\DomPDF\Facade\Pdf;


class InternetaveriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $registros=RegistroAveria::all();
        return view('/atencion-al-cliente/internet-averia.index', compact('registros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('/atencion-al-cliente/internet-averia.crear');
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
        $registro=RegistroAveria::findOrFail($id);
        return view('/atencion-al-cliente/internet-averia.ver', compact('registro'));
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
        $registro=RegistroAveria::findOrFail($id);
        return view('/atencion-al-cliente/internet-averia.editar', compact('registro'));
    
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
        RegistroAveria::where('id','=',$id)->update($registro);

        return redirect()->route('internet-averia.index');
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
        RegistroAveria::find($id)->delete();
        return redirect()->route('internet-averia.index');
    }

    public function imprimir($id)
    {
        //
        $internetaveria = RegistroAveria::find($id);

        $vista = view('pdf/pdf-atencion-cliente.reporte-internetaveria')
        ->with('internet-averia', $internetaveria);

        $pdf = PDF::loadHTML($vista);
        
        return $pdf->stream('nombre.pdf');
        
    }

}
