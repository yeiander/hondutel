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

                            <div class="container">
                              <div class="row">
                                <div class="col-sm">
                                  <label style="font-size:16px; font-weight:bold; color:rgb(92, 92, 92)"  for="clienteNombre">Nombre del cliente: {{$registrowifi->clienteNombre}}</label><br>
                                  <label style="font-size:16px; font-weight:bold; color:rgb(92, 92, 92)"  for="clienteCorreo">Correo: {{$registrowifi->clienteCorreo}}</label><br>
                            <label style="font-size:16px; font-weight:bold; color:rgb(92, 92, 92)"  for="clienteProfesion">Profesion: {{$registrowifi->clienteProfesion}}</label>
                                </div>

                                <div class="col-sm">
                                  <label style="font-size:16px; font-weight:bold; color:rgb(92, 92, 92)"  for="telefonoContacto">Contacto: {{$registrowifi->telefonoContacto}}</label><br>
                            <label style="font-size:16px; font-weight:bold; color:rgb(92, 92, 92)"  for="clienteDireccionTrabajo">Direccion del Trabajo: {{$registrowifi->clienteDireccionTrabajo}}</label><br>
                            <label style="font-size:16px; font-weight:bold; color:rgb(92, 92, 92)"  for="clienteEstadoCivil">Estado Civil: {{$registrowifi->clienteEstadoCivil}}</label><br>
                                </div>

                                <div class="col-sm">
                                  <label style="font-size:16px; font-weight:bold; color:rgb(92, 92, 92)"  for="cuotas">Cuotas: {{$registrowifi->cuotas}}</label><br>
                                  <label style="font-size:16px; font-weight:bold; color:rgb(92, 92, 92)"  for="numeroCuotas">Numero de cuotas: {{$registrowifi->numeroCuotas}}</label><br>
                                  <label style="font-size:16px; font-weight:bold; color:rgb(92, 92, 92)"  for="nombreBeneficiario">Beneficiario:{{$registrowifi->nombreBeneficiario}}</label><br>
                                  <label style="font-size:16px; font-weight:bold; color:rgb(92, 92, 92)"  for="beneficiarioParentesco">Parentesco: {{$registrowifi->beneficiarioParentesco}}</label>
                                </div>
                              </div>
                            </div>

                            <form action=" {{url('/atencion-al-cliente/ventas-wifi')}} " method="post">
                                @csrf
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     {{-- columna1 inicio --}}º
                                     <div class="col-xs-12 col-sm-12 col-md-12">
                                      <div class="form-group">
                                         <label style="font-size:16px; font-weight:bold; color:rgb(92, 92, 92)"  for="rtn">R.T.N.:</label>
                                         <input style="font-size:14px;" class="form-control" type="text" name="rtn" id="rtn">
                                       </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                      <div class="form-group">
                                         <label style="font-size:16px; font-weight:bold; color:rgb(92, 92, 92)"  for="wifiTelefonoAsociado">Telefono Asociado:</label>
                                         <input style="font-size:14px;" class="form-control" type="text" name="wifiTelefonoAsociado" id="wifiTelefonoAsociado">
                                       </div>
                                    </div>

         
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                      <div class="form-group">
                                         <label style="font-size:16px; font-weight:bold; color:rgb(92, 92, 92)"  for="clienteTelefonoOficina">Telefono de Oficina:</label>
                                         <input style="font-size:14px;" class="form-control" type="text" name="clienteTelefonoOficina" id="clienteTelefonoOficina">
                                       </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                      <div class="form-group">
                                         <label style="font-size:16px; font-weight:bold; color:rgb(92, 92, 92)"  for="propietarioLinea">Linea del propietario:</label>
                                         <input style="font-size:14px;" class="form-control" type="text" name="propietarioLinea" id="propietarioLinea">
                                       </div>
                                    </div>

                                    
                                   
                                    

                                    

                                     {{-- coloumna1 final --}}
                                    </div>

                                    <div class="col-sm">
                                      {{-- columna2 inicio --}}

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                      <div class="form-group">
                                         <label style="font-size:16px; font-weight:bold; color:rgb(92, 92, 92)"  for="categorias">Categotias:</label>
                                         <input style="font-size:14px;" class="form-control" type="text" name="categorias" id="categorias">
                                       </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                      <div class="form-group">
                                         <label style="font-size:16px; font-weight:bold; color:rgb(92, 92, 92)"  for="fechaSolicitud">Fecha de Solicitud:</label>
                                         <input style="font-size:14px;" class="form-control" type="text" name="fechaSolicitud" id="fechaSolicitud">
                                       </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                      <div class="form-group">
                                         <label style="font-size:16px; font-weight:bold; color:rgb(92, 92, 92)"  for="nombrePropietario">Nombre del propietario:</label>
                                         <input style="font-size:14px;" class="form-control" type="text" name="nombrePropietario" id="nombrePropietario">
                                       </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                      <div class="form-group">
                                         <label style="font-size:16px; font-weight:bold; color:rgb(92, 92, 92)"  for="clienteDireccionTrabajo">Equipo de instalacion:</label>
                                         <input style="font-size:14px;" class="form-control" type="text" name="clienteDireccionTrabajo" id="clienteDireccionTrabajo">
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