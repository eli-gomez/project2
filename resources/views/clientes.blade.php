@extends('plantilla')
@section('agregar')

<div class="row">
<div class="card border-ligth mb-3" style="max-width: 18rem;">
  <img src="images/icons/clientes/create.png" class="card-img-top" alt="crear">
  <div class="card-body">
    <h5 class="card-title">Crear evento</h5>
    <p class="card-text">En esta sección puedes crear tus eventos y reservar tu lugar.</p>
    <a href="#" class="btn btn-primary">Go to create</a>
  </div>
</div>

<div class="card border-light mb-3" style="max-width: 18rem;">
  <img src="images/icons/clientes/recuperar.png" class="card-img-top" alt="recuperar">
  <div class="card-body">
    <h5 class="card-title">Recuperar evento</h5>
    <p class="card-text">Aquí puedes recuperar los datos de tus eventos.</p>
    <a href="/cliente/recuperar" class="btn btn-primary">Go to recover</a>
  </div>
  </div>


<div class="card border-light mb-3" style="max-width: 18rem;">
  <img src="images/icons/clientes/actualizar.png" class="card-img-top" alt="actualizar">
  <div class="card-body">
    <h5 class="card-title">Actualizar evento</h5>
    <p class="card-text">Aquí tienes la opción de actualizar los datos de tus eventos. Ej. Fotos(Antes, durante y después).</p>
    <a href="#" class="btn btn-primary">Go to update</a>
  </div>
</div>

<div class="card border-light mb-3" style="max-width: 18rem;">
  <img src="images/icons/clientes/delete.png" class="card-img-top" alt="borrar">
  <div class="card-body">
    <h5 class="card-title">Eliminar evento</h5>
    <p class="card-text">Opción para eliminar los datos de tus eventos (fotos).</p>
    <a href="#" class="btn btn-primary">Go to delete</a>
  </div>
</div>
</div>

@endsection