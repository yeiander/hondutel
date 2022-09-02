<?php

namespace App\Http\Controllers\mapa;

use App\Http\Controllers\Controller;
use App\Models\Armario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class ArmarioController extends Controller
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
         $data = Armario::select('armarios.*')->orderBy('id','DESC')
         
           
           ->whereBetween('fechaSolicitudPermiso', array($request->from_date, $request->to_date));
         }
        else
        {
            $data = Armario::select('armarios.*')->orderBy('id','DESC');
        }
          return datatables()->of($data)
          
          ->addColumn('action', function ($data) {
         

           return view('/mapa-interactivo/armario.action', compact('data'));
           

       })
          
           ->rawColumns(['action'])
          ->make(true);
       }
          
   
         return view('mapa-interactivo/armario/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('mapa-interactivo/armario/crear');
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
            
            'NumeroArmario' => 'required',
            'gps_armario' => 'required',
            'barrio' => 'required',
            
        ]);


        $registroarmario = request()->except('_token');
        Armario::insert($registroarmario);
        Session::flash('notiGuardado', 'El armario a sido agregado');
       return redirect()->route('armario.index');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        return view('mapa-interactivo/armario/crear');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $armario = Armario::findOrFail($id);
        return view('mapa-interactivo/armario/editar', compact('armario'));
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
        $armario = request()->except(['_token', '_method']);
        Armario::where('id','=', $id)->update($armario);
        Session::flash('notiEditado', 'El armario ha sido editado');
        return redirect()->route('armario.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Armario::find($id)->delete();
        Session::flash('notiBorrado', 'El armario a sido borrado');
        return redirect()->route('armario.index');
        //
    }
}
