<li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('home')}}">
        <i class=" fas fa-building"></i><span>Inicio</span>
    </a>

    @can('ver-usuario')
    <a class="nav-link" href="{{ route('usuarios.index')}}">
        <i class=" fas fa-users"></i><span>Usuarios</span>
    </a>
    @endcan
    
    @can('ver-usuario')
    <a class="nav-link" href="{{ route('roles.index')}}">
        <i class=" fas fa-user-lock"></i><span>Roles</span>
    </a>
    @endcan
    
    <a class="nav-link" href="{{ route('recursos_humanos')}}">
        <i class=""><img class="ml-2 mr-4" src="{{ asset('img/recursosHumanos.png') }}" height="30px"></i><span>Recursos Humanos</span>
    </a>


    {{-- mi prueba --}}
    
      
        
      
        
     
      {{-- aqui terminara mi prueba --}}
    
</li>
