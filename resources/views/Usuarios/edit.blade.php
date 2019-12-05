@extends('layouts.app')
@section('content')
@if(Session::has('ok'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  Editado correcto
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Actualizar</div>

        <div class="card-body">
          <form method="POST" action="{{ route('User.actualizar', $user->id) }}">
            @csrf

            <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label text-md-right">Nombre</label>
              <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$user->name}}"  autocomplete="name" autofocus>

                @error('name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="email" class="col-md-4 col-form-label text-md-right">Correo</label>

              <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email}}"  autocomplete="email">

                @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="email" class="col-md-4 col-form-label text-md-right">Rol</label>
              <div class="col-md-6">
                <select class="form-control" name="rol">
                  <option value="1" @if($user->rol == 1) selected @endif  > Gerente  </option>
                  <option value="2" @if($user->rol == 2) selected @endif> Empleado  </option>
                  <option value="3" @if($user->rol == 3) selected @endif>  Cliente </option>
                </select>
              </div>
            </div>

            <div class="form-group row">
              <label for="password" class="col-md-4 col-form-label text-md-right">Contraseña</label>

              <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">
              </div>
            </div>

            <div class="form-group row">
              <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirmar Contraseña</label>

              <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
              </div>
            </div>

            <div class="form-group row mb-0">
              <div class="col-md-12">
                <a href="{{route('User.index')}}" class="btn btn-warning btn-back mb-3 col-md-12"> Regresar </a>
                <button type="submit" class="btn btn-primary">
                  Actualizar
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
