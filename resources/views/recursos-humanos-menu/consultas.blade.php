@extends('layouts.app')


@section('content')
    <section class="">
        <div class="section-header" style="max-height: 4rem;">
            <h5 style="background-color:white; padding:0.4rem" class="page__heading">Recursos Humanos</h5>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            {{-- inicio --}}
                            <center><h4 class="page__heading">Consultar permisos almacenados:</h4></center><hr>
                            <div class="container">
                                <div class="row">
                                  <div class="col-sm">
                                    {{-- One of three columns --}}
                                    
                            <ul class="list-unstyled ">
                              <li class="media my-4">
                                  <img class="mr-3" src="{{ asset('img/perminuevo.png') }}" height="50px">
                                <div class="media-body">
                                    <a href="{{ route('pase-salida.index') }}">
                                       <h5> Pase de salida</h5>
                                    </a>
                                      <p>consultar pases de salida</p>
                                </div>
                              </li>

                              <ul class="list-unstyled ">
                                <li class="media my-4">
                                    <img class="mr-3" src="{{ asset('img/consulta.png') }}" height="50px">
                                  <div class="media-body">
                                    <a href="{{ route('permiso-personal.index') }}"><h5 class="mt-0 mb-1">Permiso personal</h5></a>
                                   <p>Consultar permisos personales</p>
                                  </div>
                                </li>
                              </ul>

                              <ul class="list-unstyled ">
                                <li class="media my-4">
                                    <img class="mr-3" src="{{ asset('img/perminuevo.png') }}" height="50px">
                                  <div class="media-body">
                                      <a href="{{ route('administrativo.index') }}">
                                         <h5> Permiso Administrativo</h5>
                                      </a>
                                         <p>consultar los permisos administrativos</p>
                                  </div>
                                </li>

                                <ul class="list-unstyled ">
                                  <li class="media my-4">
                                      <img class="mr-3" src="{{ asset('img/consulta.png') }}" height="50px">
                                    <div class="media-body">
                                      <a href="{{ route('ventas-rc.index') }}"><h5 class="mt-0 mb-1">Permiso de ventas</h5></a>
                                     <p>Consultar permisos de ventas</p>
                                    </div>
                                  </li>
                                </ul>

                                    {{-- fin --}}
                                  </div>
                                  <div class="col-sm">
                                    {{-- One of three columns --}}
                                    
                                <ul class="list-unstyled ">
                                  <li class="media my-4">
                                      <img class="mr-3" src="{{ asset('img/consulta.png') }}" height="50px">
                                    <div class="media-body">
                                      <a href="{{ route('incapacidad.index') }}"><h5 class="mt-0 mb-1">Permisos de Icapacidad</h5></a>
                                     <p>Consultar permisos de incapacidad</p>
                                    </div>
                                  </li>
                                </ul>

                                <ul class="list-unstyled ">
                                  <li class="media my-4">
                                      <img class="mr-3" src="{{ asset('img/consulta.png') }}" height="50px">
                                    <div class="media-body">
                                      <a href="{{ route('subsidio.index') }}"><h5 class="mt-0 mb-1">Pagos de subsidio</h5></a>
                                     <p>Consultar pagos de subsidio</p>
                                    </div>
                                  </li>
                                </ul><hr>
                                    {{-- fin --}}
                                  </div>
                                </div>
                              </div>
                                 {{-- aqui termina el menu  --}}


                                 
                            {{-- final --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
   
@endsection