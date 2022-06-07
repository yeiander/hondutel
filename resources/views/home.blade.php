@extends('layouts.app')
@section('content')
    <section class="section">
        <div class="section-header"  style="max-height: 3rem;">
          <h5 class="page__heading">Inicio.</h5>
        </div>
 
       <div style="display: none" name="notificaciones" id="notificaciones">
        <a id="NotificacionRecursosH" style="font-size: 1rem;"  href="{{ url('/recursos-humanos-permisos/pase-salida-admin') }}" style="margin-top: 0.5rem" type="button" class="btn btn-primary">
          Recursos humanos:<span style="font-size: 1rem" class="badge badge-light">{{ $paseSalida }}</span>
        </a>
       </div>

        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                          
    {{-------------------------- INICIO --------------------------}}
                        
                   
                       <input  name="NotificacionRecursosH" type="hidden" value="{{ $paseSalida }}">

                        <a style="font-size: 1rem" href="{{ route('averia-pendiente.index') }}" style="margin-top: 0.5rem" type="button" class="btn btn-danger">
            Registro j averia<span a style="font-size: 1rem" class="badge badge-light">{{$contadoraveria}}</span>
          </a>
    {{-------------------------- FINAL ---------------------------}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @section('scripts')
    <script>
      
      var  notificacionRecursosHumanos = document.getElementsByName("NotificacionRecursosH")[0].value;;
      console.log(notificacionRecursosHumanos);
     $(function(){
      
       if(notificacionRecursosHumanos > 0){
        $('#notificaciones').show();
       }
       
     });
     



     $(document).ready(function(){
   
    setTimeout(refrescar, 10000);
  });
  function refrescar(){
   
    location.reload();
  }
    </script>
    @endsection
@endsection


