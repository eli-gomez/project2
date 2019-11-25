@extends('layouts.plantilla')
@section('agregar')
<main role="main">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="2" class="active"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item slider-img active">
        <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg"
        preserveAspectRatio="xMidYMid slice" focusable="false" role="img"><rect width="100%" height="100%" fill="#777"/>
      </svg>
      <img src="{{asset('images/salon1.jpg')}}">
      <div class="container">
        <div class="carousel-caption">
          <h1>La mejor selección para tus eventos.</h1>
        </div>
      </div>
    </div>
    <div class="carousel-item slider-img">
      <svg class="bd-placeholder-img" width="100%" height="100%" src="http://www.w3.org/2000/svg"
      preserveAspectRatio="xMidYMid slice" focusable="false" role="img">
      <rect width="100%" height="100%" fill="#777"/></svg>
      <img src="{{asset('images/salon2.jpg')}}">
      <div class="container">
        <div class="carousel-caption">
          <h1>Espacios.</h1>
        </div>
      </div>
    </div>
    <div class="carousel-item slider-img">
      <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg"
      preserveAspectRatio="xMidYMid slice" focusable="false" role="img" >
      <rect width="100%" height="100%" fill="#777"/></svg>
      <img src="{{asset('images/salon3.jpg')}}">
      <div class="container">
        <div class="carousel- caption">
          <h1>Servicios</h1>
          <p><a class="btn btn-lg btn-info" href="#" role="button">Entérate de nuestros precios y compara</a></p>
        </div>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>


<!-- Marketing messaging and featurettes
================================================== -->
<!-- Wrap the rest of the page in another container to center all the content. -->

<div class="container marketing">

  <!-- Three columns of text below the carousel -->
  <div class="row mt-5">

    @foreach($paquetes as $paquete)
    <div class="column column--33 col-md-4">
      <h3 class="our-team__title">{{$paquete->nombre}}</h3>
      <div id="myCarousel-{{$paquete->id}}" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner h200r">
          <div class="carousel-item  active">
            <img src="{{asset($paquete->foto1)}}" alt="" class="img-fluid">
          </div>
          <div class="carousel-item">
            <img src="{{asset($paquete->foto2)}}" alt="" class="img-fluid">
          </div>
          <div class="carousel-item">
            <img src="{{asset($paquete->foto3)}}" alt="" class="img-fluid">
          </div>
        </div>
      <a class="carousel-control-prev" href="#myCarousel-{{$paquete->id}}" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#myCarousel-{{$paquete->id}}" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
      <!-- <img src="{{asset('images/boda1.jpg')}}" alt="" class="our-team__img"> -->
      <h2 class="our-team__txt">{{$paquete->description}}</h2>
      <h2>Precio: ${{$paquete->precio}} </h2>
      @if( isset(Auth::user()->rol) &&  Auth::user()->rol == 3)
      <a href="{{route('Eventos.create', $paquete->id)}}" class="btn btn-success" > Comprar paquete </a>
      @endif
    </div>
    @endforeach

    </div><!-- /.row -->

  </div><!-- /.container -->
<br><br><br><br><br><br><br><br><br><br>

  @endsection
