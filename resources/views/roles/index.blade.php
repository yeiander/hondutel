@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header"  style="max-height: 3rem;">
            <h5 class="page__heading">Roles</h5>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                              {{-- inicio --}}

                             
                             <a class="btn btn-primary" href="{{ route('roles.create') }}">Nuevo</a>
                             
                                 {{-- tabla de roles --}}
                                   <table class="table table-striped mt-2">
                                       <thead style="background-color:#6777ef;">
                                           <th style="color: #fff;">Rol</th>
                                          
                                           <th style="color: #fff;">Acciones</th>
                                          
                                       </thead>
                                       <tbody>
                                           @foreach($roles as $role)
                                           <tr>
                                               <td>{{ $role->name }}</td>
                                               <td>
                                                   
                                                     <a class="btn btn-primary" href="{{ route('roles.edit', $role->id) }}">Editar</a>
                                                    

                                                   
                                                     {!! Form::open(['method' => 'DELETE', 'route' =>['roles.destroy', $role->id], 'style'=>'display:inline']) !!}
                                                       {!! Form::submit('Borrar',['class' => 'btn btn-danger']) !!} 
                                                     {!! Form::close() !!}
                                                        
                                               </td>
                                           </tr>
                                           @endforeach
                                       </tbody>
                                   
                                   </table>
                                   {{-- la paginacion --}}
                                   <div class="pagination justify-content-end">
                                       {!! $roles->links() !!}
                                   </div>   

                             {{-- fin --}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
