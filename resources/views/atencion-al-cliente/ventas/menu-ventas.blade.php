@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header"  style="max-height: 3rem;">
            <h5 class="page__heading">Ventas</h5>
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
                                  <a href="{{ route('ventas.create') }}"><img  class="mr-3" src="{{ asset('img/votacion-en-linea.png') }}" height="50px"></a>
                                <div class="media-body">
                                    <a  href="{{ route('ventas.create') }}">
                                       <h5>Nuevo registro linea</h5></a>
                                       <p>Crear registros de linea</p>
                                </div>
                              </li>

                              <ul class="list-unstyled ">
                                <li class="media my-4">
                                    <img class="mr-3" src="{{ asset('img/consultante.png') }}" height="50px">
                                  <div class="media-body">
                                      <a href="{{ route('ventas.index') }}">
                                         <h5>Consulta registro linea</h5>
                                      </a>
                                    <p> Consulta linea</p>
                                  </div>
                                </li>

                                    {{-- fin --}}
                                  </div>
                                  <div class="col-sm">
                                    {{-- One of three columns --}}
                                    <ul class="list-unstyled ">
                                      <li class="media my-4">
                                          <a href="{{ route('ventas.create') }}"><img  class="mr-3" src="{{ asset('img/wifi.png') }}" height="50px"></a>
                                        <div class="media-body">
                                            <a  href="{{ route('ventas.create') }}">
                                               <h5>Nuevo registro wifi</h5></a>
                                               <p>Crear registros de wifi</p>
                                        </div>
                                      </li>

                                      <ul class="list-unstyled ">
                                        <li class="media my-4">
                                            <img class="mr-3" src="{{ asset('img/charla.png') }}" height="50px">
                                          <div class="media-body">
                                              <a href="{{ route('ventas.index') }}">
                                                 <h5>Consulta registro wifi</h5>
                                              </a>
                                            <p> Consulta wifi</p>
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
