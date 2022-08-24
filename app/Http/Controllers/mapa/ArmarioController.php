<?php

namespace App\Http\Controllers\mapa;

use App\Http\Controllers\Controller;
use App\Models\Armario;
use Illuminate\Http\Request;


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
        $registroarmario = request()->except('_token');
        Armario::insert($registroarmario);
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
        Armario::find($id)->delete();
        return redirect()->route('armario.index');
        //
    }
}
