@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header"  style="max-height: 3rem;">
            <h5 class="page__heading">Consultar coordenadas</h5>
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
                                    {{-- One of three columns --}}
                                    
                         
                         

                                <ul class="list-unstyled ">
                                  <li class="media my-4">
                                      <a href="{{ route('armario.index') }}"><img  class="mr-3" src="{{ asset('img/armario.png') }}" height="50px"></a>
                                    <div class="media-body">
                                        <a  href="{{ route('armario.index') }}">
                                           <h5>Crear nuevo armario</h5></a>
                                           <p>Crear nuevos armarios</p>
                                    </div>
                                  </li>

                                
                                    {{-- fin --}}
                                  </div>
                                  <div class="col-sm">
                                    {{-- One of three columns --}}
                                    
                          
                          
                             {{-- final --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
