<li  class="side-menus {{ Request::is('*') ? 'active' : 'inactive' }}">
    
    <a class="nav-link" href="{{ route('home')}}">
        <i class=" fas fa-building"></i><span>Inicio</span>
    </a>

    <a class="nav-link" href="{{ route('usuarios.index')}}">
        <i class=" fas fa-users"></i><span>Usuarios</span>
    </a>
   
    <a class="nav-link" href="{{ route('roles.index')}}">
        <i class=" fas fa-user-lock"></i><span>Roles</span>
    </a>
   
    <a class="nav-link" href="{{ route('recursos_humanos')}}">
        <i class=" fas fa-house-user"></i><span>Recursos Humanos</span>
    </a>

    <a class="nav-link" href="{{ route('menu')}}">
        <i class=" fas fa-phone-square"></i><span>Atencion al Cliente</span>
    </a>
    
    <a class="nav-link" href="{{ route('mapa-menu')}}">
        <i class=" fas fa-map"></i><span>Mapa Interactivo</span>
    </a>
   
    
</li>
