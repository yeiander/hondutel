@extends('layouts.app')

@section('content')
    <section class="">
        <div class="section-header"  style="max-height: 3rem;">
            {{-- <h5 class="page__heading">Crear usuarios</h5> --}}
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="text-center">Crear usuarios</h3>

                            {{-- codigo por si se genero un error --}}
                            @if ($errors->any())
                            <div class="alert alert-dark alert-dismissible fade show" role="alert">
                                  <strong>Revise los campos</strong>
                                @foreach($errors->all() as $error)
                                  <span class="badge badge-danger">{{$error}}</span>
                                @endforeach
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                  </button>
                            </div>
                            @endif
                            
                            {{-- laravel collective --}}
                            {!! Form::open(array('route'=>'usuarios.store', 'method'=>'POST')) !!}
                          {{-- <div class="row">
                               <div class="col-xs-12 col-sm-12 col-md-12">
                                   <div class="form-group">
                                       <label for="name">Nombre</label>
                                       {!! Form::text('name',null,array('class'=>'form-control')) !!}
                                   </div>
                               </div>

                               <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="name">Email</label>
                                    {!! Form::text('email',null,array('class'=>'form-control')) !!}
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    {!! Form::password('password', array('class'=>'form-control')) !!}
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="name">Confirmar Password</label>
                                    {!! Form::password('confirm-password', array('class'=>'form-control')) !!}
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="name">Roles</label>
                                    {!! Form::select('roles[]', $roles, array('class'=>'form-control')) !!}
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                  <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>

                          </div> --}}

                          <div class="container">
                            <div class="row">
                              <div class="col-sm">
                               {{-- 1 --}}
                               <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="name">Nombre</label>
                                    {!! Form::text('name',null,array('class'=>'form-control')) !!}
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="name">Email</label>
                                    {!! Form::text('email',null,array('class'=>'form-control')) !!}
                                </div>
                            </div>


                               {{-- 1 --}}
                              </div>
                              <div class="col-sm">
                               {{-- 1 --}}
                               <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    {!! Form::password('password', array('class'=>'form-control')) !!}
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="name">Confirmar Password</label>
                                    {!! Form::password('confirm-password', array('class'=>'form-control')) !!}
                                </div>
                            </div>


                               {{-- 1 --}}
                              </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="name">Roles</label>
                                    {!! Form::select('roles[]', $roles, array('class'=>'form-control')) !!}
                                </div>
                            </div>
    
        
                          <button style="margin-right: 1rem"  class="btn btn-primary" id="botonGuardar"  type="submit"  style="font-size: 13px" class="btn btn-primary"><i style="font-size: 15px" class="fa fa-check" aria-hidden="true"></i> Guardar</button>
                                          <a href="{{ route('usuarios.index') }}" class="btn btn-danger" id="botonCancelar"  type="button"  style="font-size: 12px"><i style="font-size: 15px" class="fa fa-times" aria-hidden="true"></i> Cancelar</a>

                          </div>
                         

                            {!! Form::close() !!}
                            {{-- para no confundirme aqui temrina el formulario --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection