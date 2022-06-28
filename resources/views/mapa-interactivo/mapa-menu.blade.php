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
                                  <a href="{{ route('menu-crear-coordenadas') }}"><img  class="mr-3" src="{{ asset('img/mapacoordenada.png') }}" height="50px"></a>
                                <div class="media-body">
                                    <a  href="{{ route('menu-crear-coordenadas') }}">
                                       <h5>Crear nueva coordenada</h5></a>
                                       <p>Creacion de marcadores en el mapa</p>
                                </div>
                              </li>

                              <ul class="list-unstyled ">
                                <li class="media my-4">
                              
                                  <a href="{{ route('mapa') }}"><img class="mr-3" src="{{ asset('img/mapaver.png') }}" height="50px"></a>
                                  <div class="media-body">
                                      <a href="{{ route('mapa') }}">
                                         <h5>Ver mapa</h5>
                                      </a>
                                    
                                    <p> Ver todos los marcadores en el mapa</p>
                                  </div>
                                </li>

                                <ul class="list-unstyled ">
                                  <li class="media my-4">
                                      <a href="{{ route('mapa-interactivo.index') }}"><img  class="mr-3" src="{{ asset('img/mapamarcador.png') }}" height="50px"></a>
                                    <div class="media-body">
                                        <a  href="{{ route('mapa-interactivo.index') }}">
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
