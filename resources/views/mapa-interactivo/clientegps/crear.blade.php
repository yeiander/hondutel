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
                            <form action=" {{url('/mapa-interactivo')}} " method="post">
                                @csrf
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     {{-- columna1 inicio --}}
                                     <div class="col-xs-12 col-sm-12 col-md-12">
                                      <div class="form-group">
                                         <label style="font-size:16px; font-weight:bold; color:rgb(92, 92, 92)"  for="cliente">Nombre del cliente:</label>
                                         <input placeholder="ingresar cliente" style="font-size:14px;" class="form-control" type="text" name="cliente" id="cliente">
                                       </div>
                                    </div>


                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                      <div class="form-group">
                                         <label style="font-size:16px; font-weight:bold; color:rgb(92, 92, 92)"  for="direccion">Direccion:</label>
                                         <input placeholder="ingresar direccion" style="font-size:14px;" class="form-control" type="text" name="direccion" id="direccion">
                                       </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                      <div class="form-group">
                                         <label style="font-size:16px; font-weight:bold; color:rgb(92, 92, 92)"  for="contacto">Contacto:</label>
                                         <input placeholder="ingresar contacto" style="font-size:14px;" class="form-control" type="text" name="contacto" id="contacto">
                                       </div>
                                    {{-- </div> --}}

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                      <div class="form-group">
                                         <label style="font-size:16px; font-weight:bold; color:rgb(92, 92, 92)"  for="telefono">Telefono:</label>
                                         <input placeholder="ingresar telefono" style="font-size:14px;" class="form-control" type="text" name="telefono" id="'telefono">
                                       </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                      <div class="form-group">
                                         <label style="font-size:16px; font-weight:bold; color:rgb(92, 92, 92)"  for="gps">gps:</label>
                                         <input placeholder="ingresar gps"style="font-size:14px;" class="form-control" type="text" name="gps" id="gps">
                                       </div>
                                    </div>

                                     {{-- coloumna1 final --}}
                                    </div>

                                    <div class="col-sm">
                                      {{-- columna2 inicio --}}
                                     

                                     

                    

                                   
                                    
                                    </div>
                                </div>       
                                              <br>
                                              <ul class="list-unstyled">
                                        
                                                  <div class="media-body">
                                                    
                                            <input  type="submit"  class="btn btn-primary" value="Guardar">
                                         </form>
                                           
                               
                
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection