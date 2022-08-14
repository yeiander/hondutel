@extends('layouts.app')
  @section('content')
    <section class="section">
      <div class="section-header" style="max-height: 3rem;">
        {{-- <h5 class="page__heading">Recursos Humamos</h5> --}}
        <h5 class="page__heading">Permisos personales almacenados:</h5>
      </div>
      
      <div class="section-body">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                
                @if(Session::has('notiBorrado') )
                <div  style="max-height: 4.5rem; max-width: 20rem;" class="alert alert-danger alert-dismissible fade show" role="alert">
                  <h5 class="alert-heading">!Eliminado!</h5>
                    <strong>{{Session('notiBorrado')}}  </strong>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                 </div>
                 @endif

                 @if(Session::has('notiEditado') )
                 <div  style="max-height: 4.5rem; max-width: 20rem;" class="alert alert-success alert-dismissible fade show" role="alert">
                   <h5 class="alert-heading">!Editado!</h5>
                     <strong>{{Session('notiEditado')}}  </strong>
                       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  @endif

                            {{-- inicio --}}
                            <center>
                            <div id="input-daterange" class="row input-daterange">
                              <div class="col-md-2">
                                  <input type="text" style="margin-top: 0.3rem" name="from_date" id="from_date" class="form-control" placeholder="Del" readonly />
                              </div>
                              <div class="col-md-2">
                                  <input type="text" style="margin-top: 0.3rem" name="to_date" id="to_date" class="form-control" placeholder="Hasta" readonly />
                              </div>
                              <div class="col-md-3">
                                <div class="d-flex">
                                  <button style="  margin-top: 0.5rem;" type="button" name="filter" id="filter" class="btn btn-outline-primary font-weight-bold"><i class="fa fa-search" aria-hidden="true"></i> Filtrar</button>
                                  <button style="margin-top: 0.5rem" type="button" name="refresh" id="refresh" class="btn btn-outline-info font-weight-bold"><i class="fa fa-spinner" aria-hidden="true"></i> Limpiar</button>
                                  <button style="margin-left: 1rem; margin-top: 0.5rem;" type="button" name="refresh" id="refresh" class="btn btn-outline-success font-weight-bold"><i class="fa fa-file-pdf" aria-hidden="true"></i> Imprimir</button>
                                  </div>
                                </div>
                          </div>
                          <hr>
                        </center>
                            <table id="permisoPersonal"  class="table table-striped table-bordered table-sm" style="width:100%" >
                                <thead style="background-color:#6777ef;">
                                    <tr>
                                        
                                  <th style="color: #fff;">Nombre</th>
                                  <th style="color: #fff;">Horas</th>
                                  <th style="color: #fff;">Inicio</th>
                                  <th style="color: #fff;">Final</th>
                                  <th style="color: #fff;">Motivo</th>
                                   <th style="color: #fff;">fecha Solicitud</th>
                                  <th style="color: #fff;">Lugar</th>
                                  <th style="color: #fff;">Creado por:</th>
                                  <th style="color: #fff;">Aprobado por:</th>
                                  <th style="color: #fff;">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                </tbody>
                            </table>
    

                            {{-- final --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @section('scripts')

    <script>
      function DeleteFunction() {
          if (confirm('seguro que deseas borrar este registro?'))
              return true;
          else {
              return false;
          }
      }

  </script> 


  
   
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
          $('#permisoPersonal').DataTable({
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
           "dom": "<'row' <'col-md-12 float-right'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>",
           
   buttons: [
    {
                extend: 'print', title: "Permisos personales", titleAttr: 'Imprimir', text: '<i class="fa fa-print" aria-hidden="true"></i>', className: 'btn btn-secondary', exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5, 6]
                }, customize: function (win) {
                    $(win.document.body).find('table')
                        .addClass('compact')
                        .css('font-size', 'inherit');
                    $(win.document.body).find('h1').css('text-align', 'center');
                    $(win.document.body).css('font-size', '9px');
                }
            },
    
   {
        //Botón para Excel
        extend: 'excel',
        footer: true,
        title: 'Archivo',
        filename: 'Export_File',
        //Aquí es donde generas el botón personalizado
        text: '<button class="btn btn-success">Excel <i class="fas fa-file-excel"></i></button>'
      },
      //Botón para PDF
      {
        extend: 'pdf',
        footer: true,
        title: 'pases de salida PDF',
        messageTop: 'Pedidos de Concentrados Tramitados',
        filename: 'Export_File_pdf',
        orientation: 'landscape',
        text: '<button class="btn btn-danger">PDF <i class="far fa-file-pdf"></i></button>',
        exportOptions: {
                        columns: [ 0, 1, 2, 3, 4, 5, 6,7]
      }
    }
    ],
           ajax: {
            url:'{{ route("permiso-personal.index") }}',
            data:{from_date:from_date, to_date:to_date}
           },
           columns: [
            {
             data:'empleados.nombreEmpleado',
             name:'empleados.nombreEmpleado'
            },
            {
             data:'horasPermisoPersonal',
             name:'horasPermisoPersonal'
            },
            {
             data:'fechaPermisoPersonalDia1',
             name:'fechaPermisoPersonalDia1'
            },
            {
             data:'fechaPermisoPersonalDia2',
             name:'fechaPermisoPersonalDia2'
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
             data:'lugarSolicitudPermiso',
             name:'lugarSolicitudPermiso'
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

          
        
@endsection
@endsection
