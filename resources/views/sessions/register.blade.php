@extends('sessions.master')

@section('content')

<form method="post" action="/register" class="form-signin">
    <h2>Registración de usuario nuevo</h2>
    {{ csrf_field() }}
  <div class="form-group">
    <label for="name">Nombre</label>
    <input type="text" class="form-control" id="name" name="name" required>
  </div>
  <div class="form-group">
    <label for="email">E-mail</label>
    <input type="text" class="form-control" id="email" name="email" required>
  </div>
  <div class="form-group">
    <label for="password">Contraseña</label>
    <input type="password" class="form-control" id="password" name="password" required>
  </div>
  <div class="form-group">
    <label for="password_confirmation">Confirme contraseña</label>
    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
  </div>
  <div class="form-group">
  <button type="submit" class="btn btn-primary">Registrarse</button>
  </div>

      @include('layouts.errors')
</form>



@endsection