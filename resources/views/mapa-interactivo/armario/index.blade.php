@extends('layouts.app')
  @section('content')
    <section class="section">
      <div class="section-header" style="max-height: 3rem;">
        {{-- <h5 class="page__heading">Recursos Humamos</h5> --}}
        <h5 class="page__heading">Armarios Almacenados:</h5>
      </div>
      
      <div class="section-body">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                            {{-- inicio --}}
                            
                   <table  class="table table-striped table-bordered table-sm" style="width:100%; border:2px;" id="order_table">
                     <thead style="background-color:#6777ef;">
                       <tr>          
                         <th style="color: #fff;">Descripcion</th>
                         <th style="color: #fff;">Direccion</th>
                         <th style="color: #fff;">GPS armario</th>
                         <th style="color: #fff;">Acciones</th>                        
                        
                        </tr>
                      </thead>
                        <tbody>
                                
                         </tbody>
                    </table>
                            {{-- final --}}
                            
                     @section('scripts') 

                     
     
     <script>
            function DeleteFunction() {
                if (confirm('seguro que deseas borrar este registro?'))
                    return true;
                else {
                    return false;
                }
            }
        </script> 
                  
                            
                           

                            <script>

$(document).ready(function(){

 load_data();

 function load_data(from_date = '', to_date = '')
 {
  $('#order_table').DataTable({
    "language": {
                         "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
                                },
   processing: true,
   serverSide: true,
   responsive: true,
  //  select: true,
   dataSrc: "tableData",
   bDestroy: true,
   autoWidth: true,
   ajax: {
    url:'{{ route("armario.index") }}',
    data:{from_date:from_date, to_date:to_date}
   },
   columns: [
    {
     data:'numeroArmario',
     name:'numeroArmario'
    },
    {
     data:'barrio',
     name:'barrio'
    },
    {
     data:'gps_armario',
     name:'gps_armario'
    },
    {
     data:'action',
     name:'action'
    },
   
    
    

   ],
  

  });
 }



});
    
                            </script>

                                         

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection
@endsection

