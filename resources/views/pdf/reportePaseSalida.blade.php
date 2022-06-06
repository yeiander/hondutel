<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
  
    <title>Pase de salida</title>
    
</head>
<body>
  <img src="{{ asset('img/perminuevo.png') }}" width="40px">

    <h2 style="text-align: center; font-family:'Courier New', Courier, monospace">Pase de salida</h2>
    <br>
<div>
      <h3 style="display:inline">Nombre del empleado:</h3>
      <p style="display:inline; text-decoration: underline; font-size:20px; font-style: italic; margin-right:1rem;"> {{$permiso->empleados->nombreEmpleado}}</p>   
      <h3 style="display:inline" >Numero personal:</h3>
      <p style="display:inline; text-decoration: underline; font-size:20px; font-style: italic;">{{$permiso->fk_id_empleado}}</p>
</div>
<br>
<div>
  <h3 style="display:inline;">Hora de salida: </h3>
  <p style="display:inline; text-decoration: underline; font-size:20px; font-style: italic;  margin-right:1rem;">{{$permiso->horaSalida}}</p>
  <h3 style="display:inline;">Hora de entrada: </h3>
  <p style="display:inline; text-decoration: underline; font-size:20px; font-style: italic;">{{$permiso->horaEntrada}}</p>
 
</div>
<br>
<div>
  <h3 style="display:inline;">Fecha: </h3>
  <p style="display:inline; text-decoration: underline; font-size:20px; font-style: italic;  margin-right:1rem;">{{$permiso->fechaSolicitudPermiso}}</p>
  <h3 style="display:inline;">Hora de entrada real: </h3>
  <p style="display:inline; text-decoration: underline; font-size:20px; font-style: italic;">{{$permiso->horaEntrada}}</p>
 
</div>
<br>
<div>

  <h3 style="display:inline;">Motivo del permiso: </h3>
  <p style="display:inline; text-decoration: underline; font-size:20px; font-style: italic;">{{$permiso->motivoTrabajoEnfermedad}}</p>
</div>
<br>
<br>
<br>
<div>
  <h3 style="display:inline;">Firma del empleado:______________________ </h3>
  <h3 style="">Firma del guardia:______________________ </h3>
 
</div>
<br>
<h3 style="display:inline;">Jefe inmediato:______________________ </h3>
<h3 style="display:inline;">Recursos humanos:______________________ </h3>
</body>
</html>