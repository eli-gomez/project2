@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{asset('css/cards.css')}}">
<div class="container-fluid">
  <div class="row">
    <div class="col-md-8">
      @if (session('status'))
      <div class="alert alert-success" role="alert">
        {{ session('status') }}
      </div>
      @endif

      @if(Auth::user()->rol==2)
      <div class="col-md-4">
        <a href="{{route('Eventos.index')}}">
          <card data-image="/images/boda1.jpg">
            <h1 slot="header">Ver Eventos</h1>
            <p slot="content">Ver eventos disponibles</p>
          </card>
        </a>
      </div>
      @endif



      @if(Auth::user()->rol==3)
      <div class="col-md-4">
        <a href="{{route('Eventos.index')}}">
          <card data-image="/images/boda1.jpg">
            <h1 slot="header">Mis Eventos</h1>
            <p slot="content">Ver eventos</p>
          </card>
        </a>
      </div>
      @endif


      @if(Auth::user()->rol==1)
      <div class="row">
        <div class="col-md-4">
          <a href="{{route('Paquetes.create')}}">
            <card data-image="/images/boda1.jpg">
              <h1 slot="header">Paquetes</h1>
              <p slot="content">crear paquetes</p>
            </card>
          </a>
        </div>

        <div class="col-md-4">
          <a href="{{route('User.index')}}">
            <card data-image="/images/usuario.png">
              <h1 slot="header">Ver usuarios</h1>
              <p slot="content">Ver usuarios registrados</p>
            </card>
          </a>
        </div>

        <div class="col-md-4">
          <a href="{{route('Eventos.Aindex')}}">
            <card data-image="/images/eventos.jpg">
              <h1 slot="header">Ver Eventos</h1>
              <p slot="content">Ver eventos disponibles</p>
            </card>
          </a>
        </div>

        <div class="col-md-4">
          <a href="{{route('Paquetes.index')}}">
            <card data-image="/images/escenarios.jpg">
              <h1 slot="header">Ver paquetes</h1>
              <p slot="content">Editar disponibles</p>
            </card>
          </a>
        </div>
      </div>
      @endif


    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script type="text/javascript" src="{{asset('js/card.js')}}">

</script>
@endsection
