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
                                  <label id=""><h4> {{$permiso->rhTipoPermisos->tipoPermiso}} / {{$permiso->empleados->nombreEmpleado}}</h4></label>
                                  </div>
                              </div>
                              <div class="container" style="color:rgb(73, 73, 73)">
                                <div class="row">
                                  <div class="col-sm">
                                    <h6>Informacion del registro del usuario del mes actual</h6>
                                    
                                  </div>
                                  <div class="col-sm">
                                    <h6>Informacion del registro del usuario del año actual</h6>
                                  </div>
                                  
                                </div>
                              </div>    <br><br>                                                 
                          
                              <input id="hola" name="hola" type="hidden" value="{{$permiso->rhTipoPermisos->id}} ">      
 <form action=" {{url('/recursos-humanos-permisos/pase-salida-admin/'.$permiso->id)}} " method="post">
   @csrf   
   {{ method_field('PATCH')}}                              
 <div class="container">

     

      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-inline">
         <div class="form-group">
          <label id="horaSalida"><h6>Hora de salida:</h6></label>
          <label id="horaSalida1"><h6 style="color: blue; margin-left:1rem;">  {{$permiso->horaSalida}} </h6></label>
         </div>
          </div>
      </div><br>

      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-inline">
         <div class="form-group">
          <label id="id"><h6>Hora de entrada aproximada:</h6></label>
          <label id="id1"><h6 style="color: blue; margin-left:1rem;">  {{$permiso->horaEntradaAproximada}} </h6></label>
         </div>
          </div>
      </div><br>

      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-inline">
         <div class="form-group">
          <label id="motivoTrabajoEnfermedad"><h6>Motivo del permiso:</h6></label>
          <label id="motivoTrabajoEnfermedad1"><h6 style="color: blue; margin-left:1rem;">  {{$permiso->motivoTrabajoEnfermedad}} </h6></label>
         </div>
          </div>
      </div><br>

      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-inline">
         <div class="form-group">
          <label id="fechaPermisoPersonalDia1"><h6>Fecha #1 del permiso:</h6></label>
          <label id="fechaPermisoPersonalDia11"><h6 style="color: blue; margin-left:1rem;">  {{$permiso->fechaPermisoPersonalDia1}} </h6></label>
         </div>
          </div>
      </div><br>

      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-inline">
         <div class="form-group">
          <label id="fechaPermisoPersonalDia2"><h6>Fecha #2 del permiso:</h6></label>
          <label id="fechaPermisoPersonalDia21"><h6 style="color: blue; margin-left:1rem;">  {{$permiso->fechaPermisoPersonalDia2}} </h6></label>
         </div>
          </div>
      </div><br>

      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-inline">
         <div class="form-group">
          <label id="horasPermisoPersonal"><h6>Horas totales del permiso:</h6></label>
          <label id="horasPermisoPersonal1"><h6 style="color: blue; margin-left:1rem;">  {{$permiso->horasPermisoPersonal}} </h6></label>
         </div>
          </div>
      </div><br>

      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-inline">
         <div class="form-group">
          <label id="vehiculoDescripcion"><h6>Vehiculo:</h6></label>
          <label id="vehiculoDescripcion1"><h6 style="color: blue; margin-left:1rem;">  {{$permiso->vehiculoDescripcion}} </h6></label>
         </div>
          </div>
      </div><br>

      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-inline">
         <div class="form-group">
          <label id="internetVendido"><h6>Internet vendido:</h6></label>
          <label id="internetVendido1"><h6 style="color: blue; margin-left:1rem;">  {{$permiso->internetVendido}} </h6></label>
         </div>
          </div>
      </div><br>

      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-inline">
         <div class="form-group">
          <label id="telefonoVendido"><h6>Internet vendido:</h6></label>
          <label id="telefonoVendido1"><h6 style="color: blue; margin-left:1rem;">  {{$permiso->telefonoVendido}} </h6></label>
         </div>
          </div>
      </div><br>

      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-inline">
         <div class="form-group">
          <label id="lineatVendida"><h6>Linea vendida:</h6></label>
          <label id="lineatVendida1"><h6 style="color: blue; margin-left:1rem;">  {{$permiso->lineatVendida}} </h6></label>
         </div>
          </div>
      </div><br>

      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-inline">
         <div class="form-group">
          <label id="lineatVendida"><h6>Linea vendida:</h6></label>
          <label id="lineatVendida1"><h6 style="color: blue; margin-left:1rem;">  {{$permiso->lineatVendida}} </h6></label>
         </div>
          </div>
      </div><br>


          {{-- ??????/ --}}
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-inline">
         <div class="form-group">
          <label id="fechaSolicitudPermiso"><h6>Fecha de solicitud:</h6></label>
          <label id="fechaSolicitudPermiso1"><h6 style="color: blue; margin-left:1rem;">  {{$permiso->fechaSolicitudPermiso}} </h6></label>
         </div>
          </div>
      </div><br>
        
         
         <input class="form-control" type="hidden" name="aprobacion"  id="aprobacion" value="aprobado">
        </div>
     </div>

        <br>
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
      // $('#hola').hide();
      var  tipoDePermiso = document.getElementsByName("hola")[0].value;
      console.log(tipoDePermiso);
     $(function(){
      
       if(tipoDePermiso == 4){
        // $('#internetVendido').hide();
       }
       
     });
    </script>
    @endsection
@endsection
