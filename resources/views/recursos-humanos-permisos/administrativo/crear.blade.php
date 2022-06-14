@extends('layouts.app')

@section('content')
  <section class="">
    <div class="section-header"  style="max-height: 3rem;">
      {{-- <h3 class="page__heading">Recursos Humanos:</h3> --}}
       </div>
        <div class="section-body">
       
          <center><h4>Crear un permiso administrativo</h4></center>
           <a style="font-size: 15px"   style="margin-top: 0.5rem" type="" class="btn btn-primary">
          Numero de permisos en este mes<span style="font-size: 15px" class="badge badge-light">{{ $individual }}</span>
        </a>
         
            <div class="row">
               <div class="col-lg-12">
                  <div class="card">
                     <div class="card-body">
                                                {{-- inicio --}}
                           

                                                @if ($errors->any())
                                                <div class="alert alert-dark alert-dismissible fade show" role="alert">
                                                  <strong>Complete los campos</strong>
                                                    @foreach($errors->all() as $error)
                                                      <span class="badge badge-danger">{{$error}}</span>
                                                    @endforeach
                                                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                       <span aria-hidden="true">&times;</span>
                                                     </button>
                                                </div>
                                              @endif

                                              <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                  <label  style="font-size:17px; font-weight:bold; color:rgb(92, 92, 92)"  for="nombreEmpleado">Nombre: {{ $empleado->nombreEmpleado }}</label>
                                                </div>
                                              </div>
                            
                                 {{-- FORMULARIO PARA CREAR UN PASE DE SALIDA                       --}}
                     <form action=" {{url('/recursos-humanos-permisos/administrativo')}} " method="post">
                      @csrf
                        <input type = "hidden" name="fk_id_tipo_permiso" id="fk_id_tipo_permiso" value="3">
                 
                                    <br>
                                    <div class="container">
                                      <div class="row">
                                        <div class="col-sm">
                                         {{-- INICIO --}}

                                         <div class="col-xs-12 col-sm-12 col-md-12">
                                          <div class="form-group">
                                            <label  style="font-size:16px; font-weight:bold; color:rgb(92, 92, 92)"  for="fk_id_empleado">Numero personal:</label>
                                            <input  style="font-size:16px;" readonly value="{{ $empleado->id }}" class="form-control" type="text" name="fk_id_empleado" id="fk_id_empleado" required>
                                          </div>
                                        </div>
    
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                          <div class="form-group">
                                            <label  style="font-size:16px; font-weight:bold; color:rgb(92, 92, 92)"  for="horaSalida">Hora de salida:</label>
                                            <input  style="font-size:16px;" class="form-control" type="time" name="horaSalida" id="horaSalida" required>
                                          </div>
                                        </div>
    
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                          <div class="form-group">
                                            <label style="font-size:16px; font-weight:bold; color:rgb(92, 92, 92)"  for="horaEntradaAproximada">Hora de entrada (aproximada):</label> 
                                           <input  style="font-size:16px;" class="form-control" type="time" name="horaEntradaAproximada" id="horaEntradaAproximada" required>
                                          </div>
                                       </div>

                                         {{-- FIN --}}
                                        </div>
                                        <div class="col-sm">
                                           {{-- INICIO --}}
    
                                           <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                               <label style="font-size:16px; font-weight:bold; color:rgb(92, 92, 92)"  for="motivoTrabajoEnfermedad">Trabajo a realizar:</label>
                                               <input style="font-size:14px;" class="form-control" type="text" name="motivoTrabajoEnfermedad" id="motivoTrabajoEnfermedad" required>
                                             </div>
                                          </div>

                                          <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group"> 
                                              <label style="font-size:16px; font-weight:bold; color:rgb(92, 92, 92)"  for="fechaSolicitudPermiso">Fecha de solicitud</label>
                                              <input style="font-size:14px;" class="form-control" type="date" name="fechaSolicitudPermiso" id="fechaSolicitudPermiso" required>
                                          </div>
                                          </div>
    
                                        
    
                                       <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                         <label  style="font-size:16px; font-weight:bold; color:rgb(92, 92, 92)"  for="lugarSolicitudPermiso">Lugar:</label>
                                         <select class="form-control" id="lugarSolicitudPermiso" name="lugarSolicitudPermiso">
                                           
                                             <option value="Juticalpa">Juticalpa</option>
                                           
                                           </select>
                                        </div>
                                      </div>


                                         {{-- FIN --}}
                                        </div>
                                      </div>
    


                                    <ul class="list-unstyled">
                              
                                        <div class="media-body">
                                          {{-- <a class="btn btn-warning" href="{{ route('pase-salida.index') }}">cancelar</a> --}}
                                  <input  type="submit"  class="btn btn-primary" value="Guardar">
                                
                                        </div>
                               </form>
                                 
                               {{-- final --}}
                              
                            </div>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
              {{-- ocultar input --}}
    <script>
  function myFunction() {
       var horasPermisoPersonal = parseFloat(document.getElementById('horasPermisoPersonal').value);
       

      if (horasPermisoPersonal = 16) {
        document.getElementById("fechaPermisoPersonalDia2").type = "date";
      } else {
        document.getElementById("fechaPermisoPersonalDia2").style.display = "none";
      }
    }
    </script>
{{-- ocultar input fin --}}
@endsection

