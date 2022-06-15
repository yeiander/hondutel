<?php

namespace App\Http\Controllers\atencionCliente;

use App\Http\Controllers\Controller;
use App\Models\Registrolinea;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class RegistrolineaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $registros=Registrolinea::all();
        return view('/atencion-al-cliente/ventas-linea.index', compact('registros'));
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
        $registrolinea = request()->except('_token');
        Registrolinea::insert($registrolinea);
        return redirect()->route('ventas-linea.index');
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
     * Show the form to create a new blog post.
     *
     * @return \Illuminate\View\View
     */
    public function wifi123(Request $request)
    {
        //
        $id = $request->input('id');
        $registrowifi = Registrolinea::findOrfail($id);

        return view('/atencion-al-cliente/ventas-wifi/crear', compact('registrowifi'));
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
        $registro=Registrolinea::findOrFail($id);
        return view('/atencion-al-cliente/ventas-linea.editar', compact('registro'));
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
        return redirect()->route('ventas-linea.index');
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
