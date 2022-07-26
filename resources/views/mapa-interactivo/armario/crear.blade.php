@extends('layouts.app')
@section('content')
    <section class="section">
        <div class="section-header"  style="max-height: 3rem;">
            <h5 class="page__heading">Crear Nuevo Armario</h5>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            {{-- inicio --}}
                            <form action=" {{url('/mapa-interactivo/armario/')}} " method="post">
                                @csrf
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     {{-- columna1 inicio --}}
                                    

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                          <label  style="font-size:16px; font-weight:bold; color:rgb(92, 92, 92)"  for="NumeroArmario" required>Numero de Armario:</label>
                                            <select class="form-control" id="NumeroArmario" name="NumeroArmario">
                                                <option disabled selected value="">seleccione un numero</option>
                                              <option value="1103">1103</option>
                                              <option value="1102">1102</option>
                                              <option value="1101">1101</option>
                                              <option value="103">103</option>
                                              <option value="2101">2101</option>
                                              <option value="2102">2102</option>
                                              <option value="2201">2202</option>
                                              <option value="2201">2201</option>
                                              <option value="301">301</option>
                                              <option value="1001">1001</option>
                                            </select>
                                        </div>
                                      </div>

                                     {{-- coloumna1 final --}}
                                    </div>

                                    <div class="col-sm">
                                      {{-- columna2 inicio --}}
                                      

                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                           <label style="font-size:16px; font-weight:bold; color:rgb(92, 92, 92)"  for="gps_armario">GPS armario:</label>
                                           <input placeholder="Ingresar gps de armario" style="font-size:14px;" class="form-control" type="text" name="gps_armario" id="gps_armario">
                                         </div>
                                      </div>

                                      
                                     {{-- coloumna2 final --}}

                                    </div>
                                </div>       
                                
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                      <label  style="font-size:16px; font-weight:bold; color:rgb(92, 92, 92)"  for="barrio" required>Lugares:</label>
                                        <select class="form-control" id="barrio" name="barrio">
                                            <option disabled selected value="">seleccione un lugar</option>
                                          <option value="Barrio de Jesus">Barrio de Jesus</option>
                                          <option value="Barrio el Centro">Barrio el Centro</option>
                                          <option value="Barrio Buenos Aires">Barrio Buenos Aires</option>
                                          <option value="Barrio el Campo">Barrio el Campo</option>
                                          <option value="Barrio Calona">Barrio Calona</option>
                                          <option value="Colonia la Sosa Lobo">Colonia la Sosa Lobo</option>
                                          <option value="Barrio el Portillo">Barrio el Portillo</option>
                                          <option value="Colonia Santa Eduvijes">Colonia Santa Eduvijes</option>
                                          <option value="Colonia Maria Regina">Colonia Maria Regina</option>
                                          <option value="Barrio el Eden">Barrio el Eden</option>
                                          <option value="Barrio Belen">Barrio Belen</option>
                                        </select>
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