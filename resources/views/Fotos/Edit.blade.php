@extends('layouts.actions')
@section('titulo', 'Editar foto')
@section('contenido')
@if(Session::has('fotoEdit'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  foto editada
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
<div class="container">
  <div class="col-md-12">
    <div class="form">
      <div class="form-panel one">
        <div class="form-header"><h1>EDITAR</h1></div>
        <div class="form-content">
          <form method="POST" action="{{ route('Fotos.actualizar', $id) }}" enctype="multipart/form-data" >
            @csrf
            <div class="form-group">
              <label for="foto"> Cambiar foto: </label>
                <input type="file" name="foto"  id="file" >
            </div>
            <div class="form-group row">
              <div class="col-md-12 text-right">
                <button type="submit" class="btn btn-primary"> Guardar </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
