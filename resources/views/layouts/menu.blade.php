<li  class="side-menus {{ Request::is('*') ? 'active' : 'inactive' }}">
    
    <a class="nav-link" href="{{ route('home')}}">
        <i class=" fas fa-building"></i><span>INICIO</span>
    </a>

    <a class="nav-link" href="{{ route('usuarios.index')}}">
        <i class=" fas fa-users"></i><span>USUARIOS</span>
    </a>
   
    <a class="nav-link" href="{{ route('roles.index')}}">
        <i class=" fas fa-user-lock"></i><span>ROLES</span>
    </a>
   
    <a class="nav-link" href="{{ route('recursos_humanos')}}">
        <i class=" fas fa-house-user"></i><span>RECURSOS HUMANOS</span>
    </a>

    <a class="nav-link" href="{{ route('menu')}}">
        <i class=" fas fa-phone-square"></i><span>ATENCION AL CLIENTE</span>
    </a>
    
    <a class="nav-link" href="{{ route('mapa-menu')}}">
        <i class=" fas fa-map"></i><span>MAPA INTERACTIVO</span>
    </a>
   
    
</li>
