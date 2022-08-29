<?php

namespace App\Http\Controllers\mapa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Armario;
use App\Models\CajaTerminal;
use Illuminate\Support\Facades\Session;


class CajaTerminalController extends Controller
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
         $data = CajaTerminal::with('armarios','armarios')->select('caja_terminals.*')->orderBy('id','DESC')
         
           
           ->whereBetween('fechaSolicitudPermiso', array($request->from_date, $request->to_date));
         }
        else
        {
            $data = CajaTerminal::with('armarios','armarios')->select('caja_terminals.*')->orderBy('id','DESC');
        }
          return datatables()->of($data)
          
          ->addColumn('action', function ($data) {
         

           return view('/mapa-interactivo/cajaterminal.action', compact('data'));
           

       })
          
           ->rawColumns(['action'])
          ->make(true);
       }
          
   
         return view('mapa-interactivo/cajaterminal/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //
        $armarios = Armario::all();
        return view('/mapa-interactivo/cajaterminal.crear', compact('armarios'));
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
            
            'fk_id_armario' => 'required',
            'gps_caja_terminal' => 'required',
            'direccion' => 'required',
            'descripcion' => 'required',
            
        ]);
        //
        $caja = new CajaTerminal();

       $caja->descripcion = $request->descripcion;
       $caja->direccion = $request->direccion;
       $caja->gps_caja_terminal =  $request->gps_caja_terminal;
       $caja->fk_id_armario = $request->fk_id_armario;
       $caja->save();
       Session::flash('notiGuardado', 'La caja terminal a sido agregado');
       return redirect()->route('cajaterminal.index');
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CajaTerminal::find($id)->delete();
        Session::flash('notiBorrado', 'La caja terminal a sido borrado');
        return redirect()->route('cajaterminal.index');
        //
    }
}
