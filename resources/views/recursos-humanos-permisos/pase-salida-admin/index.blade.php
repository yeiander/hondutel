@extends('layouts.app')

@section('dataBaseCss')
{{-- ESTA SECTION SOLO ES PARA LAS TABLAS RESPONSIVAS y sus estilos --}}
<link rel="stylesheet" href="{{ asset('assets/css/dataTable/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{ asset('assets/css/dataTable/responsive.bootstrap4.min.css')}}"> 
@endsection
{{-- INICIO DEL BODY --}}
@section('content')
        <div class="section"> 
          {{-- aqui debo verificar si le puse el section bien --}}
        <div class="section-header" style="max-height: 4rem;">
            <h3  class="page__heading" style="color: #fff">Recursos Humamos</h3>
        </div>
        <h3 class="text-center">Permisos pendientes para aprobar:</h3>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            {{-- inicio de la ventana --}}

                          

                           {{-- CREACION DE LA TABLA --}}
                           <table  class="table table-striped table-bordered"  id="permiso1">
                            <thead style="background-color:#6777ef; font-size:16px;" >
                                <tr>
                                    
                              <th  style="color: #fff;">Nombre</th>
                              <th style="color: #fff;">Tipo permiso</th>
                              <th style="color: #fff;">Fecha de solicitud</th>
                              
                            <th style="color: #fff;">Acciones</th>
                                </tr>
                            </thead>
                            <tbody style=" font-size:16px;">
                              @foreach($permisos as $permiso)
                              <tr>
                                <td>{{$permiso->empleados->nombreEmpleado}}</td>
                                <td>{{$permiso->rhTipoPermisos->tipoPermiso}}</td>
                                <td>{{$permiso->fechaSolicitudPermiso}}</td>
                               
                                   <td> {{--<a class="btn btn-info" href="{{ url('/recursos-humanos-permisos/pase-salida-admin/'. $permiso->id. '/edit') }}">Editar</a> |  --}}
                                     <a href="{{ route('pase-salida-admin.edit',$permiso->id) }}" class="btn btn-primary" type="button">ver</a>
                                      <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#eliminarModal" data-id="{{$permiso->id}}">Borrar</button>   
                                   </td>
                                  </tr>
                                  @endforeach
                                </tbody>
                            </table>
                                  {{-- final --}}
                        </div>
                      </div>
                  </div>
              </div>
          </div>
    
      
                            
                          {{-- SECCION DE LOS SCRIPTS --}}
            @section('dataTable_js')
             
            <script src="{{ asset('assets/js/dataTable/jquery.dataTables.min.js') }}"></script>
            <script src="{{ asset('assets/js/dataTable/dataTables.bootstrap4.min.js') }}"></script>
            <script src="{{ asset('assets/js/dataTable/dataTables.responsive.min.js') }}"></script>
            <script src="{{ asset('assets/js/responsive.bootstrap4.min.js') }}"></script>
    
            <script>

                $(document).ready(function(){
                
                        $('#permiso1').DataTable({
                          responsive: true,
                          select: true,
                    
                
                            autoWidth: false,
                        
                            // "order": [[ 7, "desc" ]],
                
                    
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
                

    {{-- EL MODAL PARA CONFIRMACION DE BORRAR --}}
<div class="modal fade" id="eliminarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">New message</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Estas seguro?</p>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>

          <form id="borrarForm" action=" {{ route('pase-salida-admin.destroy',1) }}"  data-action=" {{ route('pase-salida-admin.destroy',1) }}" id="MensajeBorrar" method="post">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-danger">Eliminar</button>
           
              
            </form></td>
          
        </div>
      </div>
    </div>
  </div>

  

    {{-- EVENTO PARA EL MODAL DE BORRAR --}}
    <script>
        $('#eliminarModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var id = button.data('id') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  action = $('#borrarForm').attr('data-action').slice(0, -1);
  action = action + id;
  $('#borrarForm').attr('action', action);
 
  var modal = $(this)
  modal.find('.modal-title').text('se eliminara el registro: ' + id)
  
})
    </script>
    
  @endsection
    

                      
   
    

@endsection
