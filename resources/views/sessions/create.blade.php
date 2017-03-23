@extends('sessions.master')

@section('content')

          <form method="post" action="/login" class="form-signin">
              <h2 class="form-signin-heading">Ingrese a su cuenta</h2>
              {{ csrf_field() }}
            <div class="form-group">
              <input type="text" class="form-control" id="email" name="email" placeholder="Email" required>
              <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña" required>
            </div>
            <div class="form-group">
            <button type="submit" class="btn btn-primary">Ingresar</button> <a href="/register" class="btn btn-success" role="button">Registrarse</a>
                
            </div>
                    @include('layouts.errors')
          </form>

@endsection
 