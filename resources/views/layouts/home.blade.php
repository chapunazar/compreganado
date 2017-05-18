@extends('layouts.master')


@section('nav')
    @include('layouts.nav')
@endsection

@section('content')
<div id="content">
        @include('layouts.pageheader')
    
    <div class="container">
        
        <div class="row">
                <!-- Sidebar -->
        
            <div class="col-12 col-md-2 push-md-10 bd-sidebar">
            @include('layouts.sidebar')
            </div>


                <!-- Main content -->
            <div class="col-12 col-md-10 pull-md-2 bd-content">
                @if ($flash = session('message'))
                    <div id="flash-message" class="row justify-content-center">
                        <div class="alert alert-success col-lg-4" role="alert">
                            <center>{{ $flash }}</center>
                        </div>
                    </div>
                @endif
                
                <h2 class="text-muted">Lotes a la venta</h2>
                <hr>
                <div class="row">
                    <div class="card-deck">
                        @foreach($listings as $listing)
                           <!-- <div class="col-lg-4"> -->

                        <div class="col-6 col-lg-4">
                            <div class="card h-100" style="background-color: transparent;border-color: rgba(255, 255, 255, 0.2);">


                                    @if (count($listing->listingfiles) > 0)
                                        <?php $file=$listing->listingfiles->first() ?>
                                        <img class="card-img-top" src="/{{ $file->filename }}" alt="Imagen Lote">
                                    @else
                                        <h5>Sin imagen</h5>
                                    @endif
                                  
                                  <div class="card-block">
                                     <h4 class="card-title">{{ $listing->title }}</h4> <i> de <strong>{{ $listing->user->name }}</strong> {{ $listing->created_at->diffForHumans() }}</i>
         
                                  </div>
                                  <div class="card-footer"  style="background-color: transparent;border-color: rgba(255, 255, 255, 0.2);">
         
                                    <a class="btn btn-primary btn-sm" href="{{ env('APP_URL')}}/listings/{{ $listing->id }}" role="button">Ver Detalles &raquo;</a> 
                                    <small>  {{ count($listing->comments) }} comentario(s)</small>
                                   </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
    

    
</div><!-- /.content -->

@endsection


