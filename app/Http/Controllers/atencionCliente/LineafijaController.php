<?php

namespace App\Http\Controllers\atencionCliente;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RegistroAveria;
use Barryvdh\DomPDF\Facade\Pdf;

class LineafijaController extends Controller
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
        return view('/atencion-al-cliente/linea-fija.index', compact('registros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('/atencion-al-cliente/linea-fija.crear');
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
         RegistroAveria::insert($registrolinea);
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
        return view('/atencion-al-cliente/linea-fija.editar', compact('registro'));
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

        return redirect()->route('linea-fija.index');
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
        return redirect()->route('linea-fija.index');
    }

    public function imprimir($id)
    {
        //
        $lineafija = RegistroAveria::find($id);

        $vista = view('pdf/pdf-atencion-cliente.reporte-lineafija')
        ->with('linea-fija', $lineafija);

        $pdf = PDF::loadHTML($vista);
        
        return $pdf->stream('nombre.pdf');
        
    }
}
