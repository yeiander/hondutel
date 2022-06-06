
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
            <h5 class="page__heading">Pases de salida pendientes</h5>
            
        </div>
        
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            {{-- inicio --}}
                          
                             <h4 style="color: #ea2626" class="page__heading">(requieren confirmar la hora de entrada)</h4><br>
                           
                            <table  class="table table-striped table-bordered" style="width:100%" id="permiso1">
                                <thead style="background-color:#6777ef;">
                                    <tr>
                                        
                                  <th style="color: #fff;">Nombre</th>
                                  <th style="color: #fff;">Tipo permiso</th>
                                  <th style="color: #fff;">Hora salida</th>
                                  <th style="color: #fff;">Hora entrada(aprox)</th>
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
                                    <td>{{$permiso->horaSalida}}</td>
                                    <td>{{$permiso->horaEntradaAproximada}}</td>
                                    <td>{{$permiso->motivoTrabajoEnfermedad}}</td>
                                     <td>{{$permiso->fechaSolicitudPermiso}}</td>
                                    <td>{{$permiso->lugarSolicitudPermiso}}</td> 
                                    <td>{{$permiso->id}}</td>
                                    <td><a href="{{ url('/recursos-humanos-permisos/pase-salida-pendiente/'.$permiso->id.'/edit') }}" class="btn btn-primary" type="button">Confirmar</a>
                                      <a type="submit" target="_blank" class="btn btn-success" href="{{ url('/recursos-humanos-permisos/pase-salida/'.$permiso->id.'/imprimir') }}"><i class="fas fa-print fa-sm text-white"></i> Imprimir</a>
                                  </tr>
                                  @endforeach
                                </tbody>
                            </table>
                          
            @section('dataTable_js')
             
            <script src="{{ asset('assets/js/dataTable/jquery.dataTables.min.js') }}"></script>
            <script src="{{ asset('assets/js/dataTable/dataTables.bootstrap4.min.js') }}"></script>
            <script src="{{ asset('assets/js/dataTable/dataTables.responsive.min.js') }}"></script>
            <script src="{{ asset('assets/js/responsive.bootstrap4.min.js') }}"></script>
            <script src="{{ asset('assets/js/dataTables.select.min.js') }}"></script>
          
     
  
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

      });

  
    </script>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

  @endsection
    

                            {{-- final --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
   
    

@endsection
