@extends('layouts.actions')
@section('titulo', 'Recibir Abono')
<link rel="stylesheet" href="{{asset('css/cards2.css')}}">

@section('contenido')
@if(Session::has('ok'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  Abono aplicado
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
@if($evento->precio-$abonototal == 0)
<div class="form">
  <div class="form-panel one">
    <div class="form-header">
      <h1>PAGOS CONCLUIDOS</h1>
    </div>
    <div class="form-content">
      El evento esta completamente pagado
      <a href="{{route('Eventos.index')}}" class="col-md-12 btn btn-warning btn-back">Regresar</a>
    </div>
  </div>
</div>

@endif
@if($evento->precio-$abonototal > 0)
<div class="container">
  <div class="col-md-12">
    <div class="form">
      <div class="form-panel one">
        <div class="form-header">
          <h1>ABONOS</h1>
        </div>
        <div class="form-content">
          <form method="POST" action="{{ route('Abonos.store') }}" >
            @csrf
            <div class="form-group row">
              <label for="abono" class="col-md-4 col-form-label text-md-right"> Total a abonar max({{$evento->precio-$abonototal}}): </label>
              <div class="col-md-6">
                <input type="number" name="abono" class="form-control" id="abono" max="{{$evento->precio-$abonototal}}" min="0">
              </div>
            </div>
            <input type="hidden" name="evento_id" value="{{$evento->id}}">
            <div class="form-group row">
              <div class="col-md-12 text-right">
                <a href="{{route('Eventos.index')}}" class="col-md-12 btn btn-warning btn-back mb-3">Regresar</a>
                <button type="submit" class="btn btn-primary"> Guardar </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endif

@if(Auth::user()->rol == 1)
<div class="container-fluid">
  <div class="row">
    @foreach($evento->abonos as $abono )
    <div class="col-md-3 mb-3">
      <div id="postit">
        <div id="message">
          Fecha realizada: {{$abono->fecha}} <br> <br>
          Cantidad Recibida: {{$abono->monto}} <br> <br>
          <div>
          </div>
        </div>
      </div>
    </div>
        @endforeach
    </div>
    </div>
    @endif
    @endsection
