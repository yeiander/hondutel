@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header"  style="max-height: 3rem;">
            <h5 class="page__heading">Registro de coordenadas</h5>
        </div>   
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            {{-- inicio --}}
                            <div class="container">
                                <div class="row">
                                  <div class="col-sm">
                                    {{-- One of three columns --}}
                                    
                            <ul class="list-unstyled ">
                              <li class="media my-4">
                                  <a href="{{ route('menu-registro-averia') }}"><img  class="mr-3" src="{{ asset('img/atencion al cliente.png') }}" height="50px"></a>
                                <div class="media-body">
                                    <a  href="{{ route('menu-registro-averia') }}">
                                       <h5>Crear nuevo cliente</h5></a>
                                       <p>Crear nuevas coordenadas para clientes</p>
                                </div>
                              </li>

                              <ul class="list-unstyled ">
                                <li class="media my-4">
                              
                                  <a href="{{ route('mapa') }}"><img class="mr-3" src="{{ asset('img/caja.png') }}" height="50px"></a>
                                  <div class="media-body">
                                      <a href="{{ route('mapa') }}">
                                         <h5>Crear caja terminal</h5>
                                      </a>
                                    
                                    <p>Crear nuevas cajas terminales</p>
                                  </div>
                                </li>

                                <ul class="list-unstyled ">
                                  <li class="media my-4">
                                      <a href="{{ route('menu-cancelaciones') }}"><img  class="mr-3" src="{{ asset('img/armario.png') }}" height="50px"></a>
                                    <div class="media-body">
                                        <a  href="{{ route('menu-cancelaciones') }}">
                                           <h5>Crear nuevo armario</h5></a>
                                           <p>Crear nuevos armarios</p>
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
