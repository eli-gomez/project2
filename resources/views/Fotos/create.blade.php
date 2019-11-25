@extends('layouts.actions')
@section('titulo', 'Agregar fotos')
@section('contenido')
@if(Session::has('ok'))
<div class="alert alert-success" role="alert">
  Fotos agregadas correctamente
</div>
@endif
<div class="container">
  <div class="form">
    <div class="form-panel one">
      <div class="form-header">
        <h1>EDITAR</h1>
      </div>
      <div class="form-content">
        <form method="POST" action="{{ route('Fotos.store', $id) }}" enctype="multipart/form-data" >
          @csrf
          <div class="form-group">
            <label for="fotos"> Cambiar foto: </label>
              <input type="file" name="fotos[]"  id="file" multiple required>
          </div>

          <div class="form-group row">
            <div class="col-md-12 text-right">
              <a href="{{route('Eventos.index')}}" class="btn btn-warning col-12 mb-2 p-2 btn-back"> Regresar </a>
              <button type="submit" class="btn btn-primary"> Guardar </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

</div>
@endsection
