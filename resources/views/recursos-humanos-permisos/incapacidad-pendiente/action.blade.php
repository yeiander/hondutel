<div class="d-flex">
    <form action=" {{url('/recursos-humanos-permisos/incapacidad-pendiente/'.$data->id)}} " method="post"> 
        {{ method_field('PATCH')}} 
        @csrf  
              <input class="form-control" type="hidden" name="aprobacion" readonly id="aprobacion" value="almacenado">
         
            <button onclick="return confirmarFunction()" style="margin-right: 0.3rem" type="submit" class="btn btn-primary btn-sm formulario-eliminar">Almacenar</button>
           
</form>
    <form id="borrarForm" action=" {{ route('incapacidad-pendiente.destroy',$data->id) }}"  id="MensajeBorrar" method="post">
        @method('DELETE')
        @csrf
        <button onclick="return DeleteFunction()" type="submit" class="btn btn-danger btn-sm formulario-eliminar">Eliminar</button>
        </form></td>
    
    </div>
    