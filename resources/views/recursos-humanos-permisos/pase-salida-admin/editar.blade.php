@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header" style="max-height: 4rem;">
            
            <h4 class="page__heading">Confirmar permiso</h4>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            {{-- inicio --}}
                             
                              <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                  <label id=""><h4> {{$permiso->permisos->tipoPermiso}} / {{$permiso->empleados->nombreEmpleado}}</h4></label>
                                  </div>
                              </div>
                              <div class="container" style="color:rgb(73, 73, 73)">
                                <div class="row">
                                  <div class="col-sm">
                                    {{-- <h6>Informacion del registro del usuario del mes actual</h6> --}}
                                    
                                  </div>
                                  <div class="col-sm">
                                    {{-- <h6>Informacion del registro del usuario del año actual</h6> --}}
                                  </div>
                                  
                                </div>
                              </div>                                                  
                          
                              <input id="numerotipoPermiso" name="numerotipoPermiso"  type="hidden" value="{{$permiso->permisos->id}} ">      
 <form action=" {{url('/recursos-humanos-permisos/pase-salida-admin/'.$permiso->id)}} " method="post">
   @csrf   
   {{ method_field('PATCH')}}   
   
   
  
 <div class="container">


  <div id="dia1Div" style="display: none" class="input-group mb-3">
    <div class="input-group-prepend">
      <span  style="font-weight:bold;" class="input-group-text" id="inputGroup-sizing-default">Fecha #1 del permiso:</span>
    </div>
    <input id="fechaPermisoPersonalDia1" value=" {{$permiso->fechaPermisoPersonalDia1}}"  style="font-weight:bold;" type="text" class="form-control" readonly aria-describedby="inputGroup-sizing-default">
  </div>

  <div id="dia2Div" style="display: none" class="input-group mb-3">
    <div class="input-group-prepend">
      <span  style="font-weight:bold;" class="input-group-text" id="inputGroup-sizing-default">Fecha #2 del permiso:</span>
    </div>
    <input id="fechaPermisoPersonalDia2" value=" {{$permiso->fechaPermisoPersonalDia2}}"  style="font-weight:bold;" type="text" class="form-control" readonly aria-describedby="inputGroup-sizing-default">
  </div>
  
  <div id="horasPPersonalDiv" style="display: none" class="input-group mb-3">
    <div class="input-group-prepend">
      <span  style="font-weight:bold;" class="input-group-text" id="inputGroup-sizing-default">Horas del permiso personal:</span>
    </div>
    <input id="horasPermisoPersonal" value=" {{$permiso->horasPermisoPersonal}}"  style="font-weight:bold;" type="text" class="form-control" readonly aria-describedby="inputGroup-sizing-default">
  </div>

  <div id="horaSalidaDiv" style="display: none" class="input-group mb-3">
    <div class="input-group-prepend">
      <span  style="font-weight:bold;" class="input-group-text" id="inputGroup-sizing-default">Hora de salida</span>
    </div>
    <input id="horaSalida" value=" {{$permiso->horaSalida}}"  style="font-weight:bold;" type="text" class="form-control" readonly aria-describedby="inputGroup-sizing-default">
  </div>
      
  <div id="horaEntradaAproxDiv" style="display: none" class="input-group mb-3">
    <div class="input-group-prepend">
      <span  style="font-weight:bold;" class="input-group-text" id="inputGroup-sizing-default">Hora de entrada aproximada:</span>
    </div>
    <input id="horaSalida" value=" {{$permiso->horaEntradaAproximada}}"  style="font-weight:bold;" type="text" class="form-control" readonly aria-describedby="inputGroup-sizing-default">
  </div>

      <div id="motivoDiv" style="display: none" class="input-group mb-3">
        <div class="input-group-prepend">
          <span  style="font-weight:bold;" class="input-group-text" id="inputGroup-sizing-default">Motivo del permiso:</span>
        </div>
        <input id="horaSalida" value=" {{$permiso->motivoTrabajoEnfermedad}}"  style="font-weight:bold;" type="text" class="form-control" readonly aria-describedby="inputGroup-sizing-default">
      </div>

      <div id="fechaSolicitudDiv" style="display: none" class="input-group mb-3">
        <div class="input-group-prepend">
          <span  style="font-weight:bold;" class="input-group-text" id="inputGroup-sizing-default">Fecha del permiso:</span>
        </div>
        <input id="fechaSolicitudPermiso" value=" {{$permiso->fechaSolicitudPermiso}}"  style="font-weight:bold;" type="text" class="form-control" readonly aria-describedby="inputGroup-sizing-default">
      </div>


      <div id="lugarDiv" style="display: none" class="input-group mb-3">
        <div class="input-group-prepend">
          <span  style="font-weight:bold;" class="input-group-text" id="inputGroup-sizing-default">Lugar del permiso:</span>
        </div>
        <input id="lugarSolicitudPermiso" value=" {{$permiso->lugarSolicitudPermiso}}"  style="font-weight:bold;" type="text" class="form-control" readonly aria-describedby="inputGroup-sizing-default">
      </div>

      <div style="display: none" class="input-group mb-3">
        <div class="input-group-prepend">
          <span  style="font-weight:bold;" class="input-group-text" id="inputGroup-sizing-default">Telefono de emergencia:</span>
        </div>
        <input id="telefonoEmergencia" value=" {{$permiso->telefonoEmergencia}}"  style="font-weight:bold;" type="text" class="form-control" readonly aria-describedby="inputGroup-sizing-default">
      </div>

      <div id="vehiculoDiv" style="display: none" class="input-group mb-3">
        <div class="input-group-prepend">
          <span  style="font-weight:bold;" class="input-group-text" id="inputGroup-sizing-default">Vehiculo:</span>
        </div>
        <input id="vehiculoDescripcion" value=" {{$permiso->vehiculoDescripcion}}"  style="font-weight:bold;" type="text" class="form-control" readonly aria-describedby="inputGroup-sizing-default">
      </div>

      <div id="internetDiv" style="display: none" class="input-group mb-3">
        <div class="input-group-prepend">
          <span  style="font-weight:bold;" class="input-group-text" id="inputGroup-sizing-default">Internet vendido:</span>
        </div>
        <input id="internetVendido" value=" {{$permiso->internetVendido}}"  style="font-weight:bold;" type="text" class="form-control" readonly aria-describedby="inputGroup-sizing-default">
      </div>

      <div id="telefonoDiv" style="display: none" class="input-group mb-3">
        <div class="input-group-prepend">
          <span  style="font-weight:bold;" class="input-group-text" id="inputGroup-sizing-default">Telefono vendido:</span>
        </div>
        <input id="telefonoVendido" value=" {{$permiso->telefonoVendido}}"  style="font-weight:bold;" type="text" class="form-control" readonly aria-describedby="inputGroup-sizing-default">
      </div>

      <div style="display: none" class="input-group mb-3">
        <div class="input-group-prepend">
          <span  style="font-weight:bold;" class="input-group-text" id="inputGroup-sizing-default">Linea vendida:</span>
        </div>
        <input id="lineaVendida" value=" {{$permiso->lineaVendida}}"  style="font-weight:bold;" type="text" class="form-control" readonly aria-describedby="inputGroup-sizing-default">
      </div>

      <div style="display: none" class="input-group mb-3">
        <div class="input-group-prepend">
          <span  style="font-weight:bold;" class="input-group-text" id="inputGroup-sizing-default">Certificado de incapacidad:</span>
        </div>
        <input id="numCertificadoIncapacidad" value=" {{$permiso->numCertificadoIncapacidad}}"  style="font-weight:bold;" type="text" class="form-control" readonly aria-describedby="inputGroup-sizing-default">
      </div>

      <div style="display: none" class="input-group mb-3">
        <div class="input-group-prepend">
          <span  style="font-weight:bold;" class="input-group-text" id="inputGroup-sizing-default">Numero de afiliacion:</span>
        </div>
        <input id="numAfiliacionIncapacidad" value=" {{$permiso->numAfiliacionIncapacidad}}"  style="font-weight:bold;" type="text" class="form-control" readonly aria-describedby="inputGroup-sizing-default">
      </div>

      <div style="display: none" class="input-group mb-3">
        <div class="input-group-prepend">
          <span  style="font-weight:bold;" class="input-group-text" id="inputGroup-sizing-default">Fecha de inicio de incapacidad:</span>
        </div>
        <input id="fechaInicioIncapacidad" value=" {{$permiso->fechaInicioIncapacidad}}"  style="font-weight:bold;" type="text" class="form-control" readonly aria-describedby="inputGroup-sizing-default">
      </div>
        
      <div style="display: none" class="input-group mb-3">
        <div class="input-group-prepend">
          <span  style="font-weight:bold;" class="input-group-text" id="inputGroup-sizing-default">Fecha final de incapacidad:</span>
        </div>
        <input id="fechafinalIncapacidad" value=" {{$permiso->fechafinalIncapacidad}}"  style="font-weight:bold;" type="text" class="form-control" readonly aria-describedby="inputGroup-sizing-default">
      </div>

      <div style="display: none" class="input-group mb-3">
        <div class="input-group-prepend">
          <span  style="font-weight:bold;" class="input-group-text" id="inputGroup-sizing-default">Total dias de incapacidad:</span>
        </div>
        <input id="totalDiasIncapacidad" value=" {{$permiso->totalDiasIncapacidad}}"  style="font-weight:bold;" type="text" class="form-control" readonly aria-describedby="inputGroup-sizing-default">
      </div>

      <div style="display: none" class="input-group mb-3">
        <div class="input-group-prepend">
          <span  style="font-weight:bold;" class="input-group-text" id="inputGroup-sizing-default">hss FALTA PREGUNTAR:</span>
        </div>
        <input id="hss" value=" {{$permiso->hss}}"  style="font-weight:bold;" type="text" class="form-control" readonly aria-describedby="inputGroup-sizing-default">
      </div>

      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span  style="font-weight:bold;" class="input-group-text" id="inputGroup-sizing-default">Creado por:</span>
        </div>
        <input id="fk_id_user" value=" {{$permiso->nombreQuienCreo}}"  style="font-weight:bold;" type="text" class="form-control" readonly aria-describedby="inputGroup-sizing-default">
      </div>

         <input class="form-control" type="hidden" name="aprobacion"  id="aprobacion" value="aprobado">
        </div>
     </div>

     <input type = "hidden" name="nombreQuienAprobo" id="nombreQuienCreo" value="{{\Illuminate\Support\Facades\Auth::user()->name}}">

     

      
        <div class="col-xs-12 col-sm-12 col-md-12">
        <ul class="list-unstyled">
  
            <div class="media-body">
              {{-- <a class="btn btn-warning" href="">cancelar</a> --}}
      <input  type="submit"  class="btn btn-primary" value="Aprobar">
            </div>

 </form>


                              
                                 
                                
                            {{-- final --}}

                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @section('scripts')
    <script>
     //Ocultar o mostrar dependiendo el tipo de permiso
      var  tipoDePermiso = document.getElementsByName("numerotipoPermiso")[0].value
     $(function(){
      // pase de salida
       if(tipoDePermiso == 1){
        $('#horaSalidaDiv').show();
        $('#horaEntradaAproxDiv').show();
        $('#motivoDiv').show();
        $('#fechaSolicitudDiv').show();
        $('#lugarDiv').show();
       }
       // permiso personal
       else if(tipoDePermiso == 2){
        
        $('#dia1Div').show();
        $('#dia2Div').show();
        $('#horasPPersonalDiv').show();
        $('#motivoDiv').show();
        $('#fechaSolicitudDiv').show();
        $('#lugarDiv').show();
       }
        // permiso administrativo
       else if(tipoDePermiso == 3){
        $('#horaSalidaDiv').show();
        $('#horaEntradaAproxDiv').show();
        $('#motivoDiv').show();
        $('#fechaSolicitudDiv').show();
        $('#lugarDiv').show();
       }
         // permiso de ventas
       else if(tipoDePermiso == 4){
        $('#horaSalidaDiv').show();
        $('#horaEntradaAproxDiv').show();
        $('#motivoDiv').show();
        $('#fechaSolicitudDiv').show();
        $('#lugarDiv').show();
        $('#vehiculoDiv').show();
        $('#internetDiv').show();
        $('#telefonoDiv').show();
       }



       
     });
    </script>
    @endsection
@endsection
