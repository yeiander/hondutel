@extends('layouts.app')

@section('content')
  <section class="">
    <div class="section-header"  style="max-height: 3rem;">
      {{-- <h3 class="page__heading">Recursos Humanos:</h3> --}}
       </div>
        <div class="section-body">
       
          <center><h4>Crear un permiso de ventas</h4></center>
          <a style="font-size: 15px"   style="margin-top: 0.5rem" type="" class="btn btn-primary">
            Numero de permisos en este mes<span style="font-size: 15px" class="badge badge-light">{{ $individual }}</span>
          </a>
         
            <div class="row">
               <div class="col-lg-12">
                  <div class="card">
                     <div class="card-body">
                                                {{-- inicio --}}
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                  <div class="form-group">
                                                    <label  style="font-size:17px; font-weight:bold; color:rgb(92, 92, 92)"  for="nombreEmpleado">Nombre: {{ $empleado->nombreEmpleado }}</label>
                                                  </div>
                                                </div>
                           
         
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
                            
                                 {{-- FORMULARIO PARA CREAR UN PASE DE SALIDA                       --}}
                     <form action=" {{url('/recursos-humanos-permisos/ventas-rc')}} " method="post">
                      @csrf
                        <input type = "hidden" name="fk_id_tipo_permiso" id="fk_id_tipo_permiso" value="4">
                                 
                                 
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
                                <label style="font-size:16px; font-weight:bold; color:rgb(92, 92, 92)"  for="horaEntradaAproximada">Hora de entrada (aproximada):</label> 
                               <input  style="font-size:16px;" class="form-control" type="time" name="horaEntradaAproximada" id="horaEntradaAproximada">
                              </div>
                           </div>

                           

                          <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                               <label style="font-size:16px; font-weight:bold; color:rgb(92, 92, 92)"  for="motivoTrabajoEnfermedad">Trabajo a realizar:</label>
                               <input style="font-size:14px;" class="form-control" type="text" name="motivoTrabajoEnfermedad" id="motivoTrabajoEnfermedad">
                             </div>
                          </div>

                          <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                               <label style="font-size:16px; font-weight:bold; color:rgb(92, 92, 92)"  for="vehiculoDescripcion">descripcion del vehiculo:</label>
                               <input style="font-size:14px;" class="form-control" type="text" name="vehiculoDescripcion" id="vehiculoDescripcion">
                             </div>
                          </div>
                              {{-- final --}}
                            </div>
                            <div class="col-sm">
                             {{-- INICIO --}}

                             <div class="col-xs-12 col-sm-12 col-md-12">
                              <div class="form-group">
                               <label  style="font-size:16px; font-weight:bold; color:rgb(92, 92, 92)"  for="lineatVendida">Linea unificada vendida:</label>
                               <select class="form-control" id="lineatVendida" name="lineatVendida">
                                <option value="">no</option>
                                   <option value="si">si</option>
                                 
                                 </select>
                              </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                              <div class="form-group">
                               <label  style="font-size:16px; font-weight:bold; color:rgb(92, 92, 92)"  for="telefonoVendido">Telefono vendido:</label>
                               <select class="form-control" id="telefonoVendido" name="telefonoVendido">
                                <option value="">no</option>
                                   <option value="si">si</option>
                                 
                                 </select>
                              </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                              <div class="form-group">
                               <label  style="font-size:16px; font-weight:bold; color:rgb(92, 92, 92)"  for="internetVendido">Internet vendido:</label>
                               <select class="form-control" id="internetVendido" name="internetVendido">
                                <option value="">no</option>
                                   <option value="si">si</option>
                                 
                                 </select>
                              </div>
                            </div>

                            
                           

                            <div class="col-xs-12 col-sm-12 col-md-12">
                              <div class="form-group"> 
                                <label style="font-size:16px; font-weight:bold; color:rgb(92, 92, 92)"  for="fechaSolicitudPermiso">Fecha de solicitud</label>
                                <input style="font-size:14px;" class="form-control" type="date" name="fechaSolicitudPermiso" id="fechaSolicitudPermiso">
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
                              {{-- final --}}
                              
                            </div>
                          </div>

      
                                    <br>
                                    <ul class="list-unstyled">
                              
                                        <div class="media-body">
                                         
                                  <input  type="submit"  class="btn btn-primary" value="Guardar">
                               </form>
                                 
                               {{-- final --}}
                              
                            </div>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
            
@endsection

