@extends('console.master')

@section('content')
    <h2>{{ $user->name }}</h2>
    
    <a href="#listings" class="btn btn-warning btn-sm" role="button">Lotes</a>
    <a href="#comments" class="btn btn-warning btn-sm" role="button">Ofertas</a>
    <a href="#offers" class="btn btn-warning btn-sm" role="button">Comentarios</a>
    <hr>
    <p><b>Creado:</b> {{ $user->created_at->toFormattedDateString() }}</p>
    <p><b>Email:</b> {{ $user->email }}</p>


  
  <br />  
<a name="offers"></a>
<strong>Lotes:</strong> {{ count($user->listings) }} lote(s)
<div class="card col-md-7">
  <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Fecha</th>
                  <th>Lote</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach($user->listings()->orderBy('created_at', 'DESC')->get() as $listing)
                <tr>
                    <td>{{ $listing->created_at->toFormattedDateString() }}</td>
                    <td><a href="{{ env('APP_URL')}}/console/listings/{{ $listing->id }}">{{ $listing->title }}</a></td>
                    <td>
                      <a href="" class ="btn btn-warning btn-sm">Borrar</a>
                    </td>

                </tr>
                @endforeach
                </tbody>
            </table>
  </div>
</div>

 <br />  
<a name="offers"></a>
<strong>Ofertas Realizadas:</strong> {{ count($user->offers) }} oferta(s)
<div class="card col-md-7">
  <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Fecha</th>
                  <th>Lote</th>
                  <th>Oferta</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach($user->offers()->orderBy('created_at', 'DESC')->get() as $offer)
                <tr>
                    <td>{{ $offer->created_at->toFormattedDateString() }}</td>
                    <td><a href="{{ env('APP_URL')}}/console/listings/{{ $offer->listing->id }}">{{ $offer->listing->title }}</a></td>
                    <td>{{ $offer->amount }}</td>
                     <td>
                      <a href="" class ="btn btn-warning btn-sm">Borrar</a>
                    </td>

                </tr>
                @endforeach
                </tbody>
            </table>
  </div>
</div>

<br />

<a name="comments"></a>
<strong>Comentarios Realizados:</strong> {{ count($user->comments) }} comentario(s)
          <div class="card col-md-7">
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
                    @foreach($user->comments()->orderBy('created_at', 'DESC')->get() as $comment)
                    <tr>
                        <td>{{ $comment->created_at->diffForHumans() }}</td>
                        <td><a href="{{ env('APP_URL')}}/console/listings/{{ $comment->listing->id }}">{{ $comment->listing->title }}</a></td>
                        <td>{{ $comment->body }}</td>
                         <td>
                          <a href="" class ="btn btn-warning btn-sm">Borrar</a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
              </div>
        </div><!-- /col-sm-* -->
		
@endsection