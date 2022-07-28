@extends('layouts.app')

@section('content')
    <section class="">
        <div class="section-header" style="max-height: 4rem;">
        </div>
        <div class="section-body">
            
            <center><h4 id="paseSalidaMensaje">Crear un permiso de incapacidad:</h4></center>
            
        
        
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">        
                      
                            <div class="col-xs-12 col-sm-12 col-md-12">
                              <div class="form-group">
                                <label  style="font-size:17px; font-weight:bold; color:rgb(92, 92, 92)"  for="nombreEmpleado">Empleado: {{ $empleado->nombreEmpleado }}</label>
                              </div>
                            </div>
  
  @if ($errors->any())
    <div class="alert alert-dark alert-dismissible fade show" role="alert">
      <strong>Complete los campos</strong>
        @foreach($errors->all() as $error)
          <span class="badge badge-danger">{{$error}}</span>
        @endforeach
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
    </div>
  @endif
                                            {{-- FORMULARIO PARA CREAR UN PERMISO DE INCAPACIDAD  --}}

                                         
                               <form id="form" action=" {{url('/recursos-humanos-permisos/incapacidad')}} " method="post">
                                 @csrf
  
                                 <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                     {{-- INICIO --}}
                                     <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                          <span  style="font-weight:bold;" class="input-group-text" id="inputGroup-sizing-default">Numero personal:</span>
                                        </div>
                                        <input id="fk_id_empleado" name="fk_id_empleado"  style="font-weight:bold;" type="text" class="form-control" readonly value="{{ $empleado->id }}" aria-describedby="inputGroup-sizing-default">
                                      </div>

                                      <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                          <span  style="font-weight:bold;" class="input-group-text" id="inputGroup-sizing-default">Numero de certificado:</span>
                                        </div>
                                        <input id="numCertificadoIncapacidad" name="numCertificadoIncapacidad"  style="font-weight:bold;" type="text" required class="form-control" aria-describedby="inputGroup-sizing-default">
                                      </div>

                                      <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                          <span  style="font-weight:bold;" class="input-group-text" id="inputGroup-sizing-default">Numero de afiliación:</span>
                                        </div>
                                        <input id="numAfiliacionIncapacidad" name="numAfiliacionIncapacidad"  style="font-weight:bold;" type="text" required class="form-control" aria-describedby="inputGroup-sizing-default">
                                      </div>

                                      <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                          <span  style="font-weight:bold;" class="input-group-text" id="inputGroup-sizing-default">Tipo de enfermedad:</span>
                                        </div>
                                        <input id="motivoTrabajoEnfermedad" name="motivoTrabajoEnfermedad"  style="font-weight:bold;" type="text" required class="form-control" aria-describedby="inputGroup-sizing-default">
                                      </div>

                                      <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                          <span  style="font-weight:bold;" class="input-group-text" id="inputGroup-sizing-default">Fecha de solicitud:</span>
                                        </div>
                                        <input id="fechaSolicitudPermiso" name="fechaSolicitudPermiso"  style="font-weight:bold;" type="date" required class="form-control" aria-describedby="inputGroup-sizing-default">
                                      </div>

                                     {{-- FIN --}}
                                    </div>
                                    <div class="col-sm">
                                       {{-- INICIO --}}
                                       <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                          <span  style="font-weight:bold;" class="input-group-text" id="inputGroup-sizing-default">Fecha de inicio:</span>
                                        </div>
                                        <input style="font-weight:bold;" id="fechaInicioIncapacidad" name="fechaInicioIncapacidad" type="date" required class="form-control" aria-describedby="inputGroup-sizing-default">
                                      </div>

                                      <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                          <span  style="font-weight:bold;" class="input-group-text" id="inputGroup-sizing-default">Fecha de finalización:</span>
                                        </div>
                                        <input style="font-weight:bold;" id="fechafinalIncapacidad" name="fechafinalIncapacidad" type="date" required class="form-control" aria-describedby="inputGroup-sizing-default">
                                      </div>

                                       <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                          <span  style="font-weight:bold;" class="input-group-text" id="inputGroup-sizing-default">Total de dias:</span>
                                        </div>
                                        <input id="totalDiasIncapacidad" name="totalDiasIncapacidad" style="font-weight:bold;" type="text" required class="form-control" aria-describedby="inputGroup-sizing-default">
                                      </div>

                                      <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                          <span  style="font-weight:bold;" class="input-group-text" id="inputGroup-sizing-default">CPU/IHSS:</span>
                                        </div>
                                        <input id="ihss"  name="ihss" style="font-weight:bold;" type="text" class="form-control" required aria-describedby="inputGroup-sizing-default">
                                      </div>

                                      
                                     {{-- FIN --}}
                                    </div>
                                  </div>

                                    <hr>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                    <ul class="list-unstyled">
                                        <div class="media-body">
                                          
                                          <button style="margin-right: 1rem"  class="btn btn-primary" id="botonGuardar"  type="submit"  style="font-size: 13px" class="btn btn-primary"><i style="font-size: 15px" class="fa fa-check" aria-hidden="true"></i> Enviar</button>
                                          <a href="{{ route('recursos-h-tipos-de-permisos') }}" class="btn btn-danger" id="botonCancelar"  type="button"  style="font-size: 12px"><i style="font-size: 15px" class="fa fa-times" aria-hidden="true"></i> Cancelar</a>
                                        </div>
                                      </ul>
                                    </div>
                               </form>
                               
                            </div>
                            {{-- final --}}

                            <div id="mensajeError" style="display: none">
                              <center><h4>agotaste el numero de pases de salida para este mes</h4></center>
                            </div>
                            <div id="mensajeError2" style="display: none">
                              <center><h4>agotaste el numero de pases de salida para esta semana</h4></center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @section('scripts')
    <script>
      
    
        // es para desabilitar al hacer submit una sola vez
    $('#form').one('submit', function() {
    $(this).find('button[type="submit"]').attr('disabled','disabled');
});

    </script>
    @endsection
@endsection

