@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header" style="max-height: 3rem;">
          <h5 class="page__heading">Recursos Humamos</h5>
        </div>
      <div class="text-center">
         {{-- NOTIFICACIONES PARA PERMISOS QUE YA TIENE UNO PENDIENTE INICIO --}}
 @if(Session::has('notiEnviado') )
 <div  style="max-height: 4rem; max-width: 32rem;" class="alert alert-primary alert-dismissible fade show" role="alert">
   <strong>Notificación:</strong>

      <span  style="font-size: 14px;" class="badge badge-light">{{Session('notiEnviado')}}</span>
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
  </div>
 @endif

{{-- NOTIFICACIONES PARA PERMISOS QUE YA TIENE UNO PENDIENTE FINAL --}}
        <h5>Permisos Pendientes (o nuevos):</h5>
        {{-- inicio estadisticas --}}
        
        
        <a href="{{ route('pase-salida-pendiente.index') }}" style="margin-top: 0.5rem" type="button" class="btn btn-danger">
          Pase Salida<span class="badge badge-light">{{$paseSalida}}</span>
        </a>

        <a href="{{ route('p-personal-pendiente.index') }}" type="button" style="margin-top: 0.5rem" type="button" class="btn btn-danger">
           Personal <span class="badge badge-light">{{$permisoPersonal}}</span>
        </a>

        <a href="{{ route('administrativo-pendiente.index') }}" type="button" style="margin-top: 0.5rem" type="button" class="btn btn-danger">
          Administrativo <span class="badge badge-light">{{ $permisoAdministrativo }}</span>
        </a>

        <a href="{{ route('ventas-pendientes.index') }}" type="button" class="btn btn-danger" style="margin-top: 0.5rem" type="button">
          Ventas <span class="badge badge-light">{{ $permisoVenta }}</span>
        </a>
        {{-- final de estadisticas --}}

      </div>

     
        {{-- final norificaciones --}}
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                          
                  {{-- INICIO --}}

                            <hr>
                        <div class="container">
                          <div class="row">
                            <div class="col-sm">
                              {{-- One of three columns --}}
                              
                      <ul class="list-unstyled ">
                        <li class="media my-4">
                            
                          <a href="{{ url('/recursos-humanos-menu/tipos-de-permisos') }}"><i style="color: rgb(112, 126, 141)" class="fa fa-address-card fa-3x mr-3" aria-hidden="true"></i>
                           
                          <div class="media-body">
                            <h5 class="mt-0 mb-1">Nuevo permiso</h5></a>
                            
                            <p>Creacion de nuevos permisos</p>
                          </div>
                        </li>
                              {{-- fin --}}
                            </div>
                            <div class="col-sm">
                              {{-- One of three columns --}}
                              
                      <ul class="list-unstyled ">
                        <li class="media my-4">
                          <a href="{{ url('/recursos-humanos-menu/consultas') }}"><i class="fa fa-folder-open fa-3x mr-3" aria-hidden="true" style="color: rgb(112, 126, 141)"></i>
                          <div class="media-body">
                            <h5 class="mt-0 mb-1">Consultar</h5></a>
                           <p>Consultar permisos almacenados</p>
                          </div>
                        </li>
                              {{-- fin --}}
                            </div>
                          </div>
                        </div>
                           {{-- aqui termina el menu  --}}

                        <!-- Button trigger modal -->
<hr>


             

                              {{-- FINAL --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
@endsection

