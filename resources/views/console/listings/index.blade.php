@extends('console.master')

@section('content')
<div class="row">
    <div class="col">
        <h2>Lotes</h2>
    </div>
    <div class="col text-md-right">
        <a href="/console/listings/create" class="btn btn-success btn-sm" role="button">Nuevo</a>
    </div>
</div>
    <span class="badge badge-warning">{{ $filterTxt }}</span>

          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Título</th>
                  <th>Usuario</th>
                  <th>Fecha Expiración</th>
                  <th></th>
                  <th></th>

                </tr>
              </thead>
              <tbody>
                @foreach($listings as $listing)
                <tr>
                    <td><a href="{{ env('APP_URL')}}/console/listings/{{ $listing->id }}">{{ $listing->title }}</a></td>
                    <td>{{ $listing->user->name }}</td>
                    <td>{{ $listing->expiration_date->toFormattedDateString() }}
                    @if($listing->hasExpired())
                      <span class="badge badge-danger">Expiró</span>
                    @endif

                    </td>
                    <td>
                      <a href="{{ env('APP_URL')}}/console/listings/{{ $listing->id }}#comments" class ="btn btn-warning btn-sm"> Comentarios ({{ count($listing->comments) }})</a>
                    </td>
                    <td>
                      <a href="{{ env('APP_URL')}}/console/listings/{{ $listing->id }}#offers" class ="btn btn-info btn-sm">Ofertas ({{ count($listing->offers) }})</a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
@endsection