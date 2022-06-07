@extends('layouts.app')

@section('content')
    <section class="">
        <div class="section-header" style="max-height: 4rem;">
        </div>
        <div class="section-body">
       
            <center><h4>Crear un pase de salida:</h4></center>
            
        <a style="font-size: 15px"   style="margin-top: 0.5rem" type="" class="btn btn-primary">
          Numero de permisos en este mes<span style="font-size: 15px" class="badge badge-light">{{ $individual }}</span>
        </a>
        
        
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">        
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
                               <form action=" {{url('/recursos-humanos-permisos/pase-salida')}} " method="post">
                                 @csrf
                                 <input type = "hidden" name="fk_id_tipo_permiso" id="fk_id_tipo_permiso" value="1">
                                 
                                 <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     {{-- INICIO --}}
                                     <div class="col-xs-12 col-sm-12 col-md-12">
                                      <div class="form-group">
                                        <label  style="font-size:16px; font-weight:bold; color:rgb(92, 92, 92)"  for="fk_id_empleado">Numero personal:</label>
                                        <input  style="font-size:16px;" readonly value="{{ $empleado->id }}" class="form-control" type="text" name="fk_id_empleado" id="fk_id_empleado">
                                      </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                      <div class="form-group">
                                        <label  style="font-size:16px; font-weight:bold; color:rgb(92, 92, 92)"  for="horaSalida">Hora de salida:</label>
                                        <input  style="font-size:16px;" class="form-control" type="time" name="horaSalida" id="horaSalida">
                                      </div>
                                    </div>

                                   <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group"> 
                                      <label style="font-size:16px; font-weight:bold; color:rgb(92, 92, 92)"  for="fechaSolicitudPermiso">Fecha de solicitud</label>
                                      <input style="font-size:16px;" class="form-control" type="date" name="fechaSolicitudPermiso" id="fechaSolicitudPermiso">
                                    </div>
                                  </div>
                                     {{-- FIN --}}
                                    </div>
                                    <div class="col-sm">
                                       {{-- INICIO --}}

                                       <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                          <label style="font-size:16px; font-weight:bold; color:rgb(92, 92, 92)"  for="motivoTrabajoEnfermedad">Motivo del permiso:</label>
                                          <input style="font-size:14px;" class="form-control" type="text" name="motivoTrabajoEnfermedad" id="motivoTrabajoEnfermedad">
                                        </div>
                                     </div>

                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                          <label style="font-size:16px; font-weight:bold; color:rgb(92, 92, 92)"  for="horaEntradaAproximada">Hora de entrada (aproximada):</label> 
                                         <input  style="font-size:16px;" class="form-control" type="time" name="horaEntradaAproximada" id="horaEntradaAproximada">
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
                               

                                
                                  
                                 
                                 
                                 
                                 
                                 

                                 
                                  
                                 
                  
                                    <br>
                                    <ul class="list-unstyled">
                                        <div class="media-body">
                                          <input  type="submit"  class="btn btn-primary" value="Guardar">
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

