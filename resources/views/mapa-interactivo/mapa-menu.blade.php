@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header"  style="max-height: 3rem;">
            <h5 class="page__heading">Menu de mapa interactivo</h5>
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
                                  <a href="{{ route('menu-registro-averia') }}"><img  class="mr-3" src="{{ asset('img/coordenadas.png') }}" height="50px"></a>
                                <div class="media-body">
                                    <a  href="{{ route('menu-registro-averia') }}">
                                       <h5>Crear nueva coordenada</h5></a>
                                       <p>Creacion de marcadores en el mapa</p>
                                </div>
                              </li>

                              <ul class="list-unstyled ">
                                <li class="media my-4">
                              
                                  <a href="{{ route('menu-ventas') }}"><img class="mr-3" src="{{ asset('img/ecuador.png') }}" height="50px"></a>
                                  <div class="media-body">
                                      <a href="{{ route('menu-ventas') }}">
                                         <h5>Ver mapa</h5>
                                      </a>
                                    
                                    <p> Ver todos los marcadores en el mapa</p>
                                  </div>
                                </li>

                                <ul class="list-unstyled ">
                                  <li class="media my-4">
                                      <a href="{{ route('menu-cancelaciones') }}"><img  class="mr-3" src="{{ asset('img/marcador-de-posicion.png') }}" height="50px"></a>
                                    <div class="media-body">
                                        <a  href="{{ route('menu-cancelaciones') }}">
                                           <h5>Consultar coordenadas</h5></a>
                                           <p>Consultar todas las coordenadas en la base de datos</p>
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
