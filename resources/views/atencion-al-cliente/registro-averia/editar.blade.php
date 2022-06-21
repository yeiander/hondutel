@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header"  style="max-height: 3rem;">
            <h5 class="page__heading">Crear nuevo registro</h5>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            {{-- inicio --}}
                            <form action=" {{url('/atencion-al-cliente/registro-averia/'.$registro->id)}} " method="post">
                                @csrf
                                {{ method_field('PATCH')}}
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     {{-- columna1 inicio --}}
                                     <div class="col-xs-12 col-sm-12 col-md-12">
                                      <div class="form-group">
                                         <label style="font-size:16px; font-weight:bold; color:rgb(92, 92, 92)"  for="nombreCliente">Nombre del cliente:</label>
                                         <input value="{{$registro->nombreCliente}}" style="font-size:14px;" class="form-control" type="text" name="nombreCliente" id="nombreCliente">
                                       </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                      <div class="form-group">
                                         <label style="font-size:16px; font-weight:bold; color:rgb(92, 92, 92)"  for="contacto">Contacto:</label>
                                         <input value="{{$registro->contacto}}" style="font-size:14px;" class="form-control" type="text" name="contacto" id="contacto">
                                       </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                      <div class="form-group"> 
                                      <label style="font-size:16px; font-weight:bold; color:rgb(92, 92, 92)"  for="fechaDeSolicitud">Fecha de solicitud.</label>
                                      <input value="{{$registro->fechaDeSolicitud}}" style="font-size:14px;" class="form-control" type="date" name="fechaDeSolicitud" id="fechaDeSolicitud">
                                    </div>
                                    </div>

                                     {{-- coloumna1 final --}}
                                    </div>

                                    <div class="col-sm">
                                      {{-- columna2 inicio --}}
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                           <label style="font-size:16px; font-weight:bold; color:rgb(92, 92, 92)"  for="numeroDeLinea">Numero de linea:</label>
                                           <input value="{{$registro->numeroDeLinea}}" style="font-size:14px;" class="form-control" type="text" name="numeroDeLinea" id="numeroDeLinea">
                                         </div>
                                      </div>

                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                           <label style="font-size:16px; font-weight:bold; color:rgb(92, 92, 92)"  for="Direccion">Direccion:</label>
                                           <input value="{{$registro->direccion}}" style="font-size:14px;" class="form-control" type="text" name="Direccion" id="Direccion">
                                         </div>
                                      </div>

                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                           <label style="font-size:16px; font-weight:bold; color:rgb(92, 92, 92)"  for="Megas">Megas:</label>
                                           <input value="{{$registro->Megas}}" style="font-size:14px;" class="form-control" type="text" name="Megas" id="Megas">
                                         </div>
                                      </div>
                                     {{-- coloumna2 final --}}
                                    </div>
                                </div>       
                                              <br>
                                              <ul class="list-unstyled">
                                        
                                                  <div class="media-body">
                                                    {{-- <a class="btn btn-warning" href="{{ route('pase-salida.index') }}">cancelar</a> --}}
                                            <input  type="submit"  class="btn btn-primary" value="Guardar">
                                         </form>
                                           
                               
                             {{-- final --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
