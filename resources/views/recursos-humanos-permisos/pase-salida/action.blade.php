<div class="d-flex">
<a href="{{ route('pase-salida.edit',$data->id) }}" class="btn btn-primary btn-sm" type="button">Editar</a>
{{-- <a href="{{ route('pase-salida.delete',$data->id) }}" class="btn btn-danger btn-sm" type="button">borrar</a> --}}

<form id="borrarForm" action=" {{ route('pase-salida.destroy',$data->id) }}"  id="MensajeBorrar" method="post">
    @method('DELETE')
    @csrf
    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
   
      
    </form></td>

</div>