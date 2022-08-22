@extends('layouts.app')
@section('content')
    <section class="section">
        <div class="section-header"  style="max-height: 3rem;">
            <h5 class="page__heading">Registro de caja terminal</h5>
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
                                         <label style="font-size:16px; font-weight:bold; color:rgb(92, 92, 92)"  for="Caja Terminal">Descripcion:</label>
                                         <input placeholder="Ingresar de descripcion" style="font-size:14px;" class="form-control" type="text" name="NumeroArmario" id="NumeroArmario">
                                       </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                      <div class="form-group">
                                         <label style="font-size:16px; font-weight:bold; color:rgb(92, 92, 92)"  for="Caja Terminal">Armario:</label>
                                         <select class="form-control" id="direccion" name="direccion">
                                          <option disabled selected value="">Seleccion armario</option>
                                          @foreach($armarios as $armario)
                                        <option value="{{$armario->numeroArmario}}">  {{$armario->numeroArmario}} </option>

                                        @endforeach
                                         </select>
                                       </div>
                                    </div>

                                     {{-- coloumna1 final --}}
                                    </div>

                                    <div class="col-sm">
                                      {{-- columna2 inicio --}}
                                      

                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                           <label style="font-size:16px; font-weight:bold; color:rgb(92, 92, 92)"  for="gps_armario">GPS caja terminal:</label>
                                           <input placeholder="Ingresar gps de caja terminal" style="font-size:14px;" class="form-control" type="text" name="gps_armario" id="gps_armario">
                                         </div>
                                      </div>

                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                          <label  style="font-size:16px; font-weight:bold; color:rgb(92, 92, 92)"  for="direccion" required>Direccion:</label>
                                           <select class="form-control" id="direccion" name="direccion">
                                            <option disabled selected value="">seleccione la direccion</option>
                                            <option value="Barrio Calona">Barrio Calona</option>
                                            <option value="Colonia Santos Calix">Colonia Santos Calix</option>
                                            <option value="Colonia Portal el Angel">Colonia Portal el Angel</option>
                                            <option value="Sesteo">Sesteo</option>
                                            <option value="Colonia el Trapiche">Colonia el Trapiche</option>
                                            <option value="Colonia San Ramon">Colonia San Ramon</option>
                                            <option value="Colonia Monte Palomar">Colonia Monte Palomar</option>
                                            <option value="Residencial Guanacaste">Residencial Guanacaste</option>
                                            <option value="Colonia Porvenir Norte">Colonia Porvenir Norte</option>
                                            <option value="Colonia Monte Fresco">Colonia Monte Fresco</option>
                                            <option value="Colonia Universidad Sur">Colonia Universidad Sur</option>
                                            <option value="Colonia la Granja">Colonia la Granja</option>
                                            <option value="Colonia Magarita">Colonia Margarita</option>
                                            <option value="Colonia Sosa Lobo">Colonia Sosa Lobo</option>
                                            <option value="Residencial el Trapiche">Residencial el Trapiche</option>
                                            <option value="Colonia Meneca">Colonia Meneca</option>
                                            <option value="Colonia Monte Palomar">Colonia Monte Palomar</option>
                                            <option value="Residencial la Florida">Residencial la Florida</option>
                                            <option value="Colonia la Prado Universitarios">Colonia la Prado Universitarios</option>
                                            <option value="Colonia Rivas Montes">Colonia Rivas Montes</option>
                                            <option value="Barrio la Hoya">Barrio la Hoya</option>
                                            <option value="Colonia Mina Guifarro">Colonia Mina Guifarro</option>
                                            <option value="Barrio el Castaño">Barrio el Castaño</option>
                                            <option value="Bulebar los Poetas">Bulevar los Poetas</option>
                                            <option value="Colonia Modelo">Colonia Modelo</option>
                                            <option value="Colonia Maria Regina">Colonia Maria Regina</option>
                                            <option value="Colonia los Angeles">Colonia los Angeles</option>
                                            <option value="Colonia Daniel Sanchez">Colonia Daniel Sanchez</option>
                                            <option value="Colonia la Solidaridad">Colonia la Solidaridad</option>
                                            <option value="Colonia Santa Julia">Colonia Santa Julia</option>
                                            <option value="Colonia Bella Vista">Colonia Bella Vista</option>
                                            <option value="Colonia Ciudad Jardines">Colonia Ciudad Jardines</option>
                                            <option value="Colonia Nazareth">Colonia Nazareth</option>
                                            <option value="Colonia Modelo">Colonia Modelo</option>
                                            <option value="Colonia Margarita 4">Colonia Margarita 4</option>
                                            <option value="Colonia la Cofradia">Colonia la Cofradia</option>
                                            <option value="Colonia Santa Julia">Colonia Santa Julia</option>
                                            <option value="Colonia las Colinas">Colonia las Colinas</option>
                                            <option value="Barrio de Jesus">Barrio de Jesus</option>
                                            <option value="Barrio las Acasias">Barrio las Acasias</option>
                                            <option value="Barrio Buenos Aires">Barrio Buenos Aires</option>
                                            <option value="Barrio el Portillo">Barrio el Portillo</option>
                                            <option value="Residencial los Robles">Residencial los Robles</option>
                                           </select>
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