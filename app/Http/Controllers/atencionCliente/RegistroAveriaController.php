<?php

namespace App\Http\Controllers\atencionCliente;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RegistroAveria;
use Barryvdh\DomPDF\Facade\Pdf;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RegistroAveriaController extends Controller

{
    function __construct()
    {    
        $this->middleware('permission:ver-atencion-al-cliente|crear-atencion-al-cliente|editar-atencion-al-cliente|borrar-atencion-al-cliente',['only'=>['index']]);
        $this->middleware('permission:crear-atencion-al-cliente',['only'=>['create','store']]);
        $this->middleware('permission:editar-atencion-al-cliente',['only'=>['edit','update']]);
        $this->middleware('permission:borrar-atencion-al-cliente',['only'=>['destroy']]);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $registros=RegistroAveria::all();
        return view('/atencion-al-cliente/registro-averia.index', compact('registros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('/atencion-al-cliente/registro-averia.crear');
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
           
            'nombreCliente' => 'required',
            'contacto' => 'required',
            'fechaDeSolicitud' => 'required',
            'numeroDeLinea' => 'required',
            'Direccion' => 'required',  
            'Megas' => 'required',  
               
        ]);


        $registroAveria = request()->except('_token');
        RegistroAveria::insert($registroAveria);
        return redirect()->route('menu-registro-averia');

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
        $registro=RegistroAveria::findOrFail($id);
        return view('/atencion-al-cliente/registro-averia.editar', compact('registro'));


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

        return redirect()->route('registro-averia.index');
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
        return redirect()->route('registro-averia.index');
    }

    public function imprimir($id)
    {
        //
        $registroAveria = RegistroAveria::find($id);

        $vista = view('pdf/pdf-atencion-cliente.reporte-registro-averia')
        ->with('registroAveria', $registroAveria);

        $pdf = PDF::loadHTML($vista);
        
        return $pdf->stream('nombre.pdf');
        
    }
}
