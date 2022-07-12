@extends('layouts.app')

@section('content')
    <section class="">
        <div class="section-header" style="max-height: 4rem;">
        </div>
        <div class="section-body">
            
            <center><h4 id="paseSalidaMensaje">Editar el pase de salida:</h4></center>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">        
                      
                            <div class="col-xs-12 col-sm-12 col-md-12">
                              <div class="form-group">
                                <label  style="font-size:17px; font-weight:bold; color:rgb(92, 92, 92)"  for="nombreEmpleado">Empleado: {{$permiso->empleados->nombreEmpleado}}</label>
                              </div>
                            </div>
  
  {{-- @if ($errors->any())
    <div class="alert alert-dark alert-dismissible fade show" role="alert">
      <strong>Complete los campos</strong>
        @foreach($errors->all() as $error)
          <span class="badge badge-danger">{{$error}}</span>
        @endforeach
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
    </div>
  @endif --}}
                                            {{-- FORMULARIO PARA CREAR UN PASE DE SALIDA                       --}}

                                         
                               <form id="form" action=" {{url('/recursos-humanos-permisos/pase-salida/'.$permiso->id)}} " method="post">
                                 @csrf
                                 {{ method_field('PATCH')}}   
                                
                                 
                                 
                                 <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     {{-- INICIO --}}
                                     <div class="col-xs-12 col-sm-12 col-md-12">
                                      <div class="form-group">
                                        <label  style="font-size:16px; font-weight:bold; color:rgb(92, 92, 92)"  for="fk_id_empleado">Numero personal:</label>
                                        <input  style="font-size:16px;" readonly value="{{$permiso->empleados->id}}" class="form-control" type="text" name="fk_id_empleado" id="fk_id_empleado">
                                      </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                      <div class="form-group">
                                        <label  style="font-size:16px; font-weight:bold; color:rgb(92, 92, 92)"  for="horaSalida" required>Hora de salida:</label>
                                        <input  style="font-size:16px;" class="form-control" type="time" value="{{$permiso->horaSalida}}" name="horaSalida" id="horaSalida" required>
                                      </div>
                                    </div>

                                  <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                      <label style="font-size:16px; font-weight:bold; color:rgb(92, 92, 92)"  for="horaEntradaAproximada">Hora de entrada (aproximada):</label> 
                                     <input  style="font-size:16px;" class="form-control" type="time" value="{{$permiso->horaEntradaAproximada}}" name="horaEntradaAproximada" id="horaEntradaAproximada" required>
                                    </div>
                                 </div>
                                     {{-- FIN --}}
                                    </div>
                                    <div class="col-sm">
                                       {{-- INICIO --}}

                                       <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                          <label style="font-size:16px; font-weight:bold; color:rgb(92, 92, 92)"  for="motivoTrabajoEnfermedad">Motivo del permiso:</label>
                                          <input style="font-size:14px;" class="form-control" type="text" value="{{$permiso->motivoTrabajoEnfermedad}}" name="motivoTrabajoEnfermedad" id="motivoTrabajoEnfermedad" required>
                                        </div>
                                     </div>

                                     <div class="col-xs-12 col-sm-12 col-md-12">
                                      <div class="form-group"> 
                                        <label style="font-size:16px; font-weight:bold; color:rgb(92, 92, 92)"  for="fechaSolicitudPermiso" required>Fecha de solicitud</label>
                                        <input style="font-size:16px;" class="form-control" type="date" value="{{$permiso->fechaSolicitudPermiso}}" name="fechaSolicitudPermiso" id="fechaSolicitudPermiso" required>
                                      </div>
                                    </div>

                                     <div class="col-xs-12 col-sm-12 col-md-12">
                                      <div class="form-group">
                                        <label  style="font-size:16px; font-weight:bold; color:rgb(92, 92, 92)"  for="lugarSolicitudPermiso" required>Lugar:</label>
                                          <select class="form-control" id="lugarSolicitudPermiso" value="{{$permiso->lugarSolicitudPermiso}}" name="lugarSolicitudPermiso">
                                            <option value="Juticalpa">Juticalpa</option>
                                          </select>
                                      </div>
                                    </div>
                                     {{-- FIN --}}
                                    </div>
                                  </div>
                                    <br>
                                    <ul class="list-unstyled">
                                        <div class="media-body">
                                          <input class="btn btn-primary btn-lg" id="botonGuardar"  type="submit"  style="font-size: 15px" class="btn btn-primary" value="Confirmar" >
                                        </div>
                                      </ul>
                               </form>
                               
                            </div>
                            {{-- final --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
@endsection

