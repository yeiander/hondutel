@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header"  style="max-height: 3rem;">
            <h5 class="page__heading">Registro Averia</h5>
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
                                  <a href="{{ route('internet-averia.create') }}"><img  class="mr-3" src="{{ asset('img/crearPermisos.png') }}" height="50px"></a>
                                <div class="media-body">
                                    <a  href="{{ route('internet-averia.create') }}">
                                       <h5>Internet</h5></a>
                                       <p>Crear registro de internet</p>
                                </div>
                              </li>

                              <ul class="list-unstyled ">
                                <li class="media my-4">
                                    <img class="mr-3" src="{{ asset('img/consulta.png') }}" height="50px">
                                  <div class="media-body">
                                      <a href="{{ route('internet-averia.index') }}">
                                         <h5>Consulta Internet</h5>
                                      </a>
                                    
                                    <p> Consultar averia de internet</p>
                                  </div>
                                </li>

                                

                                
                                    {{-- fin --}}
                                  </div>
                                  <div class="col-sm">
                                    {{-- One of three columns --}}

                                    <ul class="list-unstyled ">
                                      <li class="media my-4">
                                          <a href="{{ route('linea-fija.create') }}"><img  class="mr-3" src="{{ asset('img/crearPermisos.png') }}" height="50px"></a>
                                        <div class="media-body">
                                            <a  href="{{ route('linea-fija.create') }}">
                                               <h5>Linea Fija</h5></a>
                                               <p>Crear linea fija</p>
                                        </div>
                                      </li>
        
                                      {{-- <ul class="list-unstyled ">
                                        <li class="media my-4">
                                            <img class="mr-3" src="{{ asset('img/consulta.png') }}" height="50px">
                                          <div class="media-body">
                                              <a href="{{ route('linea-fija.index') }}">
                                                 <h5>Consulta linea fija final</h5>
                                              </a>
                                            
                                            <p> Consultar averia linea fija</p>
                                          </div>
                                        </li> --}}


                                          {{-- <ul class="list-unstyled ">
                                            <li class="media my-4">
                                                <img class="mr-3" src="{{ asset('img/operador.png') }}" height="50px">
                                              <div class="media-body">
                                                  <a href="{{ route('solicitud-averia.index') }}">
                                                     <h5>Solicitudes averia</h5>
                                                  </a>
                                                <p> consulta de averias</p>
                                              </div>
                                            </li> --}}

                                            <ul class="list-unstyled ">
                                              <li class="media my-4">
                                                  <img class="mr-3" src="{{ asset('img/consulta.png') }}" height="50px">
                                                <div class="media-body">
                                                    <a href="{{ route('material-averia.index') }}">
                                                       <h5>Averias pendientes</h5>
                                                    </a>
                                                  
                                                  <p> consulta de (averias)</p>
                                                </div>
                                              </li>
                                    
                          
                             {{-- final --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
