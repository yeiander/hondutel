@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header"  style="max-height: 3rem;">
            <h5 class="page__heading">Usuarios:</h5>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            
                            {{-- aqui ira todo el contenido --}}
                            {{-- <h3 class="text-center">Dashboard Content</h3> --}}
                           
                            <ul class="list-unstyled">
                                <li class="media">
                                    <img class="align-self-center mr-3" src="{{ asset('img/permiso.png') }}" height="50px">
                                  <div class="media-body">
                                    <a class="btn btn-primary" href="{{ route('usuarios.create') }}">nuevo</a>
                                   {{-- <p>creacion de nuevos usuarios</p> --}}
                                  </div>
                                </li>
                            </ul>
                           
                            
                             {{-- Tabla de usuarios --}}
                            <table class="table table-striped mt-2">
                                   <thead style="background-color:#6777ef;">
                                     <th style="display:none">Id</th>
                                     <th style="color: #fff;">Nombre</th>
                                     <th style="color: #fff">E-mail</th>
                                     <th style="color: #fff;">Rol</th>
                                     
                                     <th style="color: #fff;">Accion</th>
                                     
                                  </thead>
                                  <tbody>
                                      @foreach ($usuarios as $usuario)
                                        <tr>
                                             <td style="display: none;">{{$usuario->id}}</td>
                                             <td>{{$usuario->name}}</td>
                                             <td>{{$usuario->email}}</td>
                                             {{-- este codigo siguiente lo provee Spatie para mostrar los roles mas facil: --}}
                                             <td>
                                                @if(!empty($usuario->getRoleNames()))
                                                  @foreach($usuario->getRoleNames() as $rolName)
                                                  <h5><span class="badge badge-dark">{{$rolName}}</span></h5>
                                                  @endforeach
                                                @endif
                                             </td>
                                             <td>
                                                 
                                                 <a class="btn btn-info" href="{{route('usuarios.edit', $usuario->id)}}">Editar</a>
                                                 
                                                 {{-- laravel Collective  --}}
                                                 
                                                 {!! Form::open(['method'=>'DELETE','route'=>['usuarios.destroy', $usuario->id], 'style'=>'display:inline']) !!}
                                                      {!! Form::submit('Borrar',['class'=>'btn btn-danger']) !!}
                                                 {!! Form::close() !!}    
                                                 
                                             </td>
                                        </tr>
                                          
                                      @endforeach
                                  </tbody>
                             </table>
                             {{-- esto es para la paginacion --}}
                             <div class="pagination justify-content-end">
                                 {!! $usuarios->links() !!}
                             </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

