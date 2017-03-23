@extends('console.master')

@section('content')

<div class="row">
    <div class="col">
        <h2>Categorías de Ganado</h2>
    </div>
    <div class="col text-md-right">
        <a href="/console/categories/create" class="btn btn-success btn-sm" role="button">Nuevo</a>
    </div>
</div>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Descripción</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach($categories as $category)
                <tr>
                    <td><a href="{{ env('APP_URL')}}/console/categories/{{ $category->id }}">{{ $category->name }}</a></td>
                    <td>{{ $category->description }}</td>
                    <td>
                        <a href="{{ env('APP_URL')}}/console/listings/categories/{{ $category->id }}" class ="btn btn-info btn-sm">Ver Lotes ({{ count($category->listings) }})</a>
                        &nbsp;
                        <a href="{{ env('APP_URL')}}/console/categories/{{ $category->id }}/edit" class ="btn btn-warning btn-sm">Editar</a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>

@endsection