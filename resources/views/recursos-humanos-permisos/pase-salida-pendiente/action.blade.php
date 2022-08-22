<div class="d-flex">
    <a href="{{ route('pase-salida-pendiente.edit',$data->id) }}" class="btn btn-primary btn-sm" type="button" style="margin-right: 0.3rem">Confirmar</a>
    {{-- <a href="{{ route('pase-salida.delete',$data->id) }}" class="btn btn-danger btn-sm" type="button">borrar</a> --}}
    
    <form id="borrarForm" action=" {{ route('pase-salida-pendiente.destroy',$data->id) }}"  id="MensajeBorrar" method="post">
        @method('DELETE')
        @csrf
        <button onclick="return DeleteFunction()" type="submit" class="btn btn-danger btn-sm formulario-eliminar">Eliminar</button>
       
          
        </form>
    
    </div>