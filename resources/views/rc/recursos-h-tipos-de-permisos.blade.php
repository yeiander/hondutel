@extends('layouts.app')

@section('content')
    <section class="">
        <div class="section-header" style="max-height: 3rem;">
            <h5 class="page__heading">Recursos Humanos</h5>
        </div>
        <div class="section-body">
          <h4><center> (seleccion de tipo de permiso)</center></h4>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            {{-- inicio --}}

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

                            <div class="container">
                                <div class="row">
                                  <div class="col-sm">
                                    {{-- One of three columns --}}
                                    
                            <ul class="list-unstyled ">
                              <li class="media my-4">
                                  <a href="{{ route('pase-salida.create') }}"><img  class="mr-3" src="{{ asset('img/crearPermisos.png') }}" height="50px"></a>
                                <div class="media-body">
                                  <a type="button" class="" data-toggle="modal" data-target="#paseSalida">
                                       <h5>Pase de salida</h5></a>
                                       <p>Crear un pase de salida nuevo</p>
                                </div>
                              </li>

                              <ul class="list-unstyled ">
                                <li class="media my-4">
                                    <img class="mr-3" src="{{ asset('img/crearPermisos.png') }}" height="50px">
                                  <div class="media-body">
                                      <a href="{{ route('administrativo.create') }}">
                                         <h5>Permiso administrativo</h5>
                                      </a>
                                    
                                    <p>Crear un permiso (sección administrativa)</p>
                                  </div>
                                </li>

                                <ul class="list-unstyled ">
                                  <li class="media my-4">
                                      <a href="{{ route('ventas-rc.create') }}"><img  class="mr-3" src="{{ asset('img/crearPermisos.png') }}" height="50px"></a>
                                    <div class="media-body">
                                        <a  href="{{ route('ventas-rc.create') }}">
                                           <h5>Permiso de ventas</h5></a>
                                           <p>Crear un permiso (sección de ventas)</p>
                                    </div>
                                  </li>
                                    {{-- fin --}}
                                  </div>
                                  <div class="col-sm">
                                    {{-- One of three columns --}}
                                    
                            <ul class="list-unstyled ">
                              <li class="media my-4">
                                  <img class="mr-3" src="{{ asset('img/crearPermisos.png') }}" height="50px">
                                <div class="media-body">
                                  <a href="{{ route('permiso-personal.create') }}"><h5 class="mt-0 mb-1">Permiso personal</h5></a>
                                 <p>Crear un permiso personal nuevo</p>
                                </div>
                              </li>
                                    {{-- fin --}}
                                  </div>
                                </div>
                              </div>
                                 {{-- aqui termina el menu  --}}

                            
{{-- Modal pase de salida --}}

<div class="modal fade" id="paseSalida" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="paseSalidaLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="paseSalidaLabel">Pase de salida</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          {{-- FORMULARIO PARA CREAR UN PASE DE SALIDA                       --}}
          
        
          <form action=" {{url('/recursos-humanos-permisos/pase-salida/edit2')}} " method="post">
            @csrf
           
          
           <div class="col-xs-12 col-sm-12 col-md-12">
             <div class="form-group">
               <label  style="font-size:16px; font-weight:bold; color:rgb(92, 92, 92)"  for="fk_id_empleado">Ingrese el numero personal:</label>
               <input  style="font-size:16px;"  class="form-control" type="text" name="fk_id_empleado" id="fk_id_empleado">
             </div>
           </div>
             
               <br>
               <ul class="list-unstyled">
                   <div class="media-body">
                     <input  type="submit"  class="btn btn-primary" value="Guardar">
          </form>
                        
                           
        </div>
      
        <div class="modal-footer">
         
        </div>
      </div>
    </div>
  </div>
{{-- Final modal pase de salida --}}

                            {{-- final --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
@endsection

