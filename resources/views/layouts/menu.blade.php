<li  class="side-menus {{ Request::is('*') ? 'active' : 'inactive' }}">
    
    <a class="nav-link" href="{{ route('home')}}">
        <i class=" fas fa-building"></i><span>Inicio</span>
    </a>
@can('admin-ver')
    <a class="nav-link" href="{{ route('usuarios.index')}}">
        <i class=" fas fa-users"></i><span>Usuarios</span>
    </a>
@endcan

@can('admin-ver')
    <a class="nav-link" href="{{ route('roles.index')}}">
        <i class=" fas fa-user-lock"></i><span>Roles</span>
    </a>
@endcan

@can('recursos-humanos-ver')
      <a class="nav-link" href="{{ route('recursos_humanos')}}">
        <i class=" fas fa-address-card"></i><span>Empleados</span>
      </a>
@endcan

@can('recursos-humanos-ver')
      <a class="nav-link" href="{{ route('recursos_humanos')}}">
        <i class=" fas fa-house-user"></i><span>Recursos Humanos</span>
      </a> 
@endcan
 
@can('admin-ver')
    <a class="nav-link" href="{{ route('menu')}}">
        <i class=" fas fa-phone-square"></i><span>Atencion al Cliente</span>
    </a>
@endcan
    
@can('admin-ver')
    <a class="nav-link" href="{{ route('mapa-menu')}}">
        <i class=" fas fa-map"></i><span>Mapa Interactivo</span>
    </a>
@endcan
    
</li>
