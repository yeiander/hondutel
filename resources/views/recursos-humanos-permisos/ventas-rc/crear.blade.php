@extends('layouts.app')

@section('content')
  <section class="">
    <div class="section-header"  style="max-height: 3rem;">
      {{-- <h3 class="page__heading">Recursos Humanos:</h3> --}}
       </div>
        <div class="section-body">
       
          <center><h4>Crear un permiso de ventas</h4></center>
         
            <div class="row">
               <div class="col-lg-12">
                  <div class="card">
                     <div class="card-body">
                                                {{-- inicio --}}
                           
                           
         
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
                     <form action=" {{url('/recursos-humanos-permisos/permiso-personal')}} " method="post">
                      @csrf
                        <input type = "hidden" name="fk_id_tipo_permiso" id="fk_id_tipo_permiso" value="4">
                                 
                                 

                                 {{-- <div class="col-xs-12 col-sm-12 col-md-12">
                                   <div class="form-group">
                                     <label for="fk_id_empleado">Numero personal</label>
                                     <select class="form-control" type="text" name="fk_id_empleado" id="fk_id_empleado"><option></option></select>
                                    </div>
                                 </div> --}}
                           <div class="col-xs-12 col-sm-12 col-md-12">
                             <div class="form-group">
                               <label  style="font-size:16px; font-weight:bold; color:rgb(92, 92, 92)" for="fk_id_empleado">Empleado:</label> 
                                 <select  style="font-size:15px;" name="fk_id_empleado" id="fk_id_empleado" class="form-control">
                                   <option disabled selected>Seleccione un empleado</option>
                                     @foreach($empleados as $empleado)
                                    
                                       <option  style="font-size:14px;" value=" {{ $empleado->id }}">{{ $empleado->nombreEmpleado }} </option>
                                     
                                    @endforeach
                                  
                                 </select>
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

                                 <div class="col-xs-12 col-sm-12 col-md-12">
                                   <div class="form-group"> 
                                     <label style="font-size:16px; font-weight:bold; color:rgb(92, 92, 92)"  for="fechaSolicitudPermiso">Fecha de solicitud</label>
                                     <input style="font-size:14px;" class="form-control" type="date" name="fechaSolicitudPermiso" id="fechaSolicitudPermiso">
                                 </div>
                                 </div>

                                 {{-- ???????????????????????????? --}}
                                 <div class="container">
                                    <div class="row">
                                      <div class="col-sm">

                                      
                                       
                                            <div class="form-group" data-toggle="buttons">
                                              <label style="font-size:16px; font-weight:bold; color:rgb(92, 92, 92)"  for="internetVendido">Internet vendido:  </label>
                                              <label class="btn btn-outline-primary">
                                               <input type="radio" name="internetVendido" id="internetVendido" value="" autocomplete="off"> no
                                              </label>
                                              <label class="btn btn-outline-primary">
                                                  <input type="radio" name="internetVendido" id="internetVendido" value="si" autocomplete="off"> si
                                              </label>
                                          </div>
                                           

                                      </div>
                                      <div class="col-sm">

                                        
                                       
                                            <div class="form-group" data-toggle="buttons">
                                              <label style="font-size:16px; font-weight:bold; color:rgb(92, 92, 92)"  for="telefonoVendido">Telefonia vendida:</label>
                                              <label class="btn btn-outline-primary">
                                               <input type="radio" name="telefonoVendido" id="telefonoVendido" value="" autocomplete="off"> no
                                              </label>
                                              <label class="btn btn-outline-primary">
                                                  <input type="radio" name="telefonoVendido" id="telefonoVendido" value="si" autocomplete="off"> si
                                              </label>
                                          </div>
                                            </div>

                                      <div class="col-sm">

                                       
                                      
                                            <div class="form-group" data-toggle="buttons">
                                              <label style="font-size:16px; font-weight:bold; color:rgb(92, 92, 92)"  for="lineatVendida">Linea unificada vendida:</label>
                                              <label class="btn btn-outline-primary">
                                               <input type="radio" name="lineatVendida" id="lineatVendida" value="" autocomplete="off"> no
                                              </label>
                                              <label class="btn btn-outline-primary">
                                                  <input type="radio" name="lineatVendida" value="si" autocomplete="off"> si
                                              </label>
                                          </div>
                                        

                                      </div>
                                    </div>
                                  </div>
                                
                                   
                                  

                                  

                                   


                                        {{-- ????????????????????????????/ --}}

                                 <div class="col-xs-12 col-sm-12 col-md-12">
                                  <div class="form-group">
                                   <label  style="font-size:16px; font-weight:bold; color:rgb(92, 92, 92)"  for="lugarSolicitudPermiso">Lugar:</label>
                                   <select class="form-control" id="lugarSolicitudPermiso" name="lugarSolicitudPermiso">
                                     
                                       <option value="Juticalpa">Juticalpa</option>
                                     
                                     </select>
                                  </div>
                                </div>

                              
                                    <br>
                                    <ul class="list-unstyled">
                              
                                        <div class="media-body">
                                          {{-- <a class="btn btn-warning" href="{{ route('pase-salida.index') }}">cancelar</a> --}}
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

