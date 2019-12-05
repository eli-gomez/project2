@extends('layouts.actions')
@section('titulo', 'Crear Paquete')
@section('contenido')
@if(Session::has('ok'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  Paquete Creado
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
@if(Session::has('errors'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  Error al crear el paquete
  @foreach ($errors->all() as $error)
  <p>{{$error}}</p>
  @endforeach
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
<div class="container">
  <div class="col-md-12">
    <div class="form">
      <div class="form-panel one">
        <div class="form-header">
          <h1>Crear Paquetes</h1>
        </div>
        <div class="form-content">
          <form method="POST" action="{{ route('Paquetes.store') }}" enctype="multipart/form-data" >
      @csrf
      <div class="form-group row">
        <label for="nombre" class="col-md-4 col-form-label text-md-right">Nombre: </label>
        <div class="col-md-6">
          <input type="text" name="nombre" class="form-control"  required>
        </div>
      </div>
      <div class="form-group row">
        <label for="descripcion" class="col-md-4 col-form-label text-md-right">Descripcion </label>
        <div class="col-md-6">
          <input type="text" name="descripcion" class="form-control"  required>
        </div>
      </div>
      <div class="form-group row">
        <label for="foto1" class="col-md-4 col-form-label text-md-right">Foto 1: </label>
        <div class="col-md-6">
          <input type="file" name="foto1" class="" id="file" required>
        </div>
      </div>
      <div class="form-group row">
        <label for="foto2" class="col-md-4 col-form-label text-md-right">Foto 2: </label>
        <div class="col-md-6">
          <input type="file" name="foto2" class=""  required>
        </div>
      </div>
      <div class="form-group row">
        <label for="foto3" class="col-md-4 col-form-label text-md-right">Foto 3: </label>
        <div class="col-md-6">
          <input type="file" name="foto3" class=""  required>
        </div>
      </div>

      <div class="form-group row">
        <label for="precio" class="col-md-4 col-form-label text-md-right">Precio </label>
        <div class="col-md-6">
          <input type="number" name="precio" class="form-control"  required>
        </div>
      </div>

      <div class="form-group row">
        <label for="activo" class="col-md-4 col-form-label text-md-right"> Activar paquete :</label>
        <div class="col-md-6">
          <select class="form-control" name="activo">
            <option value="1" selected>Activo</option>
            <option value="0">Inactivo</option>
          </select>
        </div>
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
