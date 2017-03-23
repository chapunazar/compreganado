@extends('layouts.master')

@include('layouts.nav')


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
                     @foreach($listings as $listing)
                    <div class="col-lg-4">
                      <h3>{{ $listing->title }}</h3> <i> de <strong>{{ $listing->user->name }}</strong> {{ $listing->created_at->diffForHumans() }}</i>
                      <br /><br /><br />
                      <p class="text-muted"><a class="btn btn-primary btn-sm" href="{{ env('APP_URL')}}/listings/{{ $listing->id }}" role="button">Ver Detalles &raquo;</a> 
                          <small>  {{ count($listing->comments) }} comentario(s)</small></p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    

    
</div><!-- /.content -->

@endsection


