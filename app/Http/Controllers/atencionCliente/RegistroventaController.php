<?php

namespace App\Http\Controllers\atencionCliente;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Registroventa;
use Barryvdh\DomPDF\Facade\Pdf;

class RegistroventaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $registros=Registroventa::all();
        return view('/atencion-al-cliente/ventas.index', compact('registros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('/atencion-al-cliente/ventas.crear');
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
        // $registroventa = request()->except('_token');
        // Registroventa::insert($registroventa);
        // return redirect()->route('menu-ventas');


    

            $ventas = new Registroventa;
            $ventas->id = $request->id;
            $ventas->clienteNombre = $request->clienteNombre;
            $ventas->clienteCorreo = $request->clienteCorreo;
            $ventas->clienteProfesion =  $request->clienteProfesion;
            $ventas->telefonoContacto = $request->telefonoContacto;
            $ventas->clienteDireccionTrabajo = $request->clienteDireccionTrabajo;
            $ventas->clienteEstadoCivil = $request->clienteEstadoCivil;
            $ventas->cuotas = $request->cuotas;
            $ventas->numeroCuotas = $request->numeroCuotas;
            $ventas->nombreBeneficiario = $request->nombreBeneficiario;
            $ventas->beneficiarioParentesco = $request->beneficiarioParentesco;
            $ventas->save();
            return redirect()->route('menu-ventas');
    
          
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
        $registro=Registroventa::findOrFail($id);
        return view('/atencion-al-cliente/ventas.editar', compact('registro'));
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
        Registroventa::where('id','=',$id)->update($registro);
        return redirect()->route('ventas.index');
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
        Registroventa::find($id)->delete();
        return redirect()->route('ventas.index');
    }

    public function imprimir($id)
    {
        //
        $ventas = Registroventa::find($id);

        $vista = view('pdf/pdf-atencion-cliente.reporte-venta')
        ->with('ventas', $ventas);

        $pdf = PDF::loadHTML($vista);
        
        return $pdf->stream('nombre.pdf');

}
}
