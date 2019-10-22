@extends('plantilla')
@section('agregar')

<div class="row">
<div class="w-50 p-3">
<div class="card bg-dark text-white">
  <img src="images/icons/empleados/listar.png" class="card-img" alt="crear">
  <div class="card-img-overlay">
    <h5 class="card-title">Recuperar y listar eventos</h5>
    <p class="card-text">Sección para ver detalles de eventos.</p>
    <a href="empleado/list" class="btn btn-primary">Go to details</a>
  </div>
</div>
</div>


<div class="w-50 p-3">
<div class="card bg-dark text-white>
 <img src="images/icons/empleados/agregar.png" class="card-img" alt="recuperar">
  <div class="card-img-overlay">
    <h5 class="card-title">Agregar fotos</h5>
    <p class="card-text">Agrega aquí las fotos de los eventos.</p>
    <a href="empleado/agregarfotos" class="btn btn-primary">Go to details</a>
  </div>
  </div>
</div>
</div>
@endsection