<?php

namespace App\Http\Controllers\rhumanos;

use App\Http\Controllers\Controller;
use App\Models\RhPermiso;
use App\Models\Empleado;
use Illuminate\Http\Request;
//agregare para el control de usuarios con Spatie:
use Spatie\Permission\Models\Role;

use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Carbon;



class PaseSalidaController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:ver-permiso|crear-permiso|editar-permiso|borrar-permiso',['only'=>['index']]);
        $this->middleware('permission:crear-permiso',['only'=>['create','store']]);
        $this->middleware('permission:editar-permiso',['only'=>['edit','update']]);
        $this->middleware('permission:borrar-permiso',['only'=>['destroy']]);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $permisos = RhPermiso::all()->where('aprobacion', 'like', 'almacenado',)->where('fk_id_tipo_permiso','like','1');
        return view('/recursos-humanos-permisos/pase-salida.index', compact('permisos'));

    }

    //AQUI ESTARA EL INDEX DE LOS PASES DE SALIDA PENDIENTE
    public function pendiente()
    {
        //
        // $permisos = RhPermiso::all()->where('aprobacion', 'like', 'almacenado',);
        // return view('/recursos-humanos-permisos/pase-salida.index', compact('permisos'));
        $permisos = RhPermiso::all()->where('aprobacion', 'like', 'almacenado',)->where('fk_id_tipo_permiso','like','1');
        return view('/recursos-humanos-permisos/pase-salida', compact('permisos'));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        // esto me llevara los valores de empleados a los formularios
        $permisos = RhPermiso::all();
        $empleados = Empleado::all();
        
        return view('/recursos-humanos-permisos/pase-salida.crear', compact('empleados', 'permisos'));
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
            
            'fk_id_empleado' => 'required',
            'horaSalida' => 'required',
            'horaEntradaAproximada' => 'required',
            'motivoTrabajoEnfermedad' => 'required',
            'fechaSolicitudPermiso' => 'required',
            'lugarSolicitudPermiso' => 'required'
        ]);

        
        $datosPaseSalida = request()->except('_token');
        RhPermiso::insert($datosPaseSalida);
        $permisos = RhPermiso::all();
        return redirect()->route('recursos_humanos');

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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit2(Request $request)
    {
        //
        $validated = $request->validate([
            
            
            'fk_id_empleado' => 'required|exists:empleados,id',
           
        ]);
        
        $mes = Carbon::now()->format('m');
        $annio = Carbon::now();
        $annio = $annio->format('Y');
                
        $id = $request->input('fk_id_empleado');
        $empleado = Empleado::findOrFail($id);
        $individual= RhPermiso::where('fk_id_empleado', 'like', $id)->whereYear('fechaSolicitudPermiso', '=', $annio)
        ->whereMonth('fechaSolicitudPermiso', '=', $mes)->count();
    
        return view('/recursos-humanos-permisos/pase-salida/crear', compact('empleado', 'individual', 'mes', 'annio'));
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

    public function imprimir($id)
    {   
        $permiso = RhPermiso::find($id);
        // return view('pdf.reportePaseSalida', compact('permisos'));
        // $data = compact('permisos');
        // $pdf = PDF::loadView('pdf.reportePaseSalida',['permisos'=>$permisos]);
        // return $pdf->stream();
         $vista = view('pdf.reportePaseSalida')
                      ->with('permiso', $permiso);

                      $pdf = PDF::loadHTML($vista);

                      return $pdf->stream('nombre.pdf');

        
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
        
    }
}
