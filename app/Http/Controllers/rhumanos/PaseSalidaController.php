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
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Session;

class PaseSalidaController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:recursos-humanos-ver|recursos-humanos-editar|recursos-humanos-borrar',['only'=>['index','creacion']]);
        $this->middleware('permission:recursos-humanos-crear',['only'=>['create','store']]);
        $this->middleware('permission:recursos-humanos-editar',['only'=>['edit','update']]);
        $this->middleware('permission:recursos-humanos-borrar',['only'=>['destroy']]);
    }

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
          $data = RhPermiso::with('empleados')->select('rh_permisos.*')->orderBy('id','DESC')
            ->where('aprobacion', 'like', 'almacenado')
            ->where('fk_id_tipo_permiso', 'like', 1)
            ->whereBetween('fechaSolicitudPermiso', array($request->from_date, $request->to_date));
          }
         else
         {
            $data = RhPermiso::with('empleados')->select('rh_permisos.*')->orderBy('id','DESC')
            ->where('fk_id_tipo_permiso', 'like', 1)
            ->where('aprobacion', 'like', 'almacenado');
            
         }
           return datatables()->of($data)
           
           ->addColumn('action', function ($data) {
          

            return view('/recursos-humanos-permisos/pase-salida.action', compact('data'));
            

        })
           
            ->rawColumns(['action'])
           ->make(true);
        }
           return view('/recursos-humanos-permisos/pase-salida.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validated = $request->validate([
            
            'horaSalida' => 'required',
            'horaEntradaAproximada' => 'required',
            'motivoTrabajoEnfermedad' => 'required',
            'fechaSolicitudPermiso' => 'required',
            'lugarSolicitudPermiso' => 'required'
        ]);
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
            
           
            'horaSalida' => 'required',
            'horaEntradaAproximada' => 'required',
            'motivoTrabajoEnfermedad' => 'required',
            'fechaSolicitudPermiso' => 'required',
            'lugarSolicitudPermiso' => 'required'
        ]);

        $fecha = Carbon::now()->format('Y-m-d');
        $semanaNum=date('W',strtotime($fecha));


        $id = $request->input('fk_id_empleado');
        
        $permiso= RhPermiso::where('fk_id_empleado', 'like', $id)
        ->where('aprobacion', 'like', 'pendiente')
        ->where('fk_id_tipo_permiso', 'like', 1)->count();

        if($permiso >= 1){
           
             Session::flash('notiPaseSalida', 'El empleado ya tiene un pase de salida pendiente');

       
             return redirect()->route('recursos-h-tipos-de-permisos'); 
            
        }


        else{

        $permiso = new Rhpermiso;
        $permiso->fk_id_empleado = $request->fk_id_empleado;
        $permiso->semanaSolicitudPermiso = $semanaNum;
        $permiso->aniioSolicitudPermiso = $fecha;
        $permiso->fk_id_tipo_permiso = 1;
        $permiso->aprobacion = 'pendiente';
        $permiso->horaSalida = $request->horaSalida;
        $permiso->horaEntradaAproximada =  $request->horaEntradaAproximada;
        $permiso->motivoTrabajoEnfermedad = $request->motivoTrabajoEnfermedad;
        $permiso->fechaSolicitudPermiso = $request->fechaSolicitudPermiso;
        $permiso->lugarSolicitudPermiso = $request->lugarSolicitudPermiso;
        $permiso->nombreQuienCreo =  (\Illuminate\Support\Facades\Auth::user()->name);
        $permiso->save();
        Session::flash('notiEnviado', 'El permiso ha sido enviado');
        return redirect()->route('recursos_humanos');

        }
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
        $permiso = RhPermiso::findOrFail($id);
        
        return view('/recursos-humanos-permisos/pase-salida/editar', compact('permiso'));


    }

    /**
     * Show the form to create a new blog post.
     *
     * @return \Illuminate\View\View
     */
    public function creacion(Request $request)
    {
        //
        $validated = $request->validate([
            
            'fk_id_empleado' => 'required|exists:empleados,id',

        ]);

        $fecha = Carbon::now()->format('Y-m-d');
        $mes = Carbon::now()->format('m');
        $annio = Carbon::now();
        $annio = $annio->format('Y');
        $dia = carbon::now()->format('d');        
        $id = $request->input('fk_id_empleado');
        $empleado = Empleado::findOrFail($id);
        $semanaNum=date('W',strtotime($fecha));

        $individual= RhPermiso::where('fk_id_empleado', 'like', $id)
        ->where('aprobacion', 'like', 'almacenado')
        ->where('fk_id_tipo_permiso', 'like', 1)
        ->whereYear('fechaSolicitudPermiso', '=', $annio)
        ->whereMonth('fechaSolicitudPermiso', '=', $mes)->count();

        $individual2= RhPermiso::where('fk_id_empleado', 'like', $id)
        ->where('aprobacion', 'like', 'almacenado')
        ->where('fk_id_tipo_permiso', 'like', 1)
        ->where('aniioSolicitudPermiso', 'like', $fecha)
        ->where('semanaSolicitudPermiso', '=', $semanaNum)->count();

        $permiso= RhPermiso::where('fk_id_empleado', 'like', $id)
        ->where('aprobacion', 'like', 'almacenado')
        ->where('fk_id_tipo_permiso', 'like', 1)
        ->where('aniioSolicitudPermiso', 'like', $fecha)
        ->where('semanaSolicitudPermiso', '=', $semanaNum)->count();

        if($permiso >= 2){
           
             Session::flash('notiPaseSalidaSemana', 'debe esperar la siguiente semana');
             return redirect()->route('recursos-h-tipos-de-permisos'); 
        

        }
        
        else{

        return view('/recursos-humanos-permisos/pase-salida/crear', compact('empleado', 'individual', 'mes', 'annio', 'dia','semanaNum', 'individual2'));
        }
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

        $permiso = request()->except(['_token', '_method']);
        RhPermiso::where('id','=', $id)->update($permiso);
        Session::flash('notiEditado', 'El permiso ha sido editado');
        return redirect()->route('pase-salida.index');
    
    }

    public function imprimir()
    {   
        // $permiso = RhPermiso::find($id);
        // return view('pdf.reportePaseSalida', compact('permisos'));
        // $data = compact('permisos');
        // $pdf = PDF::loadView('pdf.reportePaseSalida',['permisos'=>$permisos]);
        // return $pdf->stream();
        //  $vista = view('pdf.reportePaseSalida')
        //               ->with('permiso', $permiso);

        //               $pdf = PDF::loadHTML($vista);

        //               return $pdf->stream('nombre.pdf');

              $pdf = PDF::loadView('/recursos-humanos-permisos/pase-salida.imprimir');
              return $pdf->stream('reporte.pdf');
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
        Rhpermiso::find($id)->delete();
        Session::flash('notiBorrado', 'El permiso ha sido borrado');
        return redirect()->route('pase-salida.index');
    }
}
