@extends('layouts.actions')
@section('titulo', 'Editar Evento')
@section('contenido')
<link rel="stylesheet" href="{{asset('css/cards.css')}}">

<div class="container">
  <div class="col-md-12">
    <div class="form">
        <div class="form-panel one">
          @if(Session::has('ok'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            Evento Editado
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          @endif

          @if(Session::has('fotoDeleted'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            Foto Eliminada
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          @endif
            @if($evento->confirmado == 1)
          <a href="{{route('Eventos.index')}}" class="btn btn-warning"> Regresar </a>
          @endif
              @if($evento->confirmado == 0)

            <div class="form-header">
                <h1>EDITAR</h1>
            </div>
            <div class="form-content">

              @php  $fecha = new DateTime($evento->fecha) @endphp
                <form method="POST" action="{{ route('Eventos.actualizar', $evento->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group"><label for="fotos">Cambiar fecha:</label><input type="datetime-local"  name="fecha" value="{{$fecha->format('Y-m-d\TH:i')}}" ></div>
                    <div class="form-group"><label for="tipo">Tipo:</label> <input type="text" name="tipo"  value="{{$evento->tipo}}" > </div>
                    <div class="form-group"><button type="submit" class="btn btn-primary"> Guardar </button>
                        <a href="{{route('Eventos.index')}}" class="btn btn-warning col-md-12 mt-2 btn-back"> Regresar </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
  </div>
</div>
 @endif

<div class="container">
  @if(Auth::User()->rol == 2 || Auth::User()->rol == 3)
  @foreach($evento->fotos as $foto)
  @if($foto->subida_por == Auth::User()->id)
  <div class="row">
    <div class="col-md-4">
      <card data-image="{{asset($foto->path)}}">
        <h1 slot="header"></h1>
        <p slot="content">
          <a href="{{route('Fotos.show', $foto->id)}}" class="c-withe">Editar foto</a>
          <a href="{{route('Fotos.eliminar', $foto->id)}}" class="c-withe">Eliminar foto</a>
        </p>
      </card>
    </div>
  </div>
  @endif
  @endforeach
  @endif




  @if(Auth::User()->rol == 1)
  @foreach($evento->fotos as $foto)
  @if($foto->Usuario->rol == 2 || $foto->subida_por == Auth::User()->id)
  <div class="row">
    <div class="col-md-3">
      <img src="{{asset($foto->path)}}" alt="Imagen" class="img-fluid">
    </div>
    <div class="col-md-3">
      <a href="{{route('Fotos.show', $foto->id)}}">Editar foto</a>
      <a href="{{route('Fotos.eliminar', $foto->id)}}">Eliminar foto</a>
    </div>
  </div>
  @endif
  @endforeach
  @endif
</div>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script type="text/javascript" src="{{asset('js/card.js')}}">
@endsection
