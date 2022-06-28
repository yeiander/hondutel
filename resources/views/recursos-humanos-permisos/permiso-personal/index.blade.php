
@extends('layouts.app')

@section('dataBaseCss')
{{-- ESTA SECTION SOLO ES PARA LAS TABLAS RESPONSIVAS --}}
<link rel="stylesheet" href="{{ asset('assets/css/dataTable/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{ asset('assets/css/dataTable/responsive.bootstrap4.min.css')}}"> 
<link rel="stylesheet" href="{{ asset('assets/css/dataTable/select.bootstrap4.css')}}"> 

@endsection


@section('content')
    <section class="section">
        <div class="section-header"  style="max-height: 3rem;">
            <h5 class="page__heading">Recursos Humamos</h5>
            
        </div>
        
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            {{-- inicio --}}

                            <input id="min" type="date">
                            <input id="max" type="date">
                            <h3 class="page__heading">Consultar permisos personales almacenados:</h3><br><br>

                           
                            <table  class="table table-striped table-bordered" style="width:100%" id="permiso1">
                                <thead style="background-color:#6777ef;">
                                    <tr>
                                        
                                  <th style="color: #fff;">Nombre</th>
                                  <th style="color: #fff;">Tipo permiso</th>
                                  <th style="color: #fff;">Dia 1</th>
                                  <th style="color: #fff;">Dia 2</th>
                                  <th style="color: #fff;">Horas</th>
                                  <th style="color: #fff;">Motivo</th>
                                   <th style="color: #fff;">fecha Solicitud</th>
                                  <th style="color: #fff;">Lugar</th> 
                                  <th style="color: #fff;">ID</th>
                                  <th style="color: #fff;">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach($permisos as $permiso)
                                  <tr>
                                   
                                    <td>{{$permiso->empleados->nombreEmpleado}}</td>
                                    <td>{{$permiso->rhTipoPermisos->tipoPermiso}}</td>
                                    <td>{{$permiso->fechaPermisoPersonalDia1}}</td>
                                    <td>{{$permiso->fechaPermisoPersonalDia2}}</td>
                                    <td>{{$permiso->horasPermisoPersonal}}</td>
                                    <td>{{$permiso->motivoTrabajoEnfermedad}}</td>
                                     <td>{{$permiso->fechaSolicitudPermiso}}</td>
                                    <td>{{$permiso->lugarSolicitudPermiso}}</td> 
                                    <td>{{$permiso->id}}</td>
                                    <td> <button title="VER" type="submit" class="btn btn-primary"><i class="fas fa-eye"></i></button>
                                        <button title="EDITAR" type="submit" class="btn btn-primary"><i class="fas fa-pen-square"></i></button>
                                        
                                         <button title="IMPRIMIR" type="submit" class="btn btn-success"><i class="fas fa-file-pdf"></i></button>
                                         <button title="BORRAR" type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                         
                                    </td>
                  
                                  </tr>
                                  @endforeach
                                </tbody>
                            </table>
                          
            @section('dataTable_js')
             
            <script src="{{ asset('assets/js/dataTable/jquery.dataTables.min.js') }}"></script>
            <script src="{{ asset('assets/js/dataTable/dataTables.bootstrap4.min.js') }}"></script>
            <script src="{{ asset('assets/js/dataTable/dataTables.responsive.min.js') }}"></script>
            <script src="{{ asset('assets/js/responsive.bootstrap4.min.js') }}"></script>
            {{-- <script src="{{ asset('assets/js/dataTables.select.min.js') }}"></script> --}}
          
     
  
  @endsection
    

                            {{-- final --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
   <script>
    var minDate, maxDate;
 
 // Custom filtering function which will search data in column four between two values
 $.fn.dataTable.ext.search.push(
     function( settings, data, dataIndex ) {
         var min = minDate.val();
         var max = maxDate.val();
         var date = new Date( data[4] );
  
         if (
             ( min === null && max === null ) ||
             ( min === null && date <= max ) ||
             ( min <= date   && max === null ) ||
             ( min <= date   && date <= max )
         ) {
             return true;
         }
         return false;
     }
 );
   </script>
    @section('scripts')
    <script>

        $(document).ready(function(){
        
                $('#permiso1').DataTable({
                  responsive: true,
                  select: true,
            
        
                    autoWidth: false,
                
                    "order": [[ 7, "desc" ]],
        
            
                    "language": {
                    "lengthMenu": "Mostrar _MENU_ registros por pagina",
                    "zeroRecords": "Nada encontrado - prueba de nuevo",
                    "info": "Mostrando la pagina _PAGE_ de _PAGES_",
                    "infoEmpty": "no hay registros disponibles",
                    "infoFiltered": "(filtrado de _MAX_ registros totales)",
                    "search" : "Buscar:",
                    "paginate":{
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                }
                });

                // Create date inputs
    minDate = new DateTime($('#min'), {
        format: 'MMMM Do YYYY'
    });
    maxDate = new DateTime($('#max'), {
        format: 'MMMM Do YYYY'
    });
 
    // DataTables initialisation
    var table = $('#example').DataTable();
 
    // Refilter the table
    $('#min, #max').on('change', function () {
        table.draw();
    });
        
              });
        
          
            </script>

          
        
@endsection
@endsection
