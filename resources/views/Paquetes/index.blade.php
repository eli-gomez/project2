@extends('layouts.actions')
<link rel="stylesheet" href="{{asset('css/cards2.css')}}">
@section('title', 'Listar paquetes')
@section('contenido')
<div class="row">
  @foreach($paquetes as $paquete)
  <div class="card green">
    <div class="additional">
      <div class="user-card">
        <div id="carouselExampleControls-{{$paquete->id}}" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item  active">
              <img src="{{asset($paquete->foto1)}}" alt="" class="">
            </div>
            <div class="carousel-item">
              <img src="{{asset($paquete->foto2)}}" alt="" class="">
            </div>
            <div class="carousel-item">
              <img src="{{asset($paquete->foto3)}}" alt="" class="">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleControls-{{$paquete->id}}" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleControls-{{$paquete->id}}" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
      <div class="more-info">
      </div>
    </div>
    <div class="general">
      <h1>{{$paquete->description}}</h1>
      <p>Precio: ${{$paquete->precio}}</p>
      <p>Activo: @if($paquete->activo == 1) Activo @endif @if($paquete->activo == 0) inActivo @endif</p>
      <p></p>
      <div class="row">
        <div class="col-md-3">
          <a href="{{route('Paquetes.show', $paquete->id)}}" class="btn btn-info">Editar</a>
      </div>
      </div>
  </div>
  </div>
  @endforeach
</div>
@endsection
