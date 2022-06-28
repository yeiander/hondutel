@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header"  style="max-height: 3rem;">
            <h5 class="page__heading">Atencion al Cliente</h5>
        </div>   
        <div class="section-body">
            <div class="row">
              
                <div class="col-lg-12">
                  {{-- <center>
                    <a href="{{ route('p-personal-pendiente.index') }}" type="button" style="margin-top: 0.5rem" type="button" class="btn btn-primary">
                      Personal <span class="badge badge-light">1</span>
                   </a>

                    <a href="{{ route('p-personal-pendiente.index') }}" type="button" style="margin-top: 0.5rem" type="button" class="btn btn-primary">
                      Personal <span class="badge badge-light">2</span>
                  </a>

                      <a href="{{ route('p-personal-pendiente.index') }}" type="button" style="margin-top: 0.5rem;" type="button" class="btn btn-primary">
                        Personal <span class="badge badge-light">3</span>
                    </a>

                      <a href="{{ route('p-personal-pendiente.index') }}" type="button" style="margin-top: 0.5rem" type="button" class="btn btn-primary">
                        Personal <span class="badge badge-light">4</span>
                    </a>
                    
                    
                  </center> --}}
                    <div class="card">
                        <div class="card-body">
                            {{-- inicio --}}
                            <div class="container">
                                <div class="row">
                                  <div class="col-sm">
                                    {{-- One of three columns --}}
                                    
                            <ul class="list-unstyled ">
                              <li class="media my-4">
                                  <a href="{{ route('menu-registro-averia') }}"><img  class="mr-3" src="{{ asset('img/agregue-el-simbolo-de-la-interfaz-de-personas-de-la-persona-negra-de-cerca-con-el-signo-mas-en-un-circulo-pequeno.png') }}" height="50px"></a>
                                <div class="media-body">
                                    <a  href="{{ route('menu-registro-averia') }}">
                                       <h5>Registro de averia</h5></a>
                                       <p>Crear y consultar registros de averias</p>
                                </div>
                              </li>

                              <ul class="list-unstyled ">
                                <li class="media my-4">
                              
                                  <a href="{{ route('menu-ventas') }}"><img class="mr-3" src="{{ asset('img/ventas 2.png') }}" height="50px"></a>
                                  <div class="media-body">
                                      <a href="{{ route('menu-ventas') }}">
                                         <h5>Ventas</h5>
                                      </a>
                                    
                                    <p> Creacion de solicitudes de ventas</p>
                                  </div>
                                </li>

                                <ul class="list-unstyled ">
                                  <li class="media my-4">
                                      <a href="{{ route('menu-cancelaciones') }}"><img  class="mr-3" src="{{ asset('img/cancelar2.png') }}" height="50px"></a>
                                    <div class="media-body">
                                        <a  href="{{ route('menu-cancelaciones') }}">
                                           <h5>Cancelaciones</h5></a>
                                           <p>Pagos de factura mensuales</p>
                                    </div>
                                  </li>
                                    {{-- fin --}}
                                  </div>
                                  <div class="col-sm">
                                    {{-- One of three columns --}}
                                    
                          
                          
                             {{-- final --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection