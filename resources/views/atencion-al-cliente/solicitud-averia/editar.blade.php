@extends('layouts.app')
@section('content')
    <section class="section">
        <div class="section-header"  style="max-height: 3rem;">
            <h5 class="page__heading">Aprobar Solicitud de Averia</h5>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            {{-- inicio --}}
                            <form action=" {{ url('/atencion-al-cliente/solicitud-averia/'.$registro->id)}} " method="post">
                                @csrf
                                {{ method_field('PATCH')}}    
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     {{-- columna1 inicio --}}
                                     <div id="dia1Div" class="input-group mb-3">
                                      <div class="input-group-prepend">
                                        <span  style="font-weight:bold;" class="input-group-text" id="inputGroup-sizing-default">Nombre del cliente:</span>
                                      </div>
                                      <input id="nombreCliente"  value="{{$registro->numeroDeLinea}}"  style="font-weight:bold;" type="text" class="form-control" readonly aria-describedby="inputGroup-sizing-default">
                                    </div>

                                    <div id="dia1Div" class="input-group mb-3">
                                      <div class="input-group-prepend">
                                        <span  style="font-weight:bold;" class="input-group-text" id="inputGroup-sizing-default">Contacto:</span>
                                      </div>
                                      <input id="contacto"  value="{{$registro->contacto}}"  style="font-weight:bold;" type="text" class="form-control" readonly aria-describedby="inputGroup-sizing-default">
                                    </div>

                                     <div id="dia1Div" class="input-group mb-3">
                                      <div class="input-group-prepend">
                                        <span  style="font-weight:bold;" class="input-group-text" id="inputGroup-sizing-default">Fecha de solicitud:</span>
                                      </div>
                                      <input id="fechaDeSolicitud"  value="{{$registro->fechaDeSolicitud}}"  style="font-weight:bold;" type="text" class="form-control" readonly aria-describedby="inputGroup-sizing-default">
                                    </div>

                                    <div id="dia1Div" class="input-group mb-3">
                                      <div class="input-group-prepend">
                                        <span  style="font-weight:bold;" class="input-group-text" id="inputGroup-sizing-default">Armario:</span>
                                      </div>
                                      <input id="numerodearmario" style="font-weight:bold;" type="text" class="form-control"  aria-describedby="inputGroup-sizing-default">
                                    </div>        
                                    
                                    <div id="dia1Div" class="input-group mb-3">
                                      <div class="input-group-prepend">
                                        <span  style="font-weight:bold;" class="input-group-text" id="inputGroup-sizing-default">Red directa:</span>
                                      </div>
                                      <input id="reddirecta" style="font-weight:bold;" type="text" class="form-control"  aria-describedby="inputGroup-sizing-default">
                                    </div>   

                                    <div id="dia1Div" class="input-group mb-3">
                                      <div class="input-group-prepend">
                                        <span  style="font-weight:bold;" class="input-group-text" id="inputGroup-sizing-default">Par primario:</span>
                                      </div>
                                      <input id="parprimario" style="font-weight:bold;" type="text" class="form-control"  aria-describedby="inputGroup-sizing-default">
                                    </div> 

                                    <div id="dia1Div" class="input-group mb-3">
                                      <div class="input-group-prepend">
                                        <span  style="font-weight:bold;" class="input-group-text" id="inputGroup-sizing-default">Fecha de reporte:</span>
                                      </div>
                                      <input id="fechareporte" style="font-weight:bold;" type="date" class="form-control" aria-describedby="inputGroup-sizing-default">
                                    </div> 

                                    <div id="dia1Div" class="input-group mb-3">
                                      <div class="input-group-prepend">
                                        <span  style="font-weight:bold;" class="input-group-text" id="inputGroup-sizing-default">Falla:</span>
                                      </div>
                                      <input id="falla" style="font-weight:bold;" type="text" class="form-control"  aria-describedby="inputGroup-sizing-default">
                                    </div> 
                            

                                     {{-- coloumna1 final --}}
                                    </div>

                                    <div class="col-sm">
                                      {{-- columna2 inicio --}}

                                      <div id="dia1Div" class="input-group mb-3">
                                        <div class="input-group-prepend">
                                          <span  style="font-weight:bold;" class="input-group-text" id="inputGroup-sizing-default">Numero de linea:</span>
                                        </div>
                                        <input id="numeroDeLinea"  readonly value="{{$registro->numeroDeLinea}}"  style="font-weight:bold;" type="text" class="form-control"  aria-describedby="inputGroup-sizing-default">
                                      </div> 

                                      <div id="dia1Div" class="input-group mb-3">
                                        <div class="input-group-prepend">
                                          <span  style="font-weight:bold;" class="input-group-text" id="inputGroup-sizing-default">Direccion:</span>
                                        </div>
                                        <input id="direccion"  readonly value="{{$registro->direccion}}"  style="font-weight:bold;" type="text" class="form-control"  aria-describedby="inputGroup-sizing-default">
                                      </div> 

                                      <div id="dia1Div" class="input-group mb-3">
                                        <div class="input-group-prepend">
                                          <span  style="font-weight:bold;" class="input-group-text" id="inputGroup-sizing-default">Tipo de Averia:</span>
                                        </div>
                                        <input id="tipoaveria"  readonly value="{{$registro->tipoaveria}}"  style="font-weight:bold;" type="text" class="form-control"  aria-describedby="inputGroup-sizing-default">
                                      </div> 

                                      <div id="dia1Div" class="input-group mb-3">
                                        <div class="input-group-prepend">
                                          <span  style="font-weight:bold;" class="input-group-text" id="inputGroup-sizing-default">Par secundario:</span>
                                        </div>
                                        <input id="parsecundario"  v  style="font-weight:bold;" type="text" class="form-control"  aria-describedby="inputGroup-sizing-default">
                                      </div> 

                                       <div id="dia1Div" class="input-group mb-3">
                                        <div class="input-group-prepend">
                                          <span  style="font-weight:bold;" class="input-group-text" id="inputGroup-sizing-default">Caja terminal:</span>
                                        </div>
                                        <input id="cajaterminal"   style="font-weight:bold;" type="text" class="form-control"  aria-describedby="inputGroup-sizing-default">
                                      </div> 

                                      <div id="dia1Div" class="input-group mb-3">
                                        <div class="input-group-prepend">
                                          <span  style="font-weight:bold;" class="input-group-text" id="inputGroup-sizing-default">Bornes:</span>
                                        </div>
                                        <input id="bornes"  style="font-weight:bold;" type="text" class="form-control"  aria-describedby="inputGroup-sizing-default">
                                      </div>

                                      <div id="dia1Div" class="input-group mb-3">
                                        <div class="input-group-prepend">
                                          <span  style="font-weight:bold;" class="input-group-text" id="inputGroup-sizing-default">Usuario:</span>
                                        </div>
                                        <input id="usuario" style="font-weight:bold;" type="text" class="form-control"  aria-describedby="inputGroup-sizing-default">
                                      </div>


                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
             
                                           <input value="etapa2" style="font-size:14px;" class="form-control" type="hidden" name="estado" id="estado">
                                         </div>
                                      </div>
                                     {{-- coloumna2 final --}}
                                    </div>
                                </div>       
                                              <br>
                                              <ul class="list-unstyled">
                                        
                                                  <div class="media-body">
                              
                                            <input  type="submit"  class="btn btn-primary" value="Aprobar">
                                         </form>
                                           
                               
                             {{-- final --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection