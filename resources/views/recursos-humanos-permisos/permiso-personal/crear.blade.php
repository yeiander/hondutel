@extends('layouts.app')

@section('content')
  <section class="">
    <div class="section-header"  style="max-height: 3rem;">
      {{-- <h3 class="page__heading">Recursos Humanos:</h3> --}}
       </div>
        <div class="section-body">
       
          <center><h4>Crear un permiso personal</h4></center>
         
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
                        <input type = "hidden" name="fk_id_tipo_permiso" id="fk_id_tipo_permiso" value="2">
                                 
                                 

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
                                    <label  style="font-size:16px; font-weight:bold; color:rgb(92, 92, 92)"  for="horasPermisoPersonal">duracion del permiso:</label>
                                    <select  onselect="myFunction()" class="form-control" id="horasPermisoPersonal" name="horasPermisoPersonal">
                                      <option disabled selected>Seleccione la duracion</option>
                                        <option value="4">Medio dia</option>
                                        <option value="8">Un dia</option>
                                        <option value="16">Dos dias</option>
                                      </select>
                                   </div>
                                 </div>
                                 
                      
                                 <div class="col-xs-12 col-sm-12 col-md-12">
                                   <div class="form-group">
                                      <label style="font-size:16px; font-weight:bold; color:rgb(92, 92, 92)"  for="motivoTrabajoEnfermedad">Motivo del permiso:</label>
                                      <input style="font-size:14px;" class="form-control" type="text" name="motivoTrabajoEnfermedad" id="motivoTrabajoEnfermedad">
                                    </div>
                                 </div>

                                 <div class="col-xs-12 col-sm-12 col-md-12">
                                  <div class="form-group"> 
                                  <label style="font-size:16px; font-weight:bold; color:rgb(92, 92, 92)"  for="fechaPermisoPersonalDia1">fecha Dia 1.</label>
                                  <input style="font-size:14px;" class="form-control" type="date" name="fechaPermisoPersonalDia1" id="fechaPermisoPersonalDia1">
                                </div>
                                </div>

                        
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                  <div class="form-group"> 
                                    <label style="font-size:16px; font-weight:bold; color:rgb(92, 92, 92)"  for="fechaPermisoPersonalDia2">fecha Dia 2.</label>
                                    <input style="font-size:14;" class="form-control" type="date" name="fechaPermisoPersonalDia2"   id="fechaPermisoPersonalDia2">
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
                                   <label  style="font-size:16px; font-weight:bold; color:rgb(92, 92, 92)"  for="lugarSolicitudPermiso">duracion del permiso:</label>
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
                                 
                               
                              
                            </div>
                            {{-- final --}}

                            
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

