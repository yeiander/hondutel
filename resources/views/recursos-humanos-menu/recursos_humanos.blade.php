@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header" style="max-height: 3rem;">
          <h5 class="page__heading">Recursos Humamos</h5>
        </div>
      <div class="text-center">
       
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

        <a href="{{ route('incapacidad-pendiente.index') }}" type="button" class="btn btn-danger" style="margin-top: 0.5rem" type="button">
          Incapacidades <span class="badge badge-light">{{ $permisoIncapacidad }}</span>
        </a>

        <a href="{{ route('subsidio-pendiente.index') }}" type="button" class="btn btn-danger" style="margin-top: 0.5rem" type="button">
          Pago de subsidio <span class="badge badge-light">{{ $permisoSubsidio }}</span>
        </a>
        {{-- final de estadisticas --}}

      </div>

     
        {{-- final norificaciones --}}
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            {{-- NOTIFICACIONES PARA PERMISOS QUE YA TIENE UNO PENDIENTE INICIO --}}
      @if(Session::has('notiEnviado') )
      <div  style="max-height: 4.5rem; max-width: 20rem;" class="alert alert-success alert-dismissible fade show" role="alert">
       <h5 class="alert-heading">!Enviado!</h5>
        <strong>{{Session('notiEnviado')}}  </strong>
     
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
       </div>
      @endif

{{-- NOTIFICACIONES PARA PERMISOS QUE YA TIENE UNO PENDIENTE FINAL --}}
                  {{-- INICIO --}}

                            <hr>
                        <div class="container">
                          <div class="row">
                            <div class="col-sm">
                              {{-- One of three columns --}}
                              
                      <ul class="list-unstyled ">
                        <li class="media my-4">
                          <a class="btn btn-outline-light" href="{{ url('/recursos-humanos-menu/tipos-de-permisos') }}"><i style="color: rgb(112, 126, 141); font-size:3.1rem;" class="fa fa-address-card " aria-hidden="true"></i></a>
                        
                          <div class="media-body">
                           <a href="{{ url('/recursos-humanos-menu/tipos-de-permisos') }}"> <h5 class="mt-1  ml-2">Nuevo permiso</h5></a>
                            
                            <p class="ml-2">Creacion de nuevos permisos</p>
                          </div>
                        </li>
                      </ul>
                              {{-- fin --}}
                            </div>
                            <div class="col-sm">
                              {{-- One of three columns --}}
                              
                      <ul class="list-unstyled ">
                        <li class="media my-4">
                          <a class="btn btn-outline-light" href="{{ url('/recursos-humanos-menu/consultas') }}"><i class="fa fa-folder-open" aria-hidden="true" style="color: rgb(112, 126, 141);  font-size:3.1rem;"></i></a>
                          <div class="media-body">
                            <a href="{{ url('/recursos-humanos-menu/consultas') }}" > <h5 class="mt-1  ml-2">Consultar</h5></a>
                           <p class="ml-2">Consultar permisos almacenados</p>
                          </div>
                        </li>
                      </ul>
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

