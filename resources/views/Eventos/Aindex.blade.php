@extends('layouts.actions')
<link rel="stylesheet" href="{{asset('css/cards2.css')}}">
@section('titulo', 'Ver Eventos')
@section('contenido')
@if(Session::has('ok'))
<div class="alert alert-success alert-dismissible fade show" role="alert">

  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

@if(Session::has('confirmado'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  Evento confirmado
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

@if(Session::has('eliminado'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  Eliminado
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

<div class="container">
  <div class="row">
    @foreach($eventos as $evento)
    <div class="card green">
      <div class="additional">
        <div class="user-card">
          <div id="carouselExampleControls-{{$evento->id}}" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              @foreach($evento->fotos as $foto)
              <div class="carousel-item @if($loop->first) active @endif" style="background-image: url('/{{$foto->path}}');"></div>
              @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls-{{$evento->id}}" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls-{{$evento->id}}" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
        <div class="more-info">
        </div>
      </div>
      <div class="general">
        <h1>{{$evento->tipo}}</h1>
        <p>Fecha:@php  $fecha = new DateTime($evento->fecha) @endphp {{$fecha->format('l jS/F/Y g:i A')}}</p>
        <p>precio: {{$evento->precio}}</p>
        <p>Estado: @if($evento->confirmado==1) Aceptado @endif @if($evento->confirmado == 0) En espera @endif</p>
        <div class="row">

          <div class="col-md-3">
            <a href="{{route('Eventos.show', $evento->id)}}" class="btn btn-info"><i class="fa fa-edit"></i> Editar</a>
          </div>

          <div class="col-md-3 ">
            <a href="{{route('Fotos.create', $evento->id)}}" class="btn btn-secondary"><i class="fa fa-plus"></i> fotos</a>
          </div>
          @if($evento->confirmado == 0)
          <div class="col-md-3">
            <a href="#" data-toggle="modal" data-target="#exampleModal-{{$evento->id}}" class="btn btn-danger"><i class="fa fa-trash"></i>Eliminar</a>
          </div>
          @endif

          @if($evento->confirmado == 0)
          <div class="col-md-12">
            <a href="#" data-toggle="modal" data-target="#Modal-{{$evento->id}}" class="btn btn-success col-md-12">Confirmar</a> <br>
          </div>
          @endif
          @if($evento->confirmado == 1)
            @if(Auth::user()->rol==2 || Auth::user()->rol==1 )
            <div class="col-md-3">
              <a href="{{route('Abonos.create', $evento->id)}}" class="btn btn-warning">Recibir abono</a> <br>
            </div>
            @endif
          @endif

          @if(Auth::user()->rol==2)
          <div class="col-md-3">
            <a href="{{route('Abonos.create', $evento->id)}}" class="btn btn-warning">Recibir abono</a>
          </div>
          @endif
        </div>
    </div>
    </div>



    <div class="modal fade" id="exampleModal-{{$evento->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Eliminar evento {{$evento->tipo}}?</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Todas las fotos seran eliminadas
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <a href="{{route('Eventos.eliminar', $evento->id)}}" class="btn btn-primary">Borrar</a>
          </div>
        </div>
      </div>
    </div>




    <div class="modal fade" id="Modal-{{$evento->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Confirmar evento {{$evento->tipo}}?</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST" action="{{ route('Eventos.cStore', $evento->id) }}" >
              @csrf
              <div class="form-group row">
                <label for="precio" class="col-md-4 col-form-label text-md-right"> Precio: </label>
                <div class="col-md-6">
                  <input type="number" name="precio" class="form-control" id="precio" min="{{$evento->paquetes->precio}}" >
                </div>
              </div>
              <input type="hidden" name="evento_id" value="{{$evento->id}}">
              <div class="form-group row">
                <div class="col-md-12 text-right">
                  <button type="submit" class="btn btn-primary"> Guardar </button>
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>

    @endforeach
  </div>

</div>
@endsection
