@extends('console.master')

@section('content')


<div class="row">
    <div class="col">
        <h2>Comentarios Hechos</h2>
    </div>
</div>
        <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Fecha</th>
                  <th>Lote</th>
                  <th>Comentario</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach($comments as $comment)
                <tr>
                    <td>{{ $comment->created_at->toFormattedDateString() }}</td>
                    <td><a href="{{ env('APP_URL')}}/listings/{{ $comment->listing->id }}">{{ $comment->listing->title }}</a></td>
                    <td>{{ $comment->body }}</td>
                    <td>
                        <a href="{{ env('APP_URL')}}/console/listing/{{ $comment->listing->id }}/comments/{{ $comment->id }}" class ="btn btn-danger btn-sm">Borrar</a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>

@endsection
