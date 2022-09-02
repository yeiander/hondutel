<?php

namespace App\Http\Controllers\atencionCliente;

use App\Http\Controllers\Controller;
use App\Models\Registrolinea;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class RegistrolineapendienteController extends Controller
{
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
          $data = Registrolinea::select('registrolineas.*')->orderBy('id','DESC')
            ->whereBetween('fechaSolicitudPermiso', array($request->from_date, $request->to_date));
          }
         else
         {
            $data = Registrolinea::select('registrolineas.*')->orderBy('id','DESC')
            ->where('estado','like','pendiente');     
         }
           return datatables()->of($data)  
           ->addColumn('action', function ($data) {
          
            return view('/atencion-al-cliente/lineas-pendientes.action', compact('data'));
            

        })
           
            ->rawColumns(['action'])
           ->make(true);
        }
           
        return view('/atencion-al-cliente/lineas-pendientes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('/atencion-al-cliente/ventas-linea.crear');
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
           
            'id' => 'required',
            'clienteNombre' => 'required',
            'clienteCorreo' => 'required',
            'clienteProfesion' => 'required',
            'telefonoContacto' => 'required',  
            'clienteDireccionTrabajo' => 'required',  
            'clienteEstadoCivil' => 'required', 
            'cuotas' => 'required', 
            'numeroCuotas' => 'required', 
            'nombreBeneficiario' => 'required', 
            'beneficiarioParentesco' => 'required', 
               
        ]);



    

            $ventas = new Registrolinea;
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
        $registro=Registrolinea::findOrFail($id);
        return view('/atencion-al-cliente/ventas-linea.ver', compact('registro'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function wifi123(Request $request)
    {
        //
        $id = $request->input('id');
        $registrowifi = Registrolinea::findOrfail($id);

        return view('/atencion-al-cliente/ventas-wifi/crear', compact('registrowifi'));
    }

    public function edit($id)
    {
        //
        $registro=Registrolinea::findOrFail($id);
        return view('/atencion-al-cliente/lineas-pendientes.editar', compact('registro'));
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
        Registrolinea::where('id','=',$id)->update($registro);

        return redirect()->route('ventas-linea.index');
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
        Registrolinea::find($id)->delete();
        return redirect()->route('lineas-pendientes.index');
    }

    public function imprimir($id)
    {
        //
        $ventaslinea = Registrolinea::find($id);

        $vista = view('pdf/pdf-atencion-cliente.reporte-ventaslinea')
        ->with('ventas-linea', $ventaslinea);

        $pdf = PDF::loadHTML($vista);
        
        return $pdf->stream('nombre.pdf');
        
    }

}
