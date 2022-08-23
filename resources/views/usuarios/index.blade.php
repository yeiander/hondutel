@extends('layouts.app')
@section('title')
  Usuarios
@endsection
@section('content')
    <section class="section">
        <div class="section-header"  style="max-height: 3rem;">
            <h5 class="page__heading">Usuarios:</h5>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            
                            {{-- aqui ira todo el contenido --}}
                            {{-- <h3 class="text-center">Dashboard Content</h3> --}}
                           
                            <ul class="list-unstyled">
                                <li class="media">
                                  
                                  <div class="media-body">
                                    {{-- <a class="btn btn-primary" href="{{ route('usuarios.create') }}">nuevo</a> --}}
                                    <a href="{{ route('usuarios.create') }}" class="btn btn-primary" id="botonCancelar"  type="button"  style="font-size: 12px"><i style="font-size: 15px" class="fa fa-user-circle" aria-hidden="true"></i> Nuevo</a>
                                   {{-- <p>creacion de nuevos usuarios</p> --}}
                                  </div>
                                </li>
                            </ul>
                            
                             {{-- Tabla de usuarios --}}
                             <table  class="table table-striped table-bordered  table-sm" style="width:100%; border:2px;" id="order_table">
                                   <thead style="background-color:#6777ef;">
                                     
                                     <th style="color: #fff;">Nombre</th>
                                     <th style="color: #fff">E-mail</th>
                                     <th style="color: #fff;">Rol</th>
                                     <th style="color: #fff;">Accion</th>
                                     
                                  </thead>
                                  <tbody>
                                      @foreach ($usuarios as $usuario)
                                        <tr>
                                             <td>{{$usuario->name}}</td>
                                             <td>{{$usuario->email}}</td>
                                             {{-- codigo de la documentacion de spatie --}}
                                             <td>
                                                @if(!empty($usuario->getRoleNames()))
                                                  @foreach($usuario->getRoleNames() as $rolName)
                                                  <h5><span class="badge badge-dark">{{$rolName}}</span></h5>
                                                  @endforeach
                                                @endif
                                             </td>
                                             <td>
                                                 <a class="btn btn-primary" href="{{route('usuarios.edit', $usuario->id)}}">Editar</a>
                                                 {{-- laravel Collective  --}}
                                                 {!! Form::open(['method'=>'DELETE','route'=>['usuarios.destroy', $usuario->id], 'style'=>'display:inline']) !!}
                                                      {!! Form::submit('Borrar',['class'=>'btn btn-danger']) !!}
                                                 {!! Form::close() !!}    
                                                 
                                             </td>
                                        </tr>
                                          
                                      @endforeach
                                  </tbody>
                             </table>
                             {{-- esto es para la paginacion --}}
                             <div class="pagination justify-content-end">
                                 {!! $usuarios->links() !!}
                             </div>
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

$('#order_table').DataTable({
  responsive: true,
  


    autoWidth: false,

    


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
          
        
@endsection
@endsection

