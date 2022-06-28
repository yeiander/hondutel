
@extends('layouts.app')
  @section('content')
    <section class="section">
      <div class="section-header" style="max-height: 3rem;">
        {{-- <h5 class="page__heading">Recursos Humamos</h5> --}}
        <h5 class="page__heading">pases de salida almacenados:</h5>
      </div>
      
      <div class="section-body">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                            {{-- inicio --}}

                 {{-- <h4 class="page__heading">Consultar pases de salida almacenados:</h4> --}}
            
                 
                 <!-- Date Filter -->
{{-- <form id="formFecha">
  <table>
  <tr>
  <td>
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span  style="font-weight:bold; background-color:#6777ef; color:white; " class="input-group-text" id="inputGroup-sizing-default">Fecha Final:</span>
      </div>
      <input id="buscar_inicio" type="date" class="form-control datepicker"  aria-describedby="inputGroup-sizing-default">
    </div>
  </td>
  <td>
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span  style="font-weight:bold; background-color:#6777ef; color:white; " class="input-group-text" id="inputGroup-sizing-default">Fecha Final:</span>
      </div>
      <input  id="buscar_fin" type="date" class="form-control datepicker"  aria-describedby="inputGroup-sizing-default">
    </div>
  </td>
  <td>
    <div class="input-group mb-3">
  <input type='button' id="btn_search" value="Buscar" class="btn btn-success">
    </div>
  </td>
  <td>
    <div class="input-group mb-3">
  <input type='button' id="btnLimpiar" value="Limpiar" class="btn btn-danger">
  
  </td>
  </tr>
  </table>
  </form> --}}
  <table border="0" cellspacing="5" cellpadding="5">
    <tbody><tr>
        <td>Minimum age:</td>
        <td><input type="date" id="min" name="min"></td>
    </tr>
    <tr>
        <td>Maximum age:</td>
        <td><input type="date" id="max" name="max"></td>
    </tr>
</tbody></table>

                   <table  class="table table-striped table-bordered" style="width:100%; border:2px;" id="tabla">
                     <thead style="background-color:#6777ef;">
                       <tr>          
                         
                         <th style="color: #fff;">Hora salida</th>
                         <th style="color: #fff;">Hora entrada(aprox)</th>
                         <th style="color: #fff;">Hora entrada(real)</th>
                         <th style="color: #fff;">Motivo</th>
                         <th style="color: #fff;">Fecha solicitud</th>
                         <th style="color: #fff;">Lugar</th>
                         <th style="color: #fff;">Creado por:</th>
                         <th style="color: #fff;">Aprobado por:</th>
                        
                        </tr>
                      </thead>
                        <tbody>
                                
                         </tbody>
                    </table>
                            {{-- final --}}
                     @section('scripts') 

                            <script>
                              
                             $(document).ready(function(){
                
                              $('#tabla').DataTable({
                                "language": {
"url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
},
                                 responsive: true,
                                 autoWidth: false,
                                 processing: true,
                                 serverSide: true,
                                
                                 ajax: "{{route('pase-salida.index')}}",
                                 dataType: 'json',
                                 type: "POST",
                                 
                                  columns: [
            
            { data: 'horaSalida', name: 'horaSalida' },
            { data: 'horaEntradaAproximada', name: 'horaEntradaAproximada' },
            { data: 'horaEntradaReal', name: 'horaEntradaReal' },
            { data: 'motivoTrabajoEnfermedad', name: 'motivoTrabajoEnfermedad' },
            { data: 'fechaSolicitudPermiso', name: 'fechaSolicitudPermiso' },
            { data: 'lugarSolicitudPermiso', name: 'lugarSolicitudPermiso' },
            { data: 'nombreQuienCreo', name: 'nombreQuienCreo' },
            { data: 'nombreQuienAprobo', name: 'nombreQuienAprobo' }
        

                                 ],

                 
                  
            
                                                   });

                                                   
        
                            });
          
        
                            </script>
<script>
  $("#btnLimpiar").click(function(event) {
  $("#formFecha")[0].reset();
  });
  </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection
@endsection
