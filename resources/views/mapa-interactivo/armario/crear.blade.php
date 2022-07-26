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
                                         <label style="font-size:16px; font-weight:bold; color:rgb(92, 92, 92)"  for="NumeroArmario">Numero de armario:</label>
                                         <input placeholder="Ingresar numero de armario" style="font-size:14px;" class="form-control" type="text" name="NumeroArmario" id="NumeroArmario">
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
                                     <label style="font-size:16px; font-weight:bold; color:rgb(92, 92, 92)"  for="">barrios/colonias</label>
                                     <input placeholder="Ingresar barrios y colonias" style="font-size:14px;" class="form-control" type="text" name="barrio" id="barrio">
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