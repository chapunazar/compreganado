@extends('console.master')

@section('content')
    <h2>Nueva Categoria de Ganado</h2>
    <hr>
<form method="post" action="/console/categories">
    {{ csrf_field() }}
  <div class="form-group">
    <label for="name">Nombre</label>
    <input type="text" class="form-control" id="name" name="name">
  </div>
  <div class="form-group">
    <label for="description">Descripción</label>
    <textarea id="description" name="description" class="form-control"></textarea>
  </div>
  <div class="form-group">
  <button type="submit" class="btn btn-primary">Crear</button>
  </div>
    
      @include('console.errors') 
    
</form>
		

@endsection