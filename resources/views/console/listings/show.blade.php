@extends('console.master')

@section('content')
     <h2>{{ $listing->title }}</h2> 
    <div class="row">
      <div class="col">
       <i> de <strong>{{ $listing->user->name }}</strong> {{ $listing->created_at->diffForHumans() }}</i> 
      </div>
      <div class="col text-md-right">
        <a href="/listings/{{ $listing->id}}" class="btn btn-success btn-sm" role="button">Ver Online</a>
        <a href="#comments" class="btn btn-warning btn-sm" role="button">Comentarios</a>
        <a href="#offers" class="btn btn-warning btn-sm" role="button">Ofertas</a>
        @if(!$listing->hasExpired())
          <a href="/console/listings/{{ $listing->id}}/expire" class="btn btn-danger btn-sm" role="button">Expirar</a>
        @else
          <a href="/console/listings/{{ $listing->id}}/enable" class="btn btn-success btn-sm" role="button">Habilitar</a>
        @endif

        @if($listing->isActive())
          <a href="/console/listings/{{ $listing->id}}/deactivate" class="btn btn-danger btn-sm" role="button">Desactivar</a>
        @else
          <a href="/console/listings/{{ $listing->id}}/activate" class="btn btn-success btn-sm" role="button">Activar</a>
        @endif
      </div>
    </div>
    <hr />
    <p><b>Creado:</b> {{ $listing->created_at->toFormattedDateString() }}</p>
    <p><b>Activo:</b>
                     @if(!$listing->isActive())
                       <span class="badge badge-danger">Desactivado</span>
                      @else
                      <span class="badge badge-success">Activo</span>
                     @endif
    <p><b>Expira:</b> 
                    @if($listing->hasExpired())
                      <span class="badge badge-danger">Expiró el {{ $listing->expiration_date->toFormattedDateString() }} </span>
                    @else
                    {{ $listing->expiration_date->toFormattedDateString() }} 
                    @endif

    </p>
    <p><b>Categoría:</b> {{ $listing->category->name }}</p>
    <p><b>Raza:</b> {{ $listing->breed->name }}</p>
    <p><b>Cabezas:</b> {{ $listing->heads }}</p>
    <p><b>Peso approx:</b> {{ $listing->unitweight }} kg.</p>
    <p><b>Métodos de pago:</b> 
                        @foreach ($listing->paymentmethods as $pm)
                            {{ $pm->name }} -
                        @endforeach
    </p>
    <p><b>Notas:</b> {{ $listing->description }}</p>
    <p><b>Imágenes:</b>

        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="width: 400px; margin: 0 auto">
          <ol class="carousel-indicators">
                <?php $counter=0; foreach ($listing->listingfiles as $file){ ?>
                    <li data-target="#carouselExampleIndicators" data-slide-to="{{ $counter }}" <?= ($counter==0)?'class="active"':'' ?>class="active">
                        
                    </li>
                <?php $counter++; } ?>
          </ol>
          <div class="carousel-inner" role="listbox">
            <?php $counter=0; foreach ($listing->listingfiles as $file){ ?>
                <div class="carousel-item<?= ($counter==0)?' active':'' ?>">
                  <img class="d-block img-fluid" src="/{{ $file->filename }}" alt="imagen">
                </div>
            <?php $counter++; } ?>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>


    </p>

    <a name="comments"></a>
    <strong>Comentarios:</strong> {{ count($listing->comments) }} comentario(s)
          <div class="col-md-7">
              <div class="table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Fecha</th>
                      <th>Usuario</th>
                      <th>Comentario</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($listing->comments()->orderBy('created_at', 'DESC')->get() as $comment)
                    <tr>
                        <td>{{ $comment->created_at->diffForHumans() }}</td>
                        <td>{{ $comment->user->name }}</td>
                        <td>{{ $comment->body }}</td>
                         <td>
                          <a href="" class ="btn btn-warning btn-sm">Responder</a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
              </div>
        </div><!-- /col-sm-* -->
  
  <br />   
    {{-- add comment --}}
    <div class="card col-md-7">
        <div class="card-block">
            <form method="post" action="/console/listings/{{ $listing->id }}/comments">
              {{ csrf_field() }}
              <div class="form-group">
                <textarea id="body" name="body" class="form-control" placeholder="Agregue comentarios..." required></textarea>
              </div>
              <div class="form-group">
              <button type="submit" class="btn btn-primary">Agregar</button>
              </div>

            @include('layouts.errors')

            </form>
        </div>
    </div>
<br />

<a name="offers"></a>
<strong>Ofertas:</strong> {{ count($listing->offers) }} oferta(s)
<div class="card col-md-7">
  <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Fecha</th>
                  <th>Usuario</th>
                  <th>Oferta</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach($listing->offers()->orderBy('created_at', 'DESC')->get() as $offer)
                <tr>
                    <td>{{ $offer->created_at->toFormattedDateString() }}</td>
                    <td>{{ $offer->user->name }}</td>
                    <td>{{ $offer->amount }}</td>
                     <td>
                      <a href="" class ="btn btn-warning btn-sm">Ver Datos</a>
                    </td>

                </tr>
                @endforeach
                </tbody>
            </table>
  </div>
</div>

		
@endsection