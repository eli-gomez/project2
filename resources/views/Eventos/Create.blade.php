@extends('layouts.actions')
@section('titulo', 'Crear Evento')
@section('contenido')
@if(Session::has('ok'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  Evento Creado
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
          <h1>CREAR EVENTO</h1>
        </div>
        <div class="form-content">
          <form method="POST" action="{{ route('Eventos.store') }}" enctype="multipart/form-data" >
            @csrf
            <div class="form-group row">
              <label for="fotos" class="col-md-4 col-form-label text-md-right">Fecha </label>
              <div class="col-md-6">
                <input type="datetime-local" name="fecha" class="form-control"  required>
              </div>
            </div>

            <div class="form-group row">
              <label for="tipo" class="col-md-4 col-form-label text-md-right">Tipo: </label>
              <div class="col-md-6">
                <input type="text" name="tipo" class="form-control"  required>
              </div>
            </div>

            <div class="form-group row">
              <label for="fotos" class="col-md-4 col-form-label text-md-right">Fotos: </label>
              <div class="col-md-6">
                <input type="file" name="fotos[]" class="" multiple required>
              </div>

              <input type="hidden" name="id_paquete" value="{{$paquete->id}}">

              <div class="col-md-12 mt-3">
                <div class="col-md-12 text-center">
                  <button type="submit" class="btn btn-primary col-md-12"> Guardar </button>
                </div>
              </div>
            </form>
        </div>
      </div>
    </div>
    </div>
  </div>
  @endsection
