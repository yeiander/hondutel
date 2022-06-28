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
                            <form action=" {{url('/atencion-al-cliente/solicitud-averia/'.$registro->id)}} " method="post">
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
                                      <input id="numerodearmario"  value="{{$registro->numerodearmario}}"  style="font-weight:bold;" type="text" class="form-control"  aria-describedby="inputGroup-sizing-default">
                                    </div>        
                                    
                                    <div id="dia1Div" class="input-group mb-3">
                                      <div class="input-group-prepend">
                                        <span  style="font-weight:bold;" class="input-group-text" id="inputGroup-sizing-default">Red directa:</span>
                                      </div>
                                      <input id="reddirecta"  value="{{$registro->reddirecta}}"  style="font-weight:bold;" type="text" class="form-control"  aria-describedby="inputGroup-sizing-default">
                                    </div>   

                                    <div id="dia1Div" class="input-group mb-3">
                                      <div class="input-group-prepend">
                                        <span  style="font-weight:bold;" class="input-group-text" id="inputGroup-sizing-default">Par primario:</span>
                                      </div>
                                      <input id="parprimario"  value="{{$registro->parprimario}}"  style="font-weight:bold;" type="text" class="form-control"  aria-describedby="inputGroup-sizing-default">
                                    </div> 

                                    <div id="dia1Div" class="input-group mb-3">
                                      <div class="input-group-prepend">
                                        <span  style="font-weight:bold;" class="input-group-text" id="inputGroup-sizing-default">Fecha de reporte:</span>
                                      </div>
                                      <input id="fechareporte"  value="{{$registro->fechareporte}}"  style="font-weight:bold;" type="date" class="form-control" aria-describedby="inputGroup-sizing-default">
                                    </div> 

                                    <div id="dia1Div" class="input-group mb-3">
                                      <div class="input-group-prepend">
                                        <span  style="font-weight:bold;" class="input-group-text" id="inputGroup-sizing-default">Falla:</span>
                                      </div>
                                      <input id="falla"  value="{{$registro->falla}}"  style="font-weight:bold;" type="text" class="form-control"  aria-describedby="inputGroup-sizing-default">
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
                                        <input id="parsecundario"  value="{{$registro->parsecundario}}"  style="font-weight:bold;" type="text" class="form-control"  aria-describedby="inputGroup-sizing-default">
                                      </div> 

                                       <div id="dia1Div" class="input-group mb-3">
                                        <div class="input-group-prepend">
                                          <span  style="font-weight:bold;" class="input-group-text" id="inputGroup-sizing-default">Caja terminal:</span>
                                        </div>
                                        <input id="cajaterminal"  value="{{$registro->cajaterminal}}"  style="font-weight:bold;" type="text" class="form-control"  aria-describedby="inputGroup-sizing-default">
                                      </div> 

                                      <div id="dia1Div" class="input-group mb-3">
                                        <div class="input-group-prepend">
                                          <span  style="font-weight:bold;" class="input-group-text" id="inputGroup-sizing-default">Bornes:</span>
                                        </div>
                                        <input id="bornes"  value="{{$registro->bornes}}"  style="font-weight:bold;" type="text" class="form-control"  aria-describedby="inputGroup-sizing-default">
                                      </div>

                                      <div id="dia1Div" class="input-group mb-3">
                                        <div class="input-group-prepend">
                                          <span  style="font-weight:bold;" class="input-group-text" id="inputGroup-sizing-default">Usuario:</span>
                                        </div>
                                        <input id="usuario"  value="{{$registro->usuaurio}}"  style="font-weight:bold;" type="text" class="form-control"  aria-describedby="inputGroup-sizing-default">
                                      </div>


                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
             
                                           <input value ="pendiente" style="font-size:14px;" class="form-control" type="hidden" name="estadoAveria" id="estadoAveria">
                                         </div>
                                      </div>
                                     {{-- coloumna2 final --}}
                                    </div>
                                </div> 
                                <h3>Materia Invertido</h3>      
                                <div class="container">
                                    <div class="row">
                                      <div class="col-sm">    
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="si" id="abrazadera">
                                            <label class="form-check-label" for="abrazadera">
                                              Abrazadera
                                            </label>
                                          </div>
                                      </div>
                                      
                                      <div class="col-sm">   
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="si id="anillopostedec">
                                            <label class="form-check-label" for="anillopostedec">
                                              Anilla poste de c
                                            </label>
                                          </div>
                                      </div>

                                      <div class="col-sm">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="si" id="anillopostedem">
                                            <label class="form-check-label" for="anillopostedem">
                                                Anilla poste de m
                                            </label>
                                          </div>
                                      </div>

                                      <div class="container">
                                        <div class="row">
                                          <div class="col-sm">    
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="si" id="acomext">
                                                <label class="form-check-label" for="acomext">
                                                  Acom. ext
                                                </label>
                                              </div>
                                          </div>
                                          
                                          <div class="col-sm">   
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="si" id="acomint">
                                                <label class="form-check-label" for="acomint">
                                                    Acom. int
                                                </label>
                                              </div>
                                          </div>
    
                                          <div class="col-sm">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="si" id="cmodular">
                                                <label class="form-check-label" for="cmodular">
                                                    C. modular
                                                </label>
                                              </div>
                                          </div>

                                          <div class="container">
                                            <div class="row">
                                              <div class="col-sm">    
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="si" id="gdecasa">
                                                    <label class="form-check-label" for="gdecasa">
                                                      G. de casa
                                                    </label>
                                                  </div>
                                              </div>
                                              
                                              <div class="col-sm">   
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="si" id="mordazas">
                                                    <label class="form-check-label" for="mordazas">
                                                        Mordazas
                                                    </label>
                                                  </div>
                                              </div>
        
                                              <div class="col-sm">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="si" id="grapas">
                                                    <label class="form-check-label" for="grapas">
                                                        Grapas
                                                    </label>
                                                  </div>
                                              </div>

                                              <div class="container">
                                                <div class="row">
                                                  <div class="col-sm">    
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="si" id="grapasre">
                                                        <label class="form-check-label" for="grapasre">
                                                          Grapas R.E
                                                        </label>
                                                      </div>
                                                  </div>
                                                  
                                                  <div class="col-sm">   
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="si" id="ganchoj">
                                                        <label class="form-check-label" for="ganchoj">
                                                            Gancho J
                                                        </label>
                                                      </div>
                                                  </div>
            
                                                  <div class="col-sm">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="si" id="ganchosposte">
                                                        <label class="form-check-label" for="ganchosposte">
                                                            Ganchos p/poste de c
                                                        </label>
                                                      </div>
                                                  </div>

                                                  <div class="container">
                                                    <div class="row">
                                                      <div class="col-sm">    
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="si" id="grapasd">
                                                            <label class="form-check-label" for="grapasd">
                                                              Grapas D
                                                            </label>
                                                          </div>
                                                      </div>
                                                      
                                                      <div class="col-sm">   
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="si" id="cjumper">
                                                            <label class="form-check-label" for="cjumper">
                                                                C jumper
                                                            </label>
                                                          </div>
                                                      </div>
                
                                                      <div class="col-sm">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="si" id="protector">
                                                            <label class="form-check-label" for="protector">
                                                                Protector
                                                            </label>
                                                          </div>
                                                      </div>

                                                      <div class="container">
                                                        <div class="row">
                                                          <div class="col-sm">    
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="si" id="anclajeplastico">
                                                                <label class="form-check-label" for="anclajeplastico">
                                                                  Anclaje plastico
                                                                </label>
                                                              </div>
                                                          </div>

                                                          <div class="col-sm">   
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="si" id="conectoruy">
                                                                <label class="form-check-label" for="conectoruy">
                                                                    Conector U Y
                                                                </label>
                                                              </div>
                                                          </div>
                    
                                                          <div class="col-sm">
                                                            <div class="form-check">
                                                                </label>
                                                              </div>
                                                          </div>    
                                    </div>
                                  </div>                                
                                              <br>
                                              <ul class="list-unstyled">
                                        
                                                  <div class="media-body"><br>
                              
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