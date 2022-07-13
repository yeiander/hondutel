
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
                            <div id="input-daterange" class="row input-daterange">
                              <div class="col-md-4">
                                  <input type="text" name="from_date" id="from_date" class="form-control" placeholder="de" readonly />
                              </div>
                              <div class="col-md-4">
                                  <input type="text" name="to_date" id="to_date" class="form-control" placeholder="hasta" readonly />
                              </div>
                              <div class="col-md-4">
                                  <button type="button" name="filter" id="filter" class="btn btn-primary">Filtrar</button>
                                  <button type="button" name="refresh" id="refresh" class="btn btn-secondary">Limpiar</button>
                              </div>
                          </div>
                          <br>

                   <table  class="table table-striped table-bordered table-sm" style="width:100%; border:2px;" id="order_table">
                     <thead style="background-color:#6777ef;">
                       <tr>          
                         <th style="color: #fff;">Nombre</th>
                         <th style="color: #fff;">Hora salida</th>
                         <th style="color: #fff;">Hora entrada(aprox)</th>
                         <th style="color: #fff;">Hora entrada(real)</th>
                         <th style="color: #fff;">Motivo</th>
                         <th style="color: #fff;">Fecha solicitud</th>
                         <th style="color: #fff;">Creado por:</th>
                         <th style="color: #fff;">Aprobado por:</th>
                         <th style="color: #fff;">Accion</th>
                        
                        </tr>
                      </thead>
                        <tbody>
                                
                         </tbody>
                    </table>
                            {{-- final --}}
                     @section('scripts') 
                            <script>

$(document).ready(function(){
 $('#input-daterange').datepicker({
  todayBtn:'linked',
  format:'yyyy-mm-dd',
  language: 'es',
  autoclose:true
 });

 load_data();

 function load_data(from_date = '', to_date = '')
 {
  $('#order_table').DataTable({
    "language": {
                         "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
                                },
   processing: true,
   serverSide: true,
   responsive: true,
  //  select: true,
   dataSrc: "tableData",
   bDestroy: true,
   autoWidth: true,
   ajax: {
    url:'{{ route("pase-salida.index") }}',
    data:{from_date:from_date, to_date:to_date}
   },
   columns: [
    {
     data:'empleados.nombreEmpleado',
     name:'empleados.nombreEmpleado'
    },
    {
     data:'horaSalida',
     name:'horaSalida'
    },
    {
     data:'horaEntradaAproximada',
     name:'horaEntradaAproximada'
    },
    {
     data:'horaEntradaReal',
     name:'horaEntradaReal'
    },
    {
     data:'motivoTrabajoEnfermedad',
     name:'motivoTrabajoEnfermedad'
    },
    {
     data:'fechaSolicitudPermiso',
     name:'fechaSolicitudPermiso'
    },
    {
     data:'nombreQuienCreo',
     name:'nombreQuienCreo'
    },
    {
     data:'nombreQuienAprobo',
     name:'nombreQuienAprobo'
    },

    
    {
     data:'action',
     name:'action'
    },
    
    

   ],
  

  });
 }

 $('#filter').click(function(){
  var from_date = $('#from_date').val();
  var to_date = $('#to_date').val();
  if(from_date != '' &&  to_date != '')
  {
   $('#order_table').DataTable().destroy();
   load_data(from_date, to_date);
  }
  else
  {
   alert('Both Date is required');
  }
 });

 $('#refresh').click(function(){
  $('#from_date').val('');
  $('#to_date').val('');
  $('#order_table').DataTable().destroy();
  load_data();
 });

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
