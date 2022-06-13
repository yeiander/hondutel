@extends('layouts.app')

@section('content')
    <section class="">
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
                                  <a href="{{ route('ventas-linea.create') }}"><img  class="mr-3" src="{{ asset('img/votacion-en-linea.png') }}" height="50px"></a>
                                <div class="media-body">
                                    <a  href="{{ route('ventas-linea.create') }}">
                                       <h5>Nuevo registro linea</h5></a>
                                       <p>Crear registros de linea</p>
                                </div>
                              </li>

                              <ul class="list-unstyled ">
                                <li class="media my-4">
                                    <img class="mr-3" src="{{ asset('img/consultante.png') }}" height="50px">
                                  <div class="media-body">
                                      <a href="{{ route('ventas-linea.index') }}">
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
                                          <a data-toggle="modal" data-target="#exampleModalCenter"> <img  class="mr-3" src="{{ asset('img/wifi.png') }}" height="50px"></a>
                                        <div class="media-body">
                                          <a type="button" class="" data-toggle="modal" data-target="#exampleModalCenter">
                                               <h5>Nuevo registro wifi</h5></a>
                                               <p>Crear registros de wifi</p>
                                        </div>
                                      </li>

                                      <ul class="list-unstyled ">
                                        <li class="media my-4">
                                            <img class="mr-3" src="{{ asset('img/charla.png') }}" height="50px">
                                          <div class="media-body">
                                              <a href="{{ route('ventas-wifi.index') }}">
                                                 <h5>Consulta registro wifi</h5>
                                              </a>
                                            <p> Consulta wifi</p>
                                          </div>
                                        </li>

                                        {{-- Este es el nodal para el wifi --}}
                                        <!-- Modal -->
                            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Crear Registro Wifi</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  
                                  <div class="modal-body">
                                    {{---inicio formulario para crear un pase de salida--------------}}
                              <form action=" {{url('/atencion-al-cliente/ventas-linea/wifi123')}} " method="post">
                                @csrf
                               
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                  <div class="form-group">
                                    <label  style="font-size:16px; font-weight:bold; color:rgb(92, 92, 92)"  for="id">Ingrese el numero personal:</label>
                                    <input  style="font-size:16px;"  class="form-control" type="text" name="id" id="id">
                                  </div>
                                </div>
                                  <br>
                                    <ul class="list-unstyled">
                                    <div class="media-body">
                                      <input  type="submit"  class="btn btn-primary" value="Continuar">
                                    </div>
                              </form>
                                  </div>
                                
                                </div>
                              </div>
                            </div>
                            
                           

                            {{-- final --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
