<?php

namespace App\Http\Controllers\atencionCliente;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RegistroAveria;
use App\Models\Registrowifi;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;





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
        $registros=RegistroAveria::all()->where('estado','like','etapa2');
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

    public function averiainternet(Request $request)
    {
        //
        $linea = $request->input('hola');
        //
         $registrowifi = Registrowifi::all()->where('propietarioLinea','like', $linea);
         $hola123 = DB::table('registrowifis')->select('id')->where('propietarioLinea','like', $linea)
         ->get(); 
         $registro=Registrowifi::findOrFail($hola123);

        return view('/atencion-al-cliente/internet-averia.crear', compact('registrowifi','hola123','registro'));
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
