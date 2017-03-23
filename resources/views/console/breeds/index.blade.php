@extends('console.master')

@section('content')


<div class="row">
    <div class="col">
        <h2>Razas</h2>
    </div>
    <div class="col text-md-right">
        <a href="/console/breeds/create" class="btn btn-success btn-sm" role="button">Nuevo</a>
    </div>
</div>
        <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Tipo</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach($breeds as $breed)
                <tr>
                    <td><a href="{{ env('APP_URL')}}/console/breeds/{{ $breed->id }}">{{ $breed->name }}</a></td>
                    <td>{{ $breed->type }}</td>
                    <td>
                        <a href="{{ env('APP_URL')}}/console/listings/breeds/{{ $breed->id }}" class ="btn btn-info btn-sm">Ver Lotes ({{ count($breed->listings) }})</a>
                        &nbsp;
                        <a href="{{ env('APP_URL')}}/console/breeds/{{ $breed->id }}/edit" class ="btn btn-warning btn-sm">Editar</a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>

@endsection
