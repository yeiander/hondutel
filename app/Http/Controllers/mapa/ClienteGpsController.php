<?php

namespace App\Http\Controllers\mapa;

use App\Http\Controllers\Controller;
use App\Models\MapaCliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Armario;
use App\Models\CajaTerminal;

class ClienteGpsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(request()->ajax())
        {
       if(!empty($request->from_date))
        {
         $data = MapaCliente::select('mapa_clientes.*')->orderBy('id','DESC')
         
           
           ->whereBetween('fechaSolicitudPermiso', array($request->from_date, $request->to_date));
         }
        else
        {
            $data = MapaCliente::select('mapa_clientes.*')->orderBy('id','DESC');
        }
          return datatables()->of($data)
          
          ->addColumn('action', function ($data) {
         

           return view('/mapa-interactivo/clientegps.action', compact('data'));
           

       })
          
           ->rawColumns(['action'])
          ->make(true);
       }
          
   
       
        return view('/mapa-interactivo/clientegps.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('/mapa-interactivo/clientegps.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            
            'cliente' => 'required',
            'direccion' => 'required',
            'gps' => 'required',
            'contacto' => 'required',
            'telefono' => 'required',
            
            
            
        ]);


        $registrocliente = request()->except('_token');
        MapaCliente::insert($registrocliente);
        Session::flash('notiGuardado', 'El cliente a sido agregado');
       return redirect()->route('clientegps.index');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $cliente = MapaCliente::findOrFail($id);
        return view('mapa-interactivo/clientegps/editar', compact('cliente'));
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
        $cliente = request()->except(['_token', '_method']);
        MapaCliente::where('id','=', $id)->update($cliente);
        Session::flash('notiEditado', 'El cliente ha sido editado');
        return redirect()->route('clientegps.index');
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
        MapaCliente::find($id)->delete();
        Session::flash('notiBorrado', 'El cliente a sido borrado');
        return redirect()->route('clientegps.index');
    }
}
