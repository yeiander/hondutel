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
                            <form action=" {{url('/atencion-al-cliente/registro-averia ')}} " method="post">
                                @csrf
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     {{-- columna1 inicio --}}
                                     <div class="col-xs-12 col-sm-12 col-md-12">
                                      <div class="form-group">
                                         <label style="font-size:16px; font-weight:bold; color:rgb(92, 92, 92)"  for="numerodearmario">Armario:</label>
                                         <input style="font-size:14px;" class="form-control" type="text" name="numerodearmario" id="numerodearmario">
                                       </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                      <div class="form-group">
                                         <label style="font-size:16px; font-weight:bold; color:rgb(92, 92, 92)"  for="reddirecta">Red directa:</label>
                                         <input style="font-size:14px;" class="form-control" type="text" name="reddirecta" id="reddirecta">
                                       </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group"> 
                                        <label style="font-size:16px; font-weight:bold; color:rgb(92, 92, 92)"  for="parprimario">Par primario:</label>
                                        <input style="font-size:14px;" class="form-control" type="text" name="parprimario" id="parprimario">
                                      </div>
                                      </div>

                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group"> 
                                        <label style="font-size:16px; font-weight:bold; color:rgb(92, 92, 92)"  for="parprimario">Fecha de reporte:</label>
                                        <input style="font-size:14px;" class="form-control" type="date" name="parprimario" id="parprimario">
                                      </div>
                                      </div>

                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group"> 
                                        <label style="font-size:16px; font-weight:bold; color:rgb(92, 92, 92)"  for="parprimario">Falla:</label>
                                        <input style="font-size:14px;" class="form-control" type="text" name="parprimario" id="parprimario">
                                      </div>
                                      </div>
                  

                                     {{-- coloumna1 final --}}
                                    </div>

                                    <div class="col-sm">
                                      {{-- columna2 inicio --}}
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                           <label style="font-size:16px; font-weight:bold; color:rgb(92, 92, 92)"  for="parsecundario">Par secundario:</label>
                                           <input style="font-size:14px;" class="form-control" type="text" name="parsecundario" id="parsecundario">
                                         </div>
                                      </div>

                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                           <label style="font-size:16px; font-weight:bold; color:rgb(92, 92, 92)"  for="cajaterminal">Caja terminal:</label>
                                           <input style="font-size:14px;" class="form-control" type="text" name="cajaterminal" id="cajaterminal">
                                         </div>
                                      </div>

                                       <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                           <label style="font-size:16px; font-weight:bold; color:rgb(92, 92, 92)"  for="bornes">Bornes:</label>
                                           <input style="font-size:14px;" class="form-control" type="text" name="bornes" id="bornes">
                                         </div>
                                      </div>

                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                           <label style="font-size:16px; font-weight:bold; color:rgb(92, 92, 92)"  for="bornes">Usuario:</label>
                                           <input style="font-size:14px;" class="form-control" type="text" name="bornes" id="bornes">
                                         </div>
                                      </div>


                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
             
                                           <input value ="pendiente" style="font-size:14px;" class="form-control" type="hidden" name="estadoAveria" id="estadoAveria">
                                         </div>
                                      </div>
                                     {{-- coloumna2 final --}}
                                    </div>
                                </div>       
                                              <br>
                                              <ul class="list-unstyled">
                                        
                                                  <div class="media-body">
                              
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